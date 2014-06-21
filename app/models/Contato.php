<?php

class Contato extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nome' => 'required',
		'telefone' => 'required' 
	);

    public static $messages = array(
        'user_id.required'=>'O campo usuário é obrigatório.',
    );
}
