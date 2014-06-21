@extends('layouts.layout')
@section('main')
<div class="jumbotron">
    <h1>Olá {{Auth::user()->nome}} <br><small>Esta é sua agenda pessoal!</small></h1>
    <p>Você pode navegar pelo sistema através do menu acima ou utilizar os atalhos abaixo.</p>
    <p>
        <a href="{{ URL::route('new_contato') }}" class="btn btn-primary">Adicionar um contato</a>
        <a href="{{ URL::route('new_compromisso') }}" class="btn btn-info">Adicionar um compromisso</a>
        <a href="{{ URL::route('logout') }}"  class="btn btn-warning pull-right">Sair</a>
    </p>
</div>
@stop