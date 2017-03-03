<?php

namespace App;


class Gpio
{
    public function off($gpio)
    {
        exec("/usr/bin/gpio -g mode $gpio out");
        exec("/usr/bin/gpio -g write $gpio 1");
    }

    public function on($gpio)
    {
        exec("/usr/bin/gpio -g mode $gpio out");
        exec("/usr/bin/gpio -g write $gpio 0");
    }
}
