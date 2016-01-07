@extends('layouts.base')

@section('content')

  <div id="container">
      <div class="grid-sizer"></div>
  </div>

{{ HTML::script('js/dynamic-khaokho.js')}}
@stop

@section('script')

function updateTest() {

	$.getJSON( "/api/images?tag=" + '{{ $tag }}' )
  		.done(function(data) {
			if(data != '') {
					$('#container').empty();
					$.each(data, function(key, val) {
						var html;
						html = '<div class="item">' +
							'<img src="' + val["standard_url"] +'" class="image">' +
							'<a class="overlay" data-toggle="modal" data-target="#'+ val["image_id"] +'">' +
								'<h3 class="title" id="txt-w-sm">'+ val["name"] +'</h3>'+
								'<div class="description">' +
									'<p id="txt-w-sm16">' +
									'<img src="' + val["author_image_url"] + '" width="20" height="20" > ' + val["author_name"] + '<img src="img/instagram2.png" width="80" class="pull-right">'+
									'</p>'+
								'</div>'+
							'</a>' + 
							'</div>' +
							'<div class="modal fade" id="'+ val["image_id"] +'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
								'<div class="modal-dialog">' +
   									'<div class="modal-content">' +
		  								'<div class="modal-header">' +
		        							'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
		        							'<h4 class="modal-title" id="myModalLabel"><img src="img/pin56.png" width="20"> <a href="http://maps.google.com/?q='+ val["latitude"] +','+ val["longitude"] + '" id="txt-b-sm">' + val["name"] + '</a></h4>' +
		      							'</div>' +
		      							'<div class="modal-body">'+
				      						'<center>'+
				      							'<img src="' + val["standard_url"] +'" class="img-responsive" width="450" height="450">' +
				      						'</center>'+
		      							'</div>'+
		      							'<div class="modal-footer">' + 
		      								'<div class="pull-left" id="txt-g">' +
		      									'<img src="img/clock96.png" width="15" height="15">' +
		      									' ' + val["posted_at"] + ' ' +
		      									'<img src="img/loving1.png" width="15" height="15">' +
		      									' ' + val["count_likes"] + ' ' +
		      									'<img src="img/comments.png" width="15" height="15">' +
		      									' ' + val["count_comment"] +
		      								'</div>' +
		        							'<button type="button" class="btn btn-primary  btn-sm" data-dismiss="modal">Close</button>'+
		      							'</div>' +
									'</div>'+
								'</div>'+
							'</div>';

						//$('#container').append(html);

						$('#container').masonry().append(html).masonry('appended', html).masonry();
				});
			}

  		})
  		.fail(function() {
    		//
  		})
  		.always(function() {
  			// Repeat
  		});
}


setInterval(updateTest, 30000);

@stop