@extends('layouts.base')

@section('content')
	<div id="container">
		<div class="grid-sizer"></div>
		@foreach($images as $image)
		<!-- Modal 1 -->
		<div class="item">
			{{ HTML::image($image->standard_url, 'a picture', array('class' => 'image')) }}
			<a class="overlay" data-toggle="modal" data-target="#{{$image->image_id}}">
				<h3 class="title" id="txt-w-sm">{{$image->name}}</h3>
				<div class="description">
					<p id="txt-w-sm16">
						{{ HTML::image($image->author_image_url, 'a', array('width' => 20, 'height' => 20)) }} Icezz Kittitanasan <img src="img/instagram2.png" width="80" class="pull-right">
					</p>
				</div>
			</a>
		</div>

		<div class="modal fade" id="{{$image->image_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">{{ HTML::image('img/pin56.png', '', array('width' => 20)) }} {{ HTML::link('http://maps.google.com/?q='.$image->latitude.','.$image->longitude, $image->name, array('id' => 'txt-b-sm'))}}</h4>
		      </div>
		      <div class="modal-body">
			      <center>
			      	{{ HTML::image($image->standard_url, 'a picture', array('class' => 'img-responsive', 'width' => 450, 'height' => 450)) }}
			      </center>
		      </div>
		      <div class="modal-footer">
		      	<div class="pull-left" id="txt-g">
		      		{{ HTML::image('img/clock96.png', '', array('width' => 15, 'height' => 15)) }}
		      		 {{$image->posted_at->format(Constants::DATE_FORMAT)}}
              		{{ HTML::image('img/loving1.png', '', array('width' => 15, 'height' => 15)) }}
              		 {{$image->count_likes}}
              		{{ HTML::image('img/comments.png', '', array('width' => 15, 'height' => 15)) }}
              		 {{$image->count_comment}}
		      	</div>
		        <button type="button" class="btn btn-primary  btn-sm" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Modal 1 -->
		@endforeach
	</div>


@stop
