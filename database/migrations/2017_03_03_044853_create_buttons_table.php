<?php

use App\Button;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateButtonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buttons', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->string('name');
            $table->integer('relay_id')->unsigned();

            $table->primary('id');

            $table->foreign('relay_id')
                ->references('id')
                ->on('relays');
        });

        /*
        $buttons = [
            ['id' => 1, 'name' => 'Garage Door', 'relay_id' = ],
            ['id' => 2, 'name' => 'Garage Opener Light'],
            ['id' => 3, 'name' => 'Garage Vacation Mode'],
        ];

        collect($buttons)->each(function ($button) {
            Button::create($button);
        });
        */

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buttons');
    }
}
