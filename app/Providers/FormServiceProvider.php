<?php

namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerGroup();
		$this->registerMultiselect();
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Adds the Form::group() component.
	 *
	 * @return void
	 */
	protected function registerGroup()
	{
		/**
		 * Creates a Form Group.
		 *
		 * @param  string       $type        The Input Type within the Group.
		 * @param  string       $name        The Name of the Input.
		 * @param  string|null  $label       The Label within the Group.
		 * @param  string|null  $value       The Value of the Input.
		 * @param  array        $attributes  The Attributes for the Input.
		 *
		 * @return string  The Html that constructs the Form Group.
		 */
		Form::component('group', 'components.form.group', ['type', 'name', 'label' => null, 'value' => null, 'attributes' => []]);
	}

	/**
	 * Adds the Form::multiselect() component.
	 *
	 * @return void
	 */
	protected function registerMultiselect()
	{
		/**
		 * Creates a Form Group.
		 *
		 * @param  string       $name        The Name of the Input.
		 * @param  array        $values      The Selectable Values within the Input.
		 * @param  array        $selected    The Selected Values of the Input.
		 * @param  array        $attributes  The Attributes for the Input.
		 *
		 * @return string  The Html that constructs the Form Multiselect.
		 */
		Form::component('multiselect', 'components.form.multiselect', ['name', 'values', 'selected' => [], 'attributes' => []]);
	}
}
