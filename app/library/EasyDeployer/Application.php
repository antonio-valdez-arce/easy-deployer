<?php

namespace EasyDeployer;

require_once 'EasyDeployer.php';
require_once 'HttpRequest.php';
require_once 'Validator.php';

class Application
{
	protected $request;

	public function __construct()
	{
		$this->request = new HttpRequest();
	}

	/**
	 * Executes the request and the deploymet
	 */
	public function dispatch()
	{
		if (! $this->request->isGet()) {
			//throw new \Exception("Method not allowed.", 1);
		}

		$task_hash = $this->request->getParam('task');

		if (! Validator::isMD5($task_hash) === true) {
			throw new \Exception("Wrong task hash format.", 2);
		}

		$tasks = Config::get('tasks');
		$task = $tasks[$task_hash];

		if (! Validator::checkTaskFormat($task) ) {
			throw new \Exception("Wrong task array format.", 3);
		}

		if (! file_exists( Config::get('task_files_path') . $task['sh_file']) ) {
			throw new \Exception("SH task file doesn't exist.", 4);
		}


		$easy_deployer = new EasyDeployer();
		$easy_deployer->deploy( $task );
	}
	
}
