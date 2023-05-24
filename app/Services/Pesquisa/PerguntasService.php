<?php

namespace App\Services\Pesquisa;

class PerguntasService {
    private $newPerguntas;
    private $dbPerguntas;

    function __construct($newPerguntas = null, $dbPerguntas = null)
    {
        $this->newPerguntas = $newPerguntas ?? $this->newPerguntas;
        $this->dbPerguntas = $dbPerguntas ?? $this->dbPerguntas;
    }

    public function return_insert () {
        $insert = $this->insert_batch_pergunta($this->newPerguntas['newpergunta'] ?? []);
        return $insert;
    }

    public function return_update(){
        $perguntas = $this->newPerguntas['pergunta'] ?? [];
        $dbPerguntas = array_column($this->dbPerguntas, 'pergunta');
        
        $diff = $this->verify_diff($perguntas, $dbPerguntas);
        $insert = $this->insert_batch_pergunta($diff ?? []);
        return $insert; 
    }

    public function ids_delete() {
        $perguntas = $this->newPerguntas['pergunta'] ?? [];
        $dbPerguntas = array_column($this->dbPerguntas, 'pergunta');
 
        $diff = $this->verify_diff($perguntas, $dbPerguntas);
        $ids = array_keys($diff);
        return $ids;
    }

    public function verify_diff($newPerguntas, $dbPerguntas) {
        $difference = array_diff($newPerguntas, $dbPerguntas);
        return $difference;
    }


    public function insert_batch_pergunta($perguntas) {
        $array = array_map(function($pergunta) {
            return [
                'fk_user' => 5,
                'pergunta' => $pergunta
            ];
        }, $perguntas);
        return $array;
    }

 
    
}
