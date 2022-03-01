<?php

namespace App\Http\Controllers\Trainer\Profile;

use App\Http\Requests\Common\AddressRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Common\AddressRepository;
use App\Http\Requests\Common\ManageAddressRequest;
use App\Http\Responses\ViewResponse;
use Illuminate\Support\Facades\View;
use App\Http\Responses\RedirectResponse;
use App\Models\Address;
/**
 * Class AddressController.
 */
class AddressController extends Controller
{
    /**
     * @var addressRepository
     */
    protected $addressRepository;
   
    /**
     * AddressController constructor.
     *
     * @param AddressRepository $addressRepository
     */
    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
        View::share('js', ['pages']);
    }

    /**
     * @param \App\Http\Requests\Common\AddressRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAddressRequest $request)
    {
        return new ViewResponse('trainer.profile.address_list');
    }
    

    /**
     * @param AddressRequest $request
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function save(AddressRequest $request)
    {

        $output = $this->addressRepository->create(
            $request->user(),
            $request->only('address1', 'address2', 'city', 'state', 'post_code', 'country_id', 'lat', 'lng')
        );
      
        // return redirect()->route('trainer.myaccount.setting')->withFlashSuccess(__('strings.address.profile_added'));
      
        return new RedirectResponse(route('trainer.myaccount.setting'), ['flash_success' => __('alerts.backend.pages.created')]);
    }

    /**
     * 
     * new
     * 
     */

    // public function index()
    // {
      
    //     return view('trainer.profile.address_list');
    // }

    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name'=> 'required|max:191',
    //         'course'=>'required|max:191',
    //         'email'=>'required|email|max:191',
    //         'phone'=>'required|max:10|min:10',
    //     ]);

    //     if($validator->fails())
    //     {
    //         return response()->json([
    //             'status'=>400,
    //             'errors'=>$validator->messages()
    //         ]);
    //     }
    //     else
    //     {
    //         $student = new Student;
    //         $student->name = $request->input('name');
    //         $student->course = $request->input('course');
    //         $student->email = $request->input('email');
    //         $student->phone = $request->input('phone');
    //         $student->save();
    //         return response()->json([
    //             'status'=>200,
    //             'message'=>'Student Added Successfully.'
    //         ]);
    //     }

    // }

    // public function edit($id)
    // {
    //     $student = Student::find($id);
    //     if($student)
    //     {
    //         return response()->json([
    //             'status'=>200,
    //             'student'=> $student,
    //         ]);
    //     }
    //     else
    //     {
    //         return response()->json([
    //             'status'=>404,
    //             'message'=>'No Student Found.'
    //         ]);
    //     }

    // }

    // public function update(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name'=> 'required|max:191',
    //         'course'=>'required|max:191',
    //         'email'=>'required|email|max:191',
    //         'phone'=>'required|max:10|min:10',
    //     ]);

    //     if($validator->fails())
    //     {
    //         return response()->json([
    //             'status'=>400,
    //             'errors'=>$validator->messages()
    //         ]);
    //     }
    //     else
    //     {
    //         $student = Student::find($id);
    //         if($student)
    //         {
    //             $student->name = $request->input('name');
    //             $student->course = $request->input('course');
    //             $student->email = $request->input('email');
    //             $student->phone = $request->input('phone');
    //             $student->update();
    //             return response()->json([
    //                 'status'=>200,
    //                 'message'=>'Student Updated Successfully.'
    //             ]);
    //         }
    //         else
    //         {
    //             return response()->json([
    //                 'status'=>404,
    //                 'message'=>'No Student Found.'
    //             ]);
    //         }

    //     }
    // }

    // public function destroy($id)
    // {
    //     $student = Student::find($id);
    //     if($student)
    //     {
    //         $student->delete();
    //         return response()->json([
    //             'status'=>200,
    //             'message'=>'Student Deleted Successfully.'
    //         ]);
    //     }
    //     else
    //     {
    //         return response()->json([
    //             'status'=>404,
    //             'message'=>'No Student Found.'
    //         ]);
    //     }
    // }

}