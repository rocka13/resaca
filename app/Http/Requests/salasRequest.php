<?php namespace resaca\Http\Requests;

use resaca\Http\Requests\Request;

class salasRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'nombre'=>'required',
			'id_aula_ryca'=>'required',
		];
	}

}
