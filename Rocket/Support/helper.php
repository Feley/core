<?php
use eftec\bladeone\BladeOne;
use Rocket\Routing\Router as Router;
use Pecee\Http\Url;
use Pecee\Http\Response;
use Pecee\Http\Request;

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

/**
 * Get url for a route by using either name/alias, class or method name.
 *
 * The name parameter supports the following values:
 * - Route name
 * - Controller/resource name (with or without method)
 * - Controller class name
 *
 * When searching for controller/resource by name, you can use this syntax "route.name@method".
 * You can also use the same syntax when searching for a specific controller-class "MyController@home".
 * If no arguments is specified, it will return the url for the current loaded route.
 *
 * @param string|null $name
 * @param string|array|null $parameters
 * @param array|null $getParams
 * @return \Pecee\Http\Url
 * @throws \InvalidArgumentException
 */
if(!function_exists('url')){
function url(?string $name = null, $parameters = null, ?array $getParams = null): Url
{
    return Router::getUrl($name, $parameters, $getParams);
}
}

/**
 * @return \Pecee\Http\Response
 */
if(!function_exists('response')){
function response(): Response
{
    return Router::response();
}}

/**
 * @return \Pecee\Http\Request
 */
if(!function_exists('request')){
function request(): Request
{
    return Router::request();
}
}

/**
 * Get input class
 * @param string|null $index Parameter index name
 * @param string|null $defaultValue Default return value
 * @param array ...$methods Default methods
 * @return \Pecee\Http\Input\InputHandler|array|string|null
 */
if(!function_exists('input')){
function input($index = null, $defaultValue = null, ...$methods)
{
    if ($index !== null) {
        return request()->getInputHandler()->value($index, $defaultValue, ...$methods);
    }

    return request()->getInputHandler();
}
}
/**
 * @param string $url
 * @param int|null $code
 */
if(!function_exists('redirect')){
function redirect(string $url, ?int $code = null): void
{
    if ($code !== null) {
        response()->httpCode($code);
    }

    response()->redirect($url);
}
}

/**
 * Get current csrf-token
 * @return string|null
 */
if(!function_exists('csrf_token')){
function csrf_token(): ?string
{
    $baseVerifier = Router::router()->getCsrfVerifier();
    if ($baseVerifier !== null) {
        return $baseVerifier->getTokenProvider()->getToken();
    }

    return null;
}
}
?>