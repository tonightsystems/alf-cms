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
 * Inicia o sistema
 *
 * @return void
 */
    public static function start() {
        ob_start();
    }

/**
 * Finaliza o sistema
 *
 * @return void
 */
    public static function finish() {
        ob_end_flush();
    }

/**
 * Carrega arquivos
 *
 * @param mixed $config
 * @return bool
 */
    public static function load($config = null, $context = CORE) {
        if ($config) {
            if (!is_array($config)) {
                $config = array($config);
            }

            foreach ($config as $file) {
                if (file_exists($context . DS . $file . EXT)) {
                    require_once $context . DS . $file . EXT;
                }
            }
        }

        return false;
    }

/**
 * Timer interno do sistema
 *
 * @param  string $command Caso `$command` seja 'start', inicia o timer do sistema,
 *                         caso contrário, retorna o tempo de execução até o momento
 * @return void|float
 */
    public static function timer($command) {
        return microtime(true) - TIME_START;
    }
}