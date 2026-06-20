```php
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

        $turmas = Turma::with([
            'alunos' => function ($query) use ($search) {

                if ($search) {

                    $query->where(function ($q) use ($search) {

                        $q->where('nome', 'ilike', "%{$search}%")
                          ->orWhere('matricula', 'ilike', "%{$search}%");

                    });

                }

                $query->orderBy('nome');

            }
        ])
        ->orderByRaw("
            CAST(REGEXP_REPLACE(nome, '[^0-9]', '', 'g') AS INTEGER),
            REGEXP_REPLACE(nome, '[0-9]', '', 'g')
        ")
        ->get();

        return view('admin.alunos', compact('turmas'));
    }

    public function create()
    {
        $turmas = Turma::all();

        return view('admin.cadAluno', compact('turmas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'matricula' => 'required|unique:alunos,matricula',
            'turma_id' => 'required|exists:turmas,id',
            'qtd_fardas' => 'required|integer|min:0'
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'matricula' => $request->matricula,
            'turma_id' => $request->turma_id,
            'qtd_fardas' => $request->qtd_fardas
        ]);

        return redirect()
            ->route('admin.cadaluno')
            ->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function edit(Aluno $aluno)
    {
        $turmas = Turma::orderBy('nome')->get();

        return view(
            'admin.editAluno',
            compact('aluno', 'turmas')
        );
    }

    public function update(Request $request, Aluno $aluno)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'matricula' => 'required|unique:alunos,matricula,' . $aluno->id,
            'turma_id' => 'required|exists:turmas,id',
            'qtd_fardas' => 'required|integer|min:0'
        ]);

        $aluno->update([
            'nome' => $request->nome,
            'matricula' => $request->matricula,
            'turma_id' => $request->turma_id,
            'qtd_fardas' => $request->qtd_fardas,
        ]);

        return redirect()
            ->route('admin.alunos')
            ->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();

        return redirect()
            ->route('admin.alunos')
            ->with('success', 'Aluno removido com sucesso!');
    }
}

