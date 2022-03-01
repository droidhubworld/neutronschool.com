<?php

namespace App\Http\Controllers\Trainer\Video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Http\UploadedFile;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\AbstractHandler;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class VideoUploadController extends Controller
{
    
    public function uploadLargeFiles1(Request $request) {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));
    
        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }
    
        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.'.$extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name
    
            $disk = Storage::disk(config('filesystems.default'));
            $path = $disk->putFileAs('videos', $file, $fileName);
    
            // delete chunked file
            unlink($file->getPathname());
            return [
                'path' => asset('storage/' . $path),
                'filename' => $fileName
            ];
        }
    
        // otherwise return percentage information
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }

     /**
   * Handles the file upload
   *
   * @param Request $request
   *
   * @return JsonResponse
   *
   * @throws UploadMissingFileException
   * @throws UploadFailedException
   */
  public function uploadLargeFiles(Request $request) {  //from web route
    // create the file receiver
    $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));

    // check if the upload is success, throw exception or return response you need
    if ($receiver->isUploaded() === false) {
      throw new UploadMissingFileException();
    }

    // receive the file
    $save = $receiver->receive();

    // check if the upload has finished (in chunk mode it will send smaller files)
    if ($save->isFinished()) {
      // save the file and return any response you need, current example uses `move` function. If you are
      // not using move, you need to manually delete the file by unlink($save->getFile()->getPathname())
      return $this->saveFile($save->getFile(), $request);
    }

    // we are in chunk mode, lets send the current progress
    /** @var AbstractHandler $handler */
    $handler = $save->handler();

    return response()->json([
      "done" => $handler->getPercentageDone(),
      'status' => true
    ]);
  }

  /**
   * Saves the file
   *
   * @param UploadedFile $file
   *
   * @return JsonResponse
   */
   protected function saveFile(UploadedFile $file, Request $request) {
     $user_obj = auth()->user();
     $fileName = $this->createFilename($file);

     // Get file mime type
     $mime_original = $file->getMimeType();
     $mime = str_replace('/', '-', $mime_original);

     $folderDATE = $request->dataDATE;

     $folder  = $folderDATE;
    //  $filePath = "public/upload/medialibrary/{$user_obj->id}/{$folder}/";
   
    // $disk = Storage::disk(config('filesystems.default'));
    // $path = $disk->putFileAs('public/'.config('access.folders.course'), $file, $fileName);

    /*$file = $request->file('file');
    $path = Storage::disk('local')->path("chunks/{$file->getClientOriginalName()}");
    File::append($path, $file->get());
    File::move($path, "/path/to/public/someid/{$fileName}");*/

    //dd(config('filesystems.default'));

    // Build the file path
      $filePath = config('access.folders.course');
      $finalPath = storage_path("app/".$filePath);
  
     $fileSize = $file->getSize();
      // move the file name
      $file->move($finalPath, $fileName);
 
    // delete chunked file
    //unlink($file->getPathname());

    return response()->json([
      'path' => $filePath,
      'name' => $fileName,
      'mime_type' => $mime
  ]);
  
     return response()->json([
      'path' => asset('storage/' . config('access.folders.course').$fileName),
      'filename' => $fileName,
      'mime_type' => $mime
     ]);
  }

  /**
   * Create unique filename for uploaded file
   * @param UploadedFile $file
   * @return string
   */
   protected function createFilename(UploadedFile $file) {
     $extension = $file->getClientOriginalExtension();
     $filename = str_replace(".".$extension, "", $file->getClientOriginalName()); // Filename without extension
     
     //delete timestamp from file name
     $temp_arr = explode('_', $filename);
  
     if ( count($temp_arr)>1 ) unset($temp_arr[0]);
     $filename = implode('_', $temp_arr);
   
     //here you can manipulate with file name e.g. HASHED
     return $filename.".".$extension;
   }
}
