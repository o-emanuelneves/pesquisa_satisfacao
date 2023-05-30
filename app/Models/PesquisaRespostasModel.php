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
        $usuario = $session->get('id_user');

        $pesquisa_model = new PesquisaPerguntasModel();
        $id_perguntas = $pesquisa_model->get_perguntas();
        $ids = array_column($id_perguntas, 'id_pergunta');

        $usuariosResposta = $this->select()
            ->where('fk_user', $usuario)
            ->whereIn('fk_pergunta', $ids)
            ->find();

        $respostasFaltantes = array_diff($ids, array_column($usuariosResposta, 'fk_pergunta'));

        return empty($respostasFaltantes);
    }

    public function verificacao_pesquisa()
    {
        $respostasSRVC = new RespostasService();
        $dia = $respostasSRVC->__construct();
        $mostrar_pesquisa = $this->mostrar_pesquisa();

        if ($dia <= 10) {
            if (!$mostrar_pesquisa) {
                echo json_encode(['mensagem' => "Responda a pesquisa mensal!"]);
            } else {
                echo json_encode(['mensagem' => "Parabéns, você já respondeu a pesquisa este mês!"]);
                header("Refresh: 2; URL=./index");
                return;
            }
        } else {
            if (!$mostrar_pesquisa) {
                echo json_encode(['mensagem' => "Responda a pesquisa mensal para ter acesso!"]);
            } else {
                echo json_encode(['mensagem' => "Parabéns, você já respondeu a pesquisa este mês!"]);
                header("Refresh: 2; URL=./index");
                return;
            }
        }
    }
}

?>