<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {           
            // $table->bigIncrements('id');            
            $table->string('firstname', 7);
            $table->string('nickname')->unique;
            $table->string('lastname', 50);
            $table->string('branch', 34);
            $table->integer('salary', 5);
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
        Schema::dropIfExists('agents');        
    }
}
