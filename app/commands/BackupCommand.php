<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class BackupCommand extends Command {
  const BACKUP_DIR = '/tmp/backups';

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'webcms:backup';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Performs a full backup of webcmsr source code + database.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		throw new Exception('Sorry, this no longer works.');
	    // $tempDir = self::BACKUP_DIR.'/webcmsr';
	    // @mkdir($tempDir, 0700, true);

	    // // Copy webcmsr source code into backup folder.
	    // $args = array('-r', base_path(), $tempDir.'/src');
	    // H::exec('cp', $args);

	    // // Dump database
	    // $args = array('-U', 'postgres', '-Fc', 'webcmsr');
	    // H::exec('pg_dump', $args, $tempDir.'/webcmsr-db.dump');

	    // // Compress/archive source + db dump
	    // $date = date('Y-m-d');
	    // $archive = self::BACKUP_DIR.'/webcmsr-'.$date.'.tar.bz2';

	    // $args = array('-jcf', $archive, $tempDir);
	    // H::exec('tar', $args);

	    // // Cleanup
	    // FileHelper::deleteDir($tempDir);

	    // $this->info('Done');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments() {
		return array(
			array('example', InputArgument::OPTIONAL, 'An example argument.'),
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
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
