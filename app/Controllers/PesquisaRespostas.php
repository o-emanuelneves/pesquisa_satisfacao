<?php 
namespace App\Controllers;


use App\Models\Pesquisa_RespostasModel;
use App\Services\Pesquisa\RespostasSrvc;
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
        $respostasSrvc = new RespostasSrvc();

        $dia = $respostasSrvc->retornaDia();
 
        if ($dia <= 10) {
            echo View('pesquisarespostas/novo');
        }
        else{
            header('Location: http://pesquisa.satisfacao.com/');
            exit;
        }
                
        
    }

    public function index()
    {
        $pesquisa_respostas = $this->pesquisa_respostas_model->findAll();
        $model = new Pesquisa_RespostasModel();
        //$data['pesquisa_respostas'] = $pesquisa_respostas;
        $data['pesquisa_respostas'] = $model
        ->select('pesquisa_respostas.fk_pesquisa, auth_users.nome, pesquisa_perguntas.pergunta, pesquisa_respostas.resposta')
        ->join('pesquisas', 'pesquisas.id_pesquisa = pesquisa_respostas.fk_pesquisa')
        ->join('auth_users', 'auth_users.id_user = pesquisa_respostas.fk_user')
        ->join('pesquisa_perguntas', 'pesquisa_perguntas.id_pergunta = pesquisa_respostas.fk_pergunta')
        ->findAll();

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

    public function sePreencheu(){
        //Fazer a listagem de quem ja respondeu no banco de dados
        // Verificar se este usuário preencheu
        // Se sim, não mostrar a pesquisa
        // Se não, mostrar
    }
}

?>