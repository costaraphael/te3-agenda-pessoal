@extends('layouts.layout')

@section('main')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2 style="margin-top: 10px;">
            {{$compromisso->titulo}}
            <div class="pull-right">
                {{ link_to_route('edit_compromisso', 'Editar', array($compromisso->id), array('class' => 'btn btn-primary', 'style' => 'margin-top: -5px')) }}
                {{ link_to_route('compromissos', 'Voltar aos compromissos', null, array('class' => 'btn btn-info', 'style' => 'margin-top: -5px')) }}
            </div>
        </h2>
    </div>
    <div class="panel-body">

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Início</th>
                <th>Fim</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>{{date('d/m/Y à\s G:i',strtotime($compromisso->data_ini)) }}</td>
                @if($compromisso->data_fim)
                <td>{{date('d/m/Y à\s G:i',strtotime($compromisso->data_fim)) }}</td>
                @else
                <td>--</td>
                @endif
            </tr>
            </tbody>
        </table>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong> Descrição</strong>
            </div>
            <div class="panel-body">
                {{$compromisso->descricao}}
            </div>
        </div>
    </div>
</div>
@stop
