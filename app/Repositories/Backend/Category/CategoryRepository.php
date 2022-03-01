<?php

namespace App\Repositories\Backend\Category;

use App\Events\Backend\Category\CategoryCreated;
use App\Events\Backend\Category\CategoryDeleted;
use App\Events\Backend\Category\CategoryUpdated;
use App\Exceptions\GeneralException;
use App\Models\Category;
use App\Repositories\BaseRepository;
use DB;

class CategoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Category::class;

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                'categorys.id',
                'categorys.name',
                'categorys.parent_id',
                'categorys.status',
                'categorys.created_at',
                'categorys.updated_at',
            ]);
    }
    
    public function getDataForSpinner(){
        $items = DB::table('categorys')->where('deleted_at', null)->where('parent_id', '0')->orderBy('name')->pluck('name', 'id');
        return $items;
    }

    /**
     * @param array $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function create(array $input)
    {
        if ($this->query()->where('name', $input['name'])->first()) {
            throw new GeneralException(trans('exceptions.backend.access.categorys.already_exists'));
        }
        
        DB::transaction(function () use ($input) {
            $categoty = new Category();

            $categoty->name = $input['name'];
            $categoty->parent_id = isset($input['parent_category']) ? $input['parent_category'] : '0';
          
            if ($categoty->save()) {
                event(new CategoryCreated($categoty));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.categorys.create_error'));
        });
    }

    /**
     * @param Model $category
     * @param  $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update($category, array $input)
    {
        if ($this->query()->where('name', $input['name'])->where('id', '!=', $category->id)->first()) {
            throw new GeneralException(trans('exceptions.backend.access.category.already_exists'));
        }

        //dd($category);
        $category->name = $input['name'];
        $categoty->parent_id = isset($input['parent_category']) && strlen($input['parent_category']) > 0 && is_numeric($input['parent_category']) ? (int) $input['parent_category'] : 0;
        $category->status = 1;

        DB::transaction(function () use ($category) {
            if ($category->save()) {
                event(new CategoryUpdated($category));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.category.update_error'));
        });
    }

    /**
     * @param \App\Models\Category $category
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete($category)
    {
        
        if ($category->delete()) {
            event(new CategoryDeleted($category));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.category.delete_error'));
    }
}
