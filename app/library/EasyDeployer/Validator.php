<?php
namespace EasyDeployer;
/**
 * Object to encapsulate validation functions
 */
class Validator
{
	/**
	 * Asserts wether the value is an MD5 hash
	 * @param string $value
	 */
	public static function isMD5( $value )
	{
		if (preg_match( "/^[0-9a-f]{32}$/i", $value )) {
				return true;
		}
		
		return false;
	}

	/**
	 * Checks that the task array has the proper indexes
	 */
	public static function checkTaskFormat( array $task )
	{
		if ( !isset($task['name']) ) {
			return false;
		}

		if ( !isset($task['sh_file']) ) {
			return false;
		}

		return true;
	}
}