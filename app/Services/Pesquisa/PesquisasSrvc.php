<?php

namespace App\Services\Pesquisa;
use App\Controllers\PesquisaRespostas;
use App\Models\Pesquisa_RespostasModel;

class PesquisasSrvc {

    public function calculateSatisfaction($pesquisa = null)
    {
        $somaEsperada = count($pesquisa) * 2;

        $somaPequisa = array_reduce($pesquisa,
            function ($carry, $item)
            {
                $carry += $item;
                return $carry;
            }
        );

        $media = $somaPequisa / $somaEsperada * 100;

        return $media;
    }
    public function retornaDia()
    {
         $dia = date('d');
        return $dia;
    }


    public function mostrarPesquisa()
    {
        $pesquisa_respostas_model = new Pesquisa_RespostasModel();
        $usuariosResposta = $pesquisa_respostas_model->select('fk_user')->where('fk_user', 3)->find();
        if (empty($usuariosResposta)){
            return true;
        }
        else{
            return false;
        }
       }

}