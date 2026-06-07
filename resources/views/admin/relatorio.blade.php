@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="mb-8">

        <h1 class="text-3xl font-bold text-slate-800">
            Relatórios
        </h1>

        <p class="text-slate-500 mt-2">
            Indicadores gerais da biblioteca.
        </p>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        <x-card>

            <h3 class="text-slate-500 text-sm">
                Empréstimos do mês
            </h3>

            <p class="text-4xl font-bold text-blue-700 mt-3">
                {{ $emprestimosMes }}
            </p>

        </x-card>

        <x-card>

            <h3 class="text-slate-500 text-sm">
                Alunos cadastrados
            </h3>

            <p class="text-4xl font-bold text-green-700 mt-3">
                {{ $alunos }}
            </p>

        </x-card>

        <x-card>

            <h3 class="text-slate-500 text-sm">
                Livros cadastrados
            </h3>

            <p class="text-4xl font-bold text-purple-700 mt-3">
                {{ $livros }}
            </p>

        </x-card>

        <x-card>

            <h3 class="text-slate-500 text-sm">
                Livros devolvidos
            </h3>

            <p class="text-4xl font-bold text-green-700 mt-3">
                {{ $devolvidos }}
            </p>

        </x-card>

        <x-card>

            <h3 class="text-slate-500 text-sm">
                Livros emprestados
            </h3>

            <p class="text-4xl font-bold text-blue-700 mt-3">
                {{ $emprestados }}
            </p>

        </x-card>

        <x-card>

            <h3 class="text-slate-500 text-sm">
                Livros em atraso
            </h3>

            <p class="text-4xl font-bold text-red-700 mt-3">
                {{ $atrasados }}
            </p>

        </x-card>

    </div>

    
    
    <div class="flex justify-end mb-5"> <br> 
    
    <a href="{{ route('relatorios.pdf') }}"
       target="_blank"
       class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-xl font-medium transition">
    
        Exportar PDF
    
    </a>
    
    </div>
</div>

@endsection