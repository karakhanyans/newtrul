<?php

use Illuminate\Support\Facades\Route;

Route::get('clients', [\App\Http\Controllers\ClientsController::class, 'index']);
