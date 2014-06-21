@extends('layouts.layout')

@section('main')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 style="margin-top: 10px;">Usuários
            <div class="pull-right">
                {{ link_to_route('new_usuario', 'Novo Usuário', null, array('class' => 'btn btn-success', 'style' =>
                'margin-top: -5px')) }}
            </div>
        </h2>
    </div>
    <div class="panel-body">
        @if ($users->count())
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Login</th>
                <th>Nome</th>
                <th width="1" class="text-center"><i class="fa fa-cogs"></i></th>
            </tr>
            </thead>

            <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{{ $user->login }}}</td>
                <td>{{{ $user->nome }}}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle btn-xs btn-default" type="button" aria-labelledby="opcoes"
                                data-toggle="dropdown">
                            <i class="fa fa-cog"></i>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="opcoes">
                            <li>
                                <a href="javascript:void(0)" onclick="$(this).parents('li').find('form').submit()">
                                    <i class="fa fa-trash-o"></i> Apagar
                                </a>
                                {{ Form::open(array(
                                'method' => 'DELETE',
                                'route' => array('delete_usuario', $user->id)
                                )) }}
                                {{ Form::close() }}
                            </li>
                            <li>
                                <a href="{{ URL::route('edit_usuario', $user->id) }}"><i class="fa fa-edit"></i> Editar</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @else
        Não há usuários cadastrados.
        @endif

    </div>
</div>
@stop
