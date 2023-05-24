<?php 
namespace App\Controllers;

use App\Models\PesquisaPerguntasModel;
use App\Models\PesquisaRespostasModel;
use App\Models\PesquisasModel;

use App\Services\Pesquisa\PesquisasService;
use App\Services\Pesquisa\RespostasService;

class PesquisaRespostas extends BaseController
{
    private $pesquisa_respostas_model;
    private $pesquisa_model;

    function __construct()
    {
        $this->pesquisa_respostas_model = new PesquisaRespostasModel();
        $this->pesquisa_model = new PesquisasModel();
    }

    public function index()
    {
        $service = new PesquisasService;
        $pesquisa_agrupada = $service->agrupar_pesquisas();

        $data['pesquisas'] = $pesquisa_agrupada;

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


            return redirect()->to('../PesquisaRespostas/index');

        endif;
    }

    public function novo()
    {
        $model = new PesquisaPerguntasModel();
        $data['perguntas'] = $model->get_perguntas([
            'id_pergunta',
            'pergunta'
        ]);
        
        $respostasSrvc = new RespostasService();
        $dia = $respostasSrvc->__construct();
       


        $pesquisa_respostas_model = new PesquisaRespostasModel();

        
        echo View('pesquisarespostas/novo', $data);
        
        // if ($dia <= 10 and $pesquisa_respostas_model->mostrar_pesquisa()) {

        //     echo '<script>alert("Responda a pesquisa mensal!");</script>';
        //     echo View('pesquisarespostas/novo', $data);
            
        // } 
        // else if ($dia <= 10 and $pesquisa_respostas_model->mostrar_pesquisa()== false){
        //     echo ("<script> window.alert('Você já respondeu a pesquisa esse mês')
        //     window.location.href='http://pesquisa.satisfacao.com/pesquisarespostas/'; </script>");
        // }
        // else {
        //     echo ("<script> window.alert('A pesquisa expirou')
        //     window.location.href='http://pesquisa.satisfacao.com/pesquisarespostas/'; </script>");
        //     //travar sistema

           
        // }
    }


    public function respostas($id)
    {
        $respostas = $this->pesquisa_model->retornar_respostas(
            $id, [
            'pergunta',
            'resposta',
            'observacao',
            'id_pesquisa',
        ]);

        $data['respostas'] = $respostas;

        echo View('pesquisarespostas/respostas', $data);
    }
}
?>