<?php namespace resaca\Http\Controllers;

use resaca\Http\Requests;
use resaca\Http\Controllers\Controller;
use resaca\salas;
use resaca\reservas_salas;
use resaca\usuarios;
use Carbon\Carbon;
use Illuminate\Http\Request;

class reservasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	/*public function usuarios()
	{
	$usuarios = usuarios::all();
		return view('reservas_salas.usuarios', compact('usuarios'));
	}
		

	public function buscar(Request $request)
	{
		$usuario = $request->input('usuario');
		dd($request);
	}*/

	public function index()
	{
			$fecha= \DB::table('reservas_salas')
			->select('reservas_salas.hora_inicio')
			->where('reservas_salas.id', '=', 3)
			->get();
	
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
		$salas = salas::all();
		return view('reservas_salas.create', compact('usuarios', 'salas'));
	}

	/**d
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		$date = Carbon::now();
		$date = $date->format('Y-m-d');

		$reservas = new reservas_salas;
		$reservas->usuario_id = $request->input('usuario_id');
        $reservas->sala_id = $request->input('sala_id');
 		$reservas->fecha_registro = $date;
        $reservas->fecha_servicio = $request->input('fecha_servicio');
        $reservas->hora_inicio = $request->input('hora_inicio');
        $reservas->hora_final = $request->input('hora_final');
        $reservas->save();

        return redirect()->route('reservas.index');
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
		$sala = \DB::table('reservas_salas')
					->select('salas.nombre','reservas_salas.sala_id')
					->join('salas', 'reservas_salas.sala_id', '=', 'salas.id')
					->where('reservas_salas.id', '=', $id)
					->get();

		$usuario = \DB::table('reservas_salas')
					->select('usuarios.nombres', 'usuarios.apellidos','reservas_salas.usuario_id')
					->join('usuarios', 'reservas_salas.usuario_id', '=', 'usuarios.id')
					->where('reservas_salas.id', '=', $id)
					->get();

		$usuarios = usuarios::all();
		$salas = salas::all();
		$reservas =reservas_salas::find($id);
		//dd($reservas);
		return view('reservas_salas.edit', compact('usuarios', 'salas', 'usuario', 'sala'))->with('reservas',$reservas);;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{

		$reservas = reservas_salas::find($id);
		$reservas->usuario_id = $request->input('usuario_id');
        $reservas->sala_id = $request->input('sala_id');
        $reservas->fecha_servicio = $request->input('fecha_servicio');
        $reservas->hora_inicio = $request->input('hora_inicio');
        $reservas->hora_final = $request->input('hora_final');
        $reservas->save();
        return redirect()->route('reservas.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 $reservas = reservas_salas::find($id);
        $reservas->delete();
        return redirect()->route('reservas.index');
	}

}
