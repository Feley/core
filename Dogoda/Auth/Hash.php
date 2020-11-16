<?php
namespace Dogoda\Auth;

/**
 * The Hash class for the auth package.
 */
class Hash
{
	private $engine = "PASSWORD_BCRYPT";
	private $cost = 10;

	/**
	 * 
	 * 
	 * 
	 */
	function __construct($engine = null)
	{
		if(!$engine == null){
			$this->engine = "PASSWORD_BCRYPT";
		}else{
			$this->engine = "PASSWORD_".strtoupper($engine);
		}
	}

	/**
	 * 
	 * Check the given plain value against a hash.
	 * 
	 */
	public static function check(string $new, string $old, array $options = []):bool
	{
		if(password_verify($new, $old))
		{
			$check_result =  true;
		}else{
			$check_result =  false;
		}
		return $check_result;
	}

	/**
	 * Hash the given value.
	 * 
	 */
	public static function make(string $password, array $options = []): string
	{
		$this->cost = $options['cost'];
		$hash = password_hash($password, $this->engine, ["cost" => $this->cost]);
		return $hash;
	}

	/**
	 * 
	 * Check if the given hash has been hashed using the given options.
	 * 
	 */
	public static function needsRehash(string $hash, array $options = []): bool
	{
		$check = password_needs_rehash($hash, $this->engine, $options);
		return $check;
	}

}
?>