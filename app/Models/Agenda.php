<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Agenda extends Model
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

    public function getDataAgendadaAttribute($value)
    {
        return Carbon::parse($value);
    }

    protected $fillable = [
        'table_name',
        'foreign_id',
        'createdby',
        'proprietario',
        'event_type','ip_address','data_agendada'
    ];
}
