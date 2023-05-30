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
        $session = session();
        $id_user = intval($session->get('id_user'));
    
        $usuariosResposta = $this->select('fk_user')->where('fk_user', $id_user)->find();

        return empty($usuariosResposta);
    }

    // public function acesso(){
    //     $respostasSRVC = new RespostasService();
    //     $dia = $respostasSRVC->__construct();
    //     $mostrar_pesquisa = $this->mostrar_pesquisa();
        
    //     // if ($dia <= 10 and $mostrar_pesquisa) {
    //     //     echo json_encode(['mensagem' => "Responda a pesquisa mensal!"]);
            
    //     // } 
    //     // else if ($dia <= 10 and $mostrar_pesquisa== false){
    //     //     echo json_encode(['mensagem' => "Você já respondeu a pesquisa esse mês!"]);
    //     //     header("Refresh: 2; URL=./../");

    //     // }
    //     // else {
    //     //     echo json_encode(['mensagem' => "A pesquisa expirou!"]);
    //     //     header("Refresh: 2; URL=./../index");            
    //     // }

    //     //  Se, antes do dia 10: Responda a pesquisa mensal.
    //     //  Se, depois do dia 10: Responda a pesquisa mensal para ter acesso ao sistema.
    // }
    
}

?>