
<!--chamando a pagina home do adminlte-->
@extends('adminlte::page')

<!--trocando o titulo da home-->
@section('title','home')

<!--inserindo informações no cabeçalho do corpo da pagina-->
@section('content_header')
    <h1 style="text-align: center"><strong>Bem - vindo!</strong></h1>
    <!--o modelo de rota abaixo só pode ser usado, devido a nomeação da rota-->
    <a href="{{route('tarefas.add')}}" class="btn btn-sm btn-success">Adicionar Nova Tarefa</a>
@endsection

<!--inserindo conteudo no corpo da pagina-->
@section('content')
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>TAREFA</th>
            <th>AÇÕES</th>
        </tr>
        @foreach($list as $item)
            <tr>
                <td>{{$item->id_tb1_tarefas}}</td>
                <td>{{$item->titulo}}</td>
                <td>
                <a href="{{route('tarefas.edit',['id_tb1_tarefas'=>$item->id_tb1_tarefas])}}" class="btn btn-sm btn-info">Editar</a>
                <a href="{{route('tarefas.del',['id_tb1_tarefas'=>$item->id_tb1_tarefas])}}" class="btn btn-sm btn-danger" onclick="return confirm('Tem Certeza QUe Desejar Excluir ?')">Excluir</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection