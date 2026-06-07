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

{{-- Mensagem de sucesso --}}
@if(session('success'))

<div
    id="alertSuccess"
    class="mb-6 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-xl flex items-center gap-3 shadow-sm"
>

    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-5 h-5"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M5 13l4 4L19 7" />

    </svg>

    <span class="font-medium">
        {{ session('success') }}
    </span>

</div>

@endif

{{-- Erros de validação --}}
@if($errors->any())

<div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-xl">

    <ul class="list-disc list-inside space-y-1">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

{{-- Card do formulário --}}
<div class="bg-white shadow-md rounded-2xl border border-slate-200 p-8">

    <form
        action="{{ route('alunos.store') }}"
        method="POST"
        class="space-y-6"
    >

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
                value="{{ old('nome') }}"
                placeholder="Digite o nome do aluno"
                required
                class="w-full rounded-xl border border-slate-300 px-4 py-3
                       focus:outline-none focus:ring-2 focus:ring-blue-400
                       focus:border-blue-400 transition"
            >

        </div>

        {{-- Matrícula --}}
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
                value="{{ old('matricula') }}"
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

                <option
                    value="{{ $turma->id }}"
                    {{ old('turma_id') == $turma->id ? 'selected' : '' }}
                >
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
                value="{{ old('qtd_fardas') }}"
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

@if(session('success'))

<script>

setTimeout(() => {

    const alert = document.getElementById('alertSuccess');

    if(alert)
    {
        alert.style.transition = 'all .4s ease';
        alert.style.opacity = '0';

        setTimeout(() => {
            alert.remove();
        }, 400);
    }

}, 4000);

</script>

@endif

@endsection
