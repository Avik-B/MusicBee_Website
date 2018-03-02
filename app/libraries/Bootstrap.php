<?php
/**
 * Copyright (c) 2017 AvikB, some rights reserved.
 *  Copyright under Creative Commons Attribution-ShareAlike 3.0 Unported,
 *  for details visit: https://creativecommons.org/licenses/by-sa/3.0/
 *
 * @Contributors:
 * Created by AvikB for noncommercial MusicBee project.
 *  Spelling mistakes and fixes from community members.
 *
 */
namespace App\Lib;

use App\Lib\Utility\Route;
use App\Lib\Utility\Router;
use App\Lib\Utility\LanguageManager;
use App\Lib\Utility\Config as cfg;
use App\Lib\ForumHook;
use App\Lib\MBReleaseManager;

class Bootstrap
{
    private $router;

    /**
     * Bootstrap constructor.
     *
     * @param Router $newRouter
     */
    public function __construct(Router $newRouter)
    {
        $this->router = $newRouter;
        $this->initRouter($this->router);
    }

    /**
     * Setup initialize routing
     *
     * @param Router $router
     */
    public function initRouter(Router $router)
    {
        $router->route();
    }

}
