<?php

namespace App\Http\Responses\Backend\Auth\Category;

use Illuminate\Contracts\Support\Responsable;
use App\Repositories\Backend\Category\CategoryRepository;
use Yajra\DataTables\Facades\DataTables;

class CreateResponse implements Responsable
{
    /**
     * @var \App\Repositories\Backend\Category\CategoryRepository
     */
    protected $cateorys;

    /**
     * @var \App\Repositories\Backend\Auth\Permission\PermissionRepository
     */
    protected $permissionRepository;

    /**
     * @param \App\Repositories\Backend\Auth\Permission\PermissionRepository $permissions
     * @param \App\Repositories\Backend\Category\CategoryRepository $cateory
     */
    public function __construct($permissions, $cateory)
    {
        $this->permissionRepository = $permissions;
        $this->cateorys = $cateory;
    }

    /**
     * In Response.
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    { 
        $data = $this->cateorys->getDataForSpinner();
    
        return view('backend.category.create',compact('data'))
            ->withPermissions($this->permissionRepository->getAll())
            ->withRoleCount($this->cateorys->getCount());
    }
}
