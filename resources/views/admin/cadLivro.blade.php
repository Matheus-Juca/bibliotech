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

    {{-- Card do formulário --}}
    <div class="bg-white shadow-md rounded-2xl border border-slate-200 p-8">

        <form action="{{ route('livros.store') }}" method="POST" class="space-y-6">
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
                    class="block text-sm font-semibold text-slate-700 mb-2"
                >
                    Autor
                </label>

                <select
                    id="autor"
                    name="autor"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3
                           focus:outline-none focus:ring-2 focus:ring-green-400
                           focus:border-green-400 transition"
                >
                    <option value="">
                        Selecione um autor
                    </option>

                    <option value="Machado de Assis">
                        Machado de Assis
                    </option>

                    <option value="Clarice Lispector">
                        Clarice Lispector
                    </option>

                    <option value="Carlos Drummond de Andrade">
                        Carlos Drummond de Andrade
                    </option>

                    <option value="Jorge Amado">
                        Jorge Amado
                    </option>

                    <option value="João Guimarães Rosa">
                        João Guimarães Rosa
                    </option>

                    <option value="José de Alencar">
                        José de Alencar
                    </option>
                </select>
            </div>

            {{-- Editora --}}
            <div>
                <label 
                    for="categoria"
                    class="block text-sm font-semibold text-slate-700 mb-2"
                >
                    Categoria
                </label>

                <select
                    id="categoria"
                    name="categoria"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3
                           focus:outline-none focus:ring-2 focus:ring-green-400
                           focus:border-green-400 transition"
                >
                    <option value="">
                        Selecione uma categoria
                    </option>

                    <option value="Literatura Brasileira">
                        Literatura brasileira
                    </option>

                    <option value="Literatura cearence">
                        Literatura cearence
                    </option>

                    <option value="Literatura Africana">
                        Literatura africana 
                    </option>

                    <option value="Literatura portuguesa">
                        Literatura portuguesa
                    </option>

                    <option value="Literatura estrangeira">
                        Literatura estrangeira 
                    </option>
                    <option value="Dicionarios">
                        Dicionários
                    </option>

                    <option value="Infanto juvenil">
                        Infanto juvenil
                    </option>

                    
                    <option value="História do Brasil">
                        História do Brasil
                    </option>
                    
                    <option value="História do Ceará">
                        História do Ceará
                    </option>

                    <option value="Crônicas e contos">
                        Crônicas e contos
                    </option>


                    <option value="Romance">
                        Romance
                    </option>

                    <option value="Novela">
                        Novela
                    </option>

                    <option value="Cordel">
                        Cordel
                    </option>

                    <option value="Teatro">
                        Teatro
                    </option>

                    <option value="Poesia">
                        Poesia
                    </option>

                </select>
            </div>

                {{-- Tombamento --}}
                <div>
                    <label 
                        for="tombamento"
                        class="block text-sm font-semibold text-slate-700 mb-2"
                    >
                        Número de Tombamento
                    </label>
    
                    <input
                        type="date"
                        id="tombamento"
                        name="tombamento" 
                        placeholder="Digite o número de tombamento do livro"
                        required
                        class="w-full rounded-xl border border-slate-300 px-4 py-3
                            focus:outline-none focus:ring-2 focus:ring-blue-400
                            focus:border-blue-400 transition"
                    > <br>
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
                    min="1"
                    placeholder="Quantidade disponível"
                    required
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

@endsection