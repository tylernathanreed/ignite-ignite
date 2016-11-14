<!-- User Account Menu -->
<li class="dropdown">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-user"></i>
        <span class="hidden-xs">{{ Auth::user()->name }}</span>
    </a>

    <ul class="dropdown-menu" role="menu">
        <li><a href="#"><i class="fa fa-btn fa-gear"></i>Settings</a></li>
        <li><a href="{{ route('auth.logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
    </ul>
</li>