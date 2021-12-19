<?php

namespace App\Http\Controllers;
use App\Models\PuestoTrabajo;
use Illuminate\Http\Request;

class PuestoTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puestos = PuestoTrabajo::all();
        return view('puestos.index', compact('puestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('puestos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // nombrepuesto', 'salariomin', 'salariomax
        $storeData = $request->validate([
            'nombrepuesto' => 'required|max:255',
            'salariomin' => 'required',
            'salariomax' => 'required'
        ]);
        
        $puesto = PuestoTrabajo::create($storeData);
        return redirect('/puestos')->with('completado', 'Puesto guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puesto = PuestoTrabajo::findOrFail($id);
        return view('puestos.edit', compact('puesto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'nombrepuesto' => 'required|max:255',
            'salariomin' => 'required',
            'salariomax' => 'required'
        ]);
        PuestoTrabajo::whereId($id)->update($updateData);
        return redirect('/puestos')->with('Completado', 'Puesto trabajo modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $puesto = PuestoTrabajo::find($id);
        
        $puesto->delete();
        return redirect('/puestos');
    }
}
