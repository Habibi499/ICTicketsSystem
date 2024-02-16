@extends('layouts.app')
@section('content')
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h4 class="m-0"><i class="fas fa-chart-line"></i>&ensp;&ensp;My Rights Request Tickets</h4>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('ticket.index')}}">Home</a></li>
               <li class="breadcrumb-item">My Rights Request Tickets</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<div class="row">
   <div class="col-md-8">
   </div>
    <div class="col-md-4">
      @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <script>
          // Automatically close the alert after 2000 milliseconds (2 seconds)
          setTimeout(function(){
              $(".alert").alert('close');
          }, 2000);
      </script>
  @endif
    </div>
</div>



<!-- /.content-header -->
<!-- Main content -->
<div class="content">
   <div class="container-fluid">
    
      <div class="row">
         <div class="col-md-12">
            <div class="card" style="padding-left: 20px; padding-top:10px;">
              <div class="row">

             </div>
             <hr>
             
               <div class="row">
                  <div class="col-md-12">
                     <!---Search Form on Left---->
                     <div class="card-header">
                        <div class="card-header">
                           <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="{{route('requestedtickets.index')}}" class="btn btn-success">My Corrections Tickets</a>
                              <a href="{{route('requestedrightstickets.index')}}" class="btn btn-warning">My System Rights Request</a>
                            </div>
                        <div class="card-tools">
                           
                           <form id="searchForm" action="{{ route('requestedtickets.index') }}" method="GET">
                              <div class="input-group input-group-sm" style="width: 250px;">
                                 <input type="text" name="query" class="form-control float-right" placeholder="Search Ticket...">
                                 <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                    </button>
                                 </div>
                           </form>
                           </div>
                        </div>
                     </div>
                     <!--Search Form Ends--->
                     <div id="tableContainer">
                        <table id="example1" class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Ticket_No</th>
                                 <th>Ticket_Urgency</th>
                                 <th>Requester</th>
                              
                                 <th>Ticket Details</th>
                                 <th>Approved Status</th>
                                 <th>Selected Approver</th>
                                 <th>Assigned to</th>
                                 <th>Ticket Status</th>
                                 <th>Created on</th>
                                 <th>View</th>
                                 <th>Re-Open</th>
                                 
                              </tr>
                           </thead>
     
                           <!--Rights--->
                           <tbody>
                              @foreach ($MyRightsTickets as $MyRightsTicket)
                                 <tr>
                                    <td>{{ $MyRightsTicket->id }}</td>
                                    <td>{{ $MyRightsTicket->ticket_No }}</td>
                                    <td>{{ $MyRightsTicket->Requester_Name }}</td>
                                    <td>{{ $MyRightsTicket->Ticket_Urgency}} High</td>
                                    <td>{{ $MyRightsTicket->TicketCategory }}
                                          {{ $MyRightsTicket->pvNumber }}
                                          {{ $MyRightsTicket->claimNumber }}
                                          
                                    </td>
                                    <td>@if($MyRightsTicket->HodApprovalStatus==1)
                                       Approved
                                    @else
                                    {{$MyRightsTicket->HodApprovalStatus}}
                                    @endif
                                    </td>
                                    <td>{{$MyRightsTicket->hiddenApproverName}}</td>
                                    <td>{{$MyRightsTicket->AssignedtoName}}</td>
                                    <td>{{$MyRightsTicket->TicketStatus}}</td>
                                    
                                    @if ($MyRightsTicket->created_at)
                                          <td>{{ $MyRightsTicket->created_at->format('Y-m-d H:i:s') }}
                                          </td>
                                    @else
                                          <p>No date available</p>
                                    @endif
                                    <td><a href="{{route('Rights.show',$MyRightsTicket->ticket_No)}}">View</a></td>
                                    @if ($MyRightsTicket->TicketStatus == 'Solved' || $MyRightsTicket->TicketStatus == 'Pending'  )
                                    <td><a href="#" id="ReopenLink"><i class="fa fa-eye" aria-hidden="true"></i>
                                       Reopen</a></td>
                                    @else
                                    <td><a href="#" id="disabledLink"><i class="fa fa-ban"></i></a></td>
                                    @endif
                                       
                              @endforeach
                           </tbody>
                           
                        </table>
                        <div class="card-footer clearfix">
                           
                      
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>
</div>
</div>
<script>
document.getElementById('disabledLink').addEventListener('click', function (event) {
  event.preventDefault(); // Prevent the default action (e.g., navigating to a new page)
});

</script>
   
@endsection