@extends('layouts.layout')

@section('main')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2 style="margin-top: 10px;"> Novo Contato </h2>
    </div>
    {{ Form::model($contato, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('update_contato', $contato->id))) }}
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

        <div class="form-group">
            {{ Form::label('nome', 'Nome:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::text('nome', Input::old('nome'), array('class'=>'form-control', 'placeholder'=>'Nome')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('telefone', 'Telefone:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::text('telefone', Input::old('telefone'), array('class'=>'form-control',
                'placeholder'=>'Telefone')) }}
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <div class="form-group" style="margin: 5px ">
            <div class="pull-right">
                {{ link_to_route('contatos', 'Voltar', null, array('class' => 'btn btn-default',
                'style'=>'margin-right: 5px')) }}
                {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
            </div>
        </div>
    </div>
    {{ Form::close() }}

</div>


@stop