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
        $session = session();

        $dados = $session->get();

        echo View('/templates/header');
        echo View('/inicio/controle');
    }

    public function acesso(){

        echo View('/templates/header');
        echo View('/inicio/acesso');
    }

    public function autenticar()
    {
        $dados = $this->request->getVar();
        
        $usuario = $this->auth_users_model->where('nome', $dados['nome'])->first();

        $id_admin = '5';

        $session = session();

        if (!empty($usuario)) {
            if ($usuario['id_user'] === $id_admin) {
                $session->set('nome', $usuario['nome']);
                $session->set('id_user', $usuario['id_user']);
                
                return redirect()->to('/Inicio/controle');
            } else {
                $session->set('nome', $usuario['nome']);
                $session->set('id_user', $usuario['id_user']);

                return redirect()->to('/Inicio/acesso');
            }
        }

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
