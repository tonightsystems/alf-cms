<?php
/**
* Wizard de instalação do sistema
*
* Executa as verificações inicias de instalação do sistema e prossegue com a criação dos arquivos
* e tabelas no banco de dados caso necessário.
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

class Wizard {

/**
 * Inicializa  Wizard
 *
 * @return void
 */
    public function init() {
        define('WIZARD', dirname(__FILE__));
        static::checkConfig();
    }

/**
 * Verifica a existência do arquivo de configuração
 *
 * @return void
 */
    private function checkConfig() {
        if (!file_exists(ROOT . DS . 'config' . EXT)) {
            App::load('setup', WIZARD);
        }
    }
}
