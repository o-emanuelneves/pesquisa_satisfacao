<?php 

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\AuthUserModel;

class Login extends BaseController
{
    private $login_model;
    function __construct()
    {
        $this->login_model = new AuthUserModel();
    }

    public function index()
    {
        echo View('login/index');
    }

    public function autenticar(){
        $dados = $this->request->getVar();
        $usuario = $this->login_model->get_usuario($dados['nome']);
        
        $session = session();
        
        if(!empty($usuario)):
            $session->set('nome', $usuario['nome']);
            $session->set('id_user', $usuario['id_user']);
         
            return redirect()->to('../');
        endif;

        return redirect()->to('./login');

    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('../login/');
    }

}


?>