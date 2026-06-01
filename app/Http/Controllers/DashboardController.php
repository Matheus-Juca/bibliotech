<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Aluno;
use App\Models\Emprestimo;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLivros = Livro::count();

        $totalAlunos = Aluno::count();

        $emprestimosAtivos = Emprestimo::where(
            'status',
            'emprestado'
        )->count();

        $livrosDisponiveis = Livro::sum('qtd_disponivel');

        $ultimosEmprestimos = Emprestimo::with([
            'aluno',
            'livro'
        ])
        ->latest()
        ->take(5)
        ->get();

        $alunos = Aluno::orderBy('nome')->get();

        $livros = Livro::where('qtd_disponivel', '>', 0)
            ->orderBy('titulo')
            ->get();

        $totalExemplares = Livro::sum('qtd_disponivel');

        return view('admin.dashboard', compact(
            'totalLivros',
            'totalAlunos',
            'emprestimosAtivos',
            'livrosDisponiveis',
            'ultimosEmprestimos',
            'alunos',
            'livros',
            'totalExemplares'
        ));
    }
}