<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aluno;
use App\Models\Livro;
use App\Models\Emprestimo;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
        public function index()
    {
        $mesAtual = now()->month;
        $anoAtual = now()->year;

        $emprestimosMes = Emprestimo::whereMonth('data_emprestimo', $mesAtual)
            ->whereYear('data_emprestimo', $anoAtual)
            ->count();

        $alunos = Aluno::count();

        $livros = Livro::count();

        $devolvidos = Emprestimo::where('status', 'devolvido')
            ->count();

        $emprestados = Emprestimo::where('status', 'emprestado')
            ->count();

        $atrasados = Emprestimo::where('status', 'emprestado')
            ->whereDate('data_devolucao', '<', today())
            ->count();

        return view(
            'admin.relatorio',
            compact(
                'emprestimosMes',
                'alunos',
                'livros',
                'devolvidos',
                'emprestados',
                'atrasados'
            )
        );
    }

    public function gerarPdf()
{
    $mesAtual = now()->month;
    $anoAtual = now()->year;

    $emprestimosMes = Emprestimo::whereMonth(
        'data_emprestimo',
        $mesAtual
    )
    ->whereYear(
        'data_emprestimo',
        $anoAtual
    )
    ->count();

    $alunos = Aluno::count();

    $livros = Livro::count();

    $devolvidos = Emprestimo::where(
        'status',
        'devolvido'
    )->count();

    $emprestados = Emprestimo::where(
        'status',
        'emprestado'
    )->count();

    $atrasados = Emprestimo::where(
        'status',
        'emprestado'
    )
    ->whereDate(
        'data_devolucao',
        '<',
        today()
    )
    ->count();

    $maisLidos = Emprestimo::selectRaw(
        'livro_id, COUNT(*) as total'
    )
    ->with('livro')
    ->groupBy('livro_id')
    ->orderByDesc('total')
    ->take(10)
    ->get();

    $pdf = Pdf::loadView(
        'admin.pdfRelatorio',
        compact(
            'emprestimosMes',
            'alunos',
            'livros',
            'devolvidos',
            'emprestados',
            'atrasados',
            'maisLidos'
        )
    );

    return $pdf->download(
        'relatorio-biblioteca.pdf'
    );
}
}
