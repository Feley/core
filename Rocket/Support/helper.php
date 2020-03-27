<?php
use eftec\bladeone\BladeOne;

if(!function_exists('view')){
    function view($view, $variables = [])
    {
        $dotenv = \Dotenv\Dotenv::createMutable(getenv('BASE_PATH'));
        $dotenv->load();
        $views = getenv('BASE_PATH').getenv('BLADE_VIEW');
        $cache = getenv('BASE_PATH').getenv('BLADE_CACHE');
        $blade = new BladeOne($views, $cache, BladeOne::MODE_FAST);
        $blade->setBaseUrl(getenv('APP_URL'));
        $blade->setIsCompiled(false); 
        $content = $blade->run($view, $variables);
        echo $content;
    }
}
?>