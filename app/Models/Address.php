<?php

namespace App\Models;

use App\Models\Traits\Attributes\AddressAttributes;
use App\Models\Traits\ModelAttributes;
use App\Models\Traits\Addresses\AddressRelationships;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends BaseModel
{
    use SoftDeletes, ModelAttributes, AddressRelationships, AddressAttributes;

    protected $table = 'address';

     /**
     * The guarded field which are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Fillable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'address1',
        'address2',
        'city',
        'state',
        'post_code',
        'country_id',

        'lat',
        'lng',

        'addressable_type',
        'user_id',
    ];

 /**
     * Casts.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];

}
