<?php

Route::get('/', function () {
    return view('index', ['component' => 'index']);
});
