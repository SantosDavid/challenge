<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file');
            $table->enum('status', ['waiting', 'proccessing', 'success', 'failed'])->default('waiting');
            $table->enum('type', ['csv'])->default('csv');
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
        Schema::dropIfExists('upload_customers');
    }
}
