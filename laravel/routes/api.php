<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('v1/notebook', [ContactsController::class, 'getAllContacts']);
Route::post('v1/notebook', [ContactsController::class, 'createContact']);
Route::put('v1/notebook/{id}', [ContactsController::class, 'updateContact']);
Route::delete('v1/notebook/{id}', [ContactsController::class, 'deleteContact']);
Route::get('v1/notebook/{id}', [ContactsController::class, 'getContactById']);