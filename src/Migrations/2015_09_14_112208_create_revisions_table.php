<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('timetraveller.table'), function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('at')->index();
            $table->string('revisionable_type');
            $table->integer('revisionable_id')->unsigned();
            $table->text('state');
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
        Schema::drop('revisions');
    }
}
