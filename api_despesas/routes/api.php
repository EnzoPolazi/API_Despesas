<?php

use App\Http\Controllers\DespesaController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aqui ficam registradas todas as rotas relacionadas à utilização
| da Api. As rotas protegidas só podem ser utilizadas ao utilizar
| o token gerado ao realizar o login.
|
*/

//Estas serão as rotas publicas
Route::post('/cadastrar', [AuthController::class, 'cadastrar']);
Route::post('/login', [AuthController::class, 'login']);

//Estas serão as rotas protegidas por autenticacao (privadas)
Route::group(['middleware' => ['auth:sanctum']], function() {
    //"Route::apiResource" cria as rotas padrão do nosso crud
    Route::apiResource('/despesas', DespesaController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});
