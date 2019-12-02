@extends('layouts.basic')

@section('content')

@php config(['app.timezone' => 'Pakistan/Lahore']); @endphp

@if(App::environment('local'))

	{{ config('app.timezone') }}
	<p> Hello {{ $check }} </p>
	<p> Login @ {{ route('login') }} </p>
@endif


@endsection