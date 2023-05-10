<?php 
namespace App\Controllers;

use App\Models\Pesquisa_RespostasModel;
use CodeIgniter\Controller;
use CodeIgniter\Model;

class PesquisaRespostas extends Controller
{
    private $pesquisa_respostas_model;

    function __construct()
    {
        $this->pesquisa_respostas_model = new Pesquisa_RespostasModel();
    }

    public function form(){
        echo View('pesquisa_respostas/form');
    }

    public function store(){
        $dados = $this->request->getVar();
        $this->pesquisa_respostas_model->insert($dados);
    }
}

?>