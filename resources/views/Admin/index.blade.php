@extends('Admin.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
              <style>
            
                </style>
                
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-info btn-sm">Dashboard</button>
                    <button type="button" class="btn btn-secondary btn-sm {{ auth()->user()->LeaveStatus === 'absent' ? 'leave-status-absent' : 'leave-status-present' }}" data-toggle="modal" data-target="#statusModal">
                        {{ auth()->user()->LeaveStatus }}
                    </button>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#statusModal">
                        On Leave? Set System to Offline
                    </button>
                </div>
                
                
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <!--All UnAttended Tickets in ICT Department--
                <div id="notification-bell" class="d-inline">
                    <i class="fas fa-bell fa-1.5x"></i>
                    <span class="badge badge-danger badge-pill notification-count">{{$OpenTicketCount}}</span>
                </div>
                <!--All UnAttended Tickets in ICT End-->

            <!--Modal--->
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
                            <!-- Update Status Form -->
                                <form method="POST" action="{{ route('admin.status.update', auth()->user()) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="present" {{ auth()->user()->status === 'present' ? 'selected' : '' }}>Present</option>
                                            <option value="absent" {{ auth()->user()->status === 'absent' ? 'selected' : '' }}>Absent</option>
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
            </div><!---Modal--->

               
                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.statistics')}}">Analysis</a></li>
                    <li class="breadcrumb-item"><a href="{{route('alltickets.index')}}">Tickets</a></li>
                  
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-7">
            


                <!--  Success Alert  --->
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card" style="height:420px; overflow-auto;">
                    <div class="card-header border-transparent">
                        <h3 class="card-title"><strong>Latest Approved Tickets Assigned to Me</strong></h3>
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
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Requester</th>
                                        <th>Status</th>
                                        <th>Ticket Title</th>
                                        <th>Date Submitted</th>
                                        <th>Assigned </th>
                                        
                                        <th>Open</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($MyAssignedTickets as $MyAssignedTicket)
                                    <tr>
                                        <td>{{$MyAssignedTicket->id}}</td>
                                        <td>{{$MyAssignedTicket->section_head1}}</td>
                                        <td>{{$MyAssignedTicket->HodApprovalStatus}}</td>
                                        <td>{{$MyAssignedTicket->Record_No}}</td>
                                        @if ($MyAssignedTicket->created_at)
                                        <td>{{ $MyAssignedTicket->created_at->format('Y-m-d H:i:s') }}</td>
                                        @else
                                        <p>No date available</p>
                                        @endif
                                        @if($MyAssignedTicket->assignedAdmin)
                                        <td>
                                            {{$MyAssignedTicket->assignedAdmin->name}}
                                            @else
                                        <td>
                                            Not Assigned
                                        </td>
                                        </td>
                                        @endif
                                       
                                        <td><a href="{{route('admin.edit',$MyAssignedTicket->id)}}">Open</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="{{route('alltickets.index')}}" class="btn btn-sm btn-secondary float-right">View All
                        Tickets</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-5">
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
                             labels: ["Approved", "Solved", "Unsolved"],
                             datasets: [{
                                 data: [{{$adminStats2['pie_chart']['approvedCount']}}, {{$adminStats2['pie_chart']['solvedCount']}}, {{$adminStats2['pie_chart']['unsolvedCount']}}],
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
                <!-- Left col -->
                <div class="col-md-7">
                    <!-- MAP & BOX PANE -->
                    <!--  Success Alert (initially hidden) --->
              
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
                                <table class="table m-0" style="height:420px; overflow:scroll";>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Requester</th>
                                            <th>Status</th>
                                            <th>Ticket Title</th>
                                            <th>Date Submitted</th>
                                            <th>Assigned </th>
                                        
                                            <th>Open</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($DepartmentAssignedTickets as $DepartmentAssignedTicket)
                                        <tr>
                                            <td>{{$DepartmentAssignedTicket->id}}</td>
                                            <td>{{$DepartmentAssignedTicket->section_head1}}</td>
                                            <td>{{$DepartmentAssignedTicket->HodApprovalStatus}}</td>
                                            <td>{{$DepartmentAssignedTicket->Record_No}}</td>
                                            @if ($DepartmentAssignedTicket->created_at)
                                            <td>{{ $DepartmentAssignedTicket->created_at->format('Y-m-d H:i:s') }}</td>
                                            @else
                                            <p>No date available</p>
                                            @endif
                                            @if($DepartmentAssignedTicket->assignedAdmin)
                                            <td>
                                                {{$DepartmentAssignedTicket->assignedAdmin->name}}
                                                @else
                                            <td>
                                                Not Assigned
                                            </td>
                                            </td>
                                            @endif
                                            
                                            <td><a href="{{route('admin.edit',$DepartmentAssignedTicket->id)}}">Open</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="{{route('alltickets.index')}}" class="btn btn-sm btn-secondary float-right">View
                            All Tickets</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-5">
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
                     </div>
                     <!-- /.card-header -->
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
                        var solvedTickets = [];
                        var solvedTicketsby = [];
                        
                        // Populate arrays with data
                        @foreach ($adminStats as $adminStat)
                            adminNames.push("{{ $adminStat['admin_name'] }}");
                            assignedTickets.push({{ $adminStat['assigned_tickets'] }});
                            solvedTickets.push({{ $adminStat['solved_tickets']  }});
                          
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
                        
                        borderWidth: 1
                        }]
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
                        callback: function (value, index, values) {
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
            <!---Row-->
        </div>

                  <!-- Main row -->
                  <div class="row">
                    <!-- Left col -->
                    <div class="col-md-7">
                        <!-- MAP & BOX PANE -->
                        <!--  Success Alert (initially hidden) --->
                  
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
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="height:420px; overflow:scroll;">
                                <div class="table-responsive">
                                    <table class="table m-0" style="height:420px; overflow:scroll";>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Present Status</th>
                                                <th>Availability</th>
                                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Admins as $Admin)
                                            <tr>
                                                <td>{{$Admin->id}}</td>
                                                <td>{{$Admin->name}}</td>
                                                <td>
                                                   {{$Admin->LeaveStatus}}
                                                </td>
                                                <td style="color:white; background-color: {{ $Admin->LeaveStatus === 'present' ? 'green' : 'red' }};">
                                                   
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
                                <a href="{{route('alltickets.index')}}" class="btn btn-sm btn-secondary float-right">View
                                All Tickets</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-5">
                    </div>
                </div>
                <!---Row-->
    </div>
    </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<script>
    $(document).ready(function () {
        $('#update-status').click(function () {
            // Populate the form with the current user's status here if needed
            var currentUserStatus = "{{ auth()->user()->status }}";
            $('#status').val(currentUserStatus); // Update the select field

            $('#statusModal').modal('show');
        });
    });
</script>

<!-- /.content-wrapper -->
<!-- Control Sidebar -->
@endsection