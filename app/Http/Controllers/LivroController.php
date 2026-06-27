<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $livros = Livro::when($search, function ($query) use ($search) {

            $query->where('titulo', 'ilike', "%{$search}%")
                  ->orWhere('autor', 'ilike', "%{$search}%");

        })
        ->orderBy('titulo')
        ->paginate(10);

        return view('admin.livros', compact('livros'));
    }

    public function create()
    {
        return view('admin.cadLivro');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',

            'autor' => 'required',
            'autor_custom' => 'nullable|max:255',

            'categoria' => 'required',
            'categoria_custom' => 'nullable|max:255',

            'tombamento' => 'required',

            'quantidade' => 'required|integer|min:1',
        ]);

        if ($request->autor == 'outros' && empty($request->autor_custom)) {

            return back()
                ->withErrors([
                    'autor_custom' => 'Informe o autor.'
                ])
                ->withInput();

        }

        if ($request->categoria == 'outros' && empty($request->categoria_custom)) {

            return back()
                ->withErrors([
                    'categoria_custom' => 'Informe a categoria.'
                ])
                ->withInput();

        }

        /*
        |--------------------------------------------------------------------------
        | Geração automática do código
        |--------------------------------------------------------------------------
        */

        $ultimoLivro = Livro::latest('id')->first();

        $proximoNumero = $ultimoLivro
            ? $ultimoLivro->id + 1
            : 1;

        $codigo = 'JMPR-' . str_pad(
            $proximoNumero,
            4,
            '0',
            STR_PAD_LEFT
        );

        Livro::create([

            'codigo' => $codigo,

            'titulo' => $request->titulo,

            'autor' => $request->autor == 'outros'
                ? $request->autor_custom
                : $request->autor,

            'categoria' => $request->categoria == 'outros'
                ? $request->categoria_custom
                : $request->categoria,

            'tombamento' => $request->tombamento,

            'qtd_disponivel' => $request->quantidade,

            'qtd_total' => $request->quantidade,

        ]);

        return redirect()
            ->route('admin.livros')
            ->with('success', 'Livro cadastrado com sucesso!');
    }

    public function edit(Livro $livro)
    {
        return view('admin.editLivro', compact('livro'));
    }

    public function update(Request $request, Livro $livro)
    {
        $request->validate([

            'titulo' => 'required|max:255',

            'autor' => 'required',
            'autor_custom' => 'nullable|max:255',

            'categoria' => 'required',
            'categoria_custom' => 'nullable|max:255',

            'tombamento' => 'required',

            'quantidade' => 'required|integer|min:1',

        ]);

        if ($request->autor == 'outros' && empty($request->autor_custom)) {

            return back()
                ->withErrors([
                    'autor_custom' => 'Informe o autor.'
                ])
                ->withInput();

        }

        if ($request->categoria == 'outros' && empty($request->categoria_custom)) {

            return back()
                ->withErrors([
                    'categoria_custom' => 'Informe a categoria.'
                ])
                ->withInput();

        }

        $livro->update([

            'titulo' => $request->titulo,

            'autor' => $request->autor == 'outros'
                ? $request->autor_custom
                : $request->autor,

            'categoria' => $request->categoria == 'outros'
                ? $request->categoria_custom
                : $request->categoria,

            'tombamento' => $request->tombamento,

            'qtd_disponivel' => $request->quantidade,

            'qtd_total' => $request->quantidade,

        ]);

        return redirect()
            ->route('admin.livros')
            ->with('success', 'Livro atualizado com sucesso!');
    }
}