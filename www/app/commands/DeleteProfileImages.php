<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class DeleteProfileImages extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'delete:profileimages';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Delete Profile Images in DB and update Profile Image.';

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
		$this->info('Checking all profile images...');

		$images = Image::all();

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

				$url = 'https://api.instagram.com/v1/users/search?q='.$image->username.'&access_token=1040772762.5b9e1e6.7a7387aa92a546de86fde4fc4aec0d5b';
				$ch = curl_init();
				curl_setopt_array($ch, array(
					CURLOPT_URL => $url,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_SSL_VERIFYPEER => false,
					CURLOPT_SSL_VERIFYHOST => 2
				));
				$result = curl_exec($ch);
				curl_close($ch);
				$results = json_decode($result, true);
				$profile_picture = $results['data'][0]['profile_picture'];
				$this->info('New Profile Picture : '.$profile_picture);
				Image::where('image_id',$image->image_id)->update(array('author_image_url' =>$profile_picture));
				$this->info('Update Complete'.$image->author_image_url);
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
