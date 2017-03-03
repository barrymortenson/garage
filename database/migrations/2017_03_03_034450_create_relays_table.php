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
