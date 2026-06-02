@extends('layouts.app')

@section('content')


<div class="flex gap-3 mb-8">

<a 
    href="{{ route('admin.cadlivro') }}"
    class="bg-blue-700 hover:bg-blue-800 text-white px-5 py-3 rounded-xl"
>
    + Novo Livro
</a>

<button
    id="btnEmprestimo"
    class="bg-blue-700 hover:bg-blue-800 text-white px-5 py-3 rounded-xl"
>
    + Novo Empréstimo
</button>

</div>
    <!-- Cabeçalho -->
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-slate-800">
            <a href="{{ route('dashboard') }}"
               class="hover:text-blue-600 transition-colors duration-200">
                Dashboard
            </a>
        </h1>

        <p class="text-slate-500 mt-2">
            Bem-vindo ao sistema Bibliotech JMPR.
        </p>

    </div>

    <!-- Cards principais -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

        <!-- Livros -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

            <div class="flex items-center justify-between mb-4">

                <div>
                    <p class="text-slate-500 text-sm">
                        Livros cadastrados
                    </p>

                    <h2 class="text-4xl font-bold text-blue-900 mt-2">
                        {{ $totalLivros }}
                    </h2>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-7 h-7 text-blue-900"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5
                                 4.462 5 2 6.567 2 8.5V19a1 1 0 001 1h1.5
                                 c1.746 0 3.332.483 4.5 1.253M12 6.253
                                 C13.168 5.483 14.754 5 16.5 5
                                 19.538 5 22 6.567 22 8.5V19a1 1 0 01-1 1h-1.5
                                 c-1.746 0-3.332.483-4.5 1.253" />
                    </svg>

                </div>

            </div>

        </div>

        <!-- Empréstimos -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

            <div class="flex items-center justify-between mb-4">

                <div>
                    <p class="text-slate-500 text-sm">
                        Empréstimos ativos
                    </p>

                    <h2 class="text-4xl font-bold text-green-600 mt-2">
                        {{ $emprestimosAtivos }}
                    </h2>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-7 h-7 text-green-700"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10m-11
                                 9h12a2 2 0 002-2V7a2 2 0
                                 00-2-2H6a2 2 0 00-2 2v11a2
                                 2 0 002 2z" />
                    </svg>

                </div>

            </div>

        </div>

        <!-- Alunos -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

            <div class="flex items-center justify-between mb-4">

                <div>
                    <p class="text-slate-500 text-sm">
                        Alunos cadastrados
                    </p>

                    <h2 class="text-4xl font-bold text-slate-800 mt-2">
                       {{ $totalAlunos }}
                    </h2>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-slate-200 flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-7 h-7 text-slate-700"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M17 20h5V4H2v16h5m10
                                 0v-2a4 4 0 00-4-4H9a4 4 0
                                 00-4 4v2m12 0H7m6-12a4 4 0
                                 11-8 0 4 4 0 018 0z" />
                    </svg>

                </div>

            </div>

        </div>

        <!-- Categorias --->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
            
            <div class="flex items-center justify-between mb-4">
                
                <div>
                    <p class="text-slate-500 text-sm">
                        Categorias
                    </p>

                    <h2 class="text-4xl font-bold text-blue-700 mt-2">
                        12
                    </h2>
                </div>
                
                <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center">
                    
                    <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7 text-blue-700"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    
                    <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 11H5m14-4H5m14
                    8H5m14 4H5" />
                </svg>
                
            </div>
            
        </div>
        
    </div>

    </div>

    <!-- Área inferior -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <!-- Tabela -->
        <div class="xl:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-sm">

            <div class="p-6 border-b border-slate-200">

                <h2 class="text-lg font-semibold text-slate-800">
                    Últimos empréstimos
                </h2>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="px-6 py-4 text-sm font-semibold text-slate-600">
                                Aluno
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-slate-600">
                                Livro
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-slate-600">
                                Data
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-slate-600">
                                Status
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($ultimosEmprestimos as $emprestimo)

                        <tr class="border-t border-slate-100">

                            <td class="px-6 py-4 text-slate-700">
                                {{ $emprestimo->aluno->nome }}
                            </td>

                            <td class="px-6 py-4 text-slate-700">
                                {{ $emprestimo->livro->titulo }}
                            </td>

                            <td class="px-6 py-4 text-slate-500">
                                {{ \Carbon\Carbon::parse($emprestimo->data_emprestimo)->format('d/m/Y') }}
                            </td>

                            <td class="px-6 py-4">

                                @if($emprestimo->status == 'emprestado')

                                    <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">
                                        Emprestado
                                    </span>

                                @else

                                    <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">
                                        Devolvido
                                    </span>

                                @endif

                            </td>

                        </tr>

                        @endforeach

                        </tbody>

                 </table>

        </div>

        <!-- Painel lateral -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

            <h2 class="text-lg font-semibold text-slate-800 mb-6">
                Informações rápidas
            </h2>

            <div class="space-y-5">

                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">

                    <p class="text-sm text-slate-500 mb-1">
                        Livro mais emprestado
                    </p>

                    <h3 class="font-semibold text-slate-800">
                        Dom Casmurro
                    </h3>

                </div>

                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">

                    <p class="text-sm text-slate-500 mb-1">
                        Turma mais ativa
                    </p>

                    <h3 class="font-semibold text-slate-800">
                        3º Ano A
                    </h3>

                </div>

                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">

                    <p class="text-sm text-slate-500 mb-1">
                        Total disponível
                    </p>

                    <h3 class="font-semibold text-green-700">
                        {{ $totalExemplares }} livros
                    </h3>

                </div>

            </div>

        </div>


    </div>


    <div
    id="modalEmprestimo"
    class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50"
>

    <div class="bg-white w-full max-w-lg rounded-2xl shadow-xl p-6">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-xl font-bold">
                Novo Empréstimo
            </h2>

            <button id="fecharModal">
                ✕
            </button>

        </div>

        <form action="{{ route('emprestimos.store') }}" method="POST">

            @csrf

            <!-- Aluno -->
                    <div class="mb-4">

                        <label class="block mb-2 font-medium">
                            Aluno
                        </label>

                        <input
                            type="text"
                            id="buscarAluno"
                            placeholder="Digite nome ou matrícula..."
                            class="w-full border rounded-lg p-3 mb-2"
                        > <br> <br>  

                        <select
                            id="selectAluno"
                            name="aluno_id"
                            class="w-full border rounded-lg p-3"
                            required
                        >

                            <option value="">Selecione um aluno</option>

                            @foreach($alunos as $aluno)
                                <option value="{{ $aluno->id }}">
                                    {{ $aluno->nome }} - {{ $aluno->matricula }}
                                </option>
                            @endforeach

                        </select>

                    </div>

            <!-- Livro -->
                    <div class="mb-4">

                        <label class="block mb-2 font-medium">
                            Livro
                        </label>

                        <input
                            type="text"
                            id="buscarLivro"
                            placeholder="Digite título ou código..."
                            class="w-full border rounded-lg p-3 mb-2"
                        > <br> <br>

                        <select
                            id="selectLivro"
                            name="livro_id"
                            class="w-full border rounded-lg p-3"
                            required
                        >

                            <option value="">Selecione um livro</option>

                            @foreach($livros as $livro)
                                <option value="{{ $livro->id }}">
                                    {{ $livro->titulo }}
                                </option>
                            @endforeach

                        </select>

                    </div>
            <!-- Data -->
            <div class="mb-4">

                <label class="block mb-2 font-medium">
                    Data de devolução
                </label>

                <input
                    type="date"
                    name="data_devolucao"
                    class="w-full border rounded-lg p-3"
                    required
                >

            </div>

            <button
                type="submit"
                class="w-full bg-blue-700 text-white py-3 rounded-xl"
            >
                Registrar Empréstimo
            </button>

        </form>

    </div>

</div>

<script>

// =========================
// MODAL DE EMPRÉSTIMO
// =========================

const modal = document.getElementById('modalEmprestimo');

document
    .getElementById('btnEmprestimo')
    .addEventListener('click', () => {

        modal.classList.remove('hidden');

    });

document
    .getElementById('fecharModal')
    .addEventListener('click', () => {

        modal.classList.add('hidden');

    });

modal.addEventListener('click', (e) => {

    if(e.target === modal){

        modal.classList.add('hidden');

    }

});


// =========================
// BUSCA DE ALUNOS
// =========================

document
    .getElementById('buscarAluno')
    .addEventListener('keyup', function() {

        let filtro = this.value.toLowerCase();

        document
            .querySelectorAll('#selectAluno option')
            .forEach(option => {

                option.hidden =
                    !option.textContent
                        .toLowerCase()
                        .includes(filtro);

            });

    });


// =========================
// BUSCA DE LIVROS
// =========================

document
    .getElementById('buscarLivro')
    .addEventListener('keyup', function() {

        let filtro = this.value.toLowerCase();

        document
            .querySelectorAll('#selectLivro option')
            .forEach(option => {

                option.hidden =
                    !option.textContent
                        .toLowerCase()
                        .includes(filtro);

            });

    });

</script>

    @endsection