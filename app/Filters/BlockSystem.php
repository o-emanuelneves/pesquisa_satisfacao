<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PesquisaRespostasModel;

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
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $id_user = intval($session->get('id_user'));
        $id_admin = 14;
        $usuario = false;
        if($id_user != $id_admin){
            $usuario = true;
        }

        $dia = date('d');
        $dia = 5;

        $pesquisa_respostas_model = new PesquisaRespostasModel();
        $mostrar_pesquisa = $pesquisa_respostas_model->mostrar_pesquisa();

        if ($usuario and $mostrar_pesquisa) {
            if ($dia <= 10) {
                echo json_encode(['mensagem' => "Você ainda não respondeu a pesquisa mensal este mês!"]);
                return redirect()->to('PesquisaRespostas/novo');
                exit;
            }
            if($dia>10){
                echo json_encode(['mensagem' => "Responda a pesquisa para ter acesso ao sistema!"]);
                return redirect()->to('PesquisaRespostas/novo');
                exit;
            }
            
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
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
