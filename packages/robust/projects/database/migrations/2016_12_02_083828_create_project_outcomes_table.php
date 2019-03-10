<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_outcomes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('parent_id')->nullable();
            $table->string('name');
            $table->longText('assumption')->nullable();
            $table->string('numbering');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_outcomes');
    }
}
