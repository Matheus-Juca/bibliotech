<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $fillable = [
        'aluno_id',
        'livro_id',
        'data_emprestimo',
        'data_devolucao',
        'observacoes',
        'status'
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}