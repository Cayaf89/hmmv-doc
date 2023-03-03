<?php

use App\Models\Hero;
use App\Models\Statistic;
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
        Schema::create('statisticables', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('statistic_id');
            $table->morphs('statisticable');
            $table->integer('value')->nullable();
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
        Schema::drop('statisticables');
    }
};
