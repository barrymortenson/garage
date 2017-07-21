<?php

use Illuminate\Http\Request;

Route::group(['namespace' => 'Api'], function () {

    /*
    |--------------------------------------------------------------------------
    | Garage Door
    |--------------------------------------------------------------------------
    */
    Route::get('door', function() {
        return exec('sudo ' . env('PYTHON') . ' ' . base_path('relay_scripts/garage_door_toggle.py'));
    });

    Route::get('light', function() {
        return exec(env('PYTHON') . ' ' . base_path('relay_scripts/garage_light_toggle.py'));
    });

    Route::get('vacation', function() {
        return exec(env('PYTHON') . ' ' . base_path('relay_scripts/garage_vacation_toggle.py'));
    });

    /*
    |--------------------------------------------------------------------------
    | Motors
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'motors'], function() {
        Route::get('up', function() {
            return exec(env('PYTHON') . ' ' . base_path('relay_scripts/motors_up.py'));
        });

        Route::get('down', function() {
            return exec(env('PYTHON') . ' ' . base_path('relay_scripts/motors_down.py'));
        });

        Route::get('stop', function() {
            return exec(env('PYTHON') . ' ' . base_path('relay_scripts/motors_stop.py'));
        });


        /*
        |--------------------------------------------------------------------------
        | Motor 1
        |--------------------------------------------------------------------------
        */
        Route::get('1-up', function() {
            return exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_1_up.py'));
        });

        Route::get('1-down', function() {
            return exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_1_down.py'));
        });

        /*
        |--------------------------------------------------------------------------
        | Motor 2
        |--------------------------------------------------------------------------
        */
        Route::get('2-up', function() {
            return exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_2_up.py'));
        });

        Route::get('2-down', function() {
            return exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_2_down.py'));
        });

        /*
        |--------------------------------------------------------------------------
        | Motor 3
        |--------------------------------------------------------------------------
        */
        Route::get('3-up', function() {
            return exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_3_up.py'));
        });

        Route::get('3-down', function() {
            return exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_3_down.py'));
        });

        /*
        |--------------------------------------------------------------------------
        | Motor 4
        |--------------------------------------------------------------------------
        */
        Route::get('4-up', function() {
            return exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_4_up.py'));
        });

        Route::get('4-down', function() {
            return exec(env('PYTHON') . ' ' . base_path('relay_scripts/motor_4_down.py'));
        });

    });
});
