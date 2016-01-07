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
@include('headerlogin')

	{{ Form::open(array('url' => 'login')) }}
		<div class="col-sm-4">
			<h1>Please Login</h1>

			<!-- if there are login errors, show them here -->
			<p>
			    {{ $errors->first('email') }}
			    {{ $errors->first('password') }}
			</p>

			<p>
			    {{ Form::label('email', 'Email Address') }}
			    {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com', 'class' => 'form-control')) }}
			</p>

			<p>
			    {{ Form::label('password', 'Password') }}
			    {{ Form::password('password' , array('class' => 'form-control')) }}
			</p>

			<p>{{ Form::submit('Login', array('class' => 'btn btn-primary')) }}</p>
		</div>
	{{ Form::close() }}
		<div class="col-sm-8">
			<center>
				<img src="img/secu.png" class="img-responsive">
				<h1 id="fontsuper">ยินดีต้อนรับเข้าสู่ระบบจัดการข้อมูล</h1>
				<h4 id="fontsuper">Welcome to System of Data Management</h4>
			</center>	
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