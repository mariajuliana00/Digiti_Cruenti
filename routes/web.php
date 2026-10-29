<?php

use App\Http\Controllers\HistoryController;
use App\Models\History;
use Illuminate\Support\Facades\Route;

//Pagina inicial do site bi 
Route::get('/historias', [HistoryController::class,'index'])
->name('history.index');

//Pagina de criação da história bi
Route::get('/historia/criar', [HistoryController::class, 'create'])
->name('history.create');

//Salvar a história no BD bi
Route::post('historia/salvar', [HistoryController::class, 'store'])
->name('history.store');

//Deletar a história bi
Route::post('/historia/deletar/{id}',[HistoryController::class, 'destroy'])
->name('history.destroy');

//editar a história bi
Route::get('/historia/{id}/edit',[HistoryController::class, 'edit'])
->name('history.edit');

Route::put('/historia/{id}',[HistoryController::class, 'update'])
->name('history.update');