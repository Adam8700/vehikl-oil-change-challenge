<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\OilChangeCheck;

Route::get('/', function () {
    return view('oil-change');
});

Route::post('/check', function (Request $request) {
    
    // Handle the oil change check logic
    $validated = $request->validate([
    'current_odometer' => 'required|integer|gte:previous_odometer',
    'previous_odometer' => 'required|integer',
    'previous_oil_change_date' => 'required|date|before:today',]);

    $check = new OilChangeCheck();
    $check->current_odometer = $validated['current_odometer'];
    $check->previous_odometer = $validated['previous_odometer'];
    $check->previous_oil_change_date = $validated['previous_oil_change_date'];
    $check->save();
    return redirect('/result/' . $check->id);
});

Route::get('/result/{id}', function ($id) {
    $check = OilChangeCheck::find($id);
    
    return view('result', ['check' => $check]);
});

