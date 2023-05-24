<?php

namespace App\Models;

use App\Services\Pesquisa\PerguntasService;
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
        $perguntasSRVC = new PerguntasService();
        $perguntasSRVC->insert_batch_pergunta($allRows);
    }
    
    public function mostrar_pesquisa()
    {

        $usuariosResposta = $this->select('fk_user')->where('fk_user', 2)->find();
        if (empty($usuariosResposta)) {
            return true;
        } else {
            return false;
        }
    }
    
}

?>