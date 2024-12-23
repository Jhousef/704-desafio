<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $fillable = [
        'veiculo_id',
        'horario_entrada',
        'horario_saida',
        'vaga',
    ];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }
}
