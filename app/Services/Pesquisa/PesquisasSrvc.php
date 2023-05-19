<?php

namespace App\Services\Pesquisa;
// use App\Controllers\PesquisaRespostas;
// use App\Models\Pesquisa_RespostasModel;

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



}