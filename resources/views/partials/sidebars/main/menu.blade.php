<ul class="sidebar-menu">

    <li class="header">Navigation</li>

    <li class="active">
        <a href="{{ route('pages.home') }}">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li>
        <a href="#">
            <i class="fa fa-link"></i>
            <span>Link</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
            <i class='fa fa-wrench'></i>
            <span>Tools</span>
        </a>

        <ul class="treeview-menu">
            <li>
                <a href="{{ route('tools.budget-upload.index') }}">
                    <i class="fa fa-money"></i><span>Budget Upload</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class='fa fa-gear'></i>
            <span>Administration</span>
        </a>

        <ul class="treeview-menu">
            <li>
                <a href="#">
                    <i class="fa fa-building"></i><span>Businesses</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-list"></i><span>Enumerables</span>
                </a>
            </li>

            <li>
                <a href="{{ route('roles.index') }}">
                    <i class="fa fa-puzzle-piece"></i><span>Roles</span>
                </a>
            </li>

            <li>
                <a href="{{ route('permissions.index') }}">
                    <i class="fa fa-key"></i><span>Permissions</span>
                </a>
            </li>

            <li>
                <a href="{{ route('transaction-categories.index') }}">
                    <i class="fa fa-sitemap"></i><span>Transaction Categories</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-users"></i><span>Users</span>
                </a>
            </li>
        </ul>
    </li>
</ul>