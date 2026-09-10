<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\OilChangeCheck;
use Carbon\Carbon;

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

    // Oil change by Kms calculation 
    $kilometresSinceOilChange = $check->current_odometer - $check->previous_odometer;
    $dueByKilometres = $kilometresSinceOilChange > 5000;

    // Oil Change Due by Time Calculation
    $previousDate = Carbon::parse($check->previous_oil_change_date);
    $sixMonthDate = $previousDate->copy()->addMonths(6);
    $dueByTime = $sixMonthDate->lt(Carbon::today());

    $oilChangeDue = $dueByKilometres || $dueByTime;

    return view('result', [
        'check' => $check,
        'oilChangeDue' => $oilChangeDue
    ]);
});

