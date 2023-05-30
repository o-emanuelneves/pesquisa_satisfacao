<?php

namespace App\Controllers;

use App\Models\AuthUserModel;

class Templates extends BaseController
{

    function __construct()
    {
        
    }

    public function header()
    {
        $session = session();
        $nome = $session->get('nome');


        if ($nome == null) :
            header("Refresh: 0; URL=../inicio/index");

        endif;
    }
}
