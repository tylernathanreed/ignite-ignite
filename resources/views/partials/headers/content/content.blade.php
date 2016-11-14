@optional('content.header')
	<section class="content-header">
	    <h1>
	        @yield('content.header', 'Page Header here')
	        <small>@yield('content.header.description')</small>
	    </h1>
	</section>
@endoptional