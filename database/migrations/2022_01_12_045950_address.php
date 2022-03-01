<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Address extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->string('address1',  200)->nullable();
            $table->string('address2',  200)->nullable();
           
            // $table->string('street',    60)->nullable();
            $table->string('city',      60)->nullable();
            $table->string('state',     60)->nullable();
            $table->string('post_code', 10)->nullable();
            $table->string('country_id',    3)->nullable();
            $table->float('lat', 10, 6)->nullable();
            $table->float('lng', 10, 6)->nullable();
            foreach(config('access.addresses.flags', ['public', 'primary', 'billing', 'shipping']) as $flag) {
                $table->boolean('is_'. $flag)->default(false)->index();
            }
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('address', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
