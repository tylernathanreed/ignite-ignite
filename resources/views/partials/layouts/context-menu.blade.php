<li class="dropdown context-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    	@yield('context-menu.heading')
    </a>

    <ul class="dropdown-menu">
        @optional('header.sub-context-menu')
            @yield('header.sub-context-menu')

            <li class="header">@yield('context-menu.heading')</li>
        @endoptional

        <li>
            <ul class="menu padding-left-md">
            	@yield('context-menu.content')
            </ul>
        </li>
    </ul>
</li>