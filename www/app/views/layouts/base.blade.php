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
<body id="body" onload="tagName('{{ $tag }}'); updateTest('all');">

@include('header')


@yield('content')


@include('footer')





{{ HTML::script('dist/js/bootstrap.js')}}
{{ HTML::script('js/main.js')}}
{{ HTML::script('js/masonry.js')}}
{{ HTML::script('js/jquery.lightSlider.js')}}  
<script>
@yield('script')
</script>
</body>
</html>