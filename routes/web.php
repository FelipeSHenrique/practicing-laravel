<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, '__invoke']);

Route::get('/teste', function() {
    return view('teste');
});
//Essa rota é a mesma da de cime do que menor
Route::view('/teste1', 'teste');

// ROTAS COM PARAMETROS

Route::get('/noticia/{slug}', function($slug) {
    echo "Slug: ".$slug;
});

Route::get('/noticia/{slug}/comentario/{id}', function($slug, $id) {
    echo "Mostrando o comentário ".$id." da notícia ".$slug;
});

// ROTAS COM REGEX + PROVIDER

Route::get('/user/{name}', function($name) {
    echo "Mostrando usuário NOME ".$name;
})->where('name', '[a-z]+');

Route::get('/user/{id}', function($id) {
    echo "Mostrando usuário ID ".$id;
});

Route::prefix('/tarefas')->group(function() {

    Route::get('/', [TarefasController::class, 'list'])->name('tarefas.list'); // Listagem de tarefas

    Route::get('add', [TarefasController::class, 'add'])->name('tarefas.add'); // Tela de Adição
    Route::post('add', [TarefasController::class, 'addAction']); // Ação de adição

    Route::get('edit/{id}', [TarefasController::class, 'edit'])->name('tarefas.edit'); // Tela de edição
    Route::post('edit/{id}', [TarefasController::class, 'editAction']); // Ação de edição

    Route::get('delete/{id}', [TarefasController::class, 'del'])->name('tarefas.del'); // Ação de deletar

    Route::get('marcar/{id}', [TarefasController::class, 'done'])->name('tarefas.done'); // Marcar resolvido/não

});

// ROTAS COM NOME+REDIRECT

Route::prefix('/config')->group(function() {

    Route::get('/', [ConfigController::class, 'index']);
    Route::post('/', [ConfigController::class, 'index']);
    Route::get('info', [ConfigController::class, 'info']);
    Route::get('permissoes', [ConfigController::class, 'permissioes']);

});

Route::fallback(function() {
    return view('404');
});
