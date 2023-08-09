<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * GET User
 *
 * Get the currently authenticated user.
 *
 * @group API
 */
Route::middleware('auth:sanctum')->get('/user', fn (Request $request) => $request->user());
