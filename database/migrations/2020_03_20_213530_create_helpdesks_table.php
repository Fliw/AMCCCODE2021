<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpdesksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helpdesks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['confirmation', 'contact', 'docs']);
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('target');
            $table->string('workdays')->default('0');
            $table->string('from', 5)->default('00:00');
            $table->string('to', 5)->default('00:00');
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
        Schema::dropIfExists('helpdesks');
    }
}
