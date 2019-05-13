<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\ContactController;

Route::get('/Get-All-Contacts', function () {
     $controller = new ContactController();
     return $controller->index();
});

Route::post('contacts/save-this-contact', 'ContactController@createNewContactAndStoreInDatabase')->name('contact.store');

