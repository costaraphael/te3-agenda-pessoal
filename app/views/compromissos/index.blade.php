@extends('layouts.layout')

@section('main')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 style="margin-top: 10px;">Compromissos
            <div class="pull-right">
                {{ link_to_route('new_compromisso', 'Novo Compromisso', null, array('class' => 'btn btn-success', 'style' => 'margin-top: -5px')) }}
            </div>
        </h2>
    </div>
    <div class="panel-body">

        @if ($compromissos->count())
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Titulo</th>
                <th>Início</th>
                <th>Fim</th>
                <th width="1" class="text-center"><i class="fa fa-cogs"></i></th>
            </tr>
            </thead>

            <tbody>
            @foreach ($compromissos as $compromisso)
            <tr>
                <td>
                    {{ link_to_route('compromisso', $compromisso->titulo, array($compromisso->id)) }}
                </td>
                <td>
                    {{date('d/m/Y á\s G:i',strtotime($compromisso->data_ini))}}
                </td>
                <td>
                    {{date('d/m/Y á\s G:i',strtotime($compromisso->data_fim))}}
                </td>
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
                                {{ Form::open(array('method' => 'DELETE', 'route' => array('delete_compromisso',
                                $compromisso->id))) }}
                                {{ Form::close() }}
                            </li>
                            <li>
                                <a href="{{ URL::route('edit_compromisso', $compromisso->id) }}"><i class="fa fa-edit"></i> Editar</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @else
    Não há compromissos cadastrados.
    @endif
</div>
@stop
