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
        $dotenv = \Dotenv\Dotenv::createMutable(getenv('BASE_PATH'));
        $dotenv->load();
        //$views = getenv('BASE_PATH').getenv('BLADE_VIEW');
        $path = getenv('BASE_PATH');
        // change default namespace for all routes
        parent::setDefaultNamespace('\Voom\Controller');
        require_once($path.'/routes/web.php');
        // Do initial stuff
        parent::start();

    }
}
 ?>