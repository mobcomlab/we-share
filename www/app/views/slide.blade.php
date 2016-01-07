@extends('layouts.base')

@section('content')

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