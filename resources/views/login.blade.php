@extends('layouts.app')
@section('content')
	<div class="container">
		<form action="{{ route('login') }}" method="POST">
			@csrf
			<div class="mb-3">
				<label for="id" class="form-label">Введите ID пользователя</label>
				<input type="number" class="form-control" id="id" name="id">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection
