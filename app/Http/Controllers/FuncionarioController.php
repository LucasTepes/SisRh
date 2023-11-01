<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Funcionario;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class FuncionarioController extends Controller
{

    //verificar se o usuario está logado no sistema
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $funcionarios = Funcionario::where('nome', 'like', '%'.$request->Busca.'%' )->orderBy('nome', 'asc')->paginate(3);
        $totalFuncionarios = Funcionario::all()->count();
        // Receber os dados do banco através do model
        return view('funcionarios.index', compact('funcionarios', 'totalFuncionarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retornar o formulário de cadastro
        $departamentos = Departamento::all()->sortBy('nome');
        $cargos = Cargo::all()->sortBy('descricao');
        return view('funcionarios.create', compact('departamentos', 'cargos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->toArray();
        $input['user_id'] = 1;

        if ($request->hasFile('foto')) {
            $input['foto'] = $this->uploadFoto($request->foto);
        }

        Funcionario::create($input);
        return redirect()->route('funcionarios.index')->with('sucesso', 'Funcionario cadastrado com sucesso');
    }

    // Função para redimensionar e realizar o upload da foto
    private function uploadFoto($foto)
    {
        $nomeArquivo = $foto->hashName();

        // Redimensionar foto
        $imagem = Image::make($foto)->fit(200, 200);

        //Salvar arquivo da foto
        Storage::put('public/funcionarios/' . $nomeArquivo, $imagem->encode());


        return $nomeArquivo;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $funcionario = Funcionario::find($id);

        if (!$funcionario) {
            return back();
        }
        $departamentos = Departamento::all()->sortBy('nome');
        $cargos = Cargo::all()->sortBy('descricao');
        return view('funcionarios.edit', compact('funcionario', 'departamentos', 'cargos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->toArray();

        $funcionario = Funcionario::find($id);

        if ($request->hasFile('foto')) {
            Storage::delete('public/funcionarios/' . $funcionario['foto']);
            $input['foto'] = $this->uploadFoto($request->foto);
        }

        $funcionario->fill($input);
        $funcionario->save();
        return redirect()->route('funcionarios.index')->with('sucesso', 'Funcionário alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $funcionario = Funcionario::find($id);

        // Exclui a foto do funcionário
        if ($funcionario['foto'] != null) {
            Storage::delete('public/funcionarios/' . $funcionario['foto']);
        }
        // Apagando o registro no banco de dados
        $funcionario->delete();
        return redirect()->route('funcionarios.index')->with('sucesso', 'Funcionário excluído com sucesso');
    }
}
