<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;
use App\Http\Repository\VeiculoRepository;

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
        return $this->veiculoRepository->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->veiculoRepository->store($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Veiculo $veiculo)
    {
        return $veiculo;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Veiculo $veiculo)
    {
        $veiculo->update($request->all());

        return $veiculo;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();

        return $veiculo;
    }
}
