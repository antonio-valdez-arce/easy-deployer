<?php
namespace EasyDeployer;

use EasyDeployer\HttpRequest;

/**
 * Main object for the deploying
 */
class EasyDeployer
{
	protected $request;

	/**
	 * Object constructor
	 */
	public function __construct( HttpRequest $request )
	{
		$this->request = $request;
	}

	/**
	 * Resolves task and makes deployment
	 */
	public function deploy()
	{
		
	}
	
}