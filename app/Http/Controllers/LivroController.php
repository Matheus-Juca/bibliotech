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

            $query->where('titulo', 'like', "%{$search}%")
                  ->orWhere('autor', 'like', "%{$search}%")
                  ->orWhere('editora', 'like', "%{$search}%");

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
            'editora' => 'required',
            'quantidade' => 'required|integer|min:1'
        ]);

        Livro::create([
            'titulo' => $request->input('titulo'),
            'autor' => $request->input('autor'),
            'editora' => $request->input('editora'),
            'qtd_disponivel' => $request->input('quantidade')
        ]);


        return redirect()->route('admin.livros')->with('success', 'Livro cadastrado com sucesso!');
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
                'editora' => 'required',
                'quantidade' => 'required|integer|min:0'
            ]);

            $livro->update([
                'titulo' => $request->titulo,
                'autor' => $request->autor,
                'editora' => $request->editora,
                'qtd_disponivel' => $request->quantidade,
            ]);

            return redirect()
                ->route('admin.livros')
                ->with('success', 'Livro atualizado com sucesso!');
        }

}
