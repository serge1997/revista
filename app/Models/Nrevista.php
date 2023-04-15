<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nrevista extends Model
{
    use HasFactory;


    protected $table = 'nrevista';
    protected $fillable = [
        'titulo',
        'area',
        'resumo',
        'revista',
        'autor_id',
    ];

    public function hasUsuarios()
    {
        return $this->belongsTo(Usuario::class, 'autor_id');
    }
}
