<?php

use Illuminate\Support\Facades\Route;
use App\Models\History;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/test1', function () {
    return view('test');
});
Route::get('/histories', function () {
   
    return view('histories', );
});
Route::get('/histories', [HistoryController::class, 'index']);
Route::delete('/histories/{id}', [HistoryController::class, 'destroy'])->name('histories.destroy'); // Delete route
// Show the edit form
Route::get('/histories/{id}/edit', [HistoryController::class, 'edit'])->name('histories.edit');
// Update the history
Route::put('/histories/{id}', [HistoryController::class, 'update'])->name('histories.update');
Route::post('/create_history' , [HistoryController::class , 'createHistory'] );
Route::get('/search', [HistoryController::class, 'search'])->name('histories.search');
Route::get('/db-check', function () {
    try {
        DB::connection()->getPdo();
        return 'Database is connected!';
    } catch (\Exception $e) {
        return 'Could not connect to the database. Please check your configuration. Error: ' . $e->getMessage();
    }
});