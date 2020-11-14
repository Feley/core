<?php 

namespace Rocket\Routing;
use Pecee\SimpleRouter\SimpleRouter;
//use Pecee\Http\Request;
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
        try{
            foreach (glob($path."/routes/*.php") as $route) {
                require_once($route);
            }
        }
        catch (Exception $e){
                //set the error_get_last
            parent::error(function(Request $request, \Exception $exception){
                if($exception instanceof NotFoundHttpException && $exception->getCode() === 404){
                    throw new \Exception($exception);
            }
        });
        //echo 'Route not found: ', $e->getMessage(), $exception->getCode(), "\n";
        }
        // Do initial stuff
        parent::start();

    }
}
 ?>