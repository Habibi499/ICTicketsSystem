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
               <li class="breadcrumb-item">All Tickets</li>
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
                              @foreach ($filteredItems as $item)
                              <tr>
                                 <td>{{$item->id}}</td>
                                 <td>{{$item->ticket_No}}</td>
                                 <td>{{$item->section_head1}}</td>
                             
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
                                  
                                 </td>
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
                                 <td>{{$item->Solvedby}}</td>
                                 <td>{{$item->TicketStatus}}</td>
                                 @if ($item->created_at)
                                 <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                                 @else
                                 <td>No date available</td>
                                 @endif
                      
                                    <td>
                                       @if ($item->documents)
                                          <i class="fas fa-paperclip" style="color: #ff00ae;"></i>
                                       @endif
                                    </td>


                                 <td><a href="{{route('tickets.show',$item->id)}}">View</a></td>
                              </tr>
                              @endforeach
                           </tbody>

                           @if ($totalRecords > 0)
                           <form action="{{ route('alltickets.index') }}" method="get">
                              @csrf
                              <input type="hidden" name="query" value="{{ request('query') }}">
                              <button type="submit" name="downloadPDF" value="1">Download Search Results as PDF</button>
                           </form>
                        @endif
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
@endsection