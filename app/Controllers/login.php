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
        $usuario = $this->login_model->where('nome', $dados['nome'])->first();
        $session = session();
        if(!empty($usuario)):
            return redirect()->to('../../inicio');
        endif;

        $session->setFlashdata('erro');
        return redirect()->to('/login');

    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('../../login/');
    }

}


?>