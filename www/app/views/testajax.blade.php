<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Laravel PHP Framework</title>
	{{ HTML::style('css/normalize.css')}}
	{{ HTML::style('css/main.css')}}
	{{ HTML::style('dist/css/bootstrap.css')}}
	{{ HTML::style('fonts/font.css')}}
	{{ HTML::script('js/dynamic.js')}}
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>

<script>

function updateTest() {
	$.getJSON( "/api/data" )
  		.done(function(data) {
			if(data != '') {
					$("#myBody").empty();
					$.each(data, function(key, val) {
						var tr = "<tr>";
						tr = tr + "<td>" + val["image_id"] + "</td>";
						tr = tr + "<td>" + val["name"] + "</td>";
						tr = tr + "<td>" + '<img src="'+val["thumbnail_url"] + '"> </td>';
						tr = tr + "<td>" + val["count_comment"] + "</td>";
						tr = tr + "<td>" + val["latitude"] + "</td>";
						tr = tr + "</tr>";
						var formatTime = val["posted_at"];
						var html;
						html = '<div class="item">' +
							'<img src="' + val["standard_url"] +'" class="image">' +
							'<a class="overlay" data-toggle="modal" data-target="#'+ val["image_id"] +'">' +
								'<h3 class="title" id="txt-w-sm">'+ val["name"] +'</h3>'+
								'<div class="description">' +
									'<p id="txt-w-sm16">' +
									'<img src="' + val["author_image_url"] + '" width="20" height="20" > Icezz Kittitanasan <img src="img/instagram2.png" width="80" class="pull-right">'+
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
						$('#sss').append(html);
						$('#myTable > tbody:last').append(tr);
				});
			}

  		})
  		.fail(function() {
    		$('#status').text('Error');
  		})
  		.always(function() {
  			// Repeat
  		});
}


setInterval(updateTest, 2000);   // 1000 = 1 second
</script>


<table width="600" border="1" id="myTable">
<!-- head table -->
<thead>
  <tr>
    <td width="91"> <div align="center">Image ID </div></td>
    <td width="98"> <div align="center">Name </div></td>
    <td width="97"> <div align="center">thumbnail_url </div></td>
    <td width="59"> <div align="center">count_comment </div></td>
    <td width="71"> <div align="center">latitude </div></td>
  </tr>
</thead>
<!-- body dynamic rows -->
<tbody id="myBody"></tbody>
</table>
<div id="container">
		<div class="grid-sizer"></div>
		<div id="sss"></div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
{{ HTML::script('dist/js/bootstrap.js')}}
{{ HTML::script('js/main.js')}}
{{ HTML::script('js/masonry.js')}}

<script>
@yield('script')
</script>
</body>
</html>