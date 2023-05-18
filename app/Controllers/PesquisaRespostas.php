<?php 
namespace App\Controllers;

use App\Models\Pesquisa_PerguntasModel;
use App\Models\Pesquisa_RespostasModel;
use App\Models\PesquisasModel;

use App\Services\Pesquisa\RespostasSrvc;
use CodeIgniter\Controller;
use App\Services\Pesquisa\PesquisasSrvc;

class PesquisaRespostas extends Controller
{
    private $pesquisa_respostas_model;
    private $pesquisa_model;

    function __construct()
    {
        $this->pesquisa_respostas_model = new Pesquisa_RespostasModel();
        $this->pesquisa_model = new PesquisasModel();
    }

    public function index()
    {

        $service = new PesquisasSrvc();
        $pesquisas = $this->pesquisa_model->get_pesquisa_and_respostas([
            'nome',
            'resposta',
            'fk_pesquisa'
        ]);

        $pesquisaAgrupada = [];
        foreach ($pesquisas as $pesquisa) {
            $pesquisaAgrupada[$pesquisa['fk_pesquisa']]['nome'] = $pesquisa['nome'];
            $pesquisaAgrupada[$pesquisa['fk_pesquisa']]['respostas'][] = $pesquisa['resposta'];
        }

        foreach ($pesquisaAgrupada as $key => $pesquisa) {
            $pesquisaAgrupada[$key]['satisfacao'] = $service->calculateSatisfaction($pesquisa['respostas']);
        }

        $data['pesquisas'] = $pesquisaAgrupada;

        // $model = new Pesquisa_RespostasModel();
        // $data['pesquisa_respostas'] = $model
        // ->select('pesquisa_respostas.fk_pesquisa, auth_users.nome, pesquisa_perguntas.pergunta, pesquisa_respostas.resposta')
        // ->join('pesquisas', 'pesquisas.id_pesquisa = pesquisa_respostas.fk_pesquisa')
        // ->join('auth_users', 'auth_users.id_user = pesquisa_respostas.fk_user')
        // ->join('pesquisa_perguntas', 'pesquisa_perguntas.id_pergunta = pesquisa_respostas.fk_pergunta')
        // ->findAll();
        echo View('/pesquisarespostas/index', $data);
    }

    public function store()
    {
        $dados = $this->request->getVar();
        
        if(isset($dados['respostas'])):
            $dados['pesquisa']['fk_user'] = 2;

            $id_pesquisa = $this->pesquisa_model->set_pesquisa($dados['pesquisa']);
            $dados['pesquisa']['fk_pesquisa'] = $id_pesquisa;

            $this->pesquisa_respostas_model->set_respostas($dados);


            return redirect()->to('http://pesquisa.satisfacao.com/pesquisarespostas');

        endif;
    }


    public function novo(){
        $model = new Pesquisa_PerguntasModel();
        $data['perguntas'] = $model->get_perguntas([
            'id_pergunta',
            'pergunta'
        ]);

        $respostasSrvc = new RespostasSrvc();

        $dia = $respostasSrvc->retornaDia();
 
        if ($dia <= 10) {
            echo View('pesquisarespostas/novo');
        }
        else{
            header('Location: http://pesquisa.satisfacao.com/');
            exit;
        }}

    public function sePreencheu(){
        //Fazer a listagem de quem ja respondeu no banco de dados
        // Verificar se este usuário preencheu
        // Se sim, não mostrar a pesquisa
        // Se não, mostrar
    }
}
?>