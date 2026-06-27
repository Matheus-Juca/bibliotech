@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

{{-- Cabeçalho --}}
<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Migrar Alunos
    </h1>

    <p class="text-slate-500 mt-2">
        Transfira todos os alunos de uma turma para outra.
    </p>

</div>

{{-- Mensagem de sucesso --}}
@if(session('success'))

<div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-xl">

    {{ session('success') }}

</div>

@endif

{{-- Mensagem de erro --}}
@if(session('error'))

<div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-xl">

    {{ session('error') }}

</div>

@endif

{{-- Erros de validação --}}
@if($errors->any())

<div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-xl">

    <ul class="list-disc list-inside">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm">

    <form
        action="{{ route('turmas.migrar') }}"
        method="POST"
        class="p-8 space-y-6"
    >

        @csrf

        {{-- Turma origem --}}
        <div>

            <label
                for="origem_id"
                class="block text-sm font-semibold text-slate-700 mb-2"
            >
                Turma de Origem
            </label>

            <select
                id="origem_id"
                name="origem_id"
                required
                class="w-full rounded-xl border border-slate-300 px-4 py-3
                       focus:outline-none focus:ring-2 focus:ring-blue-400"
            >

                <option value="">
                    Selecione a turma de origem
                </option>

                @foreach($turmas as $turma)

                    <option value="{{ $turma->id }}">
                        {{ $turma->nome }}
                    </option>

                @endforeach

            </select>

        </div>

        {{-- Turma destino --}}
        <div>

            <label
                for="destino_id"
                class="block text-sm font-semibold text-slate-700 mb-2"
            >
                Turma de Destino
            </label>

            <select
                id="destino_id"
                name="destino_id"
                required
                class="w-full rounded-xl border border-slate-300 px-4 py-3
                       focus:outline-none focus:ring-2 focus:ring-green-400"
            >

                <option value="">
                    Selecione a turma de destino
                </option>

                @foreach($turmas as $turma)

                    <option value="{{ $turma->id }}">
                        {{ $turma->nome }}
                    </option>

                @endforeach

            </select>

        </div>

        {{-- Alerta --}}
        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4">

            <p class="text-sm text-yellow-800">

                Atenção: todos os alunos da turma selecionada serão
                transferidos para a turma de destino.

            </p>

        </div>

        {{-- Botões --}}
        <div class="flex justify-end gap-3">

            <a
                href="{{ route('admin.turmas') }}"
                class="px-5 py-3 border border-slate-300 rounded-xl
                       text-slate-700 hover:bg-slate-100 transition"
            >
                Cancelar
            </a>

            <button
                type="submit"
                onclick="return confirm('Deseja realmente migrar todos os alunos desta turma?')"
                class="bg-blue-700 hover:bg-blue-800 text-white
                       px-6 py-3 rounded-xl font-medium transition"
            >
                Migrar Alunos
            </button>

        </div>

    </form>

</div>

</div>

@endsection
