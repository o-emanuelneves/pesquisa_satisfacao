<?php

namespace App\Controllers;

use App\Models\AuthUserModel;

class Templates extends BaseController
{
    private $auth_users_model;

    function __construct()
    {
        $this->auth_users_model = new AuthUserModel();
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
