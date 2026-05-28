<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | Bibliotech JMPR</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center px-4 py-10">

    <div class="grid lg:grid-cols-2 bg-white rounded-3xl shadow-xl overflow-hidden max-w-6xl w-full">

        <!-- Lado institucional -->
        <div class="bg-blue-900 text-white p-12 flex flex-col justify-center">

            <div>
                <h1 class="text-4xl font-bold mb-4">
                    Bibliotech JMPR
                </h1>

                <p class="text-blue-200 text-lg leading-relaxed">
                    Sistema inteligente para organização da biblioteca escolar.
                </p>
            </div>

            <div class="mt-12 space-y-4">

                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 rounded-full bg-green-500"></div>

                    <p class="text-blue-100">
                        Controle de empréstimos dos livros
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 rounded-full bg-green-500"></div>

                    <p class="text-blue-100">
                        Gestão de livros e alunos
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 rounded-full bg-green-500"></div>

                    <p class="text-blue-100">
                        Dashboard e relatórios
                    </p>
                </div>

            </div>

            <div class="mt-14 text-sm text-blue-300">
                EEMTI José Maria Pontes da Rocha
            </div>

        </div>

        <!-- Formulário -->
        <div class="p-10 lg:p-14 flex flex-col justify-center">

            <div class="mb-8">
                <h2 class="text-3xl font-bold text-slate-800">
                    Criar Conta
                </h2>

                <p class="text-slate-500 mt-2">
                    Cadastre um novo usuário no sistema.
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">

                @csrf

                <!-- Nome -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-slate-700">
                        Nome completo
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-800"
                        placeholder="Digite seu nome"
                    >

                    @error('name')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- E-mail -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-slate-700">
                        E-mail
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-800"
                        placeholder="Digite seu e-mail"
                    >

                    @error('email')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Senha -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-slate-700">
                        Senha
                    </label>

                    <input
                        type="password"
                        name="password"
                        required
                        class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-800"
                        placeholder="Digite sua senha"
                    >

                    @error('password')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Confirmar senha -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-slate-700">
                        Confirmar senha
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        required
                        class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-800"
                        placeholder="Confirme sua senha"
                    >
                </div>

                <!-- Botão -->
                <button
                    type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-3 rounded-xl transition duration-200"
                >
                    Criar Conta
                </button>

            </form>

            <!-- Link login -->
            <div class="mt-6 text-center">

                <p class="text-slate-500 text-sm">
                    Já possui uma conta?
                </p>

                <a
                    href="{{ route('login') }}"
                    class="text-blue-900 font-semibold hover:underline mt-1 inline-block"
                >
                    Fazer login
                </a>

            </div>

        </div>

    </div>

</body>
</html>