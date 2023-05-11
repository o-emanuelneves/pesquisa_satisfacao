<?php 
namespace App\Controllers;

use App\Models\Pesquisa_RespostasModel;
use CodeIgniter\Controller;
use CodeIgniter\Model;

class PesquisaRespostas extends Controller
{
    private $pesquisa_respostas_model;

    function __construct()
    {
        $this->pesquisa_respostas_model = new Pesquisa_RespostasModel();
    }

    public function novo(){
        echo View('pesquisarespostas/novo');
    }

    public function index()
    {
        $pesquisa_respostas = $this->pesquisa_respostas_model->findAll();

        $data['pesquisa_respostas'] = $pesquisa_respostas;
        
        echo View('/pesquisarespostas/index', $data);
    }

    public function editar($id_resposta)
    {
        $pesquisa_respostas = $this->pesquisa_respostas_model->where('id_resposta', $id_resposta)->first();

        $data['pesquisa_respostas'] = $pesquisa_respostas;

        echo View('/pesquisarespostas/editar', $data);
    }

    public function store()
    {
        $dados = $this->request->getVar();

        if(isset($dados['id_resposta'])):

            $this->pesquisa_respostas_model->where('id_resposta', $dados['id_resposta'])->set($dados)->update();

            return redirect()->to('http://pesquisa.satisfacao.com/pesquisarespostas');

        endif;

        $this->pesquisa_respostas_model->insert($dados);

        return redirect()->to('http://pesquisa.satisfacao.com/pesquisarespostas');
    }

    public function excluir($id_resposta)
    {
        $this->pesquisa_respostas_model->where('id_resposta', $id_resposta)->delete();

        return redirect()->to('http://pesquisa.satisfacao.com/pesquisarespostas');
    }
}

?>