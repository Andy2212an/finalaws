<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
    /**
     * The directory that holds the Migrations and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to use if no other is specified.
     */
    public string $defaultGroup = 'default';

    /**
     * The default database connection.
     *
     * NOTE: env() cannot be used in property initializers because PHP requires
     * constant expressions there. We initialize this property in the
     * constructor instead so env() calls are allowed.
     *
     * @var array<string, mixed>
     */
    public array $default = [];

    //    /**
    //     * Sample database connection for SQLite3.
    //     *
    //     * @var array<string, mixed>
    //     */
    //    public array $default = [
    //        'database'    => 'database.db',
    //        'DBDriver'    => 'SQLite3',
    //        'DBPrefix'    => '',
    //        'DBDebug'     => true,
    //        'swapPre'     => '',
    //        'failover'    => [],
    //        'foreignKeys' => true,
    //        'busyTimeout' => 1000,
    //        'synchronous' => null,
    //        'dateFormat'  => [
    //            'date'     => 'Y-m-d',
    //            'datetime' => 'Y-m-d H:i:s',
    //            'time'     => 'H:i:s',
    //        ],
    //    ];

    //    /**
    //     * Sample database connection for Postgre.
    //     *
    //     * @var array<string, mixed>
    //     */
    //    public array $default = [
    //        'DSN'        => '',
    //        'hostname'   => 'localhost',
    //        'username'   => 'root',
    //        'password'   => 'root',
    //        'database'   => 'ci4',
    //        'schema'     => 'public',
    //        'DBDriver'   => 'Postgre',
    //        'DBPrefix'   => '',
    //        'pConnect'   => false,
    //        'DBDebug'    => true,
    //        'charset'    => 'utf8',
    //        'swapPre'    => '',
    //        'failover'   => [],
    //        'port'       => 5432,
    //        'dateFormat' => [
    //            'date'     => 'Y-m-d',
    //            'datetime' => 'Y-m-d H:i:s',
    //            'time'     => 'H:i:s',
    //        ],
    //    ];

    //    /**
    //     * Sample database connection for SQLSRV.
    //     *
    //     * @var array<string, mixed>
    //     */
    //    public array $default = [
    //        'DSN'        => '',
    //        'hostname'   => 'localhost',
    //        'username'   => 'root',
    //        'password'   => 'root',
    //        'database'   => 'ci4',
    //        'schema'     => 'dbo',
    //        'DBDriver'   => 'SQLSRV',
    //        'DBPrefix'   => '',
    //        'pConnect'   => false,
    //        'DBDebug'    => true,
    //        'charset'    => 'utf8',
    //        'swapPre'    => '',
    //        'encrypt'    => false,
    //        'failover'   => [],
    //        'port'       => 1433,
    //        'dateFormat' => [
    //            'date'     => 'Y-m-d',
    //            'datetime' => 'Y-m-d H:i:s',
    //            'time'     => 'H:i:s',
    //        ],
    //    ];

    //    /**
    //     * Sample database connection for OCI8.
    //     *
    //     * You may need the following environment variables:
    //     *   NLS_LANG                = 'AMERICAN_AMERICA.UTF8'
    //     *   NLS_DATE_FORMAT         = 'YYYY-MM-DD HH24:MI:SS'
    //     *   NLS_TIMESTAMP_FORMAT    = 'YYYY-MM-DD HH24:MI:SS'
    //     *   NLS_TIMESTAMP_TZ_FORMAT = 'YYYY-MM-DD HH24:MI:SS'
    //     *
    //     * @var array<string, mixed>
    //     */
    //    public array $default = [
    //        'DSN'        => 'localhost:1521/XEPDB1',
    //        'username'   => 'root',
    //        'password'   => 'root',
    //        'DBDriver'   => 'OCI8',
    //        'DBPrefix'   => '',
    //        'pConnect'   => false,
    //        'DBDebug'    => true,
    //        'charset'    => 'AL32UTF8',
    //        'swapPre'    => '',
    //        'failover'   => [],
    //        'dateFormat' => [
    //            'date'     => 'Y-m-d',
    //            'datetime' => 'Y-m-d H:i:s',
    //            'time'     => 'H:i:s',
    //        ],
    //    ];

    /**
     * This database connection is used when running PHPUnit database tests.
     *
     * @var array<string, mixed>
     */
    public array $tests = [
        'DSN'         => '',
        'hostname'    => '127.0.0.1',
        'username'    => '',
        'password'    => '',
        'database'    => ':memory:',
        'DBDriver'    => 'SQLite3',
        'DBPrefix'    => 'db_',  // Needed to ensure we're working correctly with prefixes live. DO NOT REMOVE FOR CI DEVS
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'utf8',
        'DBCollat'    => '',
        'swapPre'     => '',
        'encrypt'     => false,
        'compress'    => false,
        'strictOn'    => false,
        'failover'    => [],
        'port'        => 3306,
        'foreignKeys' => true,
        'busyTimeout' => 1000,
        'dateFormat'  => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];

    public function __construct()
    {
        parent::__construct();

        // Small helper to read either DB_* style env vars (preferred for Azure App Settings)
        // or the older CodeIgniter `database.default.*` keys that you may have in an env file.
        $get = function ($primary, $secondary = null, $default = null) {
            // First check CodeIgniter env() which looks in $_SERVER/$_ENV and .env
            $val = env($primary);
            if ($val !== null && $val !== '') {
                return $val;
            }
            if ($secondary !== null) {
                $val = env($secondary);
                if ($val !== null && $val !== '') {
                    return $val;
                }
            }
            // Fallback to plain getenv in case the server exposes variables differently
            $val = getenv($primary);
            if ($val !== false && $val !== '') {
                return $val;
            }
            if ($secondary !== null) {
                $val = getenv($secondary);
                if ($val !== false && $val !== '') {
                    return $val;
                }
            }
            return $default;
        };

        $this->default = [
            'DSN'          => $get('DB_DSN', 'database.default.DSN', ''),
            'hostname'     => $get('DB_HOST', 'database.default.hostname', 'tcp:crudmascotas4.database.windows.net,1433'),
            'username'     => $get('DB_USER', 'database.default.username', 'Andysql'),
            'password'     => $get('DB_PASS', 'database.default.password', 'AFKArena100%'),
            'database'     => $get('DB_DATABASE', 'database.default.database', 'bd_crud'),
            'DBDriver'     => $get('DB_DRIVER', 'database.default.DBDriver', 'SQLSRV'),
            'DBPrefix'     => $get('DB_PREFIX', 'database.default.DBPrefix', ''),
            'pConnect'     => false,
            'DBDebug'      => (bool) filter_var($get('DB_DEBUG', 'database.default.DBDebug', true), FILTER_VALIDATE_BOOLEAN),
            'charset'      => $get('DB_CHARSET', 'database.default.charset', 'utf8'),
            'DBCollat'     => $get('DB_COLLATE', 'database.default.DBCollat', 'utf8_general_ci'),
            'swapPre'      => $get('DB_SWAP_PRE', 'database.default.swapPre', ''),
            'encrypt'      => filter_var($get('DB_ENCRYPT', 'database.default.encrypt', true), FILTER_VALIDATE_BOOLEAN),
            'trustServerCertificate' => filter_var($get('DB_TRUST_SERVER_CERTIFICATE', 'database.default.trustServerCertificate', false), FILTER_VALIDATE_BOOLEAN),
            'failover'     => [],
            'port'         => (int) $get('DB_PORT', 'database.default.port', 1433),
            'dateFormat'   => [
                'date'     => 'Y-m-d',
                'datetime' => 'Y-m-d H:i:s',
                'time'     => 'H:i:s',
            ],
        ];

        // Ensure that we always set the database group to 'tests' if
        // we are currently running an automated test suite, so that
        // we don't overwrite live data on accident.
        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}
