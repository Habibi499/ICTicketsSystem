@extends('Admin.app')
@section('content')
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h5 class="m-0">ITickets System Analytics</h5>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
             <li class="breadcrumb-item"><a href="{{route('admin.statistics')}}">Analysis</a></li>
             <li class="breadcrumb-item"><a href="{{route('admin.ticketlifecycle')}}">Tickets Life Cycle</a></li>
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
      <div class="row">
         <div class="col-md-6 col-lg-6">
            <div class="card">
               <div class="card-header border-transparent">
                  <h3 class="card-title">All Tickets Analysis</h3>
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
                     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                     <canvas id="myBarChart1" width="400" height="200"></canvas>
                     <script>
                        // Get the counts from the adminStats3 array
                        var TotalTicketsCount = {{ $adminStats3['TotalTicketsCount'] ?? 0 }};
                        var approvedCount = {{ $adminStats3['approvedCount'] ?? 0 }};
                        var solvedCount = {{ $adminStats3['solvedCount'] ?? 0 }};
                        var unsolvedCount = {{ $adminStats3['unsolvedCount'] ?? 0 }};
                        var rejectedbySupervisorCount = {{ $adminStats3['rejectedbySupervisorCount'] ?? 0 }};
                        // Use Chart.js to create the first bar graph
                        var ctx1 = document.getElementById('myBarChart1').getContext('2d');
                        var myBarChart1 = new Chart(ctx1, {
                            type: 'bar',
                            data: {
                                labels: ['All Tickets','Rejected By Supervisor','Approved','Solved', 'Unsolved'],
                                datasets: [{
                                    label: 'My Ticket Stats',
                                    data: [TotalTicketsCount,rejectedbySupervisorCount, approvedCount,solvedCount, unsolvedCount],
                                    backgroundColor: [
                                        'rgba(0, 202, 255)',
                                        'rgba(255, 106, 76)',
                                        'rgba(255, 170, 51)',
                                        'rgba(122, 193, 66)',
                                        'rgba(255, 205, 86, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(0, 202, 255)',
                                        'rgba(255, 106, 76)',
                                        'rgba(255, 170, 51)',
                                        'rgba(122, 193, 66)',
                                        'rgba(255, 205, 86, 1)'
                                    ],
                                    borderWidth: 0
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                     </script>
                  </div>
                  <!-- /.table-responsive -->
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="card">
               <div class="card-header border-transparent">
                  <h3 class="card-title">Tickets By Category Analysis</h3>
                  <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                     <i class="fas fa-minus"></i>
                     </button>
                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                     <i class="fas fa-times"></i>
                     </button>
                  </div>
               </div>
               <!-- Create a canvas element to render the second bar graph -->
               <div class="card-body p-0">
                  <div class="table-responsive">
                     <canvas id="myBarChart2" width="400" height="200"></canvas>
                     <script>
                        // Get the data from the controller
                        var categories = {!! json_encode($barGraphData['categories']) !!};
                        var solvedCounts = {!! json_encode($barGraphData['solvedCounts']) !!};
                        var unsolvedCounts = {!! json_encode($barGraphData['unsolvedCounts']) !!};
                        var totalCounts = {!! json_encode($barGraphData['totalCounts']) !!};
                        var rejectedbySupervisorCounts = {!! json_encode($barGraphData['rejectedbySupervisorCounts']) !!};
                        var approvedbySupervisorCounts = {!! json_encode($barGraphData['approvedbySupervisorCounts']) !!};
                        
                        // Use Chart.js to create the second bar graph
                        var ctx2 = document.getElementById('myBarChart2').getContext('2d');
                        var myBarChart2 = new Chart(ctx2, {
                            type: 'bar',
                            data: {
                                labels: categories,
                                datasets: [
                                  {
                                        label: 'Total Tickets',
                                        data: totalCounts,
                                        backgroundColor: 'rgba(0, 202, 255)',
                                        borderColor: 'rgba(0, 202, 255)',
                                        borderWidth: 1
                                    },
                                    {
                                        label: 'Approved by Supervisor',
                                        data: approvedbySupervisorCounts,
                                        backgroundColor: 'rgba(37, 94, 52, 0.5)',
                                        borderColor: 'rgba(37, 94, 52, 0.5)',
                                        borderWidth: 1
                                    },
                                    {
                                        label: 'Rejected by Supervisor',
                                        data: rejectedbySupervisorCounts,
                                        backgroundColor:'rgba(255, 106, 76)',
                                       
                                        borderWidth: 1
                                    },
                                    
                                    {
                                        label: 'Solved Tickets',
                                        data: solvedCounts,
                                        backgroundColor: 'rgba(122, 193, 66)',
                                        borderColor: 'rgba(122, 193, 66)',
                                        borderWidth: 1
                                    },
                                    {
                                        label: 'Unsolved Tickets',
                                        data: unsolvedCounts,
                                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                        borderColor: 'rgba(255, 99, 132, 1)',
                                        borderWidth: 1
                                    },
                             
                                  
                                ]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                     </script>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
<div class="row">
  <div class="col-md-6 col-lg-6 col-sm-12">
 
      <div class="card" style="height:420px; overflow-hidden;">
         <div class="card-header border-transparent">
            <h3 class="card-title"><strong>ICT Team Statistics</strong></h3>
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
<div class="col-md-6 col-lg-6">
   <div class="card" style="height:420px; overflow-auto; font-size:14px;">
    <div class="card-header border-transparent">
        <h3 class="card-title"><strong>Tickets Attended to by ICT Team</strong></h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    
    <div class="card-body p-0"> <!-- /.card-header -->
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
              <tr>
                <th>#</th>
                  <th>Staff Name</th>
                  <th>Assigned </th>
                  <th>Solved </th>
                
              </tr>
          </thead>
          <tbody>
              @php
                  // Sort admins based on assigned_tickets in descending order
                  $sortedAdminData = collect($adminStats)->sortByDesc('assigned_tickets')->values()->all();
                  $counter = 1;
              @endphp
              @foreach($sortedAdminData as $admin)
                  <tr>
                    <td>{{ $counter++ }}</td>
                      <td>{{ $admin['admin_name'] }}</td>
                      <td>{{ $admin['assigned_tickets'] }}</td>
                      <td>{{ $admin['solved_tickets'] }}</td>
                      
                  </tr>
              @endforeach
          </tbody>
          <tfoot>
              <tr>
                  <th>Totals</th>
                  <th>{{ array_sum(array_column($adminStats, 'assigned_tickets')) }}</th>
                  <th>{{ array_sum(array_column($adminStats, 'solved_tickets')) }}</th>
                  <th>{{ array_sum(array_column($adminStats, 'solved_tickets')) - array_sum(array_column($adminStats, 'solved_ticketsby')) }}</th>
              </tr>
          </tfoot>
      </table>
      </div><!-- /.table-responsive -->
    </div> <!-- /.card-body -->
   
  </div><!-- /.card -->
</div><!---Row---->

</div>
  </div>
</div>
   </div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
@endsection