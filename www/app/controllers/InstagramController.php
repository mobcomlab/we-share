<?php

class InstagramController extends Controller {

	public static function configUrl(){

		$tag = 'khaokho'; // Tag name or Hash Tag
		$client_id = Constants::INSTAGRAM_API_SECRET;
		$check_mintag = Mintag::orderBy('id', 'DESC')->first();
		if($check_mintag == null){
			$url = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?client_id='.$client_id;
		}else{
			$min_tag = $check_mintag->min_tag_id;
			$url = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?client_id='.$client_id.'&min_tag_id='.$min_tag;
		}

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

		return $results;
	}

	public static function insertLocationTb($results) {

		if($results['data'] != null){
			foreach($results['data'] as $item){
	        	// ---------------------------Start Table Location---------------------------
			    if (is_array($item['location']))
			    {
			    	$location = new Location();
			    	$location_name = null;
			    	if (isset($item['location']['name']))
			    	{
			    		$location_name = $item['location']['name'];
			    	}

			    
			    	$latitude = $item['location']['latitude'];
			    	$longitude = $item['location']['longitude'];

			    	$check_data3 = DB::table('location')->select('name')->where('name',$location_name)->get();

				    if ($check_data3 == null)
				    {
				    	if($location_name != '')
				    	{
				    		$location->name = $location_name;
				    		$location->latitude = $latitude;
				    		$location->longitude = $longitude;

				    		$location->save();
				    	}
				    }
				}
				// ---------------------------END Table Location---------------------------
			}
		}

		

	}

	public static function insertAllTb($results) {

		if($results['data'] != null){
        	foreach($results['data'] as $item){
	        	// ---------------------------Start Table Location---------------------------
			    if (is_array($item['location']))
			    {
			    	$location = new Location();
			    	$location_name = null;
			    	if (isset($item['location']['name']))
			    	{
			    		$location_name = $item['location']['name'];
			    	}
			    
			    	$latitude = $item['location']['latitude'];
			    	$longitude = $item['location']['longitude'];

			    	$check_data3 = DB::table('location')->select('name')->where('name',$location_name)->get();

				    if ($check_data3 == null)
				    {
				    	if($location_name != '')
				    	{
				    		$location->name = $location_name;
				    		$location->latitude = $latitude;
				    		$location->longitude = $longitude;

				    		$location->save();
				    	}
				    }
				}
				// ---------------------------END Table Location---------------------------

	        	// ---------------------------Start Table Image---------------------------
	        	$image = new Image();
			    $standard_resolution_link = $item['images']['standard_resolution']['url'];
			    $thumbnail_link = $item['images']['thumbnail']['url'];
			    $comment_count = $item['comments']['count'];
			    $like_count = $item['likes']['count'];
			    $posted_at = $item['created_time'];
			    $link_url = $item['link'];
			    $author_image_url = $item['caption']['from']['profile_picture'];
			    $author_name = $item['caption']['from']['full_name'];
			    $author_link_url = 'http://instagram.com/'.$item['caption']['from']['username'];
			    $username = $item['caption']['from']['username'];

			    $check_data1 = DB::table('image')->select('link_url')->where('link_url', $link_url)->get();

			    if ($check_data1 == null){
			    	$image->standard_url = $standard_resolution_link;
					$image->thumbnail_url = $thumbnail_link;
				    $image->count_comment = $comment_count;
				    $image->count_likes = $like_count;
				    $image->posted_at = date("Y-m-d H:i:s", $posted_at);
				    $image->link_url = $link_url;
				    $image->author_image_url = $author_image_url;
				    $image->author_name = $author_name;
				    $image->author_link_url = $author_link_url;
				    $image->username = $username;
				    $image->source_id = 1;
				    if (isset($location_name))
			    	{
			    		$checkLocation = DB::table('location')->select('location_id','name')->where('name', $location_name)->first();
			    		$locationName = $checkLocation->name;
			    		$locationID = $checkLocation->location_id;
						if ($location_name == $locationName)
						{
							$image->location_id = $locationID;
						}
						else
						{
						    $image->location_id = 1;
						}
					}else{
						$image->location_id = 1;

					}
				    //$image->tag_id = 1;
				 
					$image->save();
			    }
			    // ---------------------------END Table Image---------------------------

			    // ---------------------------Start Table Tag---------------------------
			    $tag = new Tag();
			    $tag_name = $item['tags'];
			    $count_tag = sizeof($tag_name);
			    $i=0;
			    while ($i < $count_tag) {
			    	$check_data2 = DB::table('tag')->select('tag')->where('tag',$item['tags'][$i])->get();

			    	if ($check_data2 == null) {
			    		$tag->tag = $item['tags'][$i];
			    		$tag->pull_from_ig = true;
			    		$tag->status = "Not";
			    		$tag->save();
			    	}
			    	$i++;
			    }
			    // ---------------------------END Table Tag---------------------------

			}
		}
	}// ---------------------------END Function Insert All Table---------------------------

	public static function insertImageTagTb($results) {
		if($results['data'] != null){
			foreach($results['data'] as $item)
			{
				$imagetag = new ImageTag();
			    $link_url = $item['link'];
			    $tag_names = $item['tags'];

			    $count_tag = sizeof($tag_names);
			    $i=0;
			    while ($i < $count_tag)
			    {
			    	$image = Image::where('link_url', $link_url)->first();
			    	$tag = Tag::where('tag', $tag_names[$i])->first();

			    	if (isset($image->image_id) && isset($tag->tag_id))
			    	{
			    		$check_id1 = ImageTag::where('image_id',$image->image_id)->first();
			    		$check_id2 = ImageTag::where('tag_id',$tag->tag_id)->first();

			    		if($check_id1 == null && $check_id2 == null)
			    		{
			    			ImageTag::insert(array('image_id'=>$image->image_id,'tag_id'=>$tag->tag_id));
			    		}else{
			    			ImageTag::insert(array('image_id'=>$image->image_id,'tag_id'=>$tag->tag_id));
			    		}
			    	}
			    	else{

			    	}
			    	$i++;
			    }
			}
		}

	}// ---------------------------END Function Insert Image Tag Table---------------------------

	public static function insertMintagTb($results){
		if(isset($results['pagination']['min_tag_id'])){
			
			$mintag = new Mintag();
			$mintag->min_tag_id = $results['pagination']['min_tag_id'];
			$mintag->save();
		}else{

		}
	}

	public function insertTb(){
		$results = self::configUrl();
		self::insertLocationTb($results);
		self::insertAllTb($results);
		self::insertImageTagTb($results);
		self::insertMintagTb($results);
	}

	public function subStringUsername(){
		$images = Image::all();

		foreach ($images as $image) {
			if ($image->username == "") {
				Image::where('image_id',$image->image_id)->update(['username' => substr($image->author_link_url,21)]);
			}
		}

		return View::make('test');
	}

	public function searchUsername(){
		$images = Image::all()->take(3);

		foreach ($images as $image) {
			
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

			echo $profile_picture."<br>";
		}
		return View::make('test');
	}

	public function testJson(){

		$query = Image::query();
		$query->join('imagetag','image.image_id','=','imagetag.image_id')->join('tag','imagetag.tag_id','=','tag.tag_id')->join('location','image.location_id','=','location.location_id')->select('image.image_id','thumbnail_url','standard_url','count_comment','count_likes','posted_at','link_url','author_image_url','author_name','author_link_url','source_id','location.location_id','image.created_at','image.updated_at','tag.tag_id','tag','pull_from_ig','name','latitude','longitude')->distinct()->where('tag.tag','khaokho')->orderBy('image.image_id', 'DESC')->take(50);
		$images = $query->get();

		echo $images;

		return View::make('test');
	}

}
