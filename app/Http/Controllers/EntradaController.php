<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use App\Http\Repository\EntradaRepository;
use App\Http\Repository\VeiculoRepository;
use App\Http\Requests\EntradaValidateRequest;
use App\Http\Requests\VeiculoValidateRequest;

class EntradaController extends Controller
{

    public VeiculoRepository $veiculoRepository;
    public EntradaRepository $entradaRepository;

    public function __construct(EntradaRepository $entradaRepository, VeiculoRepository $veiculoRepository) {
        $this->entradaRepository = $entradaRepository;
        $this->veiculoRepository = $veiculoRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->entradaRepository->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EntradaValidateRequest $request)
    {
        $veiculo = $this->veiculoRepository->find($request->veiculo_id);

        if($this->entradaRepository->verificaVeiculo($veiculo)){
            return response()->json([
                'veiculo já esta estacionado'
            ], 422);
        }

        if($this->entradaRepository->verificaDisponibilidadeVaga($request->vaga)){
            return response()->json([
                'vaga indisponivel'
            ], 422);
        }

        return $this->entradaRepository->store($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Entrada $entrada)
    {
        return $entrada;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EntradaValidateRequest $request, Entrada $entrada)
    {
        $entrada->update($request->all());

        return $entrada;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entrada $entrada)
    {
        $entrada->delete();

        return $entrada;
    }
}
