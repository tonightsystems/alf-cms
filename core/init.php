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

error_reporting(E_ALL);

require CORE . 'app' . EXT;

App::start();

App::load(array(
    'exception',
    'database'. DS .'database',
));

Database::init();

// Coisas devem acontecer aqui

App::finish();