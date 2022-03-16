<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['usuarios']=Usuario::paginate(4);
        return view('usuario.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.insertar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosUsuario = request()->all();
        $datosUsuario = request()->except('_token');

        if($request->hasFile('foto')){
            $datosUsuario['foto']=$request->file('foto')->store('uploads','public');

        }
        Usuario::insert($datosUsuario);

        return redirect('usuario')->with('mensaje','Usuario creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=Usuario::findOrFail($id);
        return view('usuario.editar', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosUsuario = request()->except(['_token','_method']);

        if($request->hasFile('foto')){
            $usuario=Usuario::findOrFail($id);
            Storage::delete('public/'.$usuario->foto);
            $datosUsuario['foto']=$request->file('foto')->store('uploads','public');

        }

        Usuario::where('id','=',$id)->update($datosUsuario);
        $usuario=Usuario::findOrFail($id);
        return view('usuario.editar', compact('usuario'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $usuario=Usuario::findOrFail($id);
        if(Storage::delete('public/'.$usuario->foto)){
            Usuario::destroy($id);
        }

        return redirect('usuario')->with('mensaje','Usuario eliminado con éxito');
    }
}
