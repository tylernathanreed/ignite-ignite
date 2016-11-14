<?php

namespace App\Http\Composers;

use App\Models\Permission;
use Illuminate\Contracts\View\View;

class PermissionsComposer
{
	/**
	 * The Categories for all Permissions.
	 *
	 * @var array
	 */
	protected static $categories;

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 *
	 * @return void
	 */
	public function compose(View $view)
	{
		$this->bindCategories($view);
	}

	/**
	 * Bind Categories to the View.
	 *
	 * @param  View  $view
	 *
	 * @return void
	 */
	protected function bindCategories(View $view)
	{
		if(static::$categories)
			return $view->with('categories', static::$categories);

		$view->with('categories', static::$categories = Permission::categories());
	}
}