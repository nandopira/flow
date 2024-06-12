<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Notificacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'mensagem',
        'emaildestino',
        'momcad',
        'momenv'
    ];
}
