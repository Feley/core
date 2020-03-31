<?php 

namespace Rocket\View;

use use eftec\bladeone\BladeOneLang;

/**
 * The Language Class for Translation In the Template
 */
class Lang extends BladeOneLang
{
    /**
     * To Use This Class Just
     * use Rocket\View\Lang;
     * Lang::$dictionary=array(
     *      'Hat'=>'Sombrero',
     *      'Cat'=>'Gato',
     *      'Cats'=>'Gatos', // plural
     *      '%s is a nice cat'=>'%s es un buen gato'
     * );
     * /
}

?>