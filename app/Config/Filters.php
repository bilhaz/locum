<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use App\Filters\E_Auth;
use App\Filters\E_noauth;
use App\Filters\usercheck;
use App\Filters\B_auth;
use App\Filters\B_noauth;
use App\Filters\C_Auth;
use App\Filters\C_noauth;
use App\Filters\MaintenanceModeFilter;
use App\Filters\RoleAccessFilter;


class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'     => CSRF::class,
        'toolbar'  => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'E_Auth' =>    E_Auth::class,
        'E_noauth' =>  E_noauth::class,
        'B_auth'   =>  B_auth::class,
        'B_noauth' => B_noauth::class,
        'C_Auth' =>    C_Auth::class,
        'C_noauth' => C_noauth::class,
        'usercheck' =>    usercheck::class,
        'RoleAccess' => RoleAccessFilter::class,
        
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'usercheck'
            // 'honeypot',
            // 'csrf',
                // 'RoleAccess' => ['except' => ['forbidden']]
            
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
    ];
}
