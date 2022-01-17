<?php

namespace Core;

use App\Controllers\ErrorController;

class Router
{

    /**
     * Set the constant 'ROUTE'
     */
    const ROUTE = [];

    /**
     * Defines the constant 'ROUTE' and its array from $_SERVER['REQUEST_URI']
     *
     * Constant 'ROUTE' determines the foloowing routes:
     *
     * ROUTE['home']
     *
     * @return array constant 'ROUTE' for the current webpage
     * @throws ErrorController if $uriParts does not match
     */
    public static function getRoute(): array
    {

        $uriParts = explode('/', $_SERVER['REQUEST_URI']);

        if(!$uriParts[1]) {

            /**
             * It means we have the following uri: http://domainname.com
             */
            define('ROUTE', ['home']);

        } else {

            /**
             * If something wrong is happening
             */
            return ErrorController::notFound();
        }

        return ROUTE;
    }
}
