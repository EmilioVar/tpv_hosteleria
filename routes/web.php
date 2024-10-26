<?php

use App\Models\Table;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    $groups = App\Models\Group::all();
    $products = App\Models\Product::all();
    $productsTpv = App\Models\Table::find(session('tableSelected'))->products ?? [];

    return view('welcome', compact('groups', 'products','productsTpv'));
})->name('index');

Route::get('tickets/{ticket}/show', [TicketController::class, 'show'])->name('tickets.show');

Route::resources([
    'tickets' => TicketController::class,
    'groups' => GroupController::class,
    'products' => ProductController::class
]);