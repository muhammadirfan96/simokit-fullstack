<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use Myth\Auth\Filters\LoginFilter;

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
        'login'      => LoginFilter::class,
        'role'       => \Myth\Auth\Filters\RoleFilter::class,
        'permission' => \Myth\Auth\Filters\PermissionFilter::class,

    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'honeypot',
            // 'csrf',
            // 'login'
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
        'login' => [
            'before' => [
                '/',
                'admin',
                'approved_checklist',
                'approved_home',
                'approved_limas',
                'approved_servicerequest',
                'bacasopik',
                'checklist',
                'db_absensi',
                'db_checklist',
                'db_home',
                'db_kwh',
                'db_limas',
                'db_notice',
                'db_servicerequest',
                'db_users',
                'home',
                'input_absensi',
                'input_co',
                'input_kwh',
                'input_limas',
                'kpi_monitoring',
                'kpi',
                'limas',
                'make_notice',
                'profil',
                'servicerequest'
            ]
        ],
    ];
}
