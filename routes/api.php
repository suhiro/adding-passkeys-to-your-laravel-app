<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PasskeyController;

Route::get('/passkeys/register', [PasskeyController::class, 'registerOptions'])
->middleware('auth:sanctum');
