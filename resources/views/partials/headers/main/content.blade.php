<!-- Main Header -->
<header class="main-header">

    @include('partials.headers.main.logo')

    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle Sidebar</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                @yield('context-menu')

                @include('partials.headers.main.messages')
                @include('partials.headers.main.notifications')
                @include('partials.headers.main.tasks')

                @include('partials.headers.main.auth')

                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>