<?php
/**
* Configurações personalizadas do sistema.
*
* Esse arquivo é auto gerado pelo Wizard, mas pode ser alterado manualmente se
* hover conhecimentos de programação adequados.
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
 * Configurações do banco de dados.
 */
Config::set('database_host', '');
Config::set('database_user', '');
Config::set('database_password', '');
Config::set('database_name', '');
Config::set('database_port', 3306);
Config::set('database_charset', 'utf8');

/**
 * Define o prefixo das tabelas no banco de dados.
 *
 * Alterando o prefixo das tabelas, é possível ter várias instalações em uma
 * única base de dados.
 */
Config::set('table_prefix', 'alf_');

/**
 * Define o charset do sistema
 */
Config::set('charset', 'utf-8');

/**
 * Define a linguagem padrão do sistema.
 */
Config::set('language', 'pt-BR');