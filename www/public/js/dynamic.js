var interval;
var counti;
var i;
var tagN;

$('#btn-img').hide();

function tagName(tag){
	tagN = tag;
	console.log(tagN);
}

function updateTest(tag2) {
	checkLastImage();
	tagName(tag2);
	$.getJSON( "/api/data?tag=" + tag2)
  		.done(function(data) {
  			$('#loading-indicator').show();
  			$('#dd-main').html(tag2 + ' <span class="caret"></span>');
			if(data != '') {
				$('#container').empty();
				$.each(data, function(key, val) {
					var html = htmlForImage(val);
					$('#container').masonry().append(html).masonry('appended', html).masonry();
				});
				counti = i;
				updateEach();
			}
			var btn = '<div><center><button type="button" class="btn btn-primary" id="btn-loadmore" onclick="loadMore();">Load More</button></center></div>';
			$('#container').append(btn);
  		})
  		.always(function() {
  			console.log('end');
  			$('#loading-indicator').hide();
  		})
  		.fail(function() {
  			$('#connent-error').show();
  		});
  	updateSlide();
}

function updateSlide(tag3) {
	$.getJSON( "/api/array?tag=" + tag3)
  		.done(function(data) {
			if(data != '') {
				//$('#demo').empty();
				var html = "";	
				$.each(data, function(key, val) {
					html = html + htmlForSlide(val);
				});
				$('#demo').html(html);
			}
  	});
}

function checkLastImage(){
		$.getJSON( "api/lastimageid" )
  		.done(function(data) {
			if(data != '') {
				$.each(data, function(key, val) {
						i = val["image_id"];
				});
			}
  	});
}


function updateEach() {
	console.log("up : "+ counti);
	$.getJSON( "/api/data?imgId=" + i)
  		.done(function(data) {
			if(data != '') {
					$.each(data, function(key, val) {
						var html = htmlForImage(val);
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
	$.getJSON( "api/data?limit=" + counti +"&tag=" + tagN)
  		.done(function(data) {
			if(data != '') {
				var html;
				var html2;
				$.each(data, function(key, val) {
					var html = htmlForImage(val);
					$('#ig_'+counttest).after(html);
					counttest = counttest -1;
				});
			}
  	});
}

function searchImage() {
	console.log("search");
	$.getJSON( "/search/s?keyword=" + $('#input-search').val())
	  		.done(function(data) {
				if(data != '') {
						$('#container').empty();
						$('#demo').empty();
						$.each(data, function(key, val) {
							var html = htmlForImage(val);
							var html2 = htmlForSlide(val);
						$('#container').masonry().append(html).masonry('appended', html).masonry();
						$('#demo').append(html2);
					});
				}

	  		});
}

function htmlForImage(val) {
	var html = '<div class="item" id="ig_'+ val["image_id"] +'">' +
							'<img src="' + val["standard_url"] +'" class="image">' +
							'<a class="overlay" data-toggle="modal" data-target="#'+ val["image_id"] +'">' +
								'<h3 class="title" id="txt-w-sm">'+ val["name"] +'</h3>'+
								'<div class="description">' +
									'<p id="txt-w-sm16">' +
									'<img src="' + val["author_image_url"] + '?v=1001" width="20" height="20" > ' + val["author_name"].substr(0,10) + '<img src="img/instagram2.png?v=1001" width="80" class="pull-right">'+
									'</p>'+
								'</div>'+
							'</a>' + 
							'</div>' +
							'<div class="modal fade" id="'+ val["image_id"] +'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
								'<div class="modal-dialog">' +
   									'<div class="modal-content">' +
		  								'<div class="modal-header">' +
		        							'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
		        							'<h4 class="modal-title" id="myModalLabel"><img src="img/pin56.png?v=1001" width="20"> <a href="http://maps.google.com/?q='+ val["latitude"] +','+ val["longitude"] + '" id="txt-b-sm">' + val["name"] + '</a></h4>' +
		      							'</div>' +
		      							'<div class="modal-body">'+
				      						'<center>'+
				      							'<img src="' + val["standard_url"] +'?v=1001" class="img-responsive" width="450" height="450">' +
				      						'</center>'+
		      							'</div>'+
		      							'<div class="modal-footer">' + 
		      								'<div class="pull-left" id="txt-g">' +
		      									'<img src="img/clock96.png?v=1001" width="15" height="15">' +
		      									' ' + val["posted_at"] +
		      								'</div>' +
		        							'<button type="button" class="btn btn-primary  btn-sm" data-dismiss="modal">Close</button>'+
		      							'</div>' +
									'</div>'+
								'</div>'+
							'</div>';
							return html;
}

function htmlForSlide(val2) {
	var html = 	'<li>' +
			        '<h3><img src="'+ val2["standard_url"] +'" class="img-responsive" alt="a picture"></h3>' +
			    '</li>';  

	return html;
}

function sendStatusY(tagId){
	$.getJSON("sendstatus/y?id=" + tagId)
	  	.done(function(data) {
	  		location.reload();
		}
	);
}

function sendStatusN(tagId){
	$.getJSON("sendstatus/n?id=" + tagId)
	  	.done(function(data) {
			location.reload();
		}
	);
}

function headerHashtag(){
	$.getJSON("api/hashtag")
	  	.done(function(data) {
			if(data != '') {
				$.each(data, function(key, val) {
					var html = htmlHeader(val);
					$('#all').append(html);
				});
			}
		}
	);
}

function htmlHeader(val){
	var html = 	'<li><a onclick="updateTest("' + val["tag"] + '"); updateSlide("' + val["tag"] + ');">'+ val["tag"] + '</a></li>';
	return html;
}