<?php

use App\Models\Table;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    $groups = App\Models\Group::all();
    $products = App\Models\Product::all();
    $productsTpv = App\Models\Table::find(session('tableSelected'))->products ?? [];
    $tables = Table::all();

    return view('welcome', compact('groups', 'products','productsTpv', 'tables'));
})->name('index');

Route::resource('tickets', TicketController::class);

Route::get('tickets/{ticket}/show', [TicketController::class, 'show'])->name('tickets.show');