<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegulatoryDocumentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/activities', ActivityController::class);
Route::apiResource('/categories', CategoryController::class);
Route::apiResource('/news', NewsController::class);
Route::apiResource('/regulatory-documents', RegulatoryDocumentController::class);
