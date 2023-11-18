@extends('Admin.app')
@section('content')
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h4 class="m-0"><i class="fas fa-chart-line"></i>&ensp;&ensp;All Approved and Open Tickets</h4>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
               <li class="breadcrumb-item">My Tickets</li>
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
                        <table class="table">
                           <thead>
                               <tr>
                                   <th>ID</th>
                                   <th>Section Head</th>
                                   <th>HOD Approval Status</th>
                                   <th>Ticket Status</th>
                                   <th>Record No</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($filteredItems as $item)
                                   <tr>
                                       <td>{{ $item->id }}</td>
                                       <td>{{ $item->section_head1 }}</td>
                                       <td>{{ $item->HodApprovalStatus }}</td>
                                       <td>{{ $item->TicketStatus }}</td>
                                       <td>{{ $item->Record_No }}</td>
                                   </tr>
                               @endforeach
                           </tbody>
                       </table>
               
                     
                   </div>
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