<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Repository\VeiculoRepository;
use App\Http\Requests\VeiculoValidateRequest;

class VeiculoController extends Controller
{
    public VeiculoRepository $veiculoRepository;

    public function __construct(VeiculoRepository $veiculoRepository)
    {
        $this->veiculoRepository = $veiculoRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->veiculoRepository->all();
        return response()->json([
            "status" => "success",
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VeiculoValidateRequest $request)
    {

        $data = $request->all();
        $data['placa'] = Str::upper($request->placa);

        $data = $this->veiculoRepository->store($data);

        return response()->json([
            'status' => 'sucess',
            'message' => 'Cadastro realizado com sucesso!',
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $veiculo = $this->veiculoRepository->find($id);

        if(!$veiculo) {
            return response()->json([
                'status' => false,
                'message' => 'Veiculo não encontrado'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $veiculo
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VeiculoValidateRequest $request, int $id)
    {
        $veiculo = $this->veiculoRepository->find($id);

        if(!$veiculo) {
            return response()->json([
                'status' => false,
                'message' => 'Veiculo não encontrado'
            ], 404);
        }

        $data = $this->veiculoRepository->update($request->all(), $id);

        return response()->json([
            'status' => 'success',
            'message' => 'Veiculo atualizado com sucesso!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $veiculo = $this->veiculoRepository->find($id);

        if(!$veiculo) {
            return response()->json([
                'status' => false,
                'message' => 'Veiculo não encontrado'
            ], 404);
        }

        $data = $this->veiculoRepository->delete($id);

        return response()->json([
            "status" => "success",
            "message" => "Veiculo excluido com sucesso!"
        ]);
    }
}
