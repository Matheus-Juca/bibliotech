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
                            Aluno
                        </th>
                        
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                            Turma
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

                        
                        <td class="px-6 py-4 font-medium text-slate-800">
                            {{ $emprestimo->aluno->nome }}
                        </td>

                        <td class="px-6 py-4 text-slate-700">
                            {{ $emprestimo->aluno->turma->nome }}
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

                        @if($emprestimo->status_exibicao == 'atrasado')

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">
                                Em atraso
                            </span>

                        @elseif($emprestimo->status_exibicao == 'emprestado')

                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs">
                                Emprestado
                            </span>

                        @elseif($emprestimo->status_exibicao == 'devolvido')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                Devolvido
                            </span>

                        @elseif($emprestimo->status_exibicao == 'nao_devolvido')

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">
                                Não devolvido
                            </span>

                        @endif

                        </td>

                        <td class="px-6 py-4 text-center">

                            @if( $emprestimo->status == 'emprestado'
                                 || $emprestimo->status_exibicao == 'atrasado')

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

                                    <button
                                        type="button"
                                        onclick="abrirModal({{ $emprestimo->id }})"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm"
                                    >
                                        Não devolvido
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

<div
    id="modalNaoDevolvido"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center"
>

    <div class="bg-white rounded-xl p-6 w-full max-w-md">

        <h3 class="text-lg font-semibold mb-4">
            Motivo da não devolução
        </h3>

        <form
            id="formNaoDevolvido"
            method="POST"
        >

            @csrf
            @method('PUT')

            <textarea
                name="motivo_nao_devolucao"
                rows="4"
                required
                class="w-full border rounded-lg p-3"
            ></textarea>

            <div class="flex justify-end gap-2 mt-4">

                <button
                    type="button"
                    onclick="fecharModal()"
                    class="px-4 py-2 border rounded-lg"
                >
                    Cancelar
                </button>

                <button
                    type="submit"
                    class="bg-red-600 text-white px-4 py-2 rounded-lg"
                >
                    Confirmar
                </button>

            </div>

        </form>

    </div>

</div>


<script>

function abrirModal(id)
{
    document
        .getElementById('modalNaoDevolvido')
        .classList.remove('hidden');

    document
        .getElementById('modalNaoDevolvido')
        .classList.add('flex');

    document
        .getElementById('formNaoDevolvido')
        .action = `/emprestimos/${id}/nao-devolvido`;
}

function fecharModal()
{
    document
        .getElementById('modalNaoDevolvido')
        .classList.add('hidden');

    document
        .getElementById('modalNaoDevolvido')
        .classList.remove('flex');
}

</script>

@endsection