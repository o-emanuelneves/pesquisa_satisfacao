<?php

namespace App\Controllers;


use App\Models\PesquisasModel;
use CodeIgniter\Controller;
use CodeIgniter\Model;

class Pesquisas extends Controller
{
    private $pesquisas_model;
    function __construct()
    {
        $this->pesquisas_model = new PesquisasModel();
    }

    public function index(){
        $pesquisas = $this->pesquisas_model->findAll();
        $data['pesquisas'] = $pesquisas;

        echo View('pesquisas/index', $data);
    }

    public function novo()
    {
        echo View('pesquisas/novo');
    }
    public function store()
    {
        $dados = $this->request->getVar();
        $this->pesquisas_model->insert($dados);
    }
}


?>