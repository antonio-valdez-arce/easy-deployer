easy-deployer
=============

A simple script written in PHP to help deploying simple applications from github or any repository supporting Webhooks.

Work in progress.

Installation
------------

1. You need to have a public domain or subdomain to host this application, example: deploy.yourdomain.com
2. Place the contents of the app folder into your deploy app webroot folder.
3. Copy `/config.php.sample` to `/config.php`, change it to fit your needs:

 ```php
	 $config['tasks'] = array(
		'task-md5-key' => array(
							'name' => 'Sample site',
							'sh_file' => 'sample.sh',
						  ),
	 );
 ```

 *task-md5-key*: the md5 key identifying the task (will be past in the url)
 *name*: the name of the task, just to remember what the task it's about
 *sh_file*: the name of the SH file containing the deploying script.

4. Copy `/tasks/sample.sh` to `/tasks/your-task-name.sh` and write your app deploying script.

   Here you have to write your actual build and deployment instructions. 

   For example: 
   * clone your jekyll blog from github 
   * build it (of course you need to have jekyll installed in your server) 
   * copy built files to the correct location
   * finally clean up
   * etc.

5. Test your task running it from the browser:

http://deploy.yourdomain.com/?task=task-md5-key

6. Once your task runs correctly, create a webhook in github (in the repository of the app you want to deploy), in the url enter the url of your task.

