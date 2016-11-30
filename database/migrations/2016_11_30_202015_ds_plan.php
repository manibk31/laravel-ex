<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DsPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('ds_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('planname');
            $table->string('item1');
             $table->string('quantity1');
             $table->string('item2');
             $table->string('quantity2');
             $table->string('item3');
             $table->string('quantity3');             
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::drop('ds_plan');
    }
}
