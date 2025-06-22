<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Atendimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'profissional_id',
        'data',
        'valor_pago',
        'observacoes',
    ];

    protected $casts = [
        'data' => 'datetime',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function profissional()
    {
        return $this->belongsTo(User::class, 'profissional_id');
    }

    public function servicos()
    {
        return $this->belongsToMany(Servico::class, 'atendimento_servico')
                    ->withPivot('preco')
                    ->withTimestamps();
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'atendimento_produto')
                    ->withPivot('quantidade_usada')
                    ->withTimestamps();
    }
}

