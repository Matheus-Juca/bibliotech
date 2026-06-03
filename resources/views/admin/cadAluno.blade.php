@extends('layouts.app')

@section('content')

<div class="w-full max-w-4xl mx-auto">

    {{-- Cabeçalho --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-800">
            Cadastro de Alunos
        </h1>

        <p class="text-slate-500 mt-2">
            Adicione novos alunos ao sistema.
        </p>
    </div>

    {{-- Card do formulário --}}
    <div class="bg-white shadow-md rounded-2xl border border-slate-200 p-8">

        <form action="{{ route('alunos.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Nome --}}
            <div>
                <label 
                    for="nome"
                    class="block text-sm font-semibold text-slate-700 mb-2"
                >
                    Nome do Aluno
                </label>

                <input
                    type="text"
                    id="nome"
                    name="nome" 
                    placeholder="Digite o nome do aluno"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3
                           focus:outline-none focus:ring-2 focus:ring-blue-400
                           focus:border-blue-400 transition"
                >
            </div>

            {{-- Matricula --}}
            <div>
                <label 
                    for="matricula"
                    class="block text-sm font-semibold text-slate-700 mb-2"
                >
                    Matrícula
                </label>

                <input
                    type="text"
                    id="matricula"
                    name="matricula"
                    placeholder="Digite a matrícula do aluno"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3
                           focus:outline-none focus:ring-2 focus:ring-blue-400
                           focus:border-blue-400 transition"
                >
            </div>

            {{-- Turma --}}
            <div>
                <label 
                    for="turma"
                    class="block text-sm font-semibold text-slate-700 mb-2"
                >
                    Turma
                </label>

                <select
                    id="turma"
                    name="turma_id"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3
                           focus:outline-none focus:ring-2 focus:ring-green-400
                           focus:border-green-400 transition"
                >
                    <option value="">
                        Selecione uma turma
                    </option>
                        @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}">
                        {{ $turma->nome }} ({{ $turma->codigo }})
                    </option>
                        @endforeach
            
                    
                </select>
            </div>

            {{-- Quantidade de fardas --}}
            <div>
                <label 
                    for="qtd_fardas"
                    class="block text-sm font-semibold text-slate-700 mb-2"
                >
                    Quantidade de fardas
                </label>

                <input
                    type="number"
                    id="qtd_fardas"
                    name="qtd_fardas"
                    min="0"
                    placeholder="Quantidade de fardas do aluno"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3
                           focus:outline-none focus:ring-2 focus:ring-blue-400
                           focus:border-blue-400 transition"
                >
               
            </div>


            {{-- Botões --}}
            <div class="flex items-center justify-end gap-4 pt-4">

                <a
                    href="{{ route('dashboard') }}"
                    class="px-5 py-3 rounded-xl border border-slate-300
                           text-slate-700 hover:bg-slate-100 transition"
                >
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="bg-blue-700 hover:bg-blue-800 text-white
                           px-6 py-3 rounded-xl font-semibold transition"
                >
                    Cadastrar aluno
                </button>

            </div>

        </form>

    </div>

</div>

@endsection