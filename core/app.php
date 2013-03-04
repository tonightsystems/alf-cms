<?php
/**
* Classe principal do sistema
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

class App {

/**
 * Inicia o timer interno
 *
 * @return void
 */
    public static function start() {
        if (!defined('TIME_START'))
            define('TIME_START', microtime(true));
    }

/**
 * Informa o tempo de execução do sistema
 *
 * @return float
 */
    public static function finish() {
        return microtime(true) - TIME_START;
    }

/**
 * Carrega arquivos
 *
 * @param mixed $config
 * @return bool
 */
    public static function load($config = null, $context = CORE) {
        if ($config) {
            if (is_array($config)){
                foreach ($config as $file) {
                    if (file_exists($context . DS . $file . '.php')) {
                        require_once $context . DS . $file . '.php';
                    }
                }
            } else {
                require_once $context . DS . $config . '.php';
            }
            return true;
        }
        return false;
    }
}