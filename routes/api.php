<?php

use Illuminate\Http\Request;

Route::group(['namespace' => 'Api'], function () {
    Route::get('up', 'LiftController@up');
    Route::get('down', 'LiftController@up');
    Route::get('stop', 'LiftController@stop');
});
