<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Bibliotech JMPR</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >
</head>

<body class="bg-slate-50 font-[Inter]">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('components.sidebar')

        {{-- Conteúdo --}}
        <div class="flex-1 flex flex-col">

            {{-- Navbar --}}
            @include('components.navbar')

            {{-- Conteúdo principal --}}
            <main class="p-8">

                @yield('content')

            </main>

        </div>

    </div>

</body>

</html>