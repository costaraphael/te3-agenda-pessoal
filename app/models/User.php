<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    protected $guarded = array();

    public static $rulesCreate = array(
        'nome' => 'required',
        'login' => 'required|unique:users',
        'password' => 'required|same:confirm-password',
        'change-password' => 'same:confirm-password'
    );

    public static $rulesUpdate = array(
        'nome' => 'required',
        'change-password' => 'same:confirm-password'
    );

    public static $messages = array(
        'password.required' => 'O campo Senha é obrigatório.',
        'password.same' => 'Os campos Senha e Confirmar Senha devem ser iguais.',
        'change-password.same' => 'Os campos Senha e Confirmar Senha devem ser iguais.',
    );

}
