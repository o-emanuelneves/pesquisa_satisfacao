<?php

namespace App\Services\Pesquisa;

class RespostasService{
    
    function __construct($dia = null)
    {  
        if ($dia!=null){
            $this->$dia = $dia;
        }
        else{
            $dia = date('d');
        }

        return $dia;
    }

}

?>