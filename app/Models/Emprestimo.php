<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $fillable = [
        'aluno_id',
        'livro_id',
        'data_emprestimo',
        'data_devolucao',
        'observacoes',
        'motivo_nao_devolucao',
        'status',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    public function getStatusExibicaoAttribute()
    {
        if (
            $this->status === 'emprestado' &&
            Carbon::today()->gt(
                Carbon::parse($this->data_devolucao)
            )
        ) {
            return 'atrasado';
        }

        return $this->status;
    }
}