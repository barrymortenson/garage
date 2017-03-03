<?php

namespace App\Http\Controllers\Api;

use App\Gpio;
use App\Motor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LiftController extends Controller
{
    protected $motors;

    public function __construct()
    {
        $this->motors = Motor::all();
    }

    public function up(Gpio $gpio)
    {
        $this->stop($gpio);

        $this->motors->each(function ($motor) use ($gpio) {
            $motor->relays->each(function ($relay) use ($gpio) {
                if ($relay->pivot->direction == 'up') {
                    $gpio->on($relay->gpio);
                }
            });
        });
    }

    public function down(Gpio $gpio)
    {
        $this->stop($gpio);

        $this->motors->map(function ($motor) use ($gpio) {
            $motor->relays->map(function ($relay) use ($gpio) {
                if ($relay->pivot->direction == 'down') {
                    $gpio->on($relay->gpio);
                }
            });
        });
    }

    public function stop(Gpio $gpio)
    {
        $this->motors->map(function ($motor) use ($gpio) {
            $motor->relays->map(function ($relay) use ($gpio) {
                $gpio->off($relay->gpio);
            });
        });
    }

}
