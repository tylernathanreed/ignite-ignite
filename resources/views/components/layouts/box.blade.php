<?php $class = isset($class) ? $class : 'box-primary'; ?>

@yield("box.form.{$name}")

<div id="{{ $name }}-box" class="box {{ $class }}">
	@optional("box.header.{$name}")
		@yield("box.header.{$name}")
	@else
		<div class="box-header with-border">
			<h2 class="box-title">@yield("box.heading.{$name}")</h2>

			@optional("box.tools.{$name}")
				<div class="box-tools pull-right">
					@yield("box.tools.{$name}")
				</div>
			@endoptional
		</div>
	@endoptional

	@optional("box.body.{$name}")
		<div class="box-body">
			@yield("box.body.{$name}")
		</div>
	@endoptional

	@yield("box.content.{$name}")

	@optional("box.footer.{$name}")
		<div class="box-footer">
			@yield("box.footer.{$name}")
		</div>
	@endoptional
</div>

@optional("box.form.{$name}")
	{!! Form::close() !!}
@endoptional