@extends('layouts.app')

@section('content')

<div class="w-full max-w-4xl mx-auto">


{{-- Cabeçalho --}}
<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Cadastro de Livros
    </h1>

    <p class="text-slate-500 mt-2">
        Adicione novos livros ao acervo da biblioteca escolar.
    </p>

</div>



{{-- Erros --}}
@if($errors->any())

<div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-xl">

    <ul class="list-disc list-inside space-y-1">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

{{-- Formulário --}}
<div class="bg-white shadow-md rounded-2xl border border-slate-200 p-8">

    <form
        action="{{ route('livros.store') }}"
        method="POST"
        class="space-y-6"
    >

        @csrf

        {{-- Título --}}
        <div>

            <label
                for="titulo"
                class="block text-sm font-semibold text-slate-700 mb-2"
            >
                Título do Livro
            </label>

            <input
                type="text"
                id="titulo"
                name="titulo"
                value="{{ old('titulo') }}"
                placeholder="Digite o título do livro"
                required
                class="w-full rounded-xl border border-slate-300 px-4 py-3
                       focus:outline-none focus:ring-2 focus:ring-blue-400
                       focus:border-blue-400 transition"
            >

        </div>

        {{-- Autor --}}
<div>

    <label
        for="autor"
        class="block text-sm font-semibold text-slate-700 mb-2">
        Autor
    </label>

    <select
        id="autor"
        name="autor"
        required
        class="w-full rounded-xl border border-slate-300 px-4 py-3
               focus:outline-none focus:ring-2 focus:ring-green-400
               focus:border-green-400 transition">

        <option value="">Selecione um autor</option>

        <option value="Machado de Assis" {{ old('autor') == 'Machado de Assis' ? 'selected' : '' }}>
            Machado de Assis
        </option>

        <option value="Clarice Lispector" {{ old('autor') == 'Clarice Lispector' ? 'selected' : '' }}>
            Clarice Lispector
        </option>

        <option value="Carlos Drummond de Andrade" {{ old('autor') == 'Carlos Drummond de Andrade' ? 'selected' : '' }}>
            Carlos Drummond de Andrade
        </option>

        <option value="Jorge Amado" {{ old('autor') == 'Jorge Amado' ? 'selected' : '' }}>
            Jorge Amado
        </option>

        <option value="João Guimarães Rosa" {{ old('autor') == 'João Guimarães Rosa' ? 'selected' : '' }}>
            João Guimarães Rosa
        </option>

        <option value="José de Alencar" {{ old('autor') == 'José de Alencar' ? 'selected' : '' }}>
            José de Alencar
        </option>

        <option value="outros" {{ old('autor') == 'outros' ? 'selected' : '' }}>
            Outros
        </option>

    </select>

    <div
        id="autorCustomWrapper"
        class="{{ old('autor') == 'outros' ? '' : 'hidden' }} mt-3">

        <input
            type="text"
            id="autor_custom"
            name="autor_custom"
            value="{{ old('autor_custom') }}"
            placeholder="Digite o nome do autor"
            class="w-full rounded-xl border border-slate-300 px-4 py-3
                   focus:outline-none focus:ring-2 focus:ring-blue-400">

    </div>

</div>

        {{-- Categoria --}}
<div>

    <label
        for="categoria"
        class="block text-sm font-semibold text-slate-700 mb-2">
        Categoria
    </label>

    <select
        id="categoria"
        name="categoria"
        required
        class="w-full rounded-xl border border-slate-300 px-4 py-3
               focus:outline-none focus:ring-2 focus:ring-green-400
               focus:border-green-400 transition">

        <option value="">Selecione uma categoria</option>

        <option value="Literatura Brasileira" {{ old('categoria') == 'Literatura Brasileira' ? 'selected' : '' }}>
            Literatura Brasileira
        </option>

        <option value="Literatura Cearense" {{ old('categoria') == 'Literatura Cearense' ? 'selected' : '' }}>
            Literatura Cearense
        </option>

        <option value="Literatura Africana" {{ old('categoria') == 'Literatura Africana' ? 'selected' : '' }}>
            Literatura Africana
        </option>

        <option value="Literatura Portuguesa" {{ old('categoria') == 'Literatura Portuguesa' ? 'selected' : '' }}>
            Literatura Portuguesa
        </option>

        <option value="Literatura Estrangeira" {{ old('categoria') == 'Literatura Estrangeira' ? 'selected' : '' }}>
            Literatura Estrangeira
        </option>

        <option value="Dicionários" {{ old('categoria') == 'Dicionários' ? 'selected' : '' }}>
            Dicionários
        </option>

        <option value="Infanto Juvenil" {{ old('categoria') == 'Infanto Juvenil' ? 'selected' : '' }}>
            Infanto Juvenil
        </option>

        <option value="História do Brasil" {{ old('categoria') == 'História do Brasil' ? 'selected' : '' }}>
            História do Brasil
        </option>

        <option value="História do Ceará" {{ old('categoria') == 'História do Ceará' ? 'selected' : '' }}>
            História do Ceará
        </option>

        <option value="Crônicas e Contos" {{ old('categoria') == 'Crônicas e Contos' ? 'selected' : '' }}>
            Crônicas e Contos
        </option>

        <option value="Romance" {{ old('categoria') == 'Romance' ? 'selected' : '' }}>
            Romance
        </option>

        <option value="Novela" {{ old('categoria') == 'Novela' ? 'selected' : '' }}>
            Novela
        </option>

        <option value="Cordel" {{ old('categoria') == 'Cordel' ? 'selected' : '' }}>
            Cordel
        </option>

        <option value="Teatro" {{ old('categoria') == 'Teatro' ? 'selected' : '' }}>
            Teatro
        </option>

        <option value="Poesia" {{ old('categoria') == 'Poesia' ? 'selected' : '' }}>
            Poesia
        </option>

        <option value="outros" {{ old('categoria') == 'outros' ? 'selected' : '' }}>
            Outros
        </option>

    </select>

    <div
        id="categoriaCustomWrapper"
        class="{{ old('categoria') == 'outros' ? '' : 'hidden' }} mt-3">

        <input
            type="text"
            id="categoria_custom"
            name="categoria_custom"
            value="{{ old('categoria_custom') }}"
            placeholder="Digite a categoria"
            class="w-full rounded-xl border border-slate-300 px-4 py-3
                   focus:outline-none focus:ring-2 focus:ring-blue-400">

    </div>

</div>

        {{-- Data de Tombamento --}}
        <div>

            <label
                for="tombamento"
                class="block text-sm font-semibold text-slate-700 mb-2"
            >
                Data de Tombamento
            </label>

            <input
                type="date"
                id="tombamento"
                name="tombamento"
                value="{{ old('tombamento') }}"
                required
                class="w-full rounded-xl border border-slate-300 px-4 py-3
                       focus:outline-none focus:ring-2 focus:ring-blue-400
                       focus:border-blue-400 transition"
            >

        </div>

        {{-- Quantidade --}}
        <div>

            <label
                for="quantidade"
                class="block text-sm font-semibold text-slate-700 mb-2"
            >
                Quantidade
            </label>

            <input
                type="number"
                id="quantidade"
                name="quantidade"
                value="{{ old('quantidade') }}"
                min="1"
                required
                placeholder="Quantidade disponível"
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
                Salvar Livro
            </button>

        </div>

    </form>

</div>


</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    // ======================
    // Autor
    // ======================

    const autorSelect = document.getElementById('autor');
    const autorWrapper = document.getElementById('autorCustomWrapper');
    const autorInput = document.getElementById('autor_custom');

    function atualizarAutor() {

        if (autorSelect.value === 'outros') {

            autorWrapper.classList.remove('hidden');
            autorInput.required = true;

        } else {

            autorWrapper.classList.add('hidden');
            autorInput.required = false;
            autorInput.value = '';

        }

    }

    autorSelect.addEventListener('change', atualizarAutor);
    atualizarAutor();


    // ======================
    // Categoria
    // ======================

    const categoriaSelect = document.getElementById('categoria');
    const categoriaWrapper = document.getElementById('categoriaCustomWrapper');
    const categoriaInput = document.getElementById('categoria_custom');

    function atualizarCategoria() {

        if (categoriaSelect.value === 'outros') {

            categoriaWrapper.classList.remove('hidden');
            categoriaInput.required = true;

        } else {

            categoriaWrapper.classList.add('hidden');
            categoriaInput.required = false;
            categoriaInput.value = '';

        }

    }

    categoriaSelect.addEventListener('change', atualizarCategoria);
    atualizarCategoria();


    // ======================
    // Alerta de sucesso
    // ======================

    const alert = document.getElementById('alertSuccess');

    if (alert) {

        setTimeout(() => {

            alert.style.transition = 'all .4s ease';
            alert.style.opacity = '0';

            setTimeout(() => {

                alert.remove();

            }, 400);

        }, 4000);

    }

});

</script>

@endsection
