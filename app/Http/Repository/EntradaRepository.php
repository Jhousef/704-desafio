<?php

namespace App\Http\Repository;

use App\Models\Entrada;
use App\Http\Repository\Contract\AbstractRepository;
use App\Models\Veiculo;

class EntradaRepository extends AbstractRepository
{
    public function __construct(Entrada $entrada) {
        $this->model = $entrada;
    }

    public function verificaDisponibilidadeVaga(string $vaga) {
        return $this->model::where('vaga', $vaga)->whereNull('horario_saida')->first();
    }

    public function verificaVeiculo(Veiculo $veiculo) {
        return $this->model::where('veiculo_id', $veiculo->id)->whereNull('horario_saida')->first();
    }
}
