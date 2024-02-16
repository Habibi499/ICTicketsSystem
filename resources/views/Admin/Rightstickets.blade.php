@extends('Admin.app')
@section('content')
<meta http-equiv="refresh" content="30">
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h4 class="m-0"><i class="fas fa-chart-line"></i>&ensp;&ensp;All Tickets</h4>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
               <li class="breadcrumb-item">All Rights Request Tickets</li>
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
<div class="content">
   <div class="container-fluid">
    
      <div class="row">
         <div class="col-md-12">
            <div class="card" style="padding-left: 20px; padding-top:10px;">
              <div class="row">
  
                <!-- /.info-box -->
             </div>
             <hr>
               <div class="row">
                  <div class="col-md-12">
                     <!---Search Form on Left---->
                     <div class="card-header">
                        <div class="card-title">
               
                        </div>
                        <div class="card-tools">
                           <form id="searchForm" action="{{ route('alltickets.index') }}" method="GET">
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
                               
                                 <th>Requester</th>
                            
                                 <th>Ticket Details</th>
                                 <th>Approval Status</th>
                                 <th>Selected Approver</th>
                                 <th>Auto-Assigned to</th>
                                 <th>Solved By</th>
                                 <th>Ticket Status</th>
                                 <th>Created on</th>
                                 <th>Docs</th>
                                 <th>View</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($RightsTickets as $item)
                              <tr>
                                 <td>{{ $item->id }}</td>
                                 <td>{{ $item->ticket_No }}</td>
                                 <td>{{ $item->Requester_Name }}</td>
                                 <td>{{ $item->Ticket_Urgency}} High</td>
                                 <td>{{ $item->TicketCategory }}
                                       {{ $item->pvNumber }}
                                       {{ $item->claimNumber }}
                                       
                                 </td>
                                 <td>@if($item->HodApprovalStatus==1)
                                    Approved
                                 @else
                                 {{$item->HodApprovalStatus}}
                                 @endif
                                 </td>
                                 <td>{{$item->hiddenApproverName}}</td>
                                 <td>{{$item->AssignedtoName}}</td>
                                 <td>{{$item->TicketStatus}}</td>
                                 
                                 @if ($item->created_at)
                                       <td>{{ $item->created_at->format('Y-m-d H:i:s') }}
                                       </td>
                                 @else
                                       <p>No date available</p>
                                 @endif
                                 <td><a href="{{route('Rights.show',$item->ticket_No)}}">View</a></td>
                                 @if ($item->TicketStatus == 'Solved' || $item->TicketStatus == 'Pending'  )
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
@endsection