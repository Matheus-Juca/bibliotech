@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">

        <h1 class="text-3xl font-bold text-slate-800">
            Promoção de Ano Letivo
        </h1>

        <p class="text-slate-500 mt-3">
            Esta ação irá:
        </p>

        <ul class="list-disc list-inside mt-4 space-y-2 text-slate-700">

            <li>Promover alunos do 1º ano para o 2º ano.</li>

            <li>Promover alunos do 2º ano para o 3º ano.</li>

            <li>Marcar alunos do 3º ano como concluídos.</li>

        </ul>

        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mt-6">

            <p class="text-yellow-800 font-medium">
                Atenção: esta operação afeta todos os alunos ativos e deve ser executada apenas uma vez por ano letivo.
            </p>

        </div>

        <form
            action="{{ route('alunos.promocao.executar') }}"
            method="POST"
            class="mt-8"
            onsubmit="return confirm('Tem certeza que deseja promover todos os alunos?')"
        >

            @csrf

            <button
                type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-semibold"
            >
                Executar Promoção
            </button>

        </form>

    </div>

</div>

@endsection