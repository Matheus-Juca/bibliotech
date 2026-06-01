@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <!-- Cabeçalho -->
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-slate-800">
            Empréstimos
        </h1>

        <p class="text-slate-500 mt-2">
            Controle de empréstimos da biblioteca.
        </p>
    
    </div>

    <!-- Card -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-200">

            <h2 class="text-lg font-semibold text-slate-800">
                Lista de Empréstimos
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            ID
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            Aluno
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            Livro
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            Empréstimo
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            Devolução
                        </th>

                        <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
                            Status
                        </th>

                        <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
                            Ações
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($emprestimos as $emprestimo)

                    <tr class="border-t border-slate-100 hover:bg-slate-50 transition">

                        <td class="px-6 py-4 text-slate-700">
                            #{{ $emprestimo->id }}
                        </td>

                        <td class="px-6 py-4 font-medium text-slate-800">
                            {{ $emprestimo->aluno->nome }}
                        </td>

                        <td class="px-6 py-4 text-slate-700">
                            {{ $emprestimo->livro->titulo }}
                        </td>

                        <td class="px-6 py-4 text-slate-500">
                            {{ \Carbon\Carbon::parse($emprestimo->data_emprestimo)->format('d/m/Y') }}
                        </td>

                        <td class="px-6 py-4 text-slate-500">
                            {{ \Carbon\Carbon::parse($emprestimo->data_devolucao)->format('d/m/Y') }}
                        </td>

                        <td class="px-6 py-4 text-center">

                            @if($emprestimo->status == 'emprestado')

                                <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                    Emprestado
                                </span>

                            @else

                                <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                    Devolvido
                                </span>

                            @endif

                        </td>

                        <td class="px-6 py-4 text-center">

                            @if($emprestimo->status == 'emprestado')

                                <form
                                    action="{{ route('emprestimos.devolver', $emprestimo->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('PUT')

                                    <button
                                        type="submit"
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition"
                                    >
                                        Devolver
                                    </button>

                                </form>

                            @else

                                <span class="text-slate-400 text-sm">
                                    Concluído
                                </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7" class="text-center py-10 text-slate-500">
                            Nenhum empréstimo encontrado.
                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- Paginação -->
    <div class="mt-6">
        {{ $emprestimos->links() }}
    </div>

</div>

@endsection