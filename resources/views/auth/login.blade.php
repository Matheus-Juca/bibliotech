<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Bibliotech JMPR</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center px-4">

    <div class="grid lg:grid-cols-2 bg-white rounded-3xl shadow-xl overflow-hidden max-w-5xl w-full">

        <div class="bg-blue-900 text-white p-12 flex flex-col justify-center">

            <h1 class="text-4xl font-bold mb-4">
                Bibliotech JMPR
            </h1>

            <p class="text-blue-200 text-lg leading-relaxed">
                Tecnologia e organização para incentivar a leitura.
            </p>

            <div class="mt-10 text-sm text-blue-300">
                EEMTI José Maria Pontes da Rocha
            </div>

        </div>

        <div class="p-10 lg:p-14 flex flex-col justify-center">

            <div class="mb-8">
                <h2 class="text-3xl font-bold text-slate-800">
                    Entrar
                </h2>

                <p class="text-slate-500 mt-2">
                    Acesse o sistema da biblioteca.
                </p>
            </div>

            <form class="space-y-5">

                <div>
                    <label class="block mb-2 text-sm font-medium text-slate-700">
                        E-mail
                    </label>

                    <x-input type="email" placeholder="Digite seu e-mail" />
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-slate-700">
                        Senha
                    </label>

                    <x-input type="password" placeholder="Digite sua senha" />
                </div>

                <x-button class="w-full justify-center">
                    Entrar
                </x-button>

            </form>

        </div>

    </div>

</body>
</html>