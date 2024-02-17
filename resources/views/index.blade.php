@extends('layouts.app')
@section('content')
	<div class="main mb-4">
		<div class="content">
			@auth
				<form action="{{ route('storePost') }}" method="POST">
					@csrf
					<div class="mb-3">
						<label for="title" class="form-label">Название поста</label>
						<input type="text" class="form-control" id="title" name="title" required>
					</div>
					<div class="mb-3">
						<label for="content" class="form-label">Текст поста</label>
						<textarea class="form-control" id="content" name="content" rows="5" required></textarea>
					</div>
					<div class="mb-3">
						<label for="slug" class="form-label">Slug поста</label>
						<input type="text" class="form-control" id="slug" name="slug" required>
						@error('slug')
							<p class="mt-2 text-danger">Slug должен быть уникален</p>
						@enderror
					</div>
					<input type="hidden" value="{{ auth()->id() }}" name="user_id" id="user_id">
					<button class="btn btn-outline-primary me-2">Создать пост</button>
				</form>
			@endauth
		</div>
		<div class="posts">
			<ul class="list-group">
				@foreach ($posts as $post)
					<li class="list-group-item"><a class="fs-6 text-white text-decoration-none"
							href="{{ route('showPostPage', $post->slug) }}">{{ $post->title }}</a></li>
				@endforeach
			</ul>
		</div>
	</div>
@endsection
