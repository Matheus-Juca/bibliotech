<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = [
        'codigo',
        'titulo',
        'autor',
        'tombamento',
        'categoria',
        'qtd_disponivel',
        'qtd_total',
    ];
}
