<?php

namespace App\Http\Controllers\Backend\Auth\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\Category\ManageCategoryRequest;
use App\Repositories\Backend\Category\CategoryRepository;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Carbon;

class CategoryTableController extends Controller
{
    /**
     * @var \App\Repositories\Backend\Auth\CategoryRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\Auth\CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param App\Http\Requests\Backend\Auth\Category\ManageCategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageCategoryRequest $request)
    {
        return Datatables::of($this->repository->getForDataTable())
        ->filterColumn('status', function ($query, $keyword) {
            
            if (in_array(strtolower($keyword), ['active', 'inactive'])) {
                $query->where('status', (strtolower($keyword) == 'active') ? 1 : 0);
            }
        })
        ->editColumn('status', function ($category) {
            //dd($category->status_label);
            return  $category->status_label;
        })
        ->editColumn('created_at', function ($category) {
            return Carbon::parse($category->created_at)->format('d M,Y h:mA');
        })
        ->addColumn('actions', function ($category) {
            return $category->action_buttons;
        })
        ->rawColumns(['status','actions'])
        ->make(true);
    }
}
