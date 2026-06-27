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

    $turmas = Turma::orderBy('codigo')->get();

    $turmaSelecionada = $request->filled('turma')
        ? Turma::findOrFail($request->turma)
        : $turmas->first();

    $alunos = Aluno::with('turma')
        ->where('turma_id', $turmaSelecionada->id)
        ->when($search, function ($query) use ($search) {

            $query->where(function ($q) use ($search) {

                $q->where('nome', 'ilike', "%{$search}%")
                  ->orWhere('matricula', 'ilike', "%{$search}%");

            });

        })
        ->orderBy('nome')
        ->get();

    return view(
        'admin.alunos',
        compact(
            'turmas',
            'turmaSelecionada',
            'alunos'
        )
    );
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
            'qtd_fardas' => $request->qtd_fardas,
            'status' => 'ativo'
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

    public function promocao()
{
    return view('admin.promocaoAnoLetivo');
}

public function executarPromocao()
{
    $alunos = Aluno::with('turma')
        ->where('status', 'ativo')
        ->get();

    foreach ($alunos as $aluno) {

        $codigo = strtoupper($aluno->turma->codigo);

        // 1A -> 2A
        if (str_starts_with($codigo, '1')) {

            $novoCodigo = '2' . substr($codigo, 1);

            $novaTurma = Turma::where(
                'codigo',
                $novoCodigo
            )->first();

            if ($novaTurma) {

                $aluno->update([
                    'turma_id' => $novaTurma->id
                ]);
            }
        }

        // 2A -> 3A
        elseif (str_starts_with($codigo, '2')) {

            $novoCodigo = '3' . substr($codigo, 1);

            $novaTurma = Turma::where(
                'codigo',
                $novoCodigo
            )->first();

            if ($novaTurma) {

                $aluno->update([
                    'turma_id' => $novaTurma->id
                ]);
            }
        }

        // 3A -> Concluído
        elseif (str_starts_with($codigo, '3')) {

            $aluno->update([
                'status' => 'concluido'
            ]);
        }
    }

    return redirect()
        ->route('admin.alunos')
        ->with(
            'success',
            'Promoção de ano letivo realizada com sucesso!'
        );
}
}

