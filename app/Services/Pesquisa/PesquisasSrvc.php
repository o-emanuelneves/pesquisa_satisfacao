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
    

    public function transformarResposta($array)
    {
        foreach($array as &$newArray){
            if($newArray['resposta'] == 0 ) $newArray['resposta'] = 'Não' ;
            if ($newArray['resposta'] == 1) $newArray['resposta'] = 'Talvez';
            if ($newArray['resposta'] == 2) $newArray['resposta'] = 'Sim';
        }

        return $array;
    }

}