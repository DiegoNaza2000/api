<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\usuario;
use App\Http\Requests\guardarusuariorequest;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = usuario::all();
        return $usuario;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(guardarusuariorequest $request)
    {
      usuario::create($request->all());
      return response()->json([
        'res' => true,
        'msg' => 'Usuario Guardado'
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = usuario::find($id);
        return $usuario;
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
        $usuario = usuario::findOrFail($request->id);
        $usuario->credencial = $request->credencial;
        $usuario->nombre = $request->nombre;
        $usuario->foto = $request->foto;

        $usuario->save();
        return $usuario;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = usuario::destroy($id);
        return $usuario;
    }
}
