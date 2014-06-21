@extends('layouts.layout')

@section('main')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2 style="margin-top: 10px;">
            Alterar Dados
        </h2>
    </div>
    <div class="panel-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                {{ implode('', $errors->all('
                <li class="error">:message</li>
                ')) }}
            </ul>
        </div>
        @endif

        {{ Form::model($user, array('route' => 'update_perfil', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('nome', 'Nome:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::text('nome', Input::old('nome'), array('class'=>'form-control')) }}
            </div>
        </div>
        <hr>
        <div class="form-group">
            {{ Form::label('change-password', 'Alterar Senha:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10 col-md-6 col-lg-4">

                {{ Form::input('password', 'change-password', null, array('class'=>'form-control'))
                }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Confirmar Nova Senha:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10 col-md-6 col-lg-4">

                {{ Form::input('password', 'confirm-password', null, array('class'=>'form-control'))
                }}
            </div>
        </div>
    </div>


    <div class="panel-footer">
        <div class="form-group" style="margin: 0px 10px">
            <div class="row">
                <div class="pull-right">
                    {{ link_to_route('usuarios', 'Voltar', null, array('class' => 'btn btn-default',
                    'style'=>'margin-right: 5px')) }}
                    {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>
@stop
