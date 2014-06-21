<?php

class Compromisso extends Eloquent {
	protected $guarded = array();

	public static $rulesCreate = array(
		'data_fim' => 'required',
		'data_ini' => 'required',
		'descricao' => 'required',
		'titulo' => 'required'
	);
    public static $rulesUpdate = array(
        'data_fim' => 'required',
        'data_ini' => 'required',
        'descricao' => 'required',
        'titulo' => 'required'
    );
}
