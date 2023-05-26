<?php 
namespace App\Controllers;


use App\Models\PesquisaPerguntasModel;
use CodeIgniter\Controller;

class PesquisaPerguntas extends BaseController{
    private $pesquisa_perguntas_model;
    function __construct()
    {
        $this->pesquisa_perguntas_model = new PesquisaPerguntasModel();
    }

    public function novo(){
        $perguntas = $this->pesquisa_perguntas_model->find();
        $data['perguntas'] = $perguntas;

        echo View('pesquisa_perguntas/novo', $data);
    }

    public function store(){
        $dados = $this->request->getVar();

        $return = $this->pesquisa_perguntas_model->set_perguntas($dados ?? []);
        
        if ($return) return json_encode (['mensagem' => "Pergunta cadastrada com sucesso! "]);

        return json_encode(['mensagem' => "Erro "]);
    }

    public function delete($id) {
        $this->pesquisa_perguntas_model->deletar($id);

    }
}
