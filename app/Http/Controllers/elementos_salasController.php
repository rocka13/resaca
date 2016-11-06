<?php namespace resaca\Http\Controllers;

use resaca\Http\Requests;
use resaca\Http\Controllers\Controller;
use resaca\salas;
use resaca\elementos_salas;
use resaca\elementos;

use Illuminate\Http\Request;

class elementos_salasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		 $elementos_salas = \DB::table('elementos_salas')
					->select('elementos.nombre as elemento','salas.nombre as sala','elementos_salas.*')
					->join('elementos', 'elementos_salas.elemento_id', '=', 'elementos.id')
					->join('salas', 'elementos_salas.sala_id', '=', 'salas.id')
					->get();
       return view('elementos_salas.index')->with('elementos_salas', $elementos_salas);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$salas = salas::lists('nombre','id');
		$elementos = elementos::lists('nombre','id');
		return view('elementos_salas.create', compact('salas','elementos'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$elementos_salas = new elementos_salas;
		$elementos_salas->sala_id = $request->input('sala_id');
		$elementos_salas->elemento_id = $request->input('elemento_id');
		$elementos_salas->cantidad = $request->input('cantidad');
		$elementos_salas->save();

		return redirect()->route('elementos_salas.index');
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
		$salas = salas::lists('nombre','id');
		$elementos = elementos::lists('nombre','id');
		 $elementos_salas =elementos_salas::find($id);
       return view('elementos_salas.edit', compact('salas','elementos'))->with('elementos_salas',$elementos_salas);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$elementos_salas = elementos_salas::find($id);
		$elementos_salas->sala_id = $request->input('sala_id');
        $elementos_salas->elemento_id = $request->input('elemento_id');
        $elementos_salas->cantidad = $request->input('cantidad');
        $elementos_salas->save();
        return redirect()->route('elementos_salas.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$elementos_salas = elementos_salas::find($id);
        $elementos_salas->delete();
        return redirect()->route('elementos_salas.index');
	}

}
