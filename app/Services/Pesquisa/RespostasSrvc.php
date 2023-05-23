<?php

namespace App\Services\Pesquisa;

class RespostasSrvc{

    public function retorna_dia()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $dia = date('d');
        return $dia;
    }

}

?>