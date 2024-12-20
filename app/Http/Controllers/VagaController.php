<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Vaga::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vaga = Vaga::create($request->all());

        return $vaga;
    }

    /**
     * Display the specified resource.
     */
    public function show(Vaga $vaga)
    {
        return $vaga;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vaga $vaga)
    {
        $vaga->update($request->all());

        return $vaga;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vaga $vaga)
    {
        $vaga->delete();

        return $vaga;
    }
}
