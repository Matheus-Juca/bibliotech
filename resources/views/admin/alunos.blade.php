@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">


{{-- Cabeçalho --}}
<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Alunos
    </h1>

    <p class="text-slate-500 mt-2">
        Controle dos alunos cadastrados na biblioteca.
    </p>

</div>

{{-- Cabeçalho da página --}}
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6">

    <div class="p-6 border-b border-slate-200">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <div>

                <h2 class="text-lg font-semibold text-slate-800">
                    Lista de Alunos
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Pesquise pelo nome ou matrícula.
                </p>

            </div>

        <form
            method="GET"
            action="{{ route('admin.alunos') }}"
            class="flex gap-3 flex-wrap"
        >

            {{-- Busca por aluno --}}
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Buscar nome ou matrícula..."
                class="px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
            >

            {{-- mantém turma selecionada --}}
            <input
                type="hidden"
                name="turma"
                value="{{ $turmaSelecionada->id }}"
            >

            <button
                type="submit"
                class="bg-blue-700 hover:bg-blue-800 text-white px-5 py-3 rounded-xl font-medium transition"
            >
                Buscar
            </button>

            <a
                href="{{ route('admin.cadaluno') }}"
                class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl font-medium transition"
            >
                Adicionar Aluno
            </a>

            {{-- botão limpar busca --}}
            <a
                href="{{ route('admin.alunos', ['turma' => $turmaSelecionada->id]) }}"
                class="bg-slate-200 hover:bg-slate-300 text-slate-700 px-5 py-3 rounded-xl font-medium transition"
            >
                Limpar
            </a>

        </form>

        </div>

    </div>

</div>

{{-- Abas das Turmas --}}
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-4 mb-6">

    <div class="flex flex-wrap gap-2">

        @foreach($turmas as $turma)

            <a
                href="{{ route('admin.alunos', ['turma' => $turma->id]) }}"
                class="
                    px-4 py-2 rounded-xl font-medium transition

                    {{ $turmaSelecionada->id == $turma->id
                        ? 'bg-blue-700 text-white'
                        : 'bg-slate-100 hover:bg-slate-200 text-slate-700'
                    }}
                "
            >
                {{ $turma->codigo }}
            </a>

        @endforeach

    </div>

</div>

{{-- Lista da Turma Selecionada --}}
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm">

    <div class="px-6 py-4 border-b border-slate-200 flex justify-between items-center">

        <h3 class="font-bold text-lg text-slate-800">
            {{ $turmaSelecionada->nome }}
        </h3>

        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
            {{ $alunos->count() }} alunos
        </span>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Nome
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Matrícula
                    </th>

                    <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
                        Fardas
                    </th>

                    <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
                        Ações
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($alunos as $aluno)

                <tr class="border-t border-slate-100 hover:bg-slate-50">

                    <td class="px-6 py-4">
                        {{ $aluno->nome }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $aluno->matricula }}
                    </td>

                    <td class="px-6 py-4 text-center">

                        <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">
                            {{ $aluno->qtd_fardas }}
                        </span>

                    </td>

                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2">

                            <a
                                href="{{ route('alunos.edit', $aluno->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg text-sm"
                            >
                                Editar
                            </a>

                            <form
                                action="{{ route('alunos.destroy', $aluno->id) }}"
                                method="POST"
                                onsubmit="return confirm('Deseja remover este aluno?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg text-sm"
                                >
                                    Excluir
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4" class="text-center py-8 text-slate-500">

                        Nenhum aluno encontrado.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


</div>

@endsection
