<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Veiculo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $veiculo = Veiculo::create($request->all());

        return $veiculo;
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
