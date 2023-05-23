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
            'fk_pesquisa',
            'observacao'

        ]);

        //dd($pesquisas);

        $pesquisaAgrupada = [];
        foreach ($pesquisas as $pesquisa) {
            $pesquisaAgrupada[$pesquisa['fk_pesquisa']]['nome'] = $pesquisa['nome'];
            $pesquisaAgrupada[$pesquisa['fk_pesquisa']]['respostas'][] = $pesquisa['resposta'];
            $pesquisaAgrupada[$pesquisa['fk_pesquisa']]['observacao'] = $pesquisa['observacao'];

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
        
        
        echo View('pesquisarespostas/novo', $data);
        // if ($dia <= 10 and $pesquisa_respostas_model->mostrarPesquisa()) {

        //     echo '<script>alert("Responda a pesquisa mensal!");</script>';
        //     echo View('pesquisarespostas/novo', $data);
            
        // } 
        // else if ($dia <= 10 and $pesquisa_respostas_model->mostrarPesquisa()== false){
        //     echo ("<script> window.alert('Você já respondeu a pesquisa esse mês')
        //     window.location.href='http://pesquisa.satisfacao.com/pesquisarespostas/'; </script>");
        // }
        // else {
        //     echo ("<script> window.alert('A pesquisa expirou')
        //     window.location.href='http://pesquisa.satisfacao.com/pesquisarespostas/'; </script>");
        //     //travar sistema

           
        // }
    }


    public function respostas()
    {
        $model = new Pesquisa_PerguntasModel();
        $data['perguntas'] = $model->get_perguntas();

        echo View('pesquisarespostas/respostas', $data);
    }
}
?>