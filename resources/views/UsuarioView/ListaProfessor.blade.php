@extends('layouts.default')
@section('content')
    
    <div class="shadow p-4 mb-5 bg-white rounded container-fluid" style="overflow-x: auto;">
		
		<h1 class="text-center">Professores Cadastrados</h1>
		<h2 class="text-center">
			@if (Auth::guard('aluno')->user())
				{{Auth::guard('aluno')->user()->curso->curso_nome}}
			@elseif (Auth::user())
				{{Auth::user()->curso->curso_nome}}
			@endif
		</h2><br>
		
		<table class="table table-hover">
	 		<thead>
				<tr>
					<th>Nome</th>
					<th>CPF</th>
					<th>E-mail</th>
					<th style="width: 10%">Opções</th>
				</tr>
			</thead>
			<tbody>
				@foreach($usuarios as $usuario)
					<tr>
						<td>{{$usuario->nome}}</td>
						<td>{{$usuario->cpf}}</td>
						<td>{{$usuario->email}}</td>
						<td class="btn-group">
							<a href="{{route('edit_professor',['id'=>$usuario->id])}}" class="btn btn-sm btn-primary">Editar</a>
							<a href="{{route('delete_professor',['id'=>$usuario->id])}}" class="btn btn-sm btn-danger">Remover</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<div class="form-group justify-content-center row">
			{{$usuarios->links()}}
		</div>

		<div class="col-md-12 text-center">
			<br><a class="btn btn-primary" href="{{route('new_professor')}}"> Inserir novo </a><br>
		</div>
		
	</div>

@stop