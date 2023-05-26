<?php

namespace App\Controllers;

use App\Models\AuthUserModel;

class Inicio extends BaseController
{
    private $auth_users_model;

    function __construct()
    {
        $this->auth_users_model = new AuthUserModel();
    }
    
    public function index()
    {
        echo View('/Inicio/index');
    }

    public function controle()
    {
        $id_user = $this->auth_users_model->id_session();

        echo View('/templates/header');
        echo View('/inicio/controle');
    }

    public function autenticar()
    {

        $dados = $this->request->getVar();
        
        $usuario = $this->auth_users_model->where('nome', $dados['nome'])->first();

        $session = session();

        if(!empty($usuario)):

            $session->set('nome', $usuario['nome']);

            return redirect()->to('/Inicio/controle');

        endif;

        $session->setFlashdata('erro');

        return redirect()->to('/Inicio');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('../Inicio/index/');
    }
}
