<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class DeleteImages extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'delete:images';

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
		$this->info('Checking all images...');

		// Get all the images
		$images = Image::all();

		// Loop over images to check each one exists
		foreach($images as $image) {

			// Send HEAD request
			$c = curl_init();
			curl_setopt( $c, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $c, CURLOPT_CUSTOMREQUEST, 'HEAD' );
			curl_setopt( $c, CURLOPT_HEADER, 1 );
			curl_setopt( $c, CURLOPT_NOBODY, true );
			curl_setopt( $c, CURLOPT_URL, $image->author_image_url);
			$res = curl_exec( $c );

			$this->info('ERROR HTTP CODE : '.curl_getinfo($c,CURLINFO_HTTP_CODE));

			// If 404 not found then delete from db
			if (curl_getinfo($c,CURLINFO_HTTP_CODE) == 404) {
				$this->info('Deleting: '.$image->image_id);
				$image->delete();
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
