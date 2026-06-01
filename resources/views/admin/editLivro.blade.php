@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow">

    <h1 class="text-2xl font-bold mb-6">
        Editar Livro
    </h1>

    <form
        action="{{ route('livros.update', $livro->id) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Título</label>

            <input
                type="text"
                name="titulo"
                value="{{ $livro->titulo }}"
                class="w-full border rounded-lg p-3"
            >
        </div>

        <div class="mb-4">
            <label>Autor</label>

            <input
                type="text"
                name="autor"
                value="{{ $livro->autor }}"
                class="w-full border rounded-lg p-3"
            >
        </div>

        <div class="mb-4">
            <label>Editora</label>

            <input
                type="text"
                name="editora"
                value="{{ $livro->editora }}"
                class="w-full border rounded-lg p-3"
            >
        </div>

        <div class="mb-4">
            <label>Quantidade</label>

            <input
                type="number"
                name="quantidade"
                value="{{ $livro->qtd_disponivel }}"
                class="w-full border rounded-lg p-3"
            >
        </div>

        <button
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg"
        >
            Salvar Alterações
        </button>

    </form>

</div>

@endsection