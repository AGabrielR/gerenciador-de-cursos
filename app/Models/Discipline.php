<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $fillable = [
        'name',
        'workload',
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'disciplines_teachers');
    }
}
