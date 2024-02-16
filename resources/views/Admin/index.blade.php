@extends('Admin.app')
@section('content')
    <meta http-equiv="refresh" content="60">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-header ">
            <!-- Content Header (Page header) -->
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <div class="btn-group" role="group" aria-label="Basic example">

                            <button type="button" class="btn btn-info btn-sm">Dashboard</button>
                            <button type="button"
                                class="btn btn-secondary btn-sm {{ auth()->user()->LeaveStatus === 'absent' ? 'leave-status-absent' : 'leave-status-present' }}"
                                data-toggle="modal" data-target="#statusModal">
                                {{ auth()->user()->LeaveStatus }}
                            </button>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#statusModal">
                                On Leave? Set System to Offline
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div id="statusModal" class="modal fade" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Status</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('admin.status.update', auth()->user()) }}">
                                            <!-- Update Status Form -->
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="present"
                                                        {{ auth()->user()->status === 'present' ? 'selected' : '' }}>Present
                                                    </option>
                                                    <option value="absent"
                                                        {{ auth()->user()->status === 'absent' ? 'selected' : '' }}>Absent
                                                    </option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---Modal--->
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.statistics') }}">Analysis</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('alltickets.index') }}">Tickets</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div> <!-- /.container-fluid -->
        </div><!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <div class="col-md-9 ">
                        <!--  Success Alert  --->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle"></i> {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card" style="height:420px;">
                            <div class="card-header border-transparent">
                              
                                <h4 class="card-title"><strong>Tickets Assigned to Me</strong></h4>
                   
                            
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <!-- Add this button above your table -->
                       
                                <div class="row">
                                 <div class="col-md-6">
                                    <form id="searchForm" action="{{ route('alltickets.index') }}" method="GET">
                                       <div class="input-group input-group-sm" style="width: 250px;">
                                          <input type="text" name="query" class="form-control float-right" placeholder="Search Ticket Assigned to Me...">
                                          <div class="input-group-append">
                                             <button type="submit" class="btn btn-primary">
                                             <i class="fas fa-search"></i>
                                             </button>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="btn-group" role="group" aria-label="Button Group">
                                       <button type="button" class="btn btn-link" onclick="sortTicketsByUrgencyDesc()">Sort by Urgency <i class="fas fa-sort"></i></button>
                                       <button type="button" class="btn btn-link" onclick="resetTable()">Reset</button>
                                    </div>
                                 </div>
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="height:420px; overflow:scroll;">
                                <div class="table-responsive">
                                    <div class="table m-0 sortable-table" id="table1">
                                        <table class="table m-0"><!---Tickets Assigned to Me--->
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>TicketNo</th>
                                                    <th>Requester</th>
                                                    <th>Urgency</th>
                                                    <th>Ticket Title</th>
                                                    <th>Date Submitted</th>
                                                    <th>Assigned </th>
                                                    <th>Escalated By</th>
                                                    <th>Open</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($MyAssignedGenTickets as $MyAssignedGenTicket)
                                                      <tr>
                                                        <td>{{ $MyAssignedGenTicket->id }}</td>
                                                        <td>{{ $MyAssignedGenTicket->ticket_No }}</td>
                                                        <td>{{ $MyAssignedGenTicket->section_head1 }}</td>
                                                        <td>{{ $MyAssignedGenTicket->Ticket_Urgency }}</td>
                                                        <td>{{ $MyAssignedGenTicket->Record_No }}
                                                            {{ $MyAssignedGenTicket->pvNumber }}
                                                            {{ $MyAssignedGenTicket->claimNumber }}
                                                            {{$MyAssignedGenTicket->claimNumber}}
                                                            {{$MyAssignedGenTicket->chequeNumber}}
                                                            {{$MyAssignedGenTicket->ReferenceNumber}}
                                                            {{$MyAssignedGenTicket->ReceiptNo}}
                                                            {{$MyAssignedGenTicket->DrCrNumber}}
                                                            {{$MyAssignedGenTicket->JVNumber}}
                                                            {{$MyAssignedGenTicket->DemandNoteNo}}
                                                            {{$MyAssignedGenTicket->ReportName}}
                                                            {{$MyAssignedGenTicket->PettyCashNo}}
                                                            {{$MyAssignedGenTicket->PettyCashVoucherNum}}
                                                            {{$MyAssignedGenTicket->ReversalNo}}
                                                            {{$MyAssignedGenTicket->RReversalNo}}
                                                          
                                                        </td>
                                                        @if ($MyAssignedGenTicket->created_at)
                                                            <td>{{ $MyAssignedGenTicket->created_at->format('Y-m-d H:i:s') }}
                                                            </td>
                                                        @else
                                                            <p>No date available</p>
                                                            @endif 
                                                               @if ($MyAssignedGenTicket->assignedAdmin)
                                                                   <td>
                                                                    {{ $MyAssignedGenTicket->assignedAdmin->name }}
                                                                  @else
                                                                  <td> Not Assigned </td>
                                                                @endif 
                                                                  <td>
                                                                     @if ($MyAssignedGenTicket->EScalatedBy)
                                                                           {{ $MyAssignedGenTicket->EScalatedBy }}
                                                                           <i class="fas fa-1.5x fa-exclamation-triangle"
                                                                              id="blinking-icon" style="color: red;"></i>
                                                                     @else
                                                                     @endif
                                                                  </td>
                                                                <td>
                                                                    @if ($MyAssignedGenTicket->Reopened == 1)
                                                                        Reopened <div class="spinner" style="font-size: 1em; color:#ffa200">
                                                                            <i class="fas fa-sync-alt fa-spin"></i>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                    <a href="{{ route('admin.edit', $MyAssignedGenTicket->id) }}">Open
                                                                        <i class="fa fa-pen"></i>
                                                                    </a>
                                                                </td>
                                                               
                                                      </tr>
                                                @endforeach
                                            </tbody>
                                            <!--Rights--->
                                            <tbody>
                                                @foreach ($MyAssignedRightsTickets as $MyAssignedRightsTicket)
                                                    <tr>
                                                        <td>{{ $MyAssignedRightsTicket->id }}</td>
                                                        <td>{{ $MyAssignedRightsTicket->ticket_No }}</td>
                                                        <td>{{ $MyAssignedRightsTicket->Requester_Name }}</td>
                                                        <td>{{ $MyAssignedRightsTicket->Ticket_Urgency}}</td>
                                                        <td>{{ $MyAssignedRightsTicket->TicketCategory }}
                                                            {{ $MyAssignedRightsTicket->pvNumber }}
                                                            {{ $MyAssignedRightsTicket->claimNumber }}
                                                            
                                                        </td>
                                                        @if ($MyAssignedRightsTicket->created_at)
                                                            <td>{{ $MyAssignedRightsTicket->created_at->format('Y-m-d H:i:s') }}
                                                            </td>
                                                        @else
                                                            <p>No date available</p>
                                                            @endif @if ($MyAssignedRightsTicket->assignedAdmin)
                                                                <td>
                                                                    {{ $MyAssignedRightsTicket->assignedAdmin->name }}
                                                                @else
                                                                <td> Not Assigned </td>
                                                                @endif <td>
                                                                    @if ($MyAssignedRightsTicket->EScalatedBy)
                                                                        {{ $MyAssignedRightsTicket->EScalatedBy }}
                                                                        <i class="fas fa-1.5x fa-exclamation-triangle"
                                                                            id="blinking-icon" style="color: red;"></i>
                                                                    @else
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($MyAssignedRightsTicket->Reopened == 1)
                                                                        Reopened
                                                                        <div class="spinner"
                                                                            style="font-size: 1em;color:#ffa200">
                                                                            <i class="fas fa-sync-alt fa-spin"></i>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                     <a href="/Rights/Admin/{{$MyAssignedRightsTicket->ticket_No}}/edit">Open
                                                                        &ensp;<i class="fa fa-pen"></i>
                                                                    </a>
                                                                </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>

                                    </div>
                                </div><!-- /.table-responsive -->
                                <!-- /.table-responsive -->


                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <a href="{{ route('alltickets.index') }}"
                                    class="btn btn-sm btn-secondary float-right">View All
                                    Tickets</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3">
                        <div class="card" style="height:420px; overflow-auto ">
                            <div class="card-header border-transparent">
                                <h3 class="card-title"><strong>Tickets Statistics</strong></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div style="width: 100%; height:80%; ">
                                    <canvas id="ticketPieChart" width="100" height="100"></canvas>
                                </div>
                                <script>
                                    // Data for the pie chart (assuming you've passed this data from your controller)
                                    var ticketData = {
                                        labels: ["Approved", "Solved", "Rejected"],
                                        datasets: [{
                                            data: [{{ $adminStats2['pie_chart']['approvedCount'] }},
                                                {{ $adminStats2['pie_chart']['solvedCount'] }},
                                                {{ $adminStats2['pie_chart']['unsolvedCount'] }}
                                            ],
                                            backgroundColor: ["#36A2EB", "#FFCE56", "#FF6384"]
                                        }]
                                    };

                                    // Get the canvas element
                                    var ctx = document.getElementById('ticketPieChart').getContext('2d');

                                    // Create the pie chart
                                    var myPieChart = new Chart(ctx, {
                                        type: 'pie',
                                        data: ticketData,
                                        options: {
                                            responsive: true,
                                            maintainAspectRatio: false,
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main row -->
                <div class="row">
                    <div class="col-md-9">
                        <!-- Left col -->
                        <!-- MAP & BOX PANE -->
                        <div class="card" style="height:420px; ">
                            <div class="card-header border-transparent">
                                <h3 class="card-title"><strong>Latest Approved Tickets in Department</strong></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="height:420px; overflow:scroll;">
                                <div class="table-responsive">
                                    <table class="table DepartmentTickets">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Ticket No</th>
                                                <th>Requester</th>
                                                <th>Approval</th>
                                                <th>Ticket Title</th>
                                                <th>Date Submitted</th>
                                                <th>Assigned</th>
                                                <th>Status</th>
                                                <th>Escalated By</th>
                                                <th>Open</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($DepartmentAssignedTickets as $DepartmentAssignedTicket)
                                                <tr>
                                                    <td>{{ $DepartmentAssignedTicket->id }}</td>
                                                    <td>{{ $DepartmentAssignedTicket->ticket_No }}</td>
                                                    <td>{{ $DepartmentAssignedTicket->section_head1 }}</td>
                                                    <td>{{ $DepartmentAssignedTicket->HodApprovalStatus }}</td>
                                                    <td>
                                                        {{ $DepartmentAssignedTicket->Record_No }}
                                                        {{ $DepartmentAssignedTicket->pvNumber }}
                                                        {{ $DepartmentAssignedTicket->claimNumber }}
                                                        {{ $DepartmentAssignedTicket->chequeNumber }}
                                                        {{ $DepartmentAssignedTicket->ReferenceNumber }}
                                                        {{ $DepartmentAssignedTicket->ReceiptNo }}
                                                        {{ $DepartmentAssignedTicket->DrCrNumber }}
                                                        {{ $DepartmentAssignedTicket->PettyCashNo }}
                                                        {{ $DepartmentAssignedTicket->PettyCashVoucherNum }}
                                                        {{ $DepartmentAssignedTicket->PettyVoucherNum }}
                                                        {{ $DepartmentAssignedTicket->ReversalNo }}
                                                    </td>
                                                    <td>
                                                        @if ($DepartmentAssignedTicket->created_at)
                                                            {{ $DepartmentAssignedTicket->created_at->format('Y-m-d H:i:s') }}
                                                        @else
                                                            No date available
                                                        @endif
                                                    </td>
                                                    @if ($DepartmentAssignedTicket->assignedAdmin)
                                                        <td>
                                                            {{ $DepartmentAssignedTicket->assignedAdmin->name }}
                                                        </td>
                                                    @else
                                                        <td>
                                                            Not Assigned
                                                        </td>
                                                    @endif
                                                    <td
                                                        style="background-color: @if (isset($ticketIsLocked) && $ticketIsLocked) #f0ad4e @elseif (
                                                            $DepartmentAssignedTicket->AdminStatus == 'being worked on' &&
                                                                $DepartmentAssignedTicket->worker_id !== auth()->user()->id) #f0ad4e @else #ffffff @endif">
                                                        @if (isset($ticketIsLocked) && $ticketIsLocked)
                                                            This ticket is currently being worked on by
                                                            {{ $DepartmentAssignedTicket->worker->name ?? 'another admin' }}.
                                                        @elseif (
                                                            $DepartmentAssignedTicket->AdminStatus == 'being worked on' &&
                                                                $DepartmentAssignedTicket->worker_id !== auth()->user()->id)
                                                            @php
                                                                $workingAdmin = \App\Models\User::find($DepartmentAssignedTicket->worker_id);
                                                            @endphp
                                                            This ticket is currently being worked on by
                                                            {{ $workingAdmin ? $workingAdmin->name : 'another admin' }}.
                                                        @else
                                                            Ticket is available
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($DepartmentAssignedTicket->EScalatedBy)
                                                            {{ $DepartmentAssignedTicket->EScalatedBy }}
                                                            <i class="fas fa-1.5x fa-exclamation-triangle"
                                                                id="blinking-icon" style="color: red;"></i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (isset($ticketIsLocked) && $ticketIsLocked)
                                                            <span style="color: gray;">Open</span>
                                                        @elseif (
                                                            $DepartmentAssignedTicket->AdminStatus == 'being worked on' &&
                                                                $DepartmentAssignedTicket->worker_id !== auth()->user()->id)
                                                            <span style="color: gray;">Open</span>
                                                        @else
                                                            <a
                                                                href="{{ route('admin.edit', $DepartmentAssignedTicket->id) }}"><i class="fa fa-pen"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <!--Rights Request-->
                                        <tbody>
                                            @foreach ($DepartmentAssignedRightsTickets as $DepartmentAssignedRightsTicket)
                                                <tr>
                                                    <td>{{ $DepartmentAssignedRightsTicket->id }}</td>
                                                    <td>{{ $DepartmentAssignedRightsTicket->ticket_No }}</td>
                                                    <td>{{ $DepartmentAssignedRightsTicket->Requester_Name }}</td>
                                                    <td>
                                                        @if ($DepartmentAssignedRightsTicket->HodApprovalStatus == 1)
                                                            Approved
                                                        @else
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $DepartmentAssignedRightsTicket->TicketCategory}}
                                                    </td>
                                                    <td>
                                                        @if ($DepartmentAssignedRightsTicket->created_at)
                                                            {{ $DepartmentAssignedRightsTicket->created_at->format('Y-m-d H:i:s') }}
                                                        @else
                                                            No date available
                                                        @endif
                                                    </td>
                                                    @if ($DepartmentAssignedRightsTicket->assignedAdmin)
                                                        <td>
                                                            {{ $DepartmentAssignedRightsTicket->assignedAdmin->name }}
                                                        </td>
                                                    @else
                                                        <td>
                                                            Not Assigned
                                                        </td>
                                                    @endif
                                                    <td
                                                        style="background-color: @if (isset($ticketIsLocked) && $ticketIsLocked) #f0ad4e @elseif (
                                                            $DepartmentAssignedRightsTicket->AdminStatus == 'being worked on' &&
                                                                $DepartmentAssignedRightsTicket->worker_id !== auth()->user()->id) #f0ad4e @else #ffffff @endif">
                                                        @if (isset($ticketIsLocked) && $ticketIsLocked)
                                                            This ticket is currently being worked on by
                                                            {{ $DepartmentAssignedRightsTickets->worker->name ?? 'another admin' }}.
                                                        @elseif (
                                                            $DepartmentAssignedRightsTicket->AdminStatus == 'being worked on' &&
                                                                $DepartmentAssignedRightsTicket->worker_id !== auth()->user()->id)
                                                            @php
                                                                $workingAdmin = \App\Models\User::find($DepartmentAssignedRightsTicket->worker_id);
                                                            @endphp
                                                            This ticket is currently being worked on by
                                                            {{ $workingAdmin ? $workingAdmin->name : 'another admin' }}.
                                                        @else
                                                            Ticket is available
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($DepartmentAssignedRightsTicket->EScalatedBy)
                                                            {{ $DepartmentAssignedRightsTicket->EScalatedBy }}
                                                            <i class="fas fa-1.5x fa-exclamation-triangle"
                                                                id="blinking-icon" style="color: red;"></i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (isset($ticketIsLocked) && $ticketIsLocked)
                                                            <span style="color: gray;">Open</span>
                                                        @elseif (
                                                            $DepartmentAssignedRightsTicket->AdminStatus == 'being worked on' &&
                                                                $DepartmentAssignedRightsTicket->worker_id !== auth()->user()->id)
                                                            <span style="color: gray;">Open</span>
                                                        @else
                                                            <a
                                                                href="{{ route('admin.edit', $DepartmentAssignedRightsTicket->id) }}"><i class="fa fa-pen"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <a href="{{ route('alltickets.index') }}"
                                    class="btn btn-sm btn-secondary float-right">View
                                    All Tickets</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3">
                        <div class="card" style="height:420px; overflow-auto; ">
                            <div class="card-header border-transparent">
                                <h3 class="card-title"><strong>Tickets Statistics</strong></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div> <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="info-box mb-3" style="background-color:#7ebb2b; color:white;">
                                    <span class="info-box-icon"><i class="far fa-comment"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Tickets Assigned to ICT</span>
                                        <span class="info-box-number">{{ $approvedTicketCount }}</span>
                                        <span class="info-box-text">Solved & Closed By ICT</span>
                                        <span class="info-box-number">{{ $ClosedTicketCount }}</span>
                                        <span class="info-box-text">Open Tickets in ICT</span>
                                        <span class="info-box-number">{{ $OpenTicketCount }}</span>
                                    </div>
                                </div>
                                <div class="info-box mb-3 bg-danger">
                                    <span class="info-box-icon"><i class="fa fa-thumbs-down"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Rejected Tickets By ICT</span>
                                        <span class="info-box-number">{{ $TicketsRejectedByICT }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---Row-->

                <div class="row">
                    <!-- Main row -->
                    <div class="col-md-6">
                        <!-- Left col -->
                        <div class="card" style="height:420px; ">
                            <div class="card-header border-transparent">
                                <h3 class="card-title"><strong>Available Technicians</strong></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div> <!-- /.card-header -->
                            <div class="card-body p-0" style="height:420px; overflow:scroll;">
                                <div class="table-responsive">
                                    <table class="table m-0" style="height:360px; overflow:scroll";>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Availability</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Admins as $Admin)
                                                <tr>
                                                    <td>{{ $Admin->id }}</td>
                                                    <td>{{ $Admin->name }}</td>
                                                    <td>
                                                        {{ $Admin->LeaveStatus === 'present' ? 'Available' : 'Unavailable' }}
                                                    </td>
                                                    <td
                                                        style="color: white; background-color: {{ $Admin->LeaveStatus === 'present' ? 'green' : 'red' }};">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- /.card-body -->
                        </div><!-- /.card -->
                    </div><!-- /.col -->

                    <div class="col-md-6">
                        <div class="card" style="height:420px; overflow-auto;">
                            <div class="card-header border-transparent">
                                <h3 class="card-title"><strong>Technicians Statistics</strong></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div> <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div style="width: 100%; height:100%; ">
                                    <canvas id="adminChart"></canvas>
                                </div>
                                <script>
                                    // Data for the chart (assuming you've passed this data from your controller)
                                    var adminStats = {!! json_encode($adminStats) !!};

                                    // Initialize arrays to store data
                                    var adminNames = [];
                                    var assignedTickets = [];
                                    var rejectedTickets = []; // Add this line for rejectedTickets
                                    var solvedTickets = [];
                                    var solvedTicketsby = [];

                                    // Populate arrays with data
                                    @foreach ($adminStats as $adminStat)
                                        adminNames.push("{{ $adminStat['admin_name'] }}");
                                        assignedTickets.push({{ $adminStat['assigned_tickets'] }});
                                        rejectedTickets.push({{ $adminStat['rejected_Tickets'] }});
                                        solvedTickets.push({{ $adminStat['solved_tickets'] }});
                                    @endforeach

                                    // Get the canvas element $solvedTicketsby
                                    var ctx = document.getElementById('adminChart').getContext('2d');

                                    // Create the chart as a horizontal bar chart
                                    var myChart = new Chart(ctx, {
                                        type: 'bar', // Change the chart type to 'horizontalBar'
                                        data: {
                                            labels: adminNames,
                                            datasets: [{
                                                    label: 'Assigned Tickets',
                                                    data: assignedTickets,
                                                    backgroundColor: 'rgba(255, 170, 51)',
                                                    borderColor: 'rgba(75, 192, 192, 1)',
                                                },
                                                {
                                                    label: 'Solved Tickets',
                                                    data: solvedTickets,
                                                    backgroundColor: 'rgba(122, 193, 66)',
                                                    borderWidth: 1,
                                                },
                                                {
                                                    label: 'Rejected Tickets', // Corrected label for rejectedTickets
                                                    data: rejectedTickets,
                                                    backgroundColor: 'rgba(255, 0, 0)', // You can change the color for rejected tickets
                                                    borderColor: 'rgba(255, 0, 0)',
                                                }

                                            ]
                                        },
                                        options: {
                                            responsive: true,
                                            maintainAspectRatio: false,
                                            scales: {
                                                x: {
                                                    beginAtZero: true
                                                },
                                                y: {
                                                    beginAtZero: true,
                                                    ticks: {
                                                        callback: function(value, index, values) {
                                                            if (value === 0 || value === 1) {
                                                                return value;
                                                            }
                                                            return value * 10;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <!---Row-->


            </div>
            </div>
            </div>
            <!--/. container-fluid -->
        </section><!-- /.content -->

        </div>
        <script>
            $(document).ready(function() {
                $('#update-status').click(function() {
                    // Populate the form with the current user's status here if needed
                    var currentUserStatus = "{{ auth()->user()->status }}";
                    $('#status').val(currentUserStatus); // Update the select field

                    $('#statusModal').modal('show');
                });
            });
        </script>
<script>
   // Store the original order of rows
   var originalRows = [];

   document.addEventListener('DOMContentLoaded', function () {
       // Capture the original order when the DOM is loaded
       captureOriginalOrder();
   });

   function captureOriginalOrder() {
       // Get the table element
       var table = document.querySelector('.sortable-table');

       // Get all rows from both tbody sections
       originalRows = Array.from(table.querySelectorAll('tbody tr'));
   }

   function sortTicketsByUrgencyDesc() {
       sortTickets(3); // Assuming the "Ticket_Urgency" column is at index 3 for both data sets
   }

   function sortTickets(columnIndex) {
       var table = document.querySelector('.sortable-table');
       var rows = Array.from(table.querySelectorAll('tbody tr'));

       rows.sort(function (a, b) {
           var valueA = a.cells[columnIndex].textContent.trim().toLowerCase();
           var valueB = b.cells[columnIndex].textContent.trim().toLowerCase();

           var urgencyOrder = { 'high': 1, 'medium': 2, 'low': 3 };

           var orderA = urgencyOrder[valueA] || 4; // Default to 4 for unknown values
           var orderB = urgencyOrder[valueB] || 4;

           return orderA - orderB;
       });

       table.querySelectorAll('tbody').forEach(function (tbody) {
           tbody.innerHTML = '';
       });

       rows.forEach(function (row) {
           table.querySelector('tbody').appendChild(row.cloneNode(true));
       });
   }

   function resetTable() {
       var table = document.querySelector('.sortable-table');

       table.querySelectorAll('tbody').forEach(function (tbody) {
           tbody.innerHTML = '';
       });

       originalRows.forEach(function (row) {
           table.querySelector('tbody').appendChild(row.cloneNode(true));
       });
   }
</script>








    </body>
    @endsection
