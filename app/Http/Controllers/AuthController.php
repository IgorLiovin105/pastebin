<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
   public function login(AuthRequest $request): RedirectResponse
	{
		$id = $request->validated();

		auth()->loginUsingId($id);

		return redirect()->route('homePage');
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();

		return redirect()->route('homePage');
	}
}
