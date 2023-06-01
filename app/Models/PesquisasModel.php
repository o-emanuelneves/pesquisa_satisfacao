<?php

namespace App\Models;
use CodeIgniter\Model;
use App\Services\Pesquisa\PesquisasService;
 
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
        $services = new PesquisasService;

        $getResposta = $this->get_pesquisa_and_respostas_by_id($id, $columns);
        
        $getResposta = $services->transformar_resposta($getResposta);

        return $getResposta;
    }

    public function get_agrupar_pesquisas(){
        $services = new PesquisasService;
        $pesquisas = $this->get_pesquisa_and_respostas([
            'nome',
            'resposta',
            'fk_pesquisa',
            'observacao'
        ]);
        $resultado_pesquisa_agrupada = $services->agrupar_pesquisas($pesquisas);
        
        return $resultado_pesquisa_agrupada;
    }

}
