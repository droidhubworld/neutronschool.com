<?php

namespace App\Http\Responses\Backend\Auth\Category;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var \App\Repositories\Backend\Category\CategoryRepository
     */
    protected $repository;
    
    /**
     * @var \App\Models\Auth\Category
     */
    protected $category;

    /**
     * @param \App\Models\Auth\Category $category
     */
    public function __construct($category,$repository)
    {
        $this->category = $category;
        $this->repository = $repository;
    }

    /**
     * toReponse.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.category.edit')
            ->withCategory($this->category)
            ->withData($this->repository->getDataForSpinner());
    }
}
