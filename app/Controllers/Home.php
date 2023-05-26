<?php

namespace App\Controllers;

use CodeIgniter\Config\View;

class Home extends BaseController
{
    public function index()
    {
        echo View('/templates/header');
        echo View('/Inicio/index');
        

    }
}
