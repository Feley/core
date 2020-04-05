<?php

namespace Rocket\View;

use eftec\bladeone\BladeOne;
use eftec\bladeone\BladeOneLang;

Class View extends BladeOne
{
	private $language;
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
	 
	 
	/**
	 *	Return the language in use
	 *	@return string
	*/
	public function getLang()
	{
		return $this->language;
	}
	
	/**
	 *	Get The translation language
	 *	@string language
	*/
	public function setLang(string $lang)
	{
		$this->language = $lang;
	}
}
?>
