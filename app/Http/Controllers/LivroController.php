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
    'categoria' => 'required',
    'tombamento' => 'required',
    'quantidade' => 'required|integer|min:1',
    'autor_custom' => $request->autor === 'outros'
        ? 'required|max:255'
        : 'nullable',
        ]);


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
            'autor' => $request->autor === 'outros'
                ? $request->autor_custom
                : $request->autor,
            'tombamento' => $request->tombamento,
            'categoria' => $request->categoria,
            'qtd_disponivel' => $request->quantidade,
            'qtd_total' => $request->quantidade,
        ]);

        return redirect()
            ->route('admin.livros')
            ->with('success', 'Livro cadastrado.');
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
                'categoria' => 'required',
                'tombamento' => 'required',
                'quantidade' => 'required|integer|min:1',
                'autor_custom' => $request->autor === 'outros'
                    ? 'required|max:255'
                    : 'nullable',
            ]);

            $livro->update([
                'titulo' => $request->titulo,
                'autor' => $request->autor === 'outros'
                    ? $request->autor_custom
                    : $request->autor,
                'tombamento' => $request->tombamento,
                'categoria' => $request->categoria,
                'qtd_disponivel' => $request->quantidade,
                'qtd_total' => $request->quantidade,
            ]);

            return redirect()
                ->route('admin.livros')
                ->with('success', 'Livro atualizado com sucesso!');
        }

}
