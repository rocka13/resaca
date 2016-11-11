<?php namespace resaca\Http\Controllers;

use resaca\Http\Requests;
use resaca\Http\Controllers\Controller;
use resaca\salas;
use resaca\reservas_salas;
use resaca\usuarios;
use Illuminate\Http\Request;

class reservasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
public function buscar(Request $request)
	{
		dd($request);
		return view('reservas_salas.create', compact('usuarios'));
	}

	public function index()
	{
		$reservas = \DB::table('reservas_salas')
					->select('usuarios.nombres as nom_user','usuarios.apellidos as ape_user','salas.nombre as sala','reservas_salas.*')
					->join('usuarios', 'reservas_salas.usuario_id', '=', 'usuarios.id')
					->join('salas', 'reservas_salas.sala_id', '=', 'salas.id')
					->get();
		return view('reservas_salas.index')->with('reservas', $reservas);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$usuarios = usuarios::all();
		return view('reservas_salas.create', compact('usuarios'));
	}

	/**d
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$reservas = new reservas_salas;
		$elementos->usuario_id = $request->input('usuario_id');
        $elementos->descripcion = $request->input('descripcion');
        $elementos->tipo_elemento_id = $request->input('tipo_elemento_id');
        $elementos->save();
        return redirect()->route('elementos.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
