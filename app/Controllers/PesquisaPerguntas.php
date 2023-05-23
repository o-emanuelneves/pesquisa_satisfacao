<?php 
namespace App\Controllers;

use App\Models\Auth_UserModel;
use App\Models\Pesquisa_PerguntasModel;
use CodeIgniter\Controller;

class PesquisaPerguntas extends BaseController{
    private $pesquisa_perguntas_model;
    function __construct()
    {
        $this->pesquisa_perguntas_model = new Pesquisa_PerguntasModel();
    }



    public function novo(){
        $perguntas = $this->pesquisa_perguntas_model->find();
        $data['perguntas'] = $perguntas;
        echo View('pesquisa_perguntas/novo', $data);
    }

    public function store(){
        $dados = $this->request->getVar();

        $return = $this->pesquisa_perguntas_model->set_perguntas($dados ?? []);

        if ($return) return json_encode(['Ok']);

        return json_encode(['Erro!']);
    }

    public function delete($id) {
        $this->pesquisa_perguntas_model->where('id_pergunta', $id)->delete();
    }

}
