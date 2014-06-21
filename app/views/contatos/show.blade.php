@extends('layouts.layout')

@section('main')

<h1>Show Contato</h1>

<p>{{ link_to_route('contatos.index', 'Return to All contatos', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nome</th>
				<th>Telefone</th>
				<th>User_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $contato->nome }}}</td>
					<td>{{{ $contato->telefone }}}</td>
					<td>{{{ $contato->user_id }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('contatos.destroy', $contato->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('contatos.edit', 'Edit', array($contato->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
