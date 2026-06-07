@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">


<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Editar Livro
    </h1>

    <p class="text-slate-500 mt-2">
        Atualize as informações do livro.
    </p>

</div>

@if($errors->any())

<div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-xl">

    <ul class="list-disc list-inside">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<div class="bg-white shadow-md rounded-2xl border border-slate-200 p-8">

    <form
        action="{{ route('livros.update', $livro->id) }}"
        method="POST"
        class="space-y-6"
    >

        @csrf
        @method('PUT')

        <div>

            <label class="block text-sm font-semibold text-slate-700 mb-2">
                Título
            </label>

            <input
                type="text"
                name="titulo"
                value="{{ old('titulo', $livro->titulo) }}"
                class="w-full rounded-xl border border-slate-300 px-4 py-3"
            >

        </div>

        <div>

            <label class="block text-sm font-semibold text-slate-700 mb-2">
                Autor
            </label>

            <input
                type="text"
                name="autor"
                value="{{ old('autor', $livro->autor) }}"
                class="w-full rounded-xl border border-slate-300 px-4 py-3"
            >

        </div>

        <div>

            <label class="block text-sm font-semibold text-slate-700 mb-2">
                Categoria
            </label>

            <input
                type="text"
                name="categoria"
                value="{{ old('categoria', $livro->categoria) }}"
                class="w-full rounded-xl border border-slate-300 px-4 py-3"
            >

        </div>

        <div>

            <label class="block text-sm font-semibold text-slate-700 mb-2">
                Data de Tombamento
            </label>

            <input
                type="date"
                name="tombamento"
                value="{{ old('tombamento', $livro->tombamento) }}"
                class="w-full rounded-xl border border-slate-300 px-4 py-3"
            >

        </div>

        <div>

            <label class="block text-sm font-semibold text-slate-700 mb-2">
                Quantidade
            </label>

            <input
                type="number"
                name="quantidade"
                value="{{ old('quantidade', $livro->qtd_total) }}"
                min="0"
                class="w-full rounded-xl border border-slate-300 px-4 py-3"
            >

        </div>

        <div class="flex justify-end gap-3">

            <a
                href="{{ route('admin.livros') }}"
                class="px-5 py-3 border border-slate-300 rounded-xl"
            >
                Cancelar
            </a>

            <button
                type="submit"
                class="bg-blue-700 hover:bg-blue-800 text-white px-6 py-3 rounded-xl font-semibold"
            >
                Salvar Alterações
            </button>

        </div>

    </form>

</div>


</div>

@endsection
