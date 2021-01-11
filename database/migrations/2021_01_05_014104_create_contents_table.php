<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name');
            $table->string('slug');
            $table->string('type');
            $table->text('description')->nullable();
            $table->json('options')->nullable();
            $table->text('url')->nullable();
            $table->text('content')->nullable();
            $table->unsignedBigInteger('landing_id');

            $table->foreign('landing_id')->references('id')->on('landings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
