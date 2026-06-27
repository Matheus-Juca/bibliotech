<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = ['codigo', 'nome', 'turno', 'proxima_turma_id'];

    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }

    public function proximaTurma()
{
    return $this->belongsTo(
        Turma::class,
        'proxima_turma_id'
    );
}
}
