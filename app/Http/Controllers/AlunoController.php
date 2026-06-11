<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Turma;

class AlunoController extends Controller
{

public function index(Request $request)
{
    $search = $request->search;

    $alunos = Aluno::when($search, function ($query) use ($search) {

        $query->where('nome', 'ilike', "%{$search}%")
              ->orWhere('matricula', 'ilike', "%{$search}%");

    })
    ->orderBy('nome')
    ->paginate(10);

    return view('admin.alunos', compact('alunos'));
}

    public function create()
    {
        $turmas = Turma::all();

        return view('admin.cadAluno', compact('turmas'));
    }
    public function store(Request $request){
        
        $request->validate([
            'nome' => 'required|max:255',
            'matricula' => 'required|unique:alunos,matricula',
            'turma_id' => 'required|exists:turmas,id',
            'qtd_fardas' => 'required|integer|min:0'
        ]);

        Aluno::create([
            'nome' => $request->input('nome'),
            'matricula' => $request->input('matricula'),
            'turma_id' => $request->input('turma_id'),
            'qtd_fardas' => $request->input('qtd_fardas')
        ]);

        return redirect()->route('admin.cadaluno')->with('success', 'Aluno cadastrado com sucesso!');
    }
}
