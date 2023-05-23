<?php

namespace App\Services\Pesquisa;

class PesquisasSrvc {

    public function calculate_satisfaction($pesquisa = null)
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
    
    public function retorna_dia()
    {
         $dia = date('d');
        return $dia;
    }
    

    public function transformar_resposta($array)
    {
        foreach($array as &$newArray){
            if($newArray['resposta'] == 0 ) $newArray['resposta'] = 'Não' ;
            if ($newArray['resposta'] == 1) $newArray['resposta'] = 'Talvez';
            if ($newArray['resposta'] == 2) $newArray['resposta'] = 'Sim';
        }

        return $array;
    }

}