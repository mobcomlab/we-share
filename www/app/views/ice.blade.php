@extends('layouts.base')

@section('content')

  <div id="container">
      <div class="grid-sizer"></div>
  </div>

{{ HTML::script('js/dynamic-phetchabun.js')}}
@stop

@section('script')

var tag = '{{ $tag }}';

@stop
