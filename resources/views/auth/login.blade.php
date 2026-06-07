@extends('layouts.guest')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-slate-50 px-4">


<div class="w-full max-w-md">

    <div class="text-center mb-8">

        <h1 class="text-4xl font-bold text-blue-900">
            Bibliotech
        </h1>

        <p class="text-slate-500 mt-2">
            Sistema de Biblioteca Escolar
        </p>

    </div>

    <div class="bg-white shadow-lg rounded-2xl border border-slate-200 p-8">

        <h2 class="text-2xl font-semibold text-slate-800 mb-6">
            Entrar
        </h2>

        @if(session('status'))
            <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-5">

                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    E-mail
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full rounded-xl border border-slate-300 px-4 py-3
                           focus:outline-none focus:ring-2 focus:ring-blue-400"
                >

                @error('email')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">

                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Senha
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3
                           focus:outline-none focus:ring-2 focus:ring-blue-400"
                >

                @error('password')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror

            </div>

            <button
                type="submit"
                class="w-full bg-blue-700 hover:bg-blue-800 text-white
                       py-3 rounded-xl font-semibold transition"
            >
                Entrar
            </button>

            <div class="mt-6 text-center">

                <a
                    href="{{ route('register') }}"
                    class="text-blue-700 hover:text-blue-800 text-sm"
                >
                    Criar conta
                </a>

            </div>

        </form>

    </div>

</div>

</div>

@endsection
