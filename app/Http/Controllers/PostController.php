<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
	public function index(): View
	{
		$posts = Cache::remember('posts:last', 60, function () {
			return Post::orderBy('id', 'desc')->take(5)->get();
		});


		return view('index', compact('posts'));
	}

	public function all(): View
	{
		$posts = Cache::remember('posts:page-' . request('page', 1), 60, function () {
			return Post::orderBy('id', 'desc')->paginate(15);
		});

		$posts->each(function ($post) {
			Cache::put('posts:' . $post->slug, $post);
		});

		return view('posts', compact('posts'));
	}

	public function show(string $slug): View
	{
		$post = Cache::get('posts:' . $slug);

		return view('post', compact('post'));
	}

	public function store(StoreRequest $request): RedirectResponse
	{
		$data = $request->validated();

		$post = Post::create($data);

		Cache::put('posts:' . $post->slug, $post);

		return redirect()->route('showPostPage', $post->slug);
	}
}
