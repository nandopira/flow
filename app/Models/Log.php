<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Log extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
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
