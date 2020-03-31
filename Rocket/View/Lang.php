<?php 

namespace Rocket\View;

use eftec\bladeone\BladeOne; 
use eftec\bladeone\BladeOneLang;

/**
 * The Language Class for Translation In the Template
 */
class Lang extends BladeOne
{
    use BladeOneLang;
    /**
     * To Use This Class Just
     * use Rocket\View\Lang;
     * Lang::$dictionary=array(
     *      'Hat'=>'Sombrero',
     *      'Cat'=>'Gato',
     *      'Cats'=>'Gatos', // plural
     *      '%s is a nice cat'=>'%s es un buen gato'
     * );
     */
}
    $dotenv = \Dotenv\Dotenv::createMutable(getenv('BASE_PATH'));
    $dotenv->load();
    $views = getenv('BASE_PATH').getenv('BLADE_VIEW');
    $cache = getenv('BASE_PATH').getenv('BLADE_CACHE');
    $langPath = getenv('BASE_PATH').getenv('BLADE_LANG');
    $log = getenv('BASE_PATH').'/log.txt';
    $blade = new BladeOne($views, $cache, BladeOne::MODE_FAST);
    $blade->setBaseUrl(getenv('APP_URL'));
    $blade->setIsCompiled(false); 
    $blade->missingLog=$log; // if a traduction is missing the it will be saved here.
    $lang='jp'; // try es,jp or fr
    include $langPath.$lang.'.php';
?>