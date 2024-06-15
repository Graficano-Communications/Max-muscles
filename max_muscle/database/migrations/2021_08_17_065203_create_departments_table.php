<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('url');
            $table->text('description');
            $table->string('home_page_icon');
            $table->string('banner_image');
            $table->text('meta_title')->nullable()->default(null);
            $table->text('meta_description')->nullable()->default(null);
            $table->text('images')->nullable()->default(null);
            $table->integer('sequence');

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
        Schema::dropIfExists('departments');
    }
}
