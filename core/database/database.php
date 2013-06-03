<?php
/**
* Banco de dados
*
* Responsável por gerenciar as requisições ao banco de dados a aplicação
*
* PHP 5
*
* Alf CMS
* Copyright 2013-2013, Tonight Systems, Inc. (https://github.com/tonightsystems)
*
* Licensed under The MIT License
* Redistributions of files must retain the above copyright notice.
*
* @package      Alf
* @copyright    Copyright 2013-2013, Tonight Systems, Inc.
* @link         https://github.com/tonightsystems/alf-cms
* @license      MIT License (http://www.opensource.org/licenses/mit-license.php)
*/

class Database {

/**
 * Host do MySQL
 *
 * Configurado via `Config::set('database_host', '')` no arquivo de configuração
 * do usuário na raiz do sistema.
 *
 * @var string
 */
    private static $host;

/**
 * Usuário do MySQL
 *
 * Configurado via `Config::set('database_user', '')` no arquivo de configuração
 * do usuário na raiz do sistema.
 *
 * @var string
 */
    private static $user;

/**
 * Senha do usuário do MySQL
 *
 * Configurado via `Config::set('database_password', '')` no arquivo de
 * configuração do usuário na raiz do sistema.
 *
 * @var string
 */
    private static $password;

/**
 * Nome do banco de dados
 *
 * Configurado via `Config::set('database_name', '')` no arquivo de configuração
 * do usuário na raiz do sistema.
 *
 * @var string
 */
    private static $database_name;

/**
 * Porta do MySQL no servidor
 *
 * Configurado via `Config::set('database_port', '')` no arquivo de configuração
 * do usuário na raiz do sistema.
 *
 * @var int
 */
    private static $port;

/**
 * Prefixo das tabelas
 *
 * Configurado via `Config::set('table_prefix', '')` no arquivo de configuração
 * do usuário na raiz do sistema.
 *
 * @var int
 */
    private static $table_prefix;

/**
 * Conexão com o banco
 *
 * @var object
 */
    private static $connection;

/**
 * Inicia a conexão com o banco de dados
 *
 * @return [type] [description]
 */
    public function init() {
        static::$host = Config::get('database_host');
        static::$user = Config::get('database_user');
        static::$password = Config::get('database_password');
        static::$database_name = Config::get('database_name');
        static::$table_prefix = Config::get('table_prefix');

        static::$connection = new mysqli(static::$host, static::$user, static::$password, static::$database_name);
    }

/**
 * Verifica a conexão com o banco de dados
 *
 * @todo Executar verificações de existencia das tabelas
 * @return boolean
 */
    public function check($connection = array('database_host', 'database_user', 'database_password', 'database_name')) {
        $conn = mysqli_connect(
            $connection['database_host'],
            $connection['database_user'],
            $connection['database_password'],
            $connection['database_name']
        );

        if (!$conn) {
            return false;
        }

        mysqli_close($conn);

        return true;
    }

/**
 * Executa uma query no banco
 *
 * @param  string $query Query a ser executada no banco
 * @return
 */
    public function query($query) {
        if (!isset($query)) {
            throw new Exception(__('Undefined database query'));
        }
        return static::$mysqli->query(static::escape($query));
    }

/**
 * Escapa caracteres especiais em uma string para uso em uma instrução SQL
 *
 * @param  string $string
 * @return string
 */
    public function escape($string) {
        return static::$mysql->real_escape_string($string);
    }

/**
 * Fecha a conexão com o banco de dados
 *
 * @return boolean
 */
    public function close() {
        return static::$mysqli->close();
    }
}