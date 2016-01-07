<?php

class AdminController extends BaseController {
	
	public function index() {
		return View::make('adminindex');
	}

	public function manage() {
		$query = Tag::select('tag_id','tag','pull_from_ig','status')->get();
		return View::make('manage')->with(array('querys' => $query));
	}

	public function updateStatusY(){
		$tagID= Input::get('id');
		Tag::where('tag_id','=',$tagID)->update(array('status' => 'Use'));
		echo $tagID;
	}

	public function updateStatusN(){
		$tagID= Input::get('id');
		Tag::where('tag_id','=',$tagID)->update(array('status' => 'Not'));
		echo $tagID;
	}

}
