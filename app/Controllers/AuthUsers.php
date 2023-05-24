<?php 
namespace App\Controllers;

use App\Models\AuthUserModel;
use CodeIgniter\Controller;

class AuthUsers extends BaseController{
    private $auth_users_model;
    function __construct()
    {
        $this->auth_users_model = new AuthUserModel();
    }


    public function index(){
        $auth_users = $this->auth_users_model->findAll();
        $data['auth_users'] = $auth_users;

        echo View('auth_users/index', $data);
    }

    public function novo(){
        echo View('auth_users/novo');
    }

    public function store()
    {
        $dados = $this->request->getVar();
        $this->auth_users_model->insertUser($dados);
        return redirect()->to('../AuthUsers/index');
    }

    public function excluir($id_user)
    {
    $this->auth_users_model->excluir($id_user);
    return redirect()->to('../AuthUsers/index');

    }
    
    public function ver($id_user)
    {
        $auth_user = $this->auth_users_model->ver($id_user);
        $data['auth_user'] = $auth_user;
        echo View('auth_users/ver', $data);
    }
}
?>