@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-100 py-10">

    <div class="max-w-6xl mx-auto px-4">

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">

            <h2 class="text-2xl font-bold text-gray-800">
                Turmas
            </h2>

            <button
                id="btnNovaTurma"
                class="mt-3 md:mt-0 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition">
                + Nova Turma
            </button>

        </div>

        <!-- ALERT -->
        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- TABLE -->
        <div class="bg-white shadow rounded-xl overflow-hidden">

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Código</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nome</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Turno</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Criado em</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Ações</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse($turmas as $turma)
                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-6 py-4">{{ $turma->id }}</td>

                                <td class="px-6 py-4">
                                    <span class="bg-gray-200 px-2 py-1 rounded text-xs">
                                        {{ $turma->codigo }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 font-medium">
                                    {{ $turma->nome }}
                                </td>

                                <td class="px-6 py-4">

                                    @if($turma->turno == 'manhã')
                                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs">
                                            Manhã
                                        </span>
                                    @elseif($turma->turno == 'tarde')
                                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">
                                            Tarde
                                        </span>
                                    @else
                                        <span class="bg-gray-800 text-white px-3 py-1 rounded-full text-xs">
                                            Noite
                                        </span>
                                    @endif

                                </td>

                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $turma->created_at->format('d/m/Y') }}
                                </td>

                                <td class="px-6 py-4 flex gap-2">

                                    <button
                                        class="btnEditarTurma bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm"
                                        data-id="{{ $turma->id }}"
                                        data-codigo="{{ $turma->codigo }}"
                                        data-nome="{{ $turma->nome }}"
                                        data-turno="{{ $turma->turno }}">
                                        Editar
                                    </button>

                                    <form action="{{ route('turmas.destroy', $turma->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Deseja realmente excluir esta turma?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm">
                                            Excluir
                                        </button>

                                    </form>

                                </td>

                            </tr>
                        @empty

                            <tr>
                                <td colspan="6" class="text-center py-10 text-gray-500">
                                    Nenhuma turma cadastrada
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<!-- MODAL -->
<div id="modalTurma"
     class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white w-full max-w-md rounded-2xl shadow-xl p-6">

        <div class="flex justify-between items-center mb-5">

            <h2 id="tituloModal" class="text-xl font-bold">
                Nova Turma
            </h2>

            <button id="fecharModalTurma">✕</button>

        </div>

        <form action="{{ route('turmas.store') }}" id="formTurma" method="POST">

            @csrf

            <input type="hidden" name="_method" id="methodField">

            <!-- código -->
            <div class="mb-3">
                <label class="font-medium">Código</label>
                <input type="text" name="codigo" id="codigo"
                       class="w-full border rounded-lg p-2">
            </div>

            <!-- nome -->
            <div class="mb-3">
                <label class="font-medium">Nome</label>
                <input type="text" name="nome" id="nome"
                       class="w-full border rounded-lg p-2">
            </div>

            <!-- turno -->
            <div class="mb-3">
                <label class="font-medium">Turno</label>
                <select name="turno" id="turno"
                        class="w-full border rounded-lg p-2">

                    <option value="integral">Integral</option>
                    <option value="noite">Noite</option>

                </select>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg">
                Salvar
            </button>

        </form>

    </div>

</div>

<script>

// =====================
// MODAL
// =====================

const modal = document.getElementById('modalTurma');
const form = document.getElementById('formTurma');
const titulo = document.getElementById('tituloModal');
const methodField = document.getElementById('methodField');

document.getElementById('btnNovaTurma').addEventListener('click', () => {

    form.reset();
    methodField.value = '';
    form.action = "{{ route('turmas.store') }}";
    titulo.innerText = "Nova Turma";

    modal.classList.remove('hidden');
});

// fechar modal
document.getElementById('fecharModalTurma').addEventListener('click', () => {
    modal.classList.add('hidden');
});

// click fora
modal.addEventListener('click', (e) => {
    if(e.target === modal){
        modal.classList.add('hidden');
    }
});

// =====================
// EDITAR
// =====================

document.querySelectorAll('.btnEditarTurma').forEach(btn => {

    btn.addEventListener('click', () => {

        const id = btn.dataset.id;

        document.getElementById('codigo').value = btn.dataset.codigo;
        document.getElementById('nome').value = btn.dataset.nome;
        document.getElementById('turno').value = btn.dataset.turno;

        form.action = `/turmas/${id}`;
        methodField.value = "PUT";

        titulo.innerText = "Editar Turma";

        modal.classList.remove('hidden');

    });

});

</script>

@endsection