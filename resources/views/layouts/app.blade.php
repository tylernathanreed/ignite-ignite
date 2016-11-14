<!DOCTYPE HTML>
<html lang="en">
    <head>
        @include('partials.head')
    </head>

    <body class="skin-blue sidebar-mini">
        <div class="wrapper">

            @include('partials.headers.main.content')
            @include('partials.sidebars.main.content')

            <div class="content-wrapper">

                @include('partials.headers.content.content')

                <section id="pjax-container" class="content">
                    @yield('content')
                </section><!-- </content> -->
            </div><!-- </content-wrapper> -->

            @include('partials.sidebars.controls.content')

            @include('partials.footers.main.content')

        </div><!-- </wrapper> -->

        @include('partials.modals.content')

        <div id="tail" class="tail" style="display: none">
            @include('partials.tail')
        </div> <!-- </tail> -->
    </body>
</html>
