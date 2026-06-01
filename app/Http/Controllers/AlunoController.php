<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{

public function index(Request $request)
{
    $search = $request->search;

    $alunos = Aluno::when($search, function ($query) use ($search) {

        $query->where('nome', 'like', "%{$search}%")
              ->orWhere('matricula', 'like', "%{$search}%");

    })
    ->orderBy('nome')
    ->paginate(10);

    return view('admin.alunos', compact('alunos'));
}

    public function create(){

        return view('admin.cadAluno');
    }

    public function store(Request $request){

        $request->validate([
            'nome' => 'required|max:255',
            'matricula' => 'required|unique:alunos,matricula',
            'turma' => 'required',
            'qtd_fardas' => 'required|integer|min:0'
        ]);

        Aluno::create([
            'nome' => $request->input('nome'),
            'matricula' => $request->input('matricula'),
            'turma' => $request->input('turma'),
            'qtd_fardas' => $request->input('qtd_fardas')
        ]);

        return redirect()->route('admin.cadaluno')->with('success', 'Aluno cadastrado com sucesso!');
    }
}
