<?php


Route::get('/inicio', array('as' => 'home', 'before' => 'auth', function () {
    return View::make('index');
}));

Route::get('/',
    array('as' => 'login', 'uses' => 'LoginController@login'));

Route::post('/',
    array('as' => 'logar', 'uses' => 'LoginController@logar'));

Route::get('/logout',
    array('as' => 'logout', 'before' => 'auth', 'uses' => 'LoginController@logout'));

Route::get('/perfil',
    array('as' => 'perfil', 'before' => 'auth', 'uses' => 'UsersController@perfil'));

Route::post('/perfil',
    array('as' => 'update_perfil', 'before' => 'auth', 'uses' => 'UsersController@updatePerfil'));

function htmlResource($resources, $controller, $filter)
{
    $resource = str_singular($resources);

    Route::get($resources,
        array('as' => $resources, 'before' => $filter, 'uses' => $controller . '@index'));
    Route::get($resources . '/novo',
        array('as' => 'new_' . $resource, 'before' => $filter, 'uses' => $controller . '@create'));
    Route::get($resources . '/{id}',
        array('as' => $resource, 'before' => $filter, 'uses' => $controller . '@show'));
    Route::post($resources,
        array('as' => 'create_' . $resource, 'before' => $filter, 'uses' => $controller . '@store'));
    Route::get($resources . '/{id}/editar',
        array('as' => 'edit_' . $resource, 'before' => $filter, 'uses' => $controller . '@edit'));
    Route::patch($resources . '/{id}',
        array('as' => 'update_' . $resource, 'before' => $filter, 'uses' => $controller . '@update'));
    Route::delete($resources . '/{id}/delete',
        array('as' => 'delete_' . $resource, 'before' => $filter, 'uses' => $controller . '@destroy'));
}

htmlResource('contatos', 'ContatosController', 'auth');

htmlResource('usuarios', 'UsersController', 'admin');

htmlResource('compromissos', 'CompromissosController', 'auth');