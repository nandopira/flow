<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoComentario extends Model
{
    use HasFactory;


    protected $fillable = [
        'projeto',
        'comentario',
        'pessoa',
        'momento',
    ];    
}
