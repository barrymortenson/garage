<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LiftController extends Controller
{
    public function up()
    {
        shell_exec("/usr/bin/gpio -g mode 4 out");
        shell_exec("/usr/bin/gpio -g mode 4 out");
        shell_exec("/usr/bin/gpio -g write 17 0");
        shell_exec("/usr/bin/gpio -g write 17 0");
    }

    public function down()
    {
        shell_exec("/usr/bin/gpio -g mode 27 out");
        shell_exec("/usr/bin/gpio -g write 27 0");
        shell_exec("/usr/bin/gpio -g mode 22 out");
        shell_exec("/usr/bin/gpio -g write 22 0");
    }

    public function stop()
    {
        shell_exec("/usr/bin/gpio -g mode 4 out");
        shell_exec("/usr/bin/gpio -g write 4 1");
        shell_exec("/usr/bin/gpio -g mode 17 out");
        shell_exec("/usr/bin/gpio -g write 17 1");
        shell_exec("/usr/bin/gpio -g mode 27 out");
        shell_exec("/usr/bin/gpio -g write 27 1");
        shell_exec("/usr/bin/gpio -g mode 22 out");
        shell_exec("/usr/bin/gpio -g write 22 1");
    }
}
