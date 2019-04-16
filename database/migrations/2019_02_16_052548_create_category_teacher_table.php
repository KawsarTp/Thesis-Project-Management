<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_teacher', function (Blueprint $table) {
            $table->unsignedInteger('teacher_id');
            $table->unsignedInteger('category_id');
           $table->primary(['teacher_id','category_id']);
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_teacher', function (Blueprint $table) {
            //
        });
    }
}
