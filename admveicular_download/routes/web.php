<?php

use Illuminate\Support\Facades\Route;

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
use App\http\Controllers\VeiculoController;
use App\http\Controllers\ManutencaoController;

//autenticaçao
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function(){
  return view('dashboard');
})->name('dashboard');
//aplicação
Route::get('/', [VeiculoController::class, 'index']);
Route::get('/dashboard', [VeiculoController::class, 'dashboard'])->middleware('auth');
Route::get('/veiculos/home', [VeiculoController::class, 'home'])->middleware('auth');
//rotas de veiculo
Route::get('/veiculos/cadastrar',[VeiculoController::class, 'create'])->middleware('auth');
Route::get('/veiculos/consultar', [VeiculoController::class, 'consultar']);
Route::get('/veiculos/deletar', [VeiculoController::class, 'deletar']);
//Route::get('/veiculos/{id}', [VeiculoController::class, 'show'])->middleware('auth');
Route::post('/veiculos',[VeiculoController::class, 'store'])->middleware('auth');
Route::get('/veiculos',[VeiculoController::class, 'destroy'])->middleware('auth');
Route::get('/veiculos/edit',[VeiculoController::class, 'edit'])->middleware('auth');
Route::put('/veiculos/update/{id}',[VeiculoController::class, 'update'])->middleware('auth');
//rotas de manutenção
Route::post('/veiculos/manutencao',[ManutencaoController::class, 'store'])->middleware('auth');
Route::get('/veiculos/manutencao/cadastrar',[ManutencaoController::class, 'create'])->middleware('auth');
Route::get('/veiculos/manutencao/consultar/{id}',[ManutencaoController::class, 'consultar'])->middleware('auth');
Route::get('/veiculos/manutencao/buscaveiculo',[ManutencaoController::class, 'buscar'])->middleware('auth');
Route::get('/veiculos/manutencao/buscar',[ManutencaoController::class, 'manutencao'])->middleware('auth');
Route::get('/veiculos/manutencao/edit/{id}',[ManutencaoController::class, 'edit'])->middleware('auth');
//Route::put('/veiculos/manutencao/update',[ManutencaoController::class, 'update'])->middleware('auth');
Route::put('/veiculos/manutencao/update/{id}',[ManutencaoController::class, 'update'])->middleware('auth');
Route::delete('/veiculos/manutencao/{id}',[ManutencaoController::class, 'destroy'])->middleware('auth');