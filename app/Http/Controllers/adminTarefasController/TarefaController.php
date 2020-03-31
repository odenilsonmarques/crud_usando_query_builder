<?php
//foi implemenado nesta rota a pasta adminTarefas, pois o controller TarefaController está dentro da pasta adminTarefas que está dentro da pasta controller
namespace App\Http\Controllers\adminTarefasController;

//importando a classe controller
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

//importando configuração para usar o banco de dados
use Illuminate\Support\Facades\DB;

class TarefaController extends Controller
{
    public function list(){
        //consulta para exibir todos os dados 
        $list = DB::select('SELECT * FROM tb1_tarefas');
        //passando a $list acima atraves de earray, para carregar na view
        return view ('adminTarefasView.list',['list'=>$list]);
        
    }

    public function add(){
        return view ('adminTarefasView.add');
    }

    public function addAction(Request $request){

            //validando os campos com regras do próprio laravel. Caso dê algum erro nessa parte a aplicação ja é parada 
            $request->validate([
                //o campo  é obrigatorio(required) e o tipo é string
                'titulo'=>['required','string']
            ]);
        
            //armazenando o valor em uma variavel, porem não é preciso
            $titulo = $request->input('titulo');

            DB::insert('INSERT INTO tb1_tarefas (titulo) VALUES (:titulo)',['titulo'=>$titulo]);
            //esse redirect so é possivel, devido a nomeação da rota
            return redirect()->route('tarefas.list');
    }
    //recebendo o id no parametro abaixo. Lembrar que este está sendo passado na rota
    public function edit($id_tb1_tarefas){
        //recebendo os dados para carregar na view
        $data = DB::select('SELECT * FROM tb1_tarefas WHERE id_tb1_tarefas =:id_tb1_tarefas',['id_tb1_tarefas'=>$id_tb1_tarefas]);
        //verificando se foi recebido algum dado  
        if(count($data) > 0){
            //caso seja passado algum dado é capturado o item na posição zero
            return view ('adminTarefasView.edit',['data'=>$data[0]]);
        }else{
            return redirect()->route('tarefas.list');
            
        }
    }
    //recebndo dados alterarados
    public function editAction(Request $request, $id_tb1_tarefas){
        //verificando se o campo foi preenchido 
        if($request->filled('titulo')){
            $titulo = $request->input('titulo');
            DB::update('UPDATE tb1_tarefas SET titulo =:titulo WHERE id_tb1_tarefas =:id_tb1_tarefas',['id_tb1_tarefas' =>$id_tb1_tarefas, 'titulo' =>$titulo]);
            return redirect()->route('tarefas.list');
        }else{
            return redirect()->route('tarefas.edit',['id_tb1_tarefas'=>$id_tb1_tarefas])->with('warning','você não preencheu o campo titulo');
        }
    }
    //recebendo o id a ser excluido
    public function del($id_tb1_tarefas){
        DB::delete('DELETE FROM tb1_tarefas WHERE id_tb1_tarefas =:id_tb1_tarefas',['id_tb1_tarefas'=>$id_tb1_tarefas]);
        return redirect()->route('tarefas.list');
    }

    public function done($id_tb1_tarefas){
        DB::update('UPDATE tb1_tarefas SET resolvido = 1 - resolvido WHERE id_tb1_tarefas =:id_tb1_tarefas',['id_tb1_tarefas'=>$id_tb1_tarefas]);
        return redirect()->route('tarefas.list');
    }
}
