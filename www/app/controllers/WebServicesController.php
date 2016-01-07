<?php

class WebServicesController extends BaseController {

	public function getSources() {

		$sources = Source::query()->get();

		return $sources;
	}

	public function getTags() {
		$tags = Tag::query()->orderBy('tag')->get();

		return Response::json($tags);
	}

	public function getLocations() {
		$locations = Location::query()->get();

		return Response::json($locations);
	}

	public function getData() {

		if (Input::has('imgId')) {
			$img = Input::get('imgId');
			$query = Image::join('location','image.location_id','=','location.location_id')->where('image_id','>',$img)->orderBy('image_id', 'DESC')->get();
		}
		elseif(Input::has('imgId') && Input::has('tag')) {
			$query = Image::query();
			$img = Input::get('imgId');
			$tag = Input::get('tag');
			$query->join('imagetag','image.image_id','=','imagetag.image_id')->join('tag','imagetag.tag_id','=','tag.tag_id')->join('location','image.location_id','=','location.location_id')->where('tag.tag',$tag)->where('image.image_id','>',$img)->orderBy('image.image_id', 'DESC')->get();
		}
		elseif(Input::has('limit') && Input::has('tag')) {
			$limit = Input::get('limit');
			$tag = Input::get('tag');
			if ($tag == 'all') {
				$query = Image::join('imagetag','image.image_id','=','imagetag.image_id')->join('tag','imagetag.tag_id','=','tag.tag_id')->join('location','image.location_id','=','location.location_id')->select('image.image_id','thumbnail_url','standard_url','count_comment','count_likes','posted_at','link_url','author_image_url','author_name','author_link_url','source_id','location.location_id','image.created_at','image.updated_at','pull_from_ig','name','latitude','longitude')->where('image.image_id','<',$limit)->distinct()->orderBy('image.image_id', 'DESC')->take(50)->get();
			}
			else{
				$query = Image::join('imagetag','image.image_id','=','imagetag.image_id')->join('tag','imagetag.tag_id','=','tag.tag_id')->join('location','image.location_id','=','location.location_id')->where('tag.tag',$tag)->where('image.image_id','<',$limit)->orderBy('image.image_id', 'DESC')->take(50)->get();
			}
		}
		elseif(Input::has('tag')){
			$tag = Input::get('tag');

			if ($tag == "all") {		
				$query = Image::join('location','image.location_id','=','location.location_id')->orderBy('image.image_id', 'DESC')->take(50)->get();
			}else{
				$query = Image::join('imagetag','image.image_id','=','imagetag.image_id')->join('tag','imagetag.tag_id','=','tag.tag_id')->join('location','image.location_id','=','location.location_id')->select('image.image_id','thumbnail_url','standard_url','count_comment','count_likes','posted_at','link_url','author_image_url','author_name','author_link_url','source_id','location.location_id','image.created_at','image.updated_at','tag.tag_id','tag','pull_from_ig','name','latitude','longitude')->distinct()->where('tag.tag',$tag)->distinct()->orderBy('image.image_id', 'DESC')->take(50)->get();
			}

		}
		else{
			$query = Image::join('location','image.location_id','=','location.location_id')->orderBy('image_id', 'DESC')->take(50)->get();
		}

		
		return Response::json($query);
	}

	public function getSilde() {
		$tag = Input::get('tag');
		if ($tag == "all") {		
			$query = Image::join('location','image.location_id','=','location.location_id')->orderBy('image.image_id', 'DESC')->get();
			return Response::json($query);
		}else {
			$query = Image::query();
			$query->join('imagetag','image.image_id','=','imagetag.image_id')->join('tag','imagetag.tag_id','=','tag.tag_id')->join('location','image.location_id','=','location.location_id')->select('image.image_id','thumbnail_url','standard_url','count_comment','count_likes','posted_at','link_url','author_image_url','author_name','author_link_url','source_id','location.location_id','image.created_at','image.updated_at','tag.tag_id','tag','pull_from_ig','name','latitude','longitude')->distinct()->where('tag.tag',$tag)->orderBy('image.image_id', 'DESC');
			$images = $query->get();
			return Response::json($images);
		}
	}

	public function getLastImageId() {

		if (Input::has('imgId')) {
			$img = Input::get('imgId');
			$query = Image::join('location','image.location_id','=','location.location_id')->where('image_id','>',$img)->orderBy('image_id', 'DESC')->take(1)->get();
		}
		elseif(Input::has('imgId') && Input::has('tag')) {
			$query = Image::query();
			$img = Input::get('imgId');
			$tag = Input::get('tag');
			$query->join('imagetag','image.image_id','=','imagetag.image_id')->join('tag','imagetag.tag_id','=','tag.tag_id')->join('location','image.location_id','=','location.location_id')->where('tag.tag',$tag)->where('image.image_id','>',$img)->orderBy('image.image_id', 'DESC')->take(1)->get();
		}
		else{
			$query = Image::join('location','image.location_id','=','location.location_id')->orderBy('image_id', 'DESC')->take(1)->get();
		}

		
		return Response::json($query);
	}


	public function getImages() {
		$query = Image::query()->with('location','source');

		if (Input::has('source')) {
			$sourceId = Input::get('source');
			$query->where('source_id', $sourceId);
		}

		if (Input::has('location')) {
			$locationId = Input::get('location');
			$query->where('location_id', $locationId);
		}

		$images = $query->get();

		return Response::json($images);
	}

	public function postData() {
		$query = Image::query();

		if (Input::has('tag')) {
			$tag = Input::get('tag');
			$query->join('imagetag','image.image_id','=','imagetag.image_id')->join('tag','imagetag.tag_id','=','tag.tag_id')->join('location','image.location_id','=','location.location_id')->select('image.image_id','thumbnail_url','standard_url','count_comment','count_likes','posted_at','link_url','author_image_url','author_name','author_link_url','source_id','location.location_id','image.created_at','image.updated_at','tag.tag_id','tag','pull_from_ig','name','latitude','longitude')->distinct()->where('tag.tag',$tag)->orderBy('image.image_id', 'DESC')->take(50);
		}

		$images = $query->get();

		return Response::json($images);
	}

	public function searchData() {

		if (Input::has('keyword')) {
			$keyword = Input::get('keyword');
			$query = Image::select('image.image_id','image.thumbnail_url','image.standard_url','image.count_comment','image.count_likes','image.posted_at','image.link_url','image.author_image_url','image.author_name','image.author_link_url','image.source_id','location.location_id','tag.pull_from_ig','name','location.latitude','location.longitude')->join('imagetag','image.image_id','=','imagetag.image_id')->join('tag','imagetag.tag_id','=','tag.tag_id')->join('location','image.location_id','=','location.location_id')->whereRaw("tag.tag  LIKE '%". $keyword ."%' OR location.name LIKE '%". $keyword ."%' OR image.author_name LIKE '%". $keyword ."%'")->distinct()->orderBy('image.image_id', 'DESC')->get();
		}
		return Response::json($query);
	}

	public function hashtag() {
		$query = Tag::where('status','Use')->get();
		return Response::json($query);
	}

}
