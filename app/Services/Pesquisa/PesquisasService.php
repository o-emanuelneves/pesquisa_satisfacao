<?php

namespace App\Services\Pesquisa;

class PesquisasService {


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
    

    public function transformar_resposta($array)
    {
        foreach($array as &$newArray){
            if($newArray['resposta'] == 0 ) $newArray['resposta'] = 'Não' ;
            if ($newArray['resposta'] == 1) $newArray['resposta'] = 'Talvez';
            if ($newArray['resposta'] == 2) $newArray['resposta'] = 'Sim';
        }

        return $array;
    }

    public function agrupar_pesquisas($pesquisas)
    {

        $pesquisa_agrupada = [];

        foreach ($pesquisas as $pesquisa) {
            $fk_pesquisa = $pesquisa['fk_pesquisa'];

            if (!isset($pesquisa_agrupada[$fk_pesquisa])) {
                $pesquisa_agrupada[$fk_pesquisa] = [
                    'nome' => $pesquisa['nome'],
                    'respostas' => [],
                    'observacao' => $pesquisa['observacao']
                ];
            }

            $pesquisa_agrupada[$fk_pesquisa]['respostas'][] = $pesquisa['resposta'];
        }

        foreach ($pesquisa_agrupada as $key => $pesquisa) {
            $pesquisa_agrupada[$key]['satisfacao'] = $this->calculate_satisfaction($pesquisa['respostas']);
        }

        return $pesquisa_agrupada;
    }

}