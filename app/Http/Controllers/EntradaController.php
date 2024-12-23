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
        $data = $this->entradaRepository->all();
        return response()->json([
            "status" => "success",
            "data" => $data
        ]);
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

        $data = $this->entradaRepository->store($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 422);

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $entrada = $this->entradaRepository->find($id);

        if(!$entrada) {
            return response()->json([
                'status' => false,
                'message' => 'Entrada não encontrado!'
            ], 404);
        }

        $entrada->load('veiculo');

        return response()->json([
            'status' => 'success',
            'data' => $entrada
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EntradaValidateRequest $request, int $id)
    {

        $entrada = $this->entradaRepository->find($id);

        if(!$entrada) {
            return response()->json([
                'status' => false,
                'message' => 'Entrada não encontrado'
            ], 404);
        }

        $data = $this->entradaRepository->update($request->all(), $id);

        return response()->json([
            'status' => 'sucess',
            'message' => 'Entrada atualizada com sucesso!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $entrada = $this->entradaRepository->find($id);

        if(!$entrada){
            return response()->json([
                "status" => false,
                "messsage" => "Registro não encontrado"
            ], 404);
        }

        $this->entradaRepository->delete($id);

        return response()->json([
            "status" => "success",
            "message" => "Entrada excluida com suecsso!"
        ]);
    }
}
