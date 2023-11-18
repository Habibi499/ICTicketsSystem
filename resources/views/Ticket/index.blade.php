@extends('layouts.app')
@section('content')
<style type="text/css">
   .small-box .icon>i.fa,
   .small-box .icon>i.fab,
   .small-box .icon>i.fad, 
   .small-box .icon>i.fal, 
   .small-box .icon>i.far, 
   .small-box .icon>i.fas, 
   .small-box .icon>i.ion {
   font-size: 50px;
   top: 40px;
   }
   .navbarticketanalysis{
   margin-left:20px;
   margin-right: 20px;
   }
   #fcard:hover{
   background-color: #f1f5f7;
   }
   #servicescatalogue{
   padding-left: 20px; 
   padding-top:10px;
   margin-left:30px;
   margin-right: 30px;
   }
   #servicescatalogueheader{
   padding-left: 20px; 
   padding-top:10px;
   }




.coming-soon a:hover::before {
content: "Coming Soon";
position: absolute;
background-color: #f1f1f1; 
color: #000; 
padding: 5px;
border-radius: 5px;
bottom: 125%;
left: 50%;
transform: translateX(-50%);
display: block;
}

</style>
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h6 class="m-0">{{ __('Dashboard') }}</h6>
         </div>
      </div>
   </div>
</div>
<div class="row navbarticketanalysis" >
   <div class="col-lg-2 col-6">
      <a href="{{route('requestedtickets.index')}}">
         <div class="small-box bg-info">
            <div class="inner">
               <p>My Tickets</p>
               <h4>{{$tickets->total()}}</h4>
            </div>
            <div class="icon">
               <i class="fas fa-poll"></i>
            </div>
         </div>
      </a>
   </div>
   <div class="col-lg-2 col-6">
      <a href="{{route('approvedTickets.index')}}">
         <div class="small-box bg-success">
            <div class="inner">
               <p>Approved Tickets</p>
               <h4>{{ $approvedTicketCount }}</h4>
            </div>
            <div class="icon">
               <i class="fa fa-check"></i>
            </div>
         </div>
      </a>
   </div>
   <div class="col-lg-2 col-6">
      <div class="small-box bg-danger">
         <div class="inner">
            <p>Rejected Tickets</p>
            <h4>{{ $RejectedTicketBySupervisor }}</h4>
         </div>
         <div class="icon">
            <i class="fa fa-exclamation"></i>
         </div>
      </div>
   </div>
   <div class="col-lg-2 col-6">
      <a href="{{route('unapprovedTickets.index')}}">
         <div class="small-box bg-warning">
            <div class="inner">
               <p>Unapproved Tickets</p>
               <h4>{{$UnapprovedTicketCount}}</h4>
            </div>
            <div class="icon">
               <i class="fa fa-times"></i>
            </div>
         </div>
      </a>
   </div>
   <div class="col-lg-2 col-6">
      <a href="{{route('myassignedTickets.index')}}">
         <div class="small-box bg-secondary">
            <div class="inner">
               <p>Assigned tickets</p>
               <h4>{{ $AssignedTicketCount}}</h4>
            </div>
            <div class="icon">
               <i class="fa fa-users"></i>
            </div>
         </div>
      </a>
   </div>
   <div class="col-lg-2 col-6">
      <div class="small-box bg-primary">
         <div class="inner">
            <p>Solved Tickets</p>
            <h4>{{ $solvedTicketsbyICT}}</h4>
         </div>
         <div class="icon">
            <i class="fas fa-chart-line"></i>
         </div>
      </div>
   </div>
</div>
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-9">
            <div class="card" id="servicescatalogueheader">
               <div class="row" style="margin-top:16px;">
                  <div class="col-md-6">
                     <h6>My  Services Catalogue</h6>
                  </div>
               </div>
               <div class="row" style="margin-top:16px;">
               </div>
               <div class="row" id="servicescatalogue">
                  <div class="col-md-4">
                     <a href="{{route('passwordchange.index')}}">
                        <div class="card text-center" id="fcard" >
                           <div class="card-header"> 
                              <i class="fa fa-4x fa-question-circle"></i>
                           </div>
                           <div class="card-body">
                              <p>Password Change Request Form</p>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-4">
                     <a href="{{route('ticket.create')}}">
                        <div class="card text-center" id="fcard" >
                           <div class="card-header"> 
                              <i class="fa fa-4x fa-pen"></i>
                           </div>
                           <div class="card-body">
                              <p>Underwriting/Re-Insurance Corrections</p>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-4">
                     <a href="{{route('ticket.accountsform')}}">
                        <div class="card text-center" id="fcard" >
                           <div class="card-header"> 
                              <i class="fa fa-4x fa-dollar-sign"></i>
                           </div>
                           <div class="card-body">
                              <p>Accounts/Administration Corrections</p>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-4">
                     <a href="{{route('ticket.claimsform')}}">
                        <div class="card text-center" id="fcard" >
                           <div class="card-header"> 
                              <i class="fas fa-4x fa-folder-open"></i>
                           </div>
                           <div class="card-body">
                              <p>Claims/Legal Departments Corrections</p>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-4">
                     <div class="coming-soon">
                     <a href="#" class="no-click">
                        <div class="card text-center" id="fcard" >
                           <div class="card-header"> 
                              <i class="fas fa-4x fa-ban"></i>
                           </div>
                           <div class="card-body">
                              <p>Authorisation for Bypass or Cancellation</p>
                           </div>
                        </div>
                     </a>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="coming-soon">
                     <a href="#" disabled="true">
                        <div class="card text-center" id="fcard" >
                           <div class="card-header"> 
                              <i class="fas fa-4x fa-hand-point-right"></i>
                           </div>
                           <div class="card-body">
                              <p>All Systems Rights Request Form</p>
                           </div>
                        </div>
                     </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-3">
            <div class="card card-success">
               <div class="card-body">
                  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                  <!-- Create a canvas element to render the bar graph -->
                  <canvas id="myBarChart" width="400" height="200"></canvas>
            
                     <script>
                        // Get the counts from the adminStats2 array
                        var approvedCount = {{ $adminStats2['approvedCount'] ?? 0 }};
                        var solvedCount = {{ $adminStats2['solvedCount'] ?? 0 }};
                        var unsolvedCount = {{ $adminStats2['unsolvedCount'] ?? 0 }};
                        var rejectedbySupervisorCount = {{ $adminStats2['rejectedbySupervisorCount'] ?? 0 }};
                        // Use Chart.js to create a bar graph
                        var ctx = document.getElementById('myBarChart').getContext('2d');
                        var myBarChart = new Chart(ctx, {
                           type: 'bar',
                           data: {
                                 labels: ['Approved','Rejected','Solved', 'Unsolved'],
                                 datasets: [{
                                    label: 'My Ticket Stats',
                                    data: [approvedCount,rejectedbySupervisorCount, solvedCount, unsolvedCount],
                                    backgroundColor: [
                                       'rgba(255, 170, 51)',
                                       'rgba(255, 106, 76)',
                                       'rgba(122, 193, 66)',
                                       'rgba(255, 205, 86, 0.2)'
                                    ],
                                    borderColor: [
                                       'rgba(255, 170, 51)',
                                       'rgba(255, 106, 76)',
                                       'rgba(122, 193, 66)',
                                       'rgba(255, 205, 86, 1)'
                                    ],
                                    borderWidth: 1
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
            </div>
              
           </div>
         </div>
  
      </div>
   </div>
</div>
</div>
</div>
@endsection


