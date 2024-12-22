<?php

namespace App\Http\Repository;

use App\Models\Veiculo;
use App\Http\Repository\Contract\AbstractRepository;

class VeiculoRepository extends AbstractRepository
{
    public function __construct(Veiculo $veiculo) {
        $this->model = $veiculo;
    }
}
