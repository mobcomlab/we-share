@extends('layouts.base')

@section('content')

  <div id="container">
      <div class="grid-sizer"></div>
  </div>

	
  <div class="demo">
    <ul id="demo" class="content-slider">
      @foreach($querys as $query)
        <li>
          <h3>{{ HTML::image($query->standard_url, 'a picture', array('class' => 'img-responsive')) }}</h3>
        </li>
      @endforeach
    </ul>
  </div>

@stop

@section('script')

var interval;
var counti;
var i;
function updateTest() {
	checkLastImage();
	$.getJSON( "/api/postdata?tag=" + '{{ $tag }}' )
  		.done(function(data) {
			if(data != '') {
					$('#container').empty();
					$.each(data, function(key, val) {
						var html;
						html = '<div class="item" id="ig_'+ val["image_id"] +'">' +
							'<img src="' + val["standard_url"] +'" class="image">' +
							'<a class="overlay" data-toggle="modal" data-target="#'+ val["image_id"] +'">' +
								'<h3 class="title" id="txt-w-sm">'+ val["name"] +'</h3>'+
								'<div class="description">' +
									'<p id="txt-w-sm16">' +
									'<img src="' + val["author_image_url"] + '" width="20" height="20" > ' + val["author_name"] + '<img src="../img/instagram2.png" width="80" class="pull-right">'+
									'</p>'+
								'</div>'+
							'</a>' + 
							'</div>' +
							'<div class="modal fade" id="'+ val["image_id"] +'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
								'<div class="modal-dialog">' +
   									'<div class="modal-content">' +
		  								'<div class="modal-header">' +
		        							'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
		        							'<h4 class="modal-title" id="myModalLabel"><img src="../img/pin56.png" width="20"> <a href="http://maps.google.com/?q='+ val["latitude"] +','+ val["longitude"] + '" id="txt-b-sm">' + val["name"] + '</a></h4>' +
		      							'</div>' +
		      							'<div class="modal-body">'+
				      						'<center>'+
				      							'<img src="' + val["standard_url"] +'" class="img-responsive" width="450" height="450">' +
				      						'</center>'+
		      							'</div>'+
		      							'<div class="modal-footer">' + 
		      								'<div class="pull-left" id="txt-g">' +
		      									'<img src="../img/clock96.png" width="15" height="15">' +
		      									' ' + val["posted_at"] +
		      								'</div>' +
		        							'<button type="button" class="btn btn-primary  btn-sm" data-dismiss="modal">Close</button>'+
		      							'</div>' +
									'</div>'+
								'</div>'+
							'</div>';

						$('#container').masonry().append(html).masonry('appended', html).masonry();

				});
				counti = i;
				updateEach();
			}
			var btn = '<div><center><button type="button" class="btn btn-primary" id="btn-loadmore" onclick="loadMore();">Load More</button></center></div>';
			$('#container').append(btn);
  		});
}

function search() {
	$.getJSON( "/search?keyword=" + $('#input-search').val())
	  		.done(function(data) {
				if(data != '') {
						$('#container').empty();
						$.each(data, function(key, val) {
							var html;
							html = '<div class="item" id="ig_'+ val["image_id"] +'">' +
								'<img src="' + val["standard_url"] +'" class="image">' +
								'<a class="overlay" data-toggle="modal" data-target="#'+ val["image_id"] +'">' +
									'<h3 class="title" id="txt-w-sm">'+ val["name"] +'</h3>'+
									'<div class="description">' +
										'<p id="txt-w-sm16">' +
										'<img src="' + val["author_image_url"] + '" width="20" height="20" > ' + val["author_name"] + '<img src="../img/instagram2.png" width="80" class="pull-right">'+
										'</p>'+
									'</div>'+
								'</a>' + 
								'</div>' +
								'<div class="modal fade" id="'+ val["image_id"] +'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
									'<div class="modal-dialog">' +
	   									'<div class="modal-content">' +
			  								'<div class="modal-header">' +
			        							'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
			        							'<h4 class="modal-title" id="myModalLabel"><img src="../img/pin56.png" width="20"> <a href="http://maps.google.com/?q='+ val["latitude"] +','+ val["longitude"] + '" id="txt-b-sm">' + val["name"] + '</a></h4>' +
			      							'</div>' +
			      							'<div class="modal-body">'+
					      						'<center>'+
					      							'<img src="' + val["standard_url"] +'" class="img-responsive" width="450" height="450">' +
					      						'</center>'+
			      							'</div>'+
			      							'<div class="modal-footer">' + 
			      								'<div class="pull-left" id="txt-g">' +
			      									'<img src="../img/clock96.png" width="15" height="15">' +
			      									' ' + val["posted_at"] +
			      								'</div>' +
			        							'<button type="button" class="btn btn-primary  btn-sm" data-dismiss="modal">Close</button>'+
			      							'</div>' +
										'</div>'+
									'</div>'+
								'</div>';
							$('#container').masonry().append(html).masonry('appended', html).masonry();
					});
				}

	  		});
}

function checkLastImage(){
		$.getJSON( "/api/lastimageid" )
  		.done(function(data) {
			if(data != '') {
				$.each(data, function(key, val) {
						i = val["image_id"];
						console.log(i);
				});
			}
  	});
}

$('#frm-search').submit(function( event ) {
	clearInterval(interval); 
	search();
});

function updateEach() {
	$.getJSON( "/api/data?imgId=" + i + "tag=" + '{{ $tag }}')
  		.done(function(data) {
			if(data != '') {
					$.each(data, function(key, val) {
						var html;
						html = '<div class="item" id="ig_'+ val["image_id"] +'">' +
							'<img src="' + val["standard_url"] +'" class="image">' +
							'<a class="overlay" data-toggle="modal" data-target="#'+ val["image_id"] +'">' +
								'<h3 class="title" id="txt-w-sm">'+ val["name"] +'</h3>'+
								'<div class="description">' +
									'<p id="txt-w-sm16">' +
									'<img src="' + val["author_image_url"] + '" width="20" height="20" > ' + val["author_name"].substr(0,10) + '<img src="img/instagram2.png" width="80" class="pull-right">'+
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
		      									' ' + val["posted_at"] +
		      								'</div>' +
		        							'<button type="button" class="btn btn-primary  btn-sm" data-dismiss="modal">Close</button>'+
		      							'</div>' +
									'</div>'+
								'</div>'+
							'</div>';
						$('#ig_'+i).before(html);
						clearInterval(interval);
						interval = 0;
				});
			}

  		}).always(function() {
  			checkLastImage();
  		}).complete(function(){
  			clearInterval(interval);
			interval = 0;
  			interval = setInterval(updateEach, 30000);

  		});
}

function loadMore(){
	counti = counti - 50;
	var counttest = counti+1;
	$.getJSON( "/api/data?limit=" + counti + "tag=" + '{{ $tag }}')
  		.done(function(data) {
			if(data != '') {
				var html;
				$.each(data, function(key, val) {
						html = '<div class="item" id="ig_'+ val["image_id"] +'">' +
							'<img src="' + val["standard_url"] +'" class="image">' +
							'<a class="overlay" data-toggle="modal" data-target="#'+ val["image_id"] +'">' +
								'<h3 class="title" id="txt-w-sm">'+ val["name"] +'</h3>'+
								'<div class="description">' +
									'<p id="txt-w-sm16">' +
									'<img src="' + val["author_image_url"] + '" width="20" height="20" > ' + val["author_name"].substr(0,10) + '<img src="/img/instagram2.png" width="80" class="pull-right">'+
									'</p>'+
								'</div>'+
							'</a>' + 
							'</div>' +
							'<div class="modal fade" id="'+ val["image_id"] +'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
								'<div class="modal-dialog">' +
   									'<div class="modal-content">' +
		  								'<div class="modal-header">' +
		        							'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
		        							'<h4 class="modal-title" id="myModalLabel"><img src="/img/pin56.png" width="20"> <a href="http://maps.google.com/?q='+ val["latitude"] +','+ val["longitude"] + '" id="txt-b-sm">' + val["name"] + '</a></h4>' +
		      							'</div>' +
		      							'<div class="modal-body">'+
				      						'<center>'+
				      							'<img src="' + val["standard_url"] +'" class="img-responsive" width="450" height="450">' +
				      						'</center>'+
		      							'</div>'+
		      							'<div class="modal-footer">' + 
		      								'<div class="pull-left" id="txt-g">' +
		      									'<img src="/img/clock96.png" width="15" height="15">' +
		      									' ' + val["posted_at"] +
		      								'</div>' +
		        							'<button type="button" class="btn btn-primary  btn-sm" data-dismiss="modal">Close</button>'+
		      							'</div>' +
									'</div>'+
								'</div>'+
							'</div>';
						$('#ig_'+counttest).after(html);
						counttest = counttest -1;
				});
			}
  	});
}


@stop