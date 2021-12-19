<?php

namespace App\Http\Controllers;
use App\Models\Departamento;
use App\Models\Empleado;
use App\Models\PuestoTrabajo;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $EmpleadoList = Empleado::all();
        $EmpleadoCount = count($EmpleadoList);
        $DepartamentoList = Departamento::all();
        $DepartamentoCount = count($DepartamentoList);
        $puestosList = PuestoTrabajo::all();
        $puestosCount = count($puestosList);
        if($DepartamentoCount == 0){
            return redirect('departamentos/create');
        }
        
        if($puestosCount == 0){
            return redirect('puestos/create');
        }
        
        if($EmpleadoCount == 0){
            return redirect('empleados/create');
        }else{
            $empleados = Empleado::all();
            return view('empleado.index', compact('empleados'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'nombre' => 'required|max:255',
            'telefono' => 'required|max:255',
            'email' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'fecha_contratacion' => 'required|date',
            'departamento_id' => 'required',
            'puesto_trabajo_id' => 'required',
        ]);
        
        $empleado = Empleado::create($storeData);
        return redirect('/empleados')->with('completado', 'Empleado guardado!');
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
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
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
            'nombre' => 'required|max:255',
            'telefono' => 'required|max:255',
            'email' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'fecha_contratacion' => 'required|date',
            'departamento_id' => 'required',
            'puesto_trabajo_id' => 'required',
        ]);
        Empleado::whereId($id)->update($updateData);
        return redirect('/empleados')->with('Completado', 'Empleado modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        
        $empleado->delete();
        return redirect('/empleados');
    }
}
