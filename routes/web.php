<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

// Docente
Route::resource('docentes', 'App\Http\Controllers\DocenteController');

// Funcionario

// Discplina
Route::resource('disciplinas', 'App\Http\Controllers\DisciplinaController');
// Curso
Route::resource('cursos', 'App\Http\Controllers\CursoController');
// Adenda
Route::resource('adendas', 'App\Http\Controllers\AdendaController');
// Categoria
Route::resource('categorias', 'App\Http\Controllers\CategoriaController');
// Bloco
Route::resource('blocos', 'App\Http\Controllers\BlocoController');
// Turma 
Route::resource('turmas', 'App\Http\Controllers\TurmaController');
// Role 
Route::resource('roles', 'App\Http\Controllers\RoleController');

Route::post('cursoDisciplina', 'App\Http\Controllers\CursoDisciplinaController@store')->name('cursoDisciplina.store');
  
