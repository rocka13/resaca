<?php

namespace resaca\Http\Controllers;

use Illuminate\Http\Request;
use resaca\salas;
use resaca\reservas_salas;
use resaca\Http\Requests;
use resaca\Http\Requests\reservasRequest;
use resaca\Http\Controllers\Controller;
use Carbon\Carbon;

class UserReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Misreservas($id)
    {
        $reservas = \DB::table('reservas_salas')
                    ->select('usuarios.nombres as nom_user','usuarios.apellidos as ape_user','salas.nombre as sala','reservas_salas.*')
                    ->join('usuarios', 'reservas_salas.usuario_id', '=', 'usuarios.id')
                    ->join('salas', 'reservas_salas.sala_id', '=', 'salas.id')
                    ->where('usuario_id', '=', $id)
                    ->get();

        return view('user_reservas.index')->with('reservas', $reservas);

    }       

    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salas = salas::all();
        return view('user_reservas.create', compact('salas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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

        return redirect('usuario/misreservas/'.$reservas->usuario_id)->with('message','La Reserva se creo Correctamente');
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
       $sala = \DB::table('reservas_salas')
                    ->select('salas.nombre','reservas_salas.sala_id')
                    ->join('salas', 'reservas_salas.sala_id', '=', 'salas.id')
                    ->where('reservas_salas.id', '=', $id)
                    ->get();

        $salas = salas::all();
        $reservas =reservas_salas::find($id);
        //dd($reservas);
        return view('user_reservas.edit', compact('salas', 'sala'))->with('reservas',$reservas);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(reservasRequest $request, $id)
    {
        $reservas = reservas_salas::find($id);
        $reservas->sala_id = $request->input('sala_id');
        $reservas->detalle_reserva = $request->input('detalle_reserva');
        $reservas->fecha_servicio = $request->input('fecha_servicio');
        $reservas->hora_inicio = $request->input('hora_inicio');
        $reservas->hora_final = $request->input('hora_final');
        $reservas->save();
        return redirect('usuario/misreservas/'.$reservas->usuario_id)->with('message','La Reserva se edito Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservas = reservas_salas::find($id);
        $reservas->delete();
         return redirect('usuario/misreservas/'.$reservas->usuario_id)->with('message','La Reserva se Elimino Correctamente');
    }
}
