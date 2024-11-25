<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'rules',
        'style',
        'type',
        'platforms',
        'team_size',
        'min_players',
        'max_players',
        'start_date',
        'start_time',
        'timezone',
        'prize',
    ];

    protected $casts = [
        'platforms' => 'array',
    ];

}
