<?php
/**
* Carrega o sistema
*
* Responsável por carregar os outros arquivos do sistema e inicializar as
* propriedades necessárias
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

// Define o nível de aviso de erros do PHP
error_reporting(E_ALL);

// Requisita a classe principal do sistema
require CORE . 'app' . EXT;

// Inicia o timer interno do sistema
App::start();

// Carrega os arquivos do sistema
App::load(array(
    'convenience',
    'config',
    'exception',
    'database'. DS .'database',
    'wizard'. DS .'wizard',
));

// Inicia o wizard
Wizard::init();

// Carrega as configurações do usuário
App::load('config', ROOT);

// Coisas devem acontecer aqui

// Finaliza o timer do sistema
App::finish();
