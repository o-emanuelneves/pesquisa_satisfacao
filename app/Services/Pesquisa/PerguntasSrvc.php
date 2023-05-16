<?php

namespace App\Services\Pesquisa;

class PerguntasSrvc {
    private $newPerguntas;
    private $dbPerguntas;

    function __construct ($newPerguntas, $dbPerguntas) {
        $this->newPerguntas = $newPerguntas['pergunta'];
        $this->dbPerguntas = array_column($dbPerguntas, 'pergunta');
    }

    public function returnPerguntas() {

    }

    public function returnInsert () {
        $difference = $this->verifyDiff($this->newPerguntas, $this->dbPerguntas);
        $insert = $this->insertBatch($difference);
        
        return $insert;
    }

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
