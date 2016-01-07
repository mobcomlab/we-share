<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class PullUsernames extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'pull:usernames';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Pull usernames from social networks and store in DB.';

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
		$this->info('Updateing all usernames...');

		// Get all the images
		$images = Image::all();

		// Loop over images to check each one exists
		foreach ($images as $image) {
			if ($image->username == "") {
				$this->info('Update'.$image->image_id);
				Image::where('image_id',$image->image_id)->update(['username' => substr($image->author_link_url,21)]);
				$this->info('Update Compelete '.$image->username);
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
