<?php
/**
* Alf CMS
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
 * Define as constantes principais do sistema
 */
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__) . DS);
define('CORE', ROOT . DS . 'core' . DS);
define('THEMES', ROOT . DS . 'themes' . DS);
define('EXT', '.php');

// Inicia o sistema
require CORE . 'init' . EXT;
