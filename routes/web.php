<?php

use Illuminate\Support\Facades\Route;

// Routes for inventory
Route::get('inventory',[App\Http\Controllers\InventoryController::class,'index'])->name('inventory.index');

Route::get('inventory/create',[App\Http\Controllers\InventoryController::class,'createForm'])->name('inventory.create');
Route::post('inventory/create',[App\Http\Controllers\InventoryController::class,'storeForm'])->name('inventory.store');
Route::get('inventory/edit/{id}',[App\Http\Controllers\InventoryController::class,'edit'])->name('inventory.edit');
Route::put('inventory/edit/{id}',[App\Http\Controllers\InventoryController::class,'update'])->name('inventory.update');
Route::delete('inventory/delete/{id}',[App\Http\Controllers\InventoryController::class,'delete'])->name('inventory.delete');


// image extract
Route::get('image',[App\Http\Controllers\ImageExtractController::class,'extractImage']);

// PDF extract

Route::get('pdf',[App\Http\Controllers\PDFExtractController::class,'extractPDF']);