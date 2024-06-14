<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Log extends Model
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
        'table_name',
        'foreign_id',
        'message',
        'createdby',
        'nivel',
        'event_type','ip_address'
    ];
}
