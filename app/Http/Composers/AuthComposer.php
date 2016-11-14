<?php

namespace App\Http\Composers;

use Auth;

use Illuminate\Contracts\View\View;

class AuthComposer
{
	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$view->with('auth', Auth::user());
	}
}