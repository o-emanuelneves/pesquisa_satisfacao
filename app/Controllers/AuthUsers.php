<?php 
namespace App\Controllers;

use App\Models\Auth_UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Model;

class AuthUsers extends Controller{
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
    public function editar($id_user)
    {
        $auth_user = $this->auth_users_model->where('id_user', $id_user)->first();
        $data['auth_user'] = $auth_user;
        echo View('auth_users/editar', $data);
    }
    public function store(){
        $dados = $this->request->getVar();
        if(isset($dados['id_user'])):
            $this->auth_users_model->where('id_user', $dados['id_user'])->set(($dados))->update();
            
        endif;
        
        $this->auth_users_model->insert($dados);
        return redirect()->to('../authusers');
    }
    public function excluir($id_user)
    {
    $this->auth_users_model->where('id_user', $id_user)->delete();

    }


}


?>