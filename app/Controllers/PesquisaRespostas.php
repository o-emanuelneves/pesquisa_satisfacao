<?php 
namespace App\Controllers;

use App\Database\Migrations\PesquisaRespostas as MigrationsPesquisaRespostas;
use App\Models\Pesquisa_PerguntasModel;
use App\Models\Pesquisa_RespostasModel;
use App\Models\PesquisasModel;

use App\Services\Pesquisa\PesquisasSrvc;
use App\Services\Pesquisa\RespostasSrvc;

class PesquisaRespostas extends BaseController
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

        echo View('/pesquisarespostas/index', $data);
    }

    public function store()
    {
        $dados = $this->request->getVar();
        
        if(isset($dados['respostas'])):
            $dados['pesquisa']['fk_user'] = 6;

            $id_pesquisa = $this->pesquisa_model->set_pesquisa($dados['pesquisa']);
            $dados['pesquisa']['fk_pesquisa'] = $id_pesquisa;

            $this->pesquisa_respostas_model->set_respostas($dados);


            return redirect()->to('http://pesquisa.satisfacao.com/pesquisarespostas');

        endif;
    }

    public function novo()
    {
        $model = new Pesquisa_PerguntasModel();
        $data['perguntas'] = $model->get_perguntas([
            'id_pergunta',
            'pergunta'
        ]);
        
        $respostasSrvc = new PesquisasSrvc();
        $dia = $respostasSrvc->retornaDia();


        $pesquisa_respostas_model = new Pesquisa_RespostasModel();

//aparecer que ja resondeu
// exibir mensagem pra ele responder
// se passou do prazo, sistema travado
        if ($dia <= 10 and $pesquisa_respostas_model->mostrarPesquisa()) {
            echo View('pesquisarespostas/novo', $data);
        } else {
            header('Location: http://pesquisa.satisfacao.com/pesquisarespostas/');
            exit;
        }
    }

    public function sePreencheu(){
        //Fazer a listagem de quem ja respondeu no banco de dados
        // Verificar se este usuário preencheu
        // Se sim, não mostrar a pesquisa
        // Se não, mostrar
    }

    public function respostas()
    {
        $model = new Pesquisa_PerguntasModel();
        $data['perguntas'] = $model->get_perguntas();

        echo View('pesquisarespostas/respostas', $data);
    }
}
?>