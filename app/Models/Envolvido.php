<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Envolvido extends Model
{
    use HasFactory;     

    protected $fillable = [
        'tarefa_id',
        'tipo',
        'numeroUSP',
    ];
}
