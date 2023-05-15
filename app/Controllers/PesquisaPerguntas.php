<?php 
namespace App\Controllers;

use App\Models\Auth_UserModel;
use App\Models\Pesquisa_PerguntasModel;
use CodeIgniter\Controller;
use CodeIgniter\Model;

class PesquisaPerguntas extends Controller{
    private $pesquisa_perguntas_model;
    function __construct()
    {
        $this->pesquisa_perguntas_model = new Pesquisa_PerguntasModel();
    }



    public function novo(){
        echo View('pesquisa_perguntas/novo');
    }

    public function store(){
        $dados = $this->request->getVar();
        $this->pesquisa_perguntas_model->insert($dados);

    }


}
