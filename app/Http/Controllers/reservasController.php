<?php namespace resaca\Http\Controllers;

use resaca\Http\Requests;
use resaca\Http\Requests\reservasRequest;
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
	public function Misreservas($id)
	{
		$reservas = \DB::table('reservas_salas')
					->select('usuarios.nombres as nom_user','usuarios.apellidos as ape_user','salas.nombre as sala','reservas_salas.*')
					->join('usuarios', 'reservas_salas.usuario_id', '=', 'usuarios.id')
					->join('salas', 'reservas_salas.sala_id', '=', 'salas.id')
					->where('usuario_id', '=', $id)
					->get();

		return view('mis_reservas.index')->with('reservas', $reservas);

	}		



	public function confirmar($id)
	{
		$reservas = reservas_salas::find($id);
		$reservas->confirmar = 1;
        $reservas->save();
        return redirect()->route('reservas.index')->with('message','La Reserva se ha Confirmado');
	}



	public function DiferenciasHoras($age, $mes, $dia, $aula)
	{
	//----------------------------------------inicio--------------------------------
		$inicio = reservas_salas::where('fecha_servicio', '=', $age.'/'.$mes.'/'.$dia)
							 ->where('sala_id', '=', $aula)
							 ->get()->map(function ($record) {
	    	$hora_inicio = carbon::createFromFormat('H:i:s', $record->hora_inicio);
	        $hora_final = carbon::createFromFormat('H:i:s', $record->hora_final);
	        return [$hora_inicio->toTimeString(), $hora_final->toTimeString()];        
	    });
	//----------------------------------------final--------------------------------

		$final = reservas_salas::where('fecha_servicio', '=', $age.'/'.$mes.'/'.$dia)
							 ->where('sala_id', '=', $aula)
							 ->get()->map(function ($record) {
	        $horainicio = carbon::createFromFormat('H:i:s', $record->hora_inicio)->addHours(1);
	        $horafinal = carbon::createFromFormat('H:i:s', $record->hora_final)->addHours(1);;
	        return  [$horainicio->toTimeString(), $horafinal->toTimeString()];        
	    });
	//_____________________________return final________________________________________
		
			$data = ['inicio' => $inicio, 'final' => $final];
			 return response()->json([$data]);
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
		$salas = salas::all();
		return view('reservas_salas.create', compact('usuarios', 'salas'));
	}

	/**d
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(reservasRequest $request)
	{
		$date = Carbon::now();
		$date = $date->format('Y-m-d');
		$reservas = new reservas_salas;
		$reservas->usuario_id = $request->input('usuario_id');
        $reservas->sala_id = $request->input('sala_id');
 		$reservas->fecha_registro = $date;
 		$reservas->detalle_reserva = $request->input('detalle_reserva');
        $reservas->fecha_servicio = $request->input('fecha_servicio');
        $reservas->hora_inicio = $request->input('hora_inicio');
        $reservas->hora_final = $request->input('hora_final');
        $reservas->save();

        return redirect()->route('reservas.index')->with('message','La Reserva se creo Correctamente');
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
	public function update(reservasRequest $request, $id)
	{
		$reservas = reservas_salas::find($id);
		$reservas->usuario_id = $request->input('usuario_id');
        $reservas->sala_id = $request->input('sala_id');
        $reservas->detalle_reserva = $request->input('detalle_reserva');
        $reservas->fecha_servicio = $request->input('fecha_servicio');
        $reservas->hora_inicio = $request->input('hora_inicio');
        $reservas->hora_final = $request->input('hora_final');
        $reservas->save();
        return redirect()->route('reservas.index')->with('message','La Reserva se edito Correctamente');
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
        return redirect()->route('reservas.index')->with('message','La Reserva se Elimino Correctamente');;
	}

}
