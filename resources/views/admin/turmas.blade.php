@extends('layouts.app')

@section('content')

<div class="w-full max-w-7xl mx-auto">


{{-- Cabeçalho --}}
<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Turmas
    </h1>

    <p class="text-slate-500 mt-2">
        Gerencie as turmas cadastradas no sistema.
    </p>

</div>

{{-- Sucesso --}}
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

{{-- Erros --}}
@if ($errors->any())

<div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-xl">

    <ul class="list-disc list-inside space-y-1">

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

{{-- Botão Nova Turma --}}
<div class="flex justify-end mb-6">

    <button
        id="btnNovaTurma"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl font-medium transition"
    >
        + Nova Turma
    </button>

    <a
    href="{{ route('alunos.promocao') }}"
    class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl font-medium transition"
>
    Promover Ano Letivo
    </a>

</div>

{{-- Tabela --}}
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        ID
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Código
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Nome
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Turno
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Criado em
                    </th>

                    <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
                        Ações
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($turmas as $turma)

                <tr class="border-t border-slate-100 hover:bg-slate-50 transition">

                    <td class="px-6 py-4">
                        {{ $turma->id }}
                    </td>

                    <td class="px-6 py-4">

                        <span class="bg-slate-100 text-slate-700 px-3 py-1 rounded-full text-xs font-medium">
                            {{ $turma->codigo }}
                        </span>

                    </td>

                    <td class="px-6 py-4 font-medium text-slate-800">
                        {{ $turma->nome }}
                    </td>

                    <td class="px-6 py-4">

                        @if($turma->turno == 'integral')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                Integral
                            </span>

                        @else

                            <span class="bg-slate-800 text-white px-3 py-1 rounded-full text-xs">
                                Noite
                            </span>

                        @endif

                    </td>

                    <td class="px-6 py-4 text-slate-500">
                        {{ $turma->created_at->format('d/m/Y H:i') }}
                    </td>

                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2">

                            <button
                                class="btnEditarTurma bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg text-sm"
                                data-id="{{ $turma->id }}"
                                data-codigo="{{ $turma->codigo }}"
                                data-nome="{{ $turma->nome }}"
                                data-turno="{{ $turma->turno }}"
                            >
                                Editar
                            </button>

                            <form
                                action="{{ route('turmas.destroy', $turma->id) }}"
                                method="POST"
                                onsubmit="return confirm('Deseja realmente excluir esta turma?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm"
                                >
                                    Excluir
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center py-10 text-slate-500">
                        Nenhuma turma cadastrada.
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    @if(method_exists($turmas, 'links'))

    <div class="p-6 border-t border-slate-200">

        {{ $turmas->links() }}

    </div>

    @endif

</div>

</div>

{{-- Modal --}}

<div
    id="modalTurma"
    class="hidden fixed inset-0 bg-black/50 items-center justify-center z-50"
>


<div class="bg-white w-full max-w-md rounded-2xl shadow-xl p-6">

    <div class="flex justify-between items-center mb-5">

        <h2 id="tituloModal" class="text-xl font-bold text-slate-800">
            Nova Turma
        </h2>

        <button
            type="button"
            id="fecharModalTurma"
            class="text-slate-500 hover:text-slate-800"
        >
            ✕
        </button>

    </div>

    <form
        action="{{ route('turmas.store') }}"
        id="formTurma"
        method="POST"
        class="space-y-4"
    >

        @csrf

        <input
            type="hidden"
            name="_method"
            id="methodField"
        >

        <div>

            <label class="block text-sm font-semibold text-slate-700 mb-2">
                Código
            </label>

            <input
                type="text"
                name="codigo"
                id="codigo"
                required
                class="w-full border border-slate-300 rounded-xl px-4 py-3"
            >

        </div>

        <div>

            <label class="block text-sm font-semibold text-slate-700 mb-2">
                Nome
            </label>

            <input
                type="text"
                name="nome"
                id="nome"
                required
                class="w-full border border-slate-300 rounded-xl px-4 py-3"
            >

        </div>

        <div>

            <label class="block text-sm font-semibold text-slate-700 mb-2">
                Turno
            </label>

            <select
                name="turno"
                id="turno"
                class="w-full border border-slate-300 rounded-xl px-4 py-3"
            >

                <option value="integral">
                    Integral
                </option>

                <option value="noite">
                    Noite
                </option>

            </select>

        </div>

        <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-medium transition"
        >
            Salvar
        </button>

    </form>

</div>


</div>

<script>

const modal = document.getElementById('modalTurma');
const form = document.getElementById('formTurma');
const titulo = document.getElementById('tituloModal');
const methodField = document.getElementById('methodField');

document.getElementById('btnNovaTurma').addEventListener('click', () => {

    form.reset();

    form.action = "{{ route('turmas.store') }}";

    methodField.value = '';

    titulo.innerText = 'Nova Turma';

    modal.classList.remove('hidden');
    modal.classList.add('flex');

});

document.getElementById('fecharModalTurma').addEventListener('click', () => {

    modal.classList.add('hidden');
    modal.classList.remove('flex');

});

modal.addEventListener('click', (e) => {

    if(e.target === modal)
    {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

});

document.querySelectorAll('.btnEditarTurma').forEach(btn => {

    btn.addEventListener('click', () => {

        const id = btn.dataset.id;

        document.getElementById('codigo').value = btn.dataset.codigo;
        document.getElementById('nome').value = btn.dataset.nome;
        document.getElementById('turno').value = btn.dataset.turno;

        form.action = `/turmas/${id}`;

        methodField.value = 'PUT';

        titulo.innerText = 'Editar Turma';

        modal.classList.remove('hidden');
        modal.classList.add('flex');

    });

});

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

@endsection
