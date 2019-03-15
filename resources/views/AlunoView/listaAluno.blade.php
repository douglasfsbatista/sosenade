@extends('layouts.default')
@section('content')
    
    <div class="shadow p-4 mb-5 bg-white rounded container-fluid" style="overflow-x: auto;">
		
		<h1 class="text-center">Alunos Cadastrados</h1>
		<h2 class="text-center">{{$nome_curso}}</h2><br>
		<table class="table table-hover">
	 		<thead>
				<tr>
					<th>Nome</th>
					<th>CPF</th>
					<th>E-mail</th>
					<th>Funções</th>
				</tr>
			</thead>
			<tbody>
				@foreach($alunos as $aluno)
					<tr>
						<td>{{$aluno->nome}}</td>
						<td>{{$aluno->cpf}}</td>
						<td>{{$aluno->email}}</td>
						<td> 
							<a href="{{route('edit_aluno', ['id' => $aluno->id])}}">Editar</a> - <a href="{{route('delete_aluno', ['id' => $aluno->id])}}">Remover</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
		<div class="col-md-12 text-center">
			<br><a class="btn btn-primary" href="{{route('new_aluno')}}"> Inserir novo </a><br>
		</div>

	</div>
	
@stop