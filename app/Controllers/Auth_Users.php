<?php 
namespace App\Controllers;

use App\Models\Auth_UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Model;

class Auth_Users extends Controller{
    private $auth_users_model;
    function __construct()
    {
        $this->auth_users_model = new Auth_UserModel();
    }



    public function novo(){
        echo View('auth_users/novo');
    }
    public function store(){
        $dados = $this->request->getVar();
        $this->auth_users_model->insert($dados);
    }


}


?>