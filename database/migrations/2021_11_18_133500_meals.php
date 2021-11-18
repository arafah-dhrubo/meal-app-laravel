<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Meals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'meals',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->string('type');
                $table->integer('expense');
                $table->timestamps();
                $table->softDeletes();
            }
        );
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
