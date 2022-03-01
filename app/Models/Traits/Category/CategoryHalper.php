<?php
namespace App\Models\Traits\Category;

use DB;
use App\Models\Category;
trait  CategoryHalper{
    function categoryList(){
        return DB::table('categorys')->where('deleted_at', null)->where('parent_id', '0')->orderBy('name')->pluck('name', 'id');
    }

}