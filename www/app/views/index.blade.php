@extends('layouts.base')

@section('content')
	<div id="connent-error" style="display: none;">
		<div class="notice warning"><p class="p-text">เกิดปัญหาในการเชื่อมต่อ กรุณาลองใหม่อีกครั้ง</p></div>
	</div>
	<div id="loading-indicator">	
		<center>
			<img src="img/loading.gif">
		</center>
	</div>
  	<div id="container">
      	<div class="grid-sizer"></div>
  	</div>
	<div class="demo">
	    <ul id="demo" class="content-slider" style="visibility: hidden;">
			@foreach($querys as $query)
			    <li>
			        <h3>{{ HTML::image($query->standard_url, 'a picture', array('class' => 'img-responsive')) }}</h3>
			    </li>
			@endforeach
	    </ul>
	</div>
@stop
