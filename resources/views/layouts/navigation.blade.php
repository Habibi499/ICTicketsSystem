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
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                Correction Forms
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <span class="nav-link" style="pointer-events: none;">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Accounts/Administration</p>
                        </span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link" style="pointer-events: none;">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Claims/legal</p>
                        </span>
                    </li>
                  <li class="nav-item">
                    <a href="{{route('ticket.create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Underwriting </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('ticket.create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Re-Insurance/Marine </p>
                    </a>
                  </li>
                
                </ul>
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

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->