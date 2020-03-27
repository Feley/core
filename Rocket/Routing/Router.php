<?php 

namespace Rocket\Routing;
use Pecee\SimpleRouter\SimpleRouter;
/**
 * Routing Class extends Routes
 */
class Router extends SimpleRouter
{
    public static function startNow() {

        // change this to whatever makes sense in your project
        //require_once(__DIR__.'/../routes/web.php');

        // change default namespace for all routes
        parent::setDefaultNamespace('\Voom\Controller');

        // Do initial stuff
        parent::start();

    }
}
 ?>