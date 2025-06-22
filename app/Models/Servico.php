<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Servico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
    ];

    public function atendimentos()
    {
        return $this->belongsToMany(Atendimento::class, 'atendimento_servico')
                    ->withPivot('preco')
                    ->withTimestamps();
    }
}
