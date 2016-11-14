@optional("actions.heading.{$name}")
    <li class="header">
        <a href="#">@yield("actions.heading.{$name}")</a>
    </li>
@endoptional

@optional("actions.content.{$name}")
    @yield("actions.content.{$name}")
@else
    <li>
        <i class="fa fa-ban"></i>
        <span><i>No Actions Available</i></span>
    </li>
@endoptional
