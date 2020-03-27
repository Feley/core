<?php 

namespace Rocket\Routing;
use Pecee\SimpleRouter\SimpleRouter;
/**
 * Routing Class extends Routes
 */
class Router extends SimpleRouter
{
    public static function startNow() {
        $path = getenv('BASE_PATH');
        // change this to whatever makes sense in your project
        // change default namespace for all routes
        parent::setDefaultNamespace('\Voom\Controller');
        foreach (glob($path."/routes/*.php") as $route) {
            require_once($route);
        }
        
        // Do initial stuff
        parent::start();

    }
}
 ?>