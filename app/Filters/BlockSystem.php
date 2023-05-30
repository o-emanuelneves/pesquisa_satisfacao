<?php

namespace App\Filters;

use App\Models\PesquisaRespostasModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class BlockSystem implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null) // antes de executar a rota, executa esse método
    {
        $session = session();
        $dados['id_user'] = $session->get('id_user');
        $dia = date('d');

        $pesquisa_respostas_model = new PesquisaRespostasModel();
        $mostrar_pesquisa = $pesquisa_respostas_model->mostrar_pesquisa();
        $verificar_admin = $pesquisa_respostas_model->verificar_admin();

        if ($verificar_admin) return true;

        if ($dia <= 10) {
            if (!$mostrar_pesquisa) {
                echo json_encode(['mensagem' => "Você ainda não respondeu a pesquisa mensal esté mês, responda para continuar tendo acesso ao sistema!"]);

            } else return;
        } else {
            if (!$mostrar_pesquisa) return redirect()->to('PesquisaRespostas/novo');
        }

    }
    

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) // depois da rota executa o que está aqui
    {
        //
    }
}
