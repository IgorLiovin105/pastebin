<header
	class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
	<div class="col-md-3 mb-2 mb-md-0">
		<a href="{{ route('homePage') }}" class="d-inline-flex link-body-emphasis text-decoration-none fs-2">
			Logo
		</a>
	</div>
	<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
		<li><a href="{{ route('allPostsPage') }}" class="nav-link px-2">Посты</a></li>
	</ul>
	@guest
		<div class="col-md-3 text-end">
			<a href="{{ route('loginPage') }}" class="btn btn-outline-primary me-2">Login</a>
		</div>
	@else
		<form action="{{ route('logout') }}" class="col-md-3 text-end" method="POST">
			@csrf
			<button class="btn btn-outline-primary">Logout</button>
		</form>
	@endguest
</header>
