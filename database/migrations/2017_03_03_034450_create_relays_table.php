<?php

use App\Relay;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relays', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->integer('gpio')->unsigned();

            $table->primary('id');
        });

        $relays = [
            ['id' => 1, 'gpio' => 4],
            ['id' => 2, 'gpio' => 17],
            ['id' => 3, 'gpio' => 27],
            ['id' => 4, 'gpio' => 22],
            ['id' => 5, 'gpio' => 10],
            ['id' => 6, 'gpio' => 9],
            ['id' => 7, 'gpio' => 11],
            ['id' => 8, 'gpio' => 5],
            ['id' => 9, 'gpio' => 6],
            ['id' => 10, 'gpio' => 13],
            ['id' => 11, 'gpio' => 19],
            ['id' => 12, 'gpio' => 26],
            ['id' => 13, 'gpio' => 12],
            ['id' => 14, 'gpio' => 16],
            ['id' => 15, 'gpio' => 20],
            ['id' => 16, 'gpio' => 21],
            ['id' => 17, 'gpio' => 7],
            ['id' => 18, 'gpio' => 8],
            ['id' => 19, 'gpio' => 25],
            ['id' => 20, 'gpio' => 24],
        ];

        collect($relays)->each(function ($relay) {
            Relay::create($relay);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relays');
    }
}
