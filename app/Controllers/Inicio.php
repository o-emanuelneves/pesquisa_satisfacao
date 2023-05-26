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
        return View('/Inicio/index');
    }

    public function controle()
    {
        $id_user = $this->auth_users_model->id_session();

        $usuario = $id_user['nome'];

        return View('/Inicio/controle');
    }

    public function autenticar()
    {

        $dados = $this->request->getVar();
        
        $usuario = $this->auth_users_model->where('nome', $dados['nome'])->first();

        $session = session();

        if(!empty($usuario)):

            $session->set('nome', $usuario['nome']);

            $session->setFlashdata('alert', 'success_login');

            return redirect()->to('/Inicio/controle');

        endif;

        $session->setFlashdata('alert', 'error_login');

        return redirect()->to('/Inicio');

    }
}
