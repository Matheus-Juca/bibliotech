@extends('layouts.app')

@section('content')

<div class="w-full max-w-7xl mx-auto">

    {{-- Cabeçalho --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-800">
            Livros
        </h1>

        <p class="text-slate-500 mt-2">
            Gerencie o acervo da biblioteca.
        </p>
    </div>

    {{-- Card --}}
    <div class="bg-white shadow-md rounded-2xl border border-slate-200 overflow-hidden">

        {{-- Busca --}}
        <div class="p-6 border-b border-slate-200">

            <form method="GET" action="{{ route('admin.livros') }}">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Pesquisar por título, autor ou editora..."
                    class="w-full md:w-96 rounded-xl border border-slate-300 px-4 py-3
                           focus:outline-none focus:ring-2 focus:ring-blue-400"
                >

            </form>

        </div>

        {{-- Tabela --}}
        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            ID
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            Título
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            Autor
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            Editora
                        </th>

                        <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
                            Disponíveis
                        </th>

                        <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
                            Ações
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-200">

                    @forelse($livros as $livro)

                        <tr class="hover:bg-slate-50 transition">

                            <td class="px-6 py-4 text-sm text-slate-700">
                                #{{ $livro->id }}
                            </td>

                            <td class="px-6 py-4 text-sm font-medium text-slate-800">
                                {{ $livro->titulo }}
                            </td>

                            <td class="px-6 py-4 text-sm text-slate-700">
                                {{ $livro->autor }}
                            </td>

                            <td class="px-6 py-4 text-sm text-slate-700">
                                {{ $livro->editora }}
                            </td>

                            <td class="px-6 py-4 text-center">

                                @if($livro->qtd_disponivel > 0)

                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">
                                        {{ $livro->qtd_disponivel }}
                                    </span>

                                @else

                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">
                                        Indisponível
                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-2">

                                        <a
                                            href="{{ route('livros.edit', $livro->id) }}"
                                            class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg text-sm"
                                        >
                                            Editar
                                        </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center py-8 text-slate-500">
                                Nenhum livro encontrado.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- Paginação --}}
        <div class="p-6 border-t border-slate-200">

            {{ $livros->links() }}

        </div>

    </div>

</div>

@endsection