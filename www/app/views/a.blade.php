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
</head>
<body>

<div class="page-header">
    <h3>Sign in into your account</h3>
</div>
<div class="row">
    <form method="post" action="{{ route('signin') }}" id="ajaxform" class="form-horizontal">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
 
            <div id="validation-errors" style="display: none"></div>
 
        <!-- Email -->
        <div class="control-group{{ $errors->first('email', ' error') }}">
            <label class="control-label" for="email">Email</label>
            <div class="controls">
                <input type="text" name="email" id="email" value="{{ Input::old('email') }}" />
                {{ $errors->first('email', '<span class="help-block">:message</span>') }}
            </div>
        </div>
 
        <!-- Password -->
        <div class="control-group{{ $errors->first('password', ' error') }}">
            <label class="control-label" for="password">Password</label>
            <div class="controls">
                <input type="password" name="password" id="password" value="" />
                {{ $errors->first('password', '<span class="help-block">:message</span>') }}
            </div>
        </div>
 
        <!-- Remember me -->
        <div class="control-group">
            <div class="controls">
            <label class="checkbox">
                <input type="checkbox" name="remember-me" id="remember-me" value="1" /> Remember me
            </label>
            </div>
        </div>
 
        <hr>
 
        <!-- Form actions -->
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn">Sign in</button>                
            </div>
        </div>
    </form>
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