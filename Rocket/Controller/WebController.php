<?php

namespace Rocket\Controller;

use Symfony\Component\HttpFoundation\Response;
use eftec\bladeone\BladeOne;

Class WebController 
{
    public function view($view, $variables = [])
    {
        $dotenv = Dotenv\Dotenv::createMutable(__DIR__);
        $dotenv->load();
        $views = __DIR__.getenv('BLADE_VIEW');;
        $cache = __DIR__.getenv('BLADE_CACHE');;
        $blade = new BladeOne($views, $cache, BladeOne::MODE_FAST);
        $blade->setIsCompiled(false); 
        $content = $blade->run($view, $variables);
        return Response::create($content);
    }
}
?>

