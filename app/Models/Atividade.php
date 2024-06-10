<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Atividade extends Model
{
    use HasFactory;

    protected $fillable = [
        'projeto_uid',
        'titulo',
        'descricao',
        'num_usp_autor',
        'num_usp_atribuido',
        'dtprevfim',
        'dtfim'
    ];
}
