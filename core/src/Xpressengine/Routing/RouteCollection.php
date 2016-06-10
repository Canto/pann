<?php
/**
 * RouteCollection
 *
 * PHP version 5
 *
 * @category  Routing
 * @package   Xpressengine\Routing
 * @author    XE Developers <developers@xpressengine.com>
 * @copyright 2015 Copyright (C) NAVER Corp. <http://www.navercorp.com>
 * @license   LGPL-2.1
 * @license   http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html
 * @link      https://xpressengine.io
 */

namespace Xpressengine\Routing;

use Illuminate\Routing\Route;
use Illuminate\Routing\RouteCollection as LaravelRouteCollection;

/**
 * Class RouteCollection
 *
 * @category    Routing
 * @package     Xpressengine\Routing
 */
class RouteCollection extends LaravelRouteCollection
{

    /**
     * A look-up table of routes by xpressengine source.
     *
     * @var array
     */
    protected $moduleList = [];

    protected $settingsMenuList = [];

    /**
     * Add the route to any look-up tables if necessary.
     *
     * @param  Route $route illuminate route
     *
     * @return void
     */
    protected function addLookups($route)
    {
        // If the route has a name, we will add it to the name look-up table so that we
        // will quickly be able to find any route associate with a name and not have
        // to iterate through every route every time we need to perform a look-up.
        $action = $route->getAction();

        if (isset($action['as'])) {
            if (isset($action['module'])) {
                $this->nameList[$action['module'] . "." . $action['as']] = $route;
            } else {
                $this->nameList[$action['as']] = $route;
            }
        }

        // When the route is routing to a controller we will also store the action that
        // is used by the route. This will let us reverse route to controllers while
        // processing a request and easily generate URLs to the given controllers.
        if (isset($action['controller'])) {
            $this->addToActionList($action, $route);
        }

        if (isset($action['module'])) {
            $this->addToModuleList($action, $route);
        }

        if (isset($action['settings_menu'])) {
            $this->addToSettingsMenuList($route);
        }
    }

    /**
     * Add a route to the controller source dictionary.
     *
     * @param  array $action action array
     * @param  Route $route  route
     *
     * @return void
     */
    protected function addToModuleList($action, $route)
    {
        $this->moduleList[$action['module']] = $route;
    }

    /**
     * addToSettingsMenuList
     *
     * @param Route $route route
     *
     * @return void
     */
    protected function addToSettingsMenuList($route)
    {
        $this->settingsMenuList[] = $route;
    }

    /**
     * Get a route instance by its source.
     *
     * @param  string $module module id
     *
     * @return Route|null
     */
    public function getByModule($module)
    {
        return isset($this->moduleList[$module]) ? $this->moduleList[$module] : null;
    }

    /**
     * getSettingsMenuRoutes
     *
     * @return array
     */
    public function getSettingsMenuRoutes()
    {
        return $this->settingsMenuList;
    }
}
