@extends('layouts.guest')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-slate-50 px-4">


<div class="w-full max-w-lg">

    <div class="text-center mb-8">

        <h1 class="text-4xl font-bold text-blue-900">
            Bibliotech
        </h1>

        <p class="text-slate-500 mt-2">
            Criar Conta
        </p>

    </div>

    <div class="bg-white shadow-lg rounded-2xl border border-slate-200 p-8">

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-5">

                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Nome
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3
                           focus:outline-none focus:ring-2 focus:ring-blue-400"
                >

                @error('name')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-5">

                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    E-mail
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3
                           focus:outline-none focus:ring-2 focus:ring-blue-400"
                >

                @error('email')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-5">

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

            <div class="mb-6">

                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Confirmar Senha
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3
                           focus:outline-none focus:ring-2 focus:ring-blue-400"
                >

            </div>

            <button
                type="submit"
                class="w-full bg-blue-700 hover:bg-blue-800 text-white
                       py-3 rounded-xl font-semibold transition"
            >
                Criar Conta
            </button>

            <div class="mt-6 text-center">

                <a
                    href="{{ route('login') }}"
                    class="text-blue-700 hover:text-blue-800 text-sm"
                >
                    Já possui conta?
                </a>

            </div>

        </form>

    </div>

</div>


</div>

@endsection
