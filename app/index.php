<?php
/**
 * Copyright (c) 2016 AvikB, some rights reserved.
 *  Copyright under Creative Commons Attribution-ShareAlike 3.0 Unported,
 *  for details visit: https://creativecommons.org/licenses/by-sa/3.0/
 *
 * @Contributors:
 * Created by AvikB for noncommercial MusicBee project.
 *  Spelling mistakes and fixes from community members.
 *
 */

//Set the memory limit
ini_set('memory_limit', '500M');

require_once '../vendor/autoload.php';


/**
 * Load i18n gettext module and language list
 */
require_once 'locale/lang.list.php';
require_once 'libraries/gettext/gettext.inc.php';

//Initialize session if not already started
App\Lib\Utility\Session::init();

/**
 * Load website and database configuration
 */
require_once 'config/config.php';
require_once 'config/database.php';
require_once 'config/paths.php';
require_once 'config/release.php';
require_once 'config/routearray.php';

use App\Lib\Bootstrap;
use App\Lib\Utility\Router;
use App\Lib\Utility\LanguageManager;
use phpFastCache\CacheManager;


/**
 * PHP Caching configuration
 * Setup File Path on your config files
 */
try{
     CacheManager::setDefaultConfig(["path" => '/cache']);
} catch (\Exception $exception) {
    die($e);
}

try {
    $InstanceCache = CacheManager::getInstance('files');
} catch (Exception $e) {
    die($e);
}


/**
 * Url routing initialize
 */
$router = new Router();

/**
 * Setup localization, cookies and redirect to proper localized url!
 */
LanguageManager::init($router->getLanguageParamFromUrl(), getLangList());
LanguageManager::redirectToUrlWithLanuageCode($router);

/**
 * Load in menu config after localization is done.
 * Load everything else that contans __() after localization
 */
require_once 'locale/langArray.php';
require_once 'config/menuconfig.php';
require_once 'view/layout/menulayout.php';
require_once 'view/layout/footerlayout.php';


/**
 * It is time to init bootstrap. This will load the MVC framework
 */
$app = new Bootstrap($router);
