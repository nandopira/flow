<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tarefa extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
            $maxCount = Tarefa::max('count');
            $model->count = $maxCount + 1;
        });
    }       

    protected $fillable = [
        'superior',
        'tipo',
        'titulo',
        'descricao',
        'createdby',
        'atendente',
        'dtprevfim',
        'dtprevini',
        'dtini',
        'dtfim','setor','status','situacao','categoria'
    ];
}
