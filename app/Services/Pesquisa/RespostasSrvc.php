<?php

namespace App\Services\Pesquisa;

class RespostasSrvc{

    public function retornaDia()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $dia = date('d');
        return $dia;
    }

}

?>