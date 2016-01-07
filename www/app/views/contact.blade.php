@extends('layouts.base')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-1">
			<h1>About</h1>
			<p>The Mobile Computing Lab is a group of researchers and lecturers at Naresuan University. We are currently undertaking research in the areas of tourism and education (funded by TRF). We run courses for undergraduate and postgraduate computer science and information technology students</p>
			<h1>Our mission</h1>
			<p>To build Naresuan University’s capacity for innovation in future mobile technologies.</p>
			<h1>Contact us</h1>
			<p>Coordinator: Dr Antony Harfield Department of Computer Science & IT Faculty of Science, Naresuan University Phitsanulok, 65000, Thailand antonyh@nu.ac.th</p>
		</div>
		<div class="col-md-3">
			{{ HTML::image('img/con1.jpg', 'a picture', array('class' => 'img-responsive')) }}
		</div>
	</div>
@stop
