<?php

namespace App\Models;
use CodeIgniter\Model;
 
class Pesquisa_RespostasModel extends Model{
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
    
    public function mostrarPesquisa()
    {
        $pesquisa_respostas_model = new Pesquisa_RespostasModel();
        $usuariosResposta = $pesquisa_respostas_model->select('fk_user')->where('fk_user', 2)->find();
        if (empty($usuariosResposta)) {
            return true;
        } else {
            return false;
        }
    }
    
}

?>