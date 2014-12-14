<?php
namespace EasyDeployer;

use EasyDeployer\HttpRequest;

/**
 * Main object for the deploying
 */
class EasyDeployer
{

	/**
	 * Resolves task and makes deployment
	 */
	public function deploy( array $task )
	{
		$sh_command = 'sh ' . Config::get('task_files_path') . $task['sh_file'];
		system($sh_command);	
	}
	
}