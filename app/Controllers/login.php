<?php 

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\AuthUserModel;
use App\Models\PesquisaRespostasModel;

class Login extends BaseController
{
    private $login_model, $pesquisa_respostas_model;
    function __construct()
    {
        $this->login_model = new AuthUserModel();
        $this->pesquisa_respostas_model = new PesquisaRespostasModel();
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
            $id_user = intval($session->get('id_user'));
            $id_admin = 14;

            if ($this->pesquisa_respostas_model->mostrar_pesquisa() and $id_user != $id_admin) {
                return redirect()->to('PesquisaRespostas/novo');
            }

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