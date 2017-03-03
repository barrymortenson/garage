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

        $buttons = [
            ['id' => 1, 'name' => 'Garage Door', 'relay_id' => 17],
            ['id' => 2, 'name' => 'Garage Opener Light', 'relay_id' => 18],
            ['id' => 3, 'name' => 'Garage Vacation Mode', 'relay_id' => 19],
        ];

        collect($buttons)->each(function ($button) {
            Button::create($button);
        });
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
