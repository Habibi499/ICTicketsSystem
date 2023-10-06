<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('ticket.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('requestedtickets.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('My Tickets') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('passwordchange.index') }}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('Password Change Form') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('ticket.create')}}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                   
                    <p>
                        {{ __('Correction Form') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('ticket.create')}}" class="nav-link">
                   
                    <i class="fa fa-print"></i>
                    <p>
                        {{ __('Toner Request') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('ticket.index') }}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('Normal User Panel') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('approver.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-check"> </i>
                        <p>
                            {{_('Approver Panel')}}
                        </p>
                </a>

            </li>
            <li class="nav-item">
                <a href="{{ route('admin.index') }}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('Admin panel') }}
                    </p>
                </a>
            </li>


           <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        Two-level menu
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Child menu</p>
                        </a>
                    </li>
                </ul>
            </li>-->
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->