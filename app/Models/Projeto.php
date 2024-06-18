<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Projeto extends Model
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
        });
    }      

    protected $fillable = [
        'nome',
        'setorResponsavel',
        'descricao',
        'demandante',
        'fase',
        'status',
        'dtprevini',
        'dtprevfim',
        'dtini',
        'dtfim',    
        'orcamentoEstimado',
        'projectManager'
    ];
}
