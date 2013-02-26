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