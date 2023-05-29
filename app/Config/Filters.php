<?php

namespace Config;

use App\Controllers\AuthUsers;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'admin'         =>     \App\Filters\AdminFilter::class,
        'auth'          =>      \App\Filters\Auth::class,
    ];

    public array $globals = [
        'before' => [
            // 'admin'
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
            'auth' => [
                'except' => [
                    'Inicio',
                    'Inicio/index',
                    'Inicio/__construct',
                    'Inicio/acesso',
                    'Inicio/autenticar',
                    'Inicio/logout',
                    'Inicio/redirecionar',
                    'PesquisaRespostas/novo',
                ]
            ],
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

   
    public array $methods = [];

    public  $filters = [
        'auth' => ['PesquisaPerguntas/*'],
        'auth' => ['PesquisaRespostas/*'],
        'auth' => ['AuthUsers/*'],
        'auth' => ['/inicio/controle'],

    ];
    
}
