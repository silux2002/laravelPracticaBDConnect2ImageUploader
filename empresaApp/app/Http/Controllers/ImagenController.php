<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;
use File;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagenes = Imagen::all();
        return view('imagen.index', compact('imagenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imagen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
         'file' => 'required|image',
         'nombre' => 'required'
        ]);
 
        $name = $request->file('file')->getClientOriginalName();
        $extension = $request->file('file')->getClientOriginalExtension();
        $request->file('file')->move('myPhotos/',  $request->nombre . '.' . $extension);
 
        $save = new Imagen();
        $save->nombre = $request->nombre . '.' . $extension;
        $save->path = 'myPhotos/' . $request->nombre . '.' . $extension;
        $save->extension = $extension;
        $save->save();
        
        return redirect('/imagens')->with('status', 'File Has been uploaded successfully in laravel 8');
 
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
        $img = Imagen::findOrFail($id);
        return view('imagen.edit', compact('img'));
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
        ]);
        Imagen::whereId($id)->update($updateData);
        return redirect('/imagens')->with('Completado', 'Imagen modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = Imagen::find($id);
        File::delete($img->path);
        $img->delete();
        return redirect('/imagens');
    }
}
