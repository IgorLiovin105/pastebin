@extends('layouts.app')
@section('content')
	<div class="content">
		<h2>{{ $post->title }}</h2>
		<p>{{ $post->content }}</p>
	</div>
@endsection
