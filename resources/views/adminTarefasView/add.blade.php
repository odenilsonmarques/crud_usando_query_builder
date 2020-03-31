
<!--chamando a pagina home do adminlte-->
@extends('adminlte::page')

<!--trocando o titulo da home-->
@section('title','adiciona usuario')

<!--inserindo informações no cabeçalho do corpo da pagina-->
@section('content_header')
    <h1 style="text-align: center"><strong>Bem - Vindo!</strong></h1>
    <!--o modelo de rota abaixo só pode ser usado, devido a nomeação da rota-->
    <a href="{{route('tarefas.list')}}" class="btn btn-sm btn-success">Cancelar Cadastro</a>
    @endsection

<!--inserindo conteudo no corpo da pagina-->
@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <div class="card-title">Formulário de Cadastro</div>
        </div><br>

        @if($errors->any())
            <ul>
                <h3>Ocorreu um Erro</h3>
                @foreach($errors->all() as $error)
                <li>
                    {{$error}}<br/><br/>
                </li>
                @endforeach    
            </ul>
        @endif

    <form role="form" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="titulo">TITULO</label><br>
                <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Informe o Titulo"><br>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>
@endsection