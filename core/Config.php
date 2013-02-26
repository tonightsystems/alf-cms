<?php
/**
* Classe de configuração.
*
* Contém métodos para leitura e escrita de valores na configuração em tempo de
* execução do sistema, assim como métodos para carregamento e atribuição das
* configurações para uso posterior.
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

class Config {

/**
 * Guarda os valores atuas das configurações
 *
 * @var array
 */
    protected static $_values = array();

/**
 * Define valores dinâmicos das configurações
 *
 * @param  array $config Array no formato ['chave' => 'valor'] contendo as
 *                       configurações e seus respectivos valores
 * @param  mixed $value  Valor à ser atribuido à configuração, cado o parametro
 *                       `$config` seja do formato string
 * @return bool
 */
    public static function set($config, $value = null) {
        if (!is_array($config)) {
            $config = array($config => $value);
        }

        foreach ($config as $name => $value) {
            self::$_values[$name] = $value;
        }

        return true;
    }

/**
 * Retorna os valores da configuração
 *
 * @param  string $key  Nome da configuração
 * @return mixed        Valor da configuração
 */
    public static function get($key = null) {
        return self::$_values[$key];
    }
}