<?php

use Illuminate\Http\Request;

Route::group(['namespace' => 'Api'], function () {
    //Route::get('up', 'LiftController@up');
    //Route::get('down', 'LiftController@down');
    //Route::get('stop', 'LiftController@stop');


    Route::get('up', function() {
        exec('/usr/bin/python /var/www/garage/relay_scripts/motors_up.py');
    });

    Route::get('down', function() {
        exec('/usr/bin/python /var/www/garage/relay_scripts/motors_down.py');
    });

    Route::get('stop', function() {
        exec('/usr/bin/python /var/www/garage/relay_scripts/motors_stop.py');
    });
});
