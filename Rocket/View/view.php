<?php

namespace Rocket\View;

use eftec\bladeone\BladeOne ;

Class View extends BladeOne
{
	public function view(String $view, Array() $array)
	{
		$views = _DIR_./views';
		$cache = _DIR_./cache';
		$blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);
		return $blade->run($view, $array);
	}
}
?>
