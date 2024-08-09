<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//      ['dynamic_home'=>["Lamjung","Alen Pariyar" , "BCA Student"]]
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("dynamic_typer_prefix");
            $table->string("dynamic_typer_array");
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
        Schema::dropIfExists('settings');
    }
};
