<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotorRelayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motor_relay', function (Blueprint $table) {
            $table->integer('motor_id')->unsigned();
            $table->integer('relay_id')->unsigned();
            $table->string('direction');

            $table->index('direction');

            $table->foreign('motor_id')
                ->references('id')
                ->on('motors');

            $table->foreign('relay_id')
                ->references('id')
                ->on('relays');

            $table->primary(['motor_id', 'relay_id']);
        });

        DB::table('motor_relay')->insert([
            ['motor_id' => 1, 'relay_id' => 1, 'direction' => 'up'],
            ['motor_id' => 1, 'relay_id' => 2, 'direction' => 'up'],
            ['motor_id' => 1, 'relay_id' => 3, 'direction' => 'down'],
            ['motor_id' => 1, 'relay_id' => 4, 'direction' => 'down'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motor_relay');
    }
}