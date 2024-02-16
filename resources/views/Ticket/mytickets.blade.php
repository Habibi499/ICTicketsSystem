@extends('layouts.app')
@section('content')
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h4 class="m-0"><i class="fas fa-chart-line"></i>&ensp;&ensp;My Tickets</h4>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('ticket.index')}}">Home</a></li>
               <li class="breadcrumb-item">My Tickets</li>
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
                <div class="col-12 col-sm-6 col-md-3">
                   <div class="info-box">
                      <span class="info-box-icon bg-info elevation-1">{{$tickets->total()}}</span>
                      <div class="info-box-content">
                         <a href="{{route('requestedtickets.index')}}">
                         <span class="info-box-text">My Tickets</span>
                         </a>
                      </div>
                      <!-- /.info-box-content -->
                   </div>
                   <!-- /.info-box -->
                </div>
                <!-- /.col -->
        

                <div class="col-12 col-sm-6 col-md-3">
                   <div class="info-box mb-3">
                      <span class="info-box-icon bg-success elevation-1"> {{ $approvedTicketCount }}</span>
                      <div class="info-box-content">
                         <a href="{{route('approvedTickets.index')}}">
                         <span class="info-box-text">Approved Tickets</span>
                         </a>
                      </div>
                      <!-- /.info-box-content -->
                   </div>
                   <!-- /.info-box -->
                </div>
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                   <div class="info-box mb-3">
                      <span class="info-box-icon bg-warning elevation-1">{{ $AssignedTicketCount }}</span>
                      <div class="info-box-content">
                         <a href="{{route('myassignedTickets.index')}}">
                         <span class="info-box-text">Assigned Tickets</span>
                         </a>
                      </div>
                   </div>
                </div>
                <!-- /.info-box -->
                <div class="col-12 col-sm-6 col-md-3">
                   <div class="info-box mb-3">
                      <span class="info-box-icon bg-danger elevation-1">{{$UnapprovedTicketCount}}</span>
                      <div class="info-box-content">
                         <a href="{{route('unapprovedTickets.index')}}">
                         <span class="info-box-text">Unapproved Tickets</span>
                         </a>
                      </div>
                      <!-- /.info-box-content -->
                   </div>
                </div>
                <!-- /.info-box -->
             </div>
             <hr>
             
               <div class="row">
                  <div class="col-md-12">
                     <!---Search Form on Left---->
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
                           <tbody>
                              @foreach ($filteredItems as $item)
                              <tr>
                                 <td>{{$item->id}}</td>
                                 <td>{{$item->ticket_No}}</td>
                                 <td>{{$item->Ticket_Urgency}}</td>
                                 <td>{{$item->section_head1}}
                                    
                                 <td>
                                    {{$item->Record_No}}
                                    {{$item->pvNumber}}
                                    {{$item->claimNumber}}
                                     {{$item->chequeNumber}}
                                   {{$item->ReferenceNumber}}
                                   {{$item->ReceiptNo}}
                                   {{$item->DrCrNumber}}
                                   {{$item->JVNumber}}
                                   {{$item->DemandNoteNo}}
                                   {{$item->ReportName}}
                                   {{$item->PettyCashNo}}
                                   {{$item->PettyCashVoucherNum}}
                                   {{$item->ReversalNo}}
                                   {{$item->RReversalNo}}
                                  
                                 <td>{{$item->HodApprovalStatus}}</td>
                                 @if($item->approver)
                                 <td>{{$item->approver->name}}</td>
                                 @else
                                 <td></td>
                                 @endif
                                 @if($item->assignedAdmin)
                                 <td>{{$item->assignedAdmin->name}}</td>
                                 @else
                                 <td></td>
                                 @endif
                                 <td>{{$item->TicketStatus}}</td>
                                 @if ($item->created_at)
                                 <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                                 @else
                                 <td>No date available</td>
                                 @endif
                                 <td><a href="{{route('tickets.show',$item->id)}}">View</a></td>
                                 @if ($item->TicketStatus == 'Solved' || $item->TicketStatus == 'Pending'  )
                                 <td><a href="{{route('tickets.edit',$item->id)}}" id="ReopenLink"><i class="fa fa-eye" aria-hidden="true"></i>
                                    Reopen</a></td>
                                 @else
                                 <td><a href="#" id="disabledLink"><i class="fa fa-ban"></i></a></td>
                                 @endif
                                
                              </tr>
                              @endforeach
                           </tbody>
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
                           Total Records on your Search: {{$totalRecords}}
                           <ul class="pagination pagination-sm m-0 float-right">
                              {{ $filteredItems->appends(['query' => request('query')])->links() }}
                              </li>
                           </ul>
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