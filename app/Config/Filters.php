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
        'admin'         =>     \App\Filters\AdminFilter::class
    ];

    public array $globals = [
        'before' => [
            'admin' => [
                'except' => [
                    '/', 'pesquisarespostas/novo', 'login', 'login/*' 
                ]
            ]
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

   
    public array $methods = [];

    public  $filters = [
        'admin' => ['PesquisaRespostas/index']
        
        
    ];
    
}
