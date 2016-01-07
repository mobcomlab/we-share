<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class PullImages extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'pull:images';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Pull images from social networks and store in DB.';

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
		//
		$this->info('Pulling images from Instagram...');

		$results = InstagramController::configUrl();
		InstagramController::insertLocationTb($results);
		InstagramController::insertAllTb($results);
		InstagramController::insertImageTagTb($results);
		InstagramController::insertMintagTb($results);
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
