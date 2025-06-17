<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    public function atendimentos()
    {
        return $this->belongsToMany(Atendimento::class, 'atendimento_servico');
    }

}
