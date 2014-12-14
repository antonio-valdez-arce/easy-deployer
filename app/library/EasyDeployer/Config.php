<?php
namespace EasyDeployer;
class Config
{
	protected static $settings = array();

	public static function setConfigArray( array $config )
	{
		if( ! is_array($config) ) {
			exit('Invalid config array.');
		}

		foreach( $config as $setting_name => $value ) {
			self::$settings[$setting_name] = $value;
		}
	}

	public static function get($setting_name)
	{
		if( isset(self::$settings[ $setting_name ]) ) {
			return self::$settings[ $setting_name ];
		}	
		return null;
	}
}