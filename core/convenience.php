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
 * Timer interno do sistema
 */
define('TIME_START', microtime(true));

/**
 * Constantes de conveniência para conversão de tempo
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

/**
 * Redireciona para outra URL
 *
 * @param  string  $url       URL do redirecionamento. Deve ser completa (http://)
 * @param  boolean $permanent Indica se o redirect é 301 ou 302
 * @return void
 */
function redirect($url = null, $permanent = false) {
    if ($url) {
        if ( strpos($url, 'http') === false ) {
            $url = getCurrentUrl(array('query_string' => false)) . $url;
        }

        if($permanent) {
            header('HTTP/1.1 301 Moved Permanently');
        }

        header('Location: ' . $url);
        exit();
    }
}

/**
 * Pega a URL atual
 *
 * @return string $url A URL atual
 */
function getCurrentUrl($options = array()) {
    $defaults = array(
        'query_string' => true,
    );
    $options = array_merge($defaults, $options);

    $url  = ($_SERVER['HTTPS'] != 'on') ? 'http://'.$_SERVER['SERVER_NAME'] : 'https://'.$_SERVER['SERVER_NAME'];
    $url .= ($_SERVER['SERVER_PORT'] !== 80) ? ':'.$_SERVER['SERVER_PORT'] : '';

    if ($options['query_string']) {
        $url .= $_SERVER['REQUEST_URI'];
    } else {
        $tmpURL = explode('?'.$_SERVER['QUERY_STRING'], $_SERVER['REQUEST_URI']);
        $url .= $tmpURL[0];
    }

    return $url;
}
