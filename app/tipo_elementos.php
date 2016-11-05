<?php namespace resaca;

use Illuminate\Database\Eloquent\Model;

class tipo_elementos extends Model {

	protected $table = 'tipo_elementos';
// enviar id 
public function elementosid()
	{
		 return $this->hasmany('elementos','tipo_elemento_id');
	}

}
