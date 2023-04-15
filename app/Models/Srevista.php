<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Srevista extends Model
{
    use HasFactory;

    protected $table = 'srevista';
    protected $fillable = [
        'titulo',
        'nomeautor',
        'resumo',
        'revista',
        'editor_id',
        'volume'
    ];
}
