<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'quantidade',
        'volume',
        'preco',
        'fornecedor_id'
    ];

    public function atendimentos()
    {
        return $this->belongsToMany(Atendimento::class, 'atendimento_produto')
                    ->withPivot('quantidade_usada')
                    ->withTimestamps();
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

}
