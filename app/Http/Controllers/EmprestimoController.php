<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Livro;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{


    public function index()
    {
        $emprestimos = Emprestimo::with(['aluno', 'livro'])
            ->orderBy('data_emprestimo', 'desc')
            ->paginate(10);

        return view('admin.emprestimos', compact('emprestimos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'livro_id' => 'required|exists:livros,id',
            'data_devolucao' => 'required|date'
        ]);

        $livro = Livro::findOrFail($request->livro_id);

        if ($livro->qtd_disponivel <= 0) {

            return redirect()
                ->back()
                ->with('error', 'Este livro não possui exemplares disponíveis.');
        }

        Emprestimo::create([
            'aluno_id' => $request->aluno_id,
            'livro_id' => $request->livro_id,
            'data_emprestimo' => now(),
            'data_devolucao' => $request->data_devolucao,
            'status' => 'emprestado'
        ]);

        $livro->decrement('qtd_disponivel');

        return redirect()
            ->route('dashboard')
            ->with('success', 'Empréstimo registrado com sucesso!');
    }

    public function devolver($id)
{
    $emprestimo = Emprestimo::findOrFail($id);

    if ($emprestimo->status == 'devolvido') {
        return back();
    }

    $emprestimo->update([
        'status' => 'devolvido'
    ]);

    $emprestimo->livro->increment('qtd_disponivel');

    return back()->with(
        'success',
        'Livro devolvido com sucesso!'
    );
}
}