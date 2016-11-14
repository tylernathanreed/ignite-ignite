<!-- Tasks Menu -->
<li class="dropdown tasks-menu">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-flag-o"></i>
        <span class="label label-danger">9</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">{{ trans('adminlte_lang::message.tasks') }}</li>
        <li>
            <!-- Inner menu: contains the tasks -->
            <ul class="menu">
                <li><!-- Task item -->
                    <a href="#">
                        <!-- Task title and progress text -->
                        <h3>
                            {{ trans('adminlte_lang::message.tasks') }}
                            <small class="pull-right">20%</small>
                        </h3>
                        <!-- The progress bar -->
                        <div class="progress xs">
                            <!-- Change the css width attribute to simulate progress -->
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">20% {{ trans('adminlte_lang::message.complete') }}</span>
                            </div>
                        </div>
                    </a>
                </li><!-- end task item -->
            </ul>
        </li>
        <li class="footer">
            <a href="#">{{ trans('adminlte_lang::message.alltasks') }}</a>
        </li>
    </ul>
</li>