<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::all();
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
            'turno'  => 'required|in:manhã,tarde,noite'
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
}