<?php

namespace App\Services\Pesquisa;

class PerguntasSrvc {
    private $newPerguntas;
    private $dbPerguntas;

    function __construct ($newPerguntas, $dbPerguntas) {
        $this->newPerguntas = $newPerguntas;
        $this->dbPerguntas = $dbPerguntas;
    }

    public function returnInsert () {
        $insert = $this->insertBatch($this->newPerguntas['newpergunta'] ?? []);
        return $insert;
    }

    public function returnUpdate(){
        $perguntas = $this->newPerguntas['pergunta'];
        $dbPerguntas = array_column($this->dbPerguntas, 'pergunta');
        
        $diff = $this->verifyDiff($perguntas, $dbPerguntas);
        $insert = $this->insertBatch($diff ?? []);
        return $insert;
    }

    public function idsDelete() {
        $perguntas = $this->newPerguntas['pergunta'];
        $dbPerguntas = array_column($this->dbPerguntas, 'pergunta');

        $diff = $this->verifyDiff($perguntas, $dbPerguntas);
        $ids = array_keys($diff);
        return $ids;
    }

    //Percorrer os arrays e comparar os novos com o banco de dados.
    //Caso aqueles que são diferentes possuírem id, apaga-los do banco de dados.
    
    public function verifyDiff($newPerguntas, $dbPerguntas) {
        $difference = array_diff($newPerguntas, $dbPerguntas);
        return $difference;
    }


    public function insertBatch($perguntas) {
        $array = array_map(function($pergunta) {
            return [
                'fk_user' => 1,
                'pergunta' => $pergunta
            ];
        }, $perguntas);
        return $array;
    }

    
}
