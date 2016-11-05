<?php namespace resaca;

use Illuminate\Database\Eloquent\Model;

class elementos extends Model {

	protected $table = 'elementos';


// nombrar id tipo_documentos

	public function tipo_documentosid()
	{
		return $this->belongsTo('tipo_documentos','tipo_documento_id');
	}

	
}
