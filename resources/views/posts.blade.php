@extends('layouts.app')
@section('content')
	<ul class="list-group">
		@foreach ($posts as $post)
			<li class="list-group-item"><a class="fs-6 text-white text-decoration-none"
					href="{{ route('showPostPage', $post->slug) }}">{{ $post->title }}</a></li>
		@endforeach
	</ul>
	<div class="mt-4">
		{{ $posts->links() }}
	</div>
@endsection
