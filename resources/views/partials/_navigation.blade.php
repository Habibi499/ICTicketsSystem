<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <!--  <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>-->
          <div style="display: flex; align-items: center;">
            <span>{{ Auth::user()->name }}</span>
            <div style="width: 10px; height: 10px; border-radius: 50%; background-color: {{ Auth::user()->AccountStatus === 'Active' ? 'yellow' : 'transparent' }}; margin-left: 5px;"></div>
            @if(Auth::user()->AccountStatus === 'Active')
                <span style="margin-left: 5px; color: rgb(238, 227, 13);font-size:10px;">active</span>
            @endif
        </div>
        
        
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
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                Correction Forms
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('ticket.accountsform')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Accounts/Administration</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('ticket.claimsform')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Claims/legal </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('ticket.create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Underwriting/Marine</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('ticket.reinscorrections')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Re-Insurance </p>
                    </a>
                  </li>
                
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-address-card"></i>
                  <p>
                   Requests Forms
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('passwordchange.index') }}" class="nav-link">
                          <i class="fa fa-circle nav-icon"></i>
                            <p>
                                {{ __('Password Change Form') }}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ticket.bypass-of-cancellation') }}" class="nav-link">
                          <i class="fa fa-circle nav-icon"></i>
                            <p>
                                {{ __('Authorization for Bypass Of Cancellation') }}
                            </p>
                        </a>
                    </li>  
                    <li class="nav-item">
                        <a href="{{ route('ticket.Reinstate-Policy') }}" class="nav-link">
                          <i class="fa fa-circle nav-icon"></i>
                            <p>
                                {{ __('Policy Reinstatement') }}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ticket.rightsrequest') }}" class="nav-link">
                          <i class="fa fa-circle nav-icon"></i>
                            <p>
                                {{ __('System Rights Requisition') }}
                            </p>
                        </a>
                    </li>
                </ul>
              </li>
          
              <li class="nav-item">
                <a href="{{ route('ticket.index') }}" class="nav-link">
                    <i class="nav-icon far fa-user"></i>
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
                    <i class="nav-icon fa fa-cog"></i>
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