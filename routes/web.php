<?php

Route::get('/', function () {
    return view('index', ['component' => 'index']);
});

Route::get('/lift', function () {
    return view('index', ['component' => 'lift']);
});

Route::get('/lift-settings', function () {
    return view('index', ['component' => 'lift-settings']);
});
