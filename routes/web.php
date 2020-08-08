<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ShowAllCurrenciesController')->name('home');
Route::get('/{currency}', 'RateHistoryController')->name('history');
