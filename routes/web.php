<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('oil-change');
});

Route::post('/check', function (Request $request) {
    // Handle the oil change check logic here
    $request->validate([
    'current_odometer' => 'required|integer|gte:previous_odometer',
    'previous_odometer' => 'required|integer',
    'previous_oil_change_date' => 'required|date|before:today',]);
});