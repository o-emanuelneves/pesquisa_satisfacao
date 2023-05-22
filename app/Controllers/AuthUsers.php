<?php 
namespace App\Controllers;

use App\Models\Auth_UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Model;

class AuthUsers extends BaseController{
    private $auth_users_model;
    function __construct()
    {
        $this->auth_users_model = new Auth_UserModel();
    }


    public function index(){
        $auth_users = $this->auth_users_model->findAll();
        $data['auth_users'] = $auth_users;

        echo View('auth_users/index', $data);
    }

    public function novo(){
        echo View('auth_users/novo');
    }


    public function store(){
        $dados = $this->request->getVar();
        $this->auth_users_model->insert($dados);
        return redirect()->to('http://pesquisa.satisfacao.com/authusers');
    }

    public function excluir($id_user)
    {
    $this->auth_users_model->where('id_user', $id_user)->delete();
    return redirect()->to('http://pesquisa.satisfacao.com/authusers');

    }
    
    public function ver($id_user)
    {
        $auth_user = $this->auth_users_model->where('id_user', $id_user)->first();
        $data['auth_user'] = $auth_user;
        echo View('auth_users/ver', $data);
    }


}


?>