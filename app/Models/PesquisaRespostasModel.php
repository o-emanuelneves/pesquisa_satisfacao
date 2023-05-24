<?php

namespace App\Models;


use App\Services\Pesquisa\RespostasService;
use CodeIgniter\Model;
 
class PesquisaRespostasModel extends Model{
    protected $table = 'pesquisa_respostas';
    protected $primaryKey = 'id_resposta';
    protected $allowedFields = [
        'id_resposta',
        'fk_pesquisa',
        'fk_user',
        'fk_pergunta',
        'resposta',
    ];

    protected $useSoftDeletes = true;

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function set_respostas($dados) {

        $allRows = array_map(
            function($respostas, $keys) use($dados) {
                return [
                    'resposta' => $respostas,
                    'fk_pergunta' => $keys,
                    'fk_pesquisa'=> $dados['pesquisa']['fk_pesquisa'],
                    'fk_user' => $dados['pesquisa']['fk_user'],
                ];
            }, 
            $dados['respostas'], 
            array_keys($dados['respostas'])
        );
        
        $this->insertBatch($allRows);
    }
    
    public function mostrar_pesquisa()
    {

<<<<<<< HEAD
        $usuariosResposta = $this->select('fk_user')->where('fk_user', 5)->find();

        return empty($usuariosResposta);
=======
        $usuariosResposta = $this->select('fk_user')->where('fk_user', 6)->find();
        if (empty($usuariosResposta)) {
            return true;
        } else {
            return false;
        }
>>>>>>> origin/emanuel-v8
    }

    public function acesso(){
        $respostasSRVC = new RespostasService();
        $dia = $respostasSRVC->__construct();
        $mostrar_pesquisa = $this->mostrar_pesquisa();
        
        if ($dia <= 10 and $mostrar_pesquisa) {
            echo json_encode(['mensagem' => "Responda a pesquisa mensal!"]);
            
        } 
        else if ($dia <= 10 and $mostrar_pesquisa== false){
            echo json_encode(['mensagem' => "Você já respondeu a pesquisa esse mês!"]);
            header("Refresh: 2; URL=./index");

        }
        else {
            echo json_encode(['mensagem' => "A pesquisa expirou!"]);
            header("Refresh: 2; URL=./index");            
        }

    }
    
}

?>