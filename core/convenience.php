<?php
/**
* Funções utilitárias de conveniência
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

define('SECOND', 1);
define('MINUTE', 60);
define('HOUR', 3600);
define('DAY', 86400);
define('WEEK', 604800);
define('MONTH', 2592000);
define('YEAR', 31536000);

/**
 * Imprime tags `<pre>` ao redor do resultado de uma chamada à função `print_r()`
 *
 * @param array $var Variável à ser impressa
 */
function pr($var = array()) {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

/**
 * Traduz a string
 *
 * Configurado via `Config::set('languafe', '')` no arquivo de configuração do
 * usuário na raiz do sistema.
 *
 * @param  string   $string     A string a ser traduzida
 * @return string               A string traduzida de acordo com a língua definida
 * @todo   Criar classe de tradução
 */
function __($string) {
    return $string;
}