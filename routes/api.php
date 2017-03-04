<?php

use Illuminate\Http\Request;

Route::group(['namespace' => 'Api'], function () {

    /*
    |--------------------------------------------------------------------------
    | Garage Door
    |--------------------------------------------------------------------------
    */
    Route::get('door', function() {
        exec(env('PYTHON') . ' ' . base_path('relay_scripts/garage_door_toggle.py'));
    });

    Route::get('light', function() {
        exec(env('PYTHON') . ' ' . base_path('relay_scripts/garage_light_toggle.py'));
    });

    Route::get('vacation', function() {
        exec(env('PYTHON') . ' ' . base_path('relay_scripts/garage_vacation_toggle.py'));
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
                echo 'motor 1 up';
                //exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor1_up.py'));
            });

            Route::get('down', function() {
                echo 'motor 1 down';
                //exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor1_down.py'));
            });

            Route::get('stop', function() {
                echo 'motor 2 stop';
                //exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor1_stop.py'));
            });
        });

        /*
        |--------------------------------------------------------------------------
        | Motor 2
        |--------------------------------------------------------------------------
        */
        Route::group(['prefix' => '2'], function() {
            Route::get('up', function() {
                echo 'motor 2 up';
                //exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor2_up.py'));
            });

            Route::get('down', function() {
                echo 'motor 2 down';
                //exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor2_down.py'));
            });

            Route::get('stop', function() {
                echo 'motor 2 stop';
                //exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor2_stop.py'));
            });
        });

        /*
        |--------------------------------------------------------------------------
        | Motor 3
        |--------------------------------------------------------------------------
        */
        Route::group(['prefix' => '3'], function() {
            Route::get('up', function() {
                echo 'motor 3 up';
                //exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor3_up.py'));
            });

            Route::get('down', function() {
                echo 'motor 3 down';
                //exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor3_down.py'));
            });

            Route::get('stop', function() {
                echo 'motor 3 stop';
                //exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor3_stop.py'));
            });
        });

        /*
        |--------------------------------------------------------------------------
        | Motor 4
        |--------------------------------------------------------------------------
        */
        Route::group(['prefix' => '4'], function() {
            Route::get('up', function() {
                echo 'motor 4 up';
                //exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor4_up.py'));
            });

            Route::get('down', function() {
                echo 'motor 4 down';
                //exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor4_down.py'));
            });

            Route::get('stop', function() {
                echo 'motor 4 stop';
                //exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor4_stop.py'));
            });
        });
    });
});
