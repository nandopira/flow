<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = [
        'superior',
        'tipo',
        'titulo',
        'descricao',
        'num_usp_autor',
        'num_usp_atribuido',
        'dtprevfim',
        'dtprevini',
        'dtini',
        'dtfim'
    ];
}
