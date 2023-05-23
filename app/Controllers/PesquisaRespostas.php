<?php 
namespace App\Controllers;

use App\Models\Pesquisa_PerguntasModel;
use App\Models\Pesquisa_RespostasModel;
use App\Models\PesquisasModel;

use App\Services\Pesquisa\PesquisasSrvc;

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
        $pesquisa_agrupada = $this->pesquisa_model->agrupar_pesquisas();

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

            return redirect()->to('/pesquisarespostas');

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

        $dia = 1;

        $pesquisa_respostas_model = new Pesquisa_RespostasModel();
        
        echo View('pesquisarespostas/novo', $data);
    }


    public function respostas($id)
    {
        $pesquisaModel = new PesquisasModel();

        $respostas = $pesquisaModel->retornarRespostas(
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