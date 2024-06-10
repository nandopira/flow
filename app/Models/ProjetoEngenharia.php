<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProjetoEngenharia extends Model
{
    use HasFactory;  

    protected $fillable = [
        'nome',
        'setorResponsavel',
        'descricao',
        'demandante',
        'dtprevini',
        'dtprevfim',
        'dtini',
        'dtfim',    
        'orcamentoEstimado',
        'projectManager'
    ];
}
