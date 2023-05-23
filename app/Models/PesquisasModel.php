<?php

namespace App\Models;
use CodeIgniter\Model;
use App\Services\Pesquisa\PesquisasSrvc;
 
class PesquisasModel extends Model{
    protected $table = 'pesquisas';
    protected $primaryKey = 'id_pesquisa';
    protected $allowedFields = [
        'fk_user',
        'id_pesquisa',
        'observacao'
    ];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
   

    public function set_pesquisa($dados) {
        $data = [
            'fk_user' => $dados['fk_user'],
            'observacao' => $dados['observacao']
        ];

        $this->insert($data);
        return $this->insertID();
    }

    public function get_pesquisa($columns = ['*']){
        $this->select($columns);
        return $this->find();
    }


    public function get_pesquisa_and_respostas($columns = ['*']){
        $this->select($columns)
        ->join('pesquisa_respostas', 'pesquisa_respostas.fk_pesquisa = pesquisas.id_pesquisa')
        ->join('auth_users', 'auth_users.id_user = pesquisa_respostas.fk_user');
        return $this->find();
    }

    public function agrupar_pesquisas(){
    $service = new PesquisasSrvc();
        $pesquisas = $this->get_pesquisa_and_respostas([
            'nome',
            'resposta',
            'fk_pesquisa',
            'observacao'
        ]);

        $pesquisa_agrupada = [];
        foreach ($pesquisas as $pesquisa) {
            $pesquisa_agrupada[$pesquisa['fk_pesquisa']]['nome'] = $pesquisa['nome'];
            $pesquisa_agrupada[$pesquisa['fk_pesquisa']]['respostas'][] = $pesquisa['resposta'];
            $pesquisa_agrupada[$pesquisa['fk_pesquisa']]['observacao'] = $pesquisa['observacao'];
        }
 
        foreach ($pesquisa_agrupada as $key => $pesquisa) {
            $pesquisa_agrupada[$key]['satisfacao'] = $service->calculate_satisfaction($pesquisa['respostas']);
        }

        return $pesquisa_agrupada;
    }

    public function get_pesquisa_and_respostas_by_id($id, $columns = ['*'])
    {
        $this->select($columns)
            ->join('pesquisa_respostas', 'pesquisa_respostas.fk_pesquisa = pesquisas.id_pesquisa')
            ->join('auth_users', 'auth_users.id_user = pesquisa_respostas.fk_user')
            ->join('pesquisa_perguntas', 'pesquisa_perguntas.id_pergunta = pesquisa_respostas.fk_pergunta');
        return $this->where('id_pesquisa', $id)->find();
    }

    public function retornar_respostas($id, $columns = ['*'])
    {
        $services = new PesquisasSrvc;

        $getResposta = $this->get_pesquisa_and_respostas_by_id($id, $columns);
        
        $getResposta = $services->transformar_resposta($getResposta);

        return $getResposta;
    }

}
