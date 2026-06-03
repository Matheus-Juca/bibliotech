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

    {{-- Card Principal --}}
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm">

        {{-- Cabeçalho da tabela --}}
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
                    class="flex gap-3"
                >

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Pesquisar aluno..."
                        class="w-full md:w-80 rounded-xl border border-slate-300 px-4 py-3
                               focus:outline-none focus:ring-2 focus:ring-blue-400
                               focus:border-blue-400"
                    >

                    <button
                        type="submit"
                        class="bg-blue-700 hover:bg-blue-800 text-white
                               px-5 py-3 rounded-xl font-medium transition"
                    >
                        Buscar
                    </button>

                </form>

            </div>

        </div>

        {{-- Tabela --}}
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
                            Turma
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($alunos as $aluno)

                    <tr class="border-t border-slate-100 hover:bg-slate-50 transition">

                        <td class="px-6 py-4 text-sm font-medium text-slate-800">
                            {{ $aluno->nome }}
                        </td>

                        <td class="px-6 py-4 text-sm text-slate-600">
                            {{ $aluno->matricula }}
                        </td>

                        <td class="px-6 py-4 text-center">

                            <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">
                                {{ $aluno->qtd_fardas }}
                            </span>

                        </td>

                        <td class="px-6 py-4 text-center text-sm text-slate-700">
                            {{ $aluno->turma->nome }}
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="4"
                            class="px-6 py-10 text-center text-slate-500">

                            Nenhum aluno encontrado.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- Paginação --}}
        <div class="p-6 border-t border-slate-200">

            {{ $alunos->appends(request()->query())->links() }}

        </div>

    </div>

</div>

@endsection