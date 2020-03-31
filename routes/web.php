<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

//grupo de rotas
Route::prefix('/tarefas')->group(function(){

    //rota para listagens das tarefas, foi adicionado a pasta adminTarefa na rota,pois o  controller TarefaController está dentro desta pasta adminTarefa. Ao acessar esta rota é chamado a pasta raiz ou principal da projeto
    Route::get('/','adminTarefasController\TarefaController@list')->name('tarefas.list');
    
   //rota que chama o formulario para inserir os dados. Foi adicionado a pasta adminTarefa na rota,pois o  controller TarefaController está dentro desta pasta adminTarefa.
   Route::get('add','adminTarefasController\TarefaController@add')->name('tarefas.add');//nomeando rota, qd se trabalha com grupo passa-se o nome do grupo e a rota. Ao se nomear uma rota pode-se fazer redirecionamanto, captura de rotas...
   //rota que recebe os dados após inserido no formulario. Foi adicionado a pasta adminTarefa na rota,pois o  controller TarefaController está dentro desta pasta adminTarefa.
   Route ::post('add','adminTarefasController\TarefaController@addAction');

   //rota que chama o formulario para edição dos dados. Foi adicionado a pasta adminTarefa na rota,pois o  controller TarefaController está dentro desta pasta adminTarefa.
   Route::get('edit/{id_tb1_tarefas}','adminTarefasController\TarefaController@edit')->name('tarefas.edit');
   //rota que recebe os dados editados no formulario. Foi adicionado a pasta adminTarefa na rota,pois o  controller TarefaController está dentro desta pasta adminTarefa.
   Route::post('edit/{id_tb1_tarefas}','adminTarefasController\TarefaController@editAction');

   //rota para exclusao dos dados. Foi adicionado a pasta adminTarefa na rota,pois o  controller TarefaController está dentro desta pasta adminTarefa.
   Route::get('delete/{id_tb1_tarefas}','adminTarefasController\TarefaController@del')->name('tarefas.del');

   //rotas para saber se a tarefa foi ou nao resolvida. Foi adicionado a pasta adminTarefa na rota,pois o  controller TarefaController está dentro desta pasta adminTarefa.
   Route::get('marcar/{id_tb1_tarefas}','adminTarefasController\TarefaController@done')->name('tarefas.done');

   /*
    Esta rota sempre é criada para substituir a pagina 404 padrao do laravel, criando esta rota 
    pode-se enviar o usuario para uma view criada pelo proprio programador, então todas as vezes
    que o usuário tentar acessar uma url(rota) que não existe, este será redirecionado para esta view

    OBS: esta rota deve ficar de preferencia no final das rotas
    */
   Route::fallback(function(){
       return view('adminTarefasView.404');
   });

});

