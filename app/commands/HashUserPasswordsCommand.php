<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class HashUserPasswordsCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'webcms:rehash';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Use this command to migrate from WebCMS2 to hash all user passwords.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		echo "Rehashing all user passwords from WebCMS2.".PHP_EOL;
		echo "It is safe to run this command multiple times.".PHP_EOL;
		echo "Warning: This command is CPU intensive and will take a while to execute.".PHP_EOL;

		$users = User::orderBy('id')->get();

		foreach ($users as $user)
		{
			if (Hash::needsRehash($user->password))
			{
				$user->password = $user->password;
				$user->save();
				echo ".";
			}
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
		);
	}

}
