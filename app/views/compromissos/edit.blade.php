@extends('layouts.layout')

@section('main')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2 style="margin-top: 10px;">Editar Compromisso
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

        {{ Form::model($compromisso, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('update_compromisso', $compromisso->id))) }}
        <div class="form-group">
            {{ Form::label('titulo', 'Titulo:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::text('titulo', Input::old('titulo'), array('class'=>'form-control', 'placeholder'=>'Titulo'))
                }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('data_ini', 'Data inicial do evento:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-3">
                {{ Form::input('datetime-local','data_ini', Input::old('data_ini'), array('class'=>'form-control',
                'placeholder'=>'Data_ini')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('data_fim', 'Data final do evento:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-3">
                {{ Form::input('datetime-local','data_fim', Input::old('data_fim'), array('class'=>'form-control',
                'placeholder'=>'Data_fim')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('descricao', 'Descricao:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::textarea('descricao', Input::old('descricao'), array('class'=>'form-control',
                'placeholder'=>'Descricao')) }}
            </div>
        </div>

    </div>
    <div class="panel-footer">
        <div class="form-group" style="margin: 0px 10px">
            <div class="row">
                <div class="pull-right">
                    {{ link_to_route('compromissos', 'Voltar', null, array('class' => 'btn btn-default',
                    'style'=>'margin-right: 5px')) }}
                    {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>
@stop