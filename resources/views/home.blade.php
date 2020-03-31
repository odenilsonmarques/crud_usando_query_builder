<!--chamando a pagina home do adminlte-->
@extends('adminlte::page')

<!--trocando o titulo da home-->
@section('title','home')

<!--inserindo informações no cabeçalho do corpo da pagina-->
@section('content_header')
    
@endsection

<!--inserindo conteudo no corpo da pagina-->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="small-box bg-aqua bg-aqua text-center bg-warning text-white">
                <div class="inner">
                    <a href="{{route('tarefas.list')}}" style="color:white">
                    <h3>Listar Usuários</h3><br>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="small-box bg-aqua bg-aqua text-center bg-success text-white">
                <div class="inner">
                    <a href="{{route('tarefas.add')}}" style="color:white">
                    <h3>Adicionar Usuário</h3><br>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
