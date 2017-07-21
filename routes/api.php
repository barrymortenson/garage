<?php

use Illuminate\Http\Request;

Route::group(['namespace' => 'Api'], function () {

    /*
    |--------------------------------------------------------------------------
    | Garage Door
    |--------------------------------------------------------------------------
    */
    Route::get('door', function() {
        $output = shell_exec('sudo ' . env('PYTHON') . ' ' . base_path('relay_scripts/garage_door_toggle.py'));
        return response('test output: ' . $output, 200);
    });

    Route::get('light', function() {
        return exec(env('PYTHON') . ' ' . base_path('relay_scripts/garage_light_toggle.py'));
    });

    Route::get('vacation', function() {
        return shell_exec(env('PYTHON') . ' ' . base_path('relay_scripts/garage_vacation_toggle.py'));
    });

    /*
    |--------------------------------------------------------------------------
    | Motors
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'motors'], function() {
        Route::get('up', function() {
            exec(env('PYTHON') . ' ' . base_path('relay_scripts/motors_up.py'));
        });

        Route::get('down', function() {
            exec(env('PYTHON') . ' ' . base_path('relay_scripts/motors_down.py'));
        });

        Route::get('stop', function() {
            exec(env('PYTHON') . ' ' . base_path('relay_scripts/motors_stop.py'));
        });


        /*
        |--------------------------------------------------------------------------
        | Motor 1
        |--------------------------------------------------------------------------
        */
        Route::group(['prefix' => '1'], function() {
            Route::get('up', function() {
                exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_1_up.py'));
            });

            Route::get('down', function() {
                exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_1_down.py'));
            });

            Route::get('stop', function() {
                exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_1_stop.py'));
            });
        });

        /*
        |--------------------------------------------------------------------------
        | Motor 2
        |--------------------------------------------------------------------------
        */
        Route::group(['prefix' => '2'], function() {
            Route::get('up', function() {
                exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_2_up.py'));
            });

            Route::get('down', function() {
                exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_2_down.py'));
            });

            Route::get('stop', function() {
                exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_2_stop.py'));
            });
        });

        /*
        |--------------------------------------------------------------------------
        | Motor 3
        |--------------------------------------------------------------------------
        */
        Route::group(['prefix' => '3'], function() {
            Route::get('up', function() {
                exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_3_up.py'));
            });

            Route::get('down', function() {
                exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_3_down.py'));
            });

            Route::get('stop', function() {
                exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_3_stop.py'));
            });
        });

        /*
        |--------------------------------------------------------------------------
        | Motor 4
        |--------------------------------------------------------------------------
        */
        Route::group(['prefix' => '4'], function() {
            Route::get('up', function() {
                exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_4_up.py'));
            });

            Route::get('down', function() {
                exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_4_down.py'));
            });

            Route::get('stop', function() {
                exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_4_stop.py'));
            });
        });
    });
});
