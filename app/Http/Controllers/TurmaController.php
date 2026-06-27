<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Aluno;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::orderBy('nome')
            ->paginate(10);

        return view('admin.turmas', compact('turmas'));
    }

    public function store(Request $request)
    {
         
        $request->validate([
            'codigo' => 'required|unique:turmas,codigo',
            'nome'   => 'required',
            'turno'  => 'required|in:integral,noite'
        ]);

        Turma::create($request->only('codigo', 'nome', 'turno'));

        return redirect()->back()->with('success', 'Turma criada com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required|unique:turmas,codigo,' . $id,
            'nome'   => 'required',
            'turno'  => 'required|in:integral,noite'
        ]);

        $turma = Turma::findOrFail($id);
        $turma->update($request->only('codigo', 'nome', 'turno'));

        return redirect()->back()->with('success', 'Turma atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $turma = Turma::findOrFail($id);
        $turma->delete();

        return redirect()->back()->with('success', 'Turma removida com sucesso!');
    }

    public function migrar(Request $request)
{
    $request->validate([
        'origem_id' => 'required|exists:turmas,id',
        'destino_id' => 'required|exists:turmas,id',
    ]);

    if ($request->origem_id == $request->destino_id) {

        return back()->with(
            'error',
            'A turma de destino deve ser diferente.'
        );
    }

    Aluno::where(
        'turma_id',
        $request->origem_id
    )->update([
        'turma_id' => $request->destino_id
    ]);

    return back()->with(
        'success',
        'Alunos migrados com sucesso!'
    );

}

public function formMigracao()
{
    $turmas = Turma::orderBy('codigo')->get();

    return view('admin.migrarAlunos', compact('turmas'));
}
}