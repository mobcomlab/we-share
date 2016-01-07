<?php

class HomeController extends BaseController {

	public function queryData()
	{
		$images = Image::join('location','image.location_id','=','location.location_id')->get();
   		return View::make('hello')->with('images', $images);
	}

	public function queryImage()
	{
		$images = DB::table('image')->get();
   		return View::make('hello')->with('images', $images);
	}

	public function run() {	
			$query = Image::join('location','image.location_id','=','location.location_id')->orderBy('image.image_id', 'DESC')->get();
			$query2 = Tag::where('status','Use')->get();
			return View::make('index')->with(array('tag' => 'all', 'querys' => $query,'querys2' => $query2));
	}

	public function runTags($tag) {
		$query = Image::query();
		$query->join('imagetag','image.image_id','=','imagetag.image_id')->join('tag','imagetag.tag_id','=','tag.tag_id')->join('location','image.location_id','=','location.location_id')->select('image.image_id','thumbnail_url','standard_url','count_comment','count_likes','posted_at','link_url','author_image_url','author_name','author_link_url','source_id','location.location_id','image.created_at','image.updated_at','tag.tag_id','tag','pull_from_ig','name','latitude','longitude')->distinct()->where('tag.tag',$tag)->orderBy('image.image_id', 'DESC');
		$images = $query->get();
		return View::make('tag')->with(array('tag' => $tag, 'querys' => $images));
	}

	public function runSlide() {
		$query = Image::join('location','image.location_id','=','location.location_id')->get();
		return View::make('slide')->with('querys', $query);
	}

	public function showLogin()
	{
	    // show the form
	    return View::make('login');
	}

	public function doLogin()
	{
		// process the form
		$rules = array(
		    'email'    => 'required|email',
		    'password' => 'required|alphaNum|min:3'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
		    return Redirect::to('login')
		        ->withErrors($validator)
		        ->withInput(Input::except('password'));
		} else {

		    $userdata = array(
		        'email'     => Input::get('email'),
		        'password'  => Input::get('password')
		    );
		    if (Auth::attempt($userdata)) {
		         return Redirect::to('admin/index');

		    } else {        
		    	 return Redirect::to('login');
		    }

		}
	}

	public function doLogout()
	{
	    Auth::logout();
	    return Redirect::to('login');
	}

	public function headerHashtag(){
		$query = Tag::where('status','Use')->get();
		return View::make('header')->with(array('tag' => 'all', 'tag' => $query));
	}

}
