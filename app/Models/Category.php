<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\Attributes\CategoryAttributes;
use App\Models\Traits\ModelAttributes;

class Category extends BaseModel
{
    use SoftDeletes, ModelAttributes, CategoryAttributes;

    protected $table = 'categorys';

  //  protected $parent = 'parent_id';

    protected $fillable = [
        'name',
        'parent_id',
    ];
}
