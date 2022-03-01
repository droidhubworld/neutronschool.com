<?php

namespace App\Http\Controllers\Backend\Auth\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Responses\ViewResponse;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Backend\Auth\Category\EditCategoryRequest;
use App\Repositories\Backend\Category\CategoryRepository;
use App\Http\Requests\Backend\Auth\Category\ManageCategoryRequest;
use App\Http\Requests\Backend\Auth\Category\CreateCategoryRequest;
use App\Http\Responses\Backend\Auth\Category\CreateResponse;
use App\Http\Requests\Backend\Auth\Category\UpdateCategoryRequest;
use App\Http\Requests\Backend\Auth\Category\DeleteCategoryRequest;
use App\Http\Responses\Backend\Auth\Category\EditResponse;
use App\Repositories\Backend\Auth\PermissionRepository;
use App\Http\Requests\Backend\Auth\Category\StoreCategoryRequest;
use App\Http\Responses\RedirectResponse;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * @var \App\Repositories\Backend\Category\CategoryRepository
     */
    protected $repository;

    /**
     * @var \App\Repositories\Backend\Auth\PermissionRepository
     */
    protected $permissionRepository;

    /**
     * @param \App\Repositories\Backend\Auth\CategoryRepository $repository
     * @param \App\Repositories\Backend\Auth\PermissionRepository $permissionRepository
     */
    public function __construct(CategoryRepository $repository, PermissionRepository $permissionRepository)
    {
        $this->repository = $repository;
        $this->permissionRepository = $permissionRepository;
        View::share('js', ['categorys']);
    }

    /**
     * @param ManageCategoryRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageCategoryRequest $request)
    {
        if (access()->allow('view-category')) {
            return new ViewResponse('backend.category.index');
        }
        // return view('backend.dashboard');
        return redirect(route('frontend.user.dashboard'))->withFlashDanger('You are not authorized to view admin dashboard.');
    }

    /**
     * @param \App\Http\Requests\Backend\Auth\Category\CreateCategoryRequest $request
     *
     * @return \App\Http\Responses\Backend\Auth\Categoty\CreateResponse
     */
    public function create(CreateCategoryRequest $request)
    {
        return new CreateResponse($this->permissionRepository, $this->repository);
    }

     /**
     * @param \App\Http\Requests\Backend\Auth\Category\StoreCategoryRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->repository->create($request->except(['_token', '_method']));

        return new RedirectResponse(route('admin.auth.category.index'), ['flash_success' => __('alerts.backend.access.categorys.created')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param \App\Http\Requests\Backend\Auth\Category\EditCategoryRequest $request
     * @param \App\Models\Auth\Category $category
     *
     * @return \App\Http\Responses\Backend\Auth\Category\EditResponse
     */
    public function edit(Category $category, EditCategoryRequest $request)
    {
        return new EditResponse($category,$this->repository);
    }

  /**
     * @param App\Models\Auth\Category $category
     * @param \App\Http\Requests\Backend\Auth\Category\UpdateCategoryRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(Category $category, UpdateCategoryRequest $request)
    {
        $this->repository->update($category, $request->except(['_token', '_method']));
        return new RedirectResponse(route('admin.auth.category.index'), ['flash_success' => __('alerts.backend.access.categorys.updated')]);
    }

     /**
     * @param App\Models\Auth\Category $category
     * @param \App\Http\Requests\Backend\Auth\Category\DeleteCategoryRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Category $category, DeleteCategoryRequest $request)
    {
        $this->repository->delete($category);

        return new RedirectResponse(route('admin.auth.category.index'), ['flash_success' => __('alerts.backend.access.categorys.deleted')]);
    }
}
