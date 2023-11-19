<?php

use App\Http\Controllers\BeneficioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\DepartamentoController;

Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// rotas para as funções e telas de Funcionarios
Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios.index');
Route::get('/funcionarios/create', [FuncionarioController::class, 'create'])->name('funcionarios.create');
Route::post('/funcionarios', [FuncionarioController::class, 'store'])->name('funcionarios.store');
Route::get('/funcionarios/{id}/edit', [FuncionarioController::class, 'edit'])->name('funcionarios.edit');
Route::put('/funcionarios/{id}', [FuncionarioController::class, 'update'])->name('funcionarios.update');
Route::delete('/funcionarios/{id}', [FuncionarioController::class, 'destroy'])->name('funcionarios.destroy');
Route::get('/funcionarios/{id}/show', [FuncionarioController::class, 'show'])->name('funcionarios.show');

// rotas para as funções e telas de Departamento
Route::get('/departamentos', [DepartamentoController::class, 'index'])->name('departamentos.index');
Route::get('/departamentos/create', [DepartamentoController::class, 'create'])->name('departamentos.create');
Route::post('/departamentos', [DepartamentoController::class, 'store'])->name('departamentos.store');
Route::get('/departamentos/{id}/edit', [DepartamentoController::class, 'edit'])->name('departamentos.edit');
Route::put('/departamentos/{id}', [DepartamentoController::class, 'update'])->name('departamentos.update');
Route::delete('/departamentos{id}', [DepartamentoController::class, 'destroy'])->name('departamentos.destroy');

// rotas para as funções e telas de Cargos
Route::get('/cargos', [CargoController::class, 'index'])->name('cargos.index');
Route::get('/cargos/create', [CargoController::class, 'create'])->name('cargos.create');
Route::post('/cargos', [CargoController::class, 'store'])->name('cargos.store');
Route::get('/cargos/{id}/edit', [CargoController::class, 'edit'])->name('cargos.edit');
Route::put('/cargos/{id}', [CargoController::class, 'update'])->name('cargos.update');
Route::delete('/cargos/{id}', [CargoController::class, 'destroy'])->name('cargos.destroy');


// rotas para as funções e telas de Usuarios
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/beneficios', [BeneficioController::class, 'index'])->name('beneficio.index');
Route::get('/beneficios/create', [BeneficioController::class, 'create'])->name('beneficio.create');
Route::post('/beneficio', [BeneficioController::class, 'store'])->name('beneficio.store');
Route::get('/beneficio/{id}/edit', [BeneficioController::class, 'edit'])->name('beneficio.edit');
Route::put('/beneficios/{id}', [BeneficioController::class, 'update'])->name('beneficio.update');
Route::delete('/beneficio/{id}', [BeneficioController::class, 'destroy'])->name('beneficio.destroy');
