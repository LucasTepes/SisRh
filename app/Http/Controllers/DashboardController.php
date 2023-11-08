<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Funcionario;
use App\Models\Departamento;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //verificar se o usuario está logado no sistema
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $totalFuncionarios = Funcionario::where('status','on')->count();
        $totalCargos = Cargo::all()->count();
        $totalDepartamentos = Departamento::all()->count();
        $somaSalarios = Funcionario::where('status','on')->sum('salario');

        // Dados departamentos
        $departamentos = Departamento::all()->sortBy('nome');
        $cargos = Cargo::all()->sortBy('descricao');

        return view('dashborad.index', compact('totalFuncionarios', 'totalCargos', 'totalDepartamentos',
                                                'somaSalarios', 'departamentos', 'cargos'));
    }
}
