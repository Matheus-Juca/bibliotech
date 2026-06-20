<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'nome',
        'matricula',
        'turma_id',
        'qtd_fardas',
    ];

        public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }
}
