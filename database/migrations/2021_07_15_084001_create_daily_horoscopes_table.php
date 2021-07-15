<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyHoroscopesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_horoscopes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('zodiac_id');
            $table->string('day_str', 15);
            $table->integer('day');
            $table->integer('month');
            $table->integer('year');
            $table->decimal('score', 2, 0);
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
        Schema::dropIfExists('daily_horoscopes');
    }
}
