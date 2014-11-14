<?php

namespace EasyDeployer;

/**
 * Object to encapsulate the http requests related functionality/operations
 */
class HttpRequest
{
	private $params;

	/**
	 * Class constructor
	 */
	public function __construct()
	{
		$this->params = $this->_normalizeParams( array_merge($_POST, $_GET) );
	}

	/**
	 * Gets a param value by the param name 
	 */
	public function getParam( $name )
	{
        return isset( $this->params[$name] ) ? $this->params[$name]  : null;
    }

    /**
	 * Sets a param
	 */
    public function setParam( $name, $value )
    {
        
        $this->params[$name] = $value;
    }

    /**
	 * Checks wether a param exists in the request or not
	 */
    public function paramExists($name)
    {
    	return isset( $this->params[$name] ) ? true  : false;
    }

    /**
	 * Checks wether the request method is POST
	 */
    public function isPost()
    {
    	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    		return true;
    	}
    	return false;
    }

    /**
	 * Checks wether the request method is GET
	 */
    public function isGet()
    {
    	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    		return true;
    	}
    	return false;
    }

    /**
	 * Normalizes the params names and values to UTF8
	 */
	private function _normalizeParams( array $params )
	{
		$normalized_params = array();
		foreach ($params as $key => $value) {
			if( iconv("UTF-8", "UTF-8", $key ) != $key ){
				$key = utf8_encode($key);	
			}

			if( iconv("UTF-8", "UTF-8", $value ) != $value ){
				$value = utf8_encode($value);	
			}
			
			$normalized_params[$key] = $value;
		}

		return $normalized_params;
	}


}