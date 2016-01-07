<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>We Share</title>
	{{ HTML::style('css/normalize.css')}}
	{{ HTML::style('css/main.css')}}
	{{ HTML::style('dist/css/bootstrap.css')}}
	{{ HTML::style('fonts/font.css')}}
	{{ HTML::style('css/slider.css')}}
	{{ HTML::style('css/lightSlider.css')}}
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js?v=1001"></script>
	{{ HTML::script('js/slider.js')}}
	{{ HTML::script('js/value-html.js')}}
	{{ HTML::script('js/dynamic.js')}}
</head>
<body id="body">
@include('headeradmin')

<div class="col-md-10 col-md-offset-1">
	<div class="table-responsive">
		<table class="table">
			<tr>
				<td><b>Tag Name</b></td>
				<td><b>Form</b></td>
				<td><b>Status</b></td>
				<td><b>Command</b></td>
			</tr>
			@foreach($querys as $query)
			<tr>
				<td>{{$query->tag}}</td>
				<td>Instagram</td>
				<td>{{$query->status}}</td>
				<td><button type="button" class="btn btn-primary" onclick="sendStatusY({{$query->tag_id}});">Add</button> <button type="button" class="btn btn-danger" onclick="sendStatusN({{$query->tag_id}});">Remove</button></td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
{{ HTML::script('dist/js/bootstrap.js')}}
{{ HTML::script('js/main.js')}}
{{ HTML::script('js/masonry.js')}}
{{ HTML::script('js/jquery.lightSlider.js')}}  
<script>
@yield('script')
</script>
</body>
</html>