<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'quantity', 'unit', 'price', 'supplier_id'
    ];

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

    // Função para dar baixa no estoque
    public static function darBaixa($produto_id, $quantidade_usada)
    {
        $produto = self::find($produto_id);
        if ($produto && $produto->quantity >= $quantidade_usada) {
            $produto->quantity -= $quantidade_usada;
            $produto->save();
        }
    }
}

