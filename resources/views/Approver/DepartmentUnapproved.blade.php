@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->

      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               
              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item"><a href="{{route('approver.index')}}">Home</a></li>
                
                <li class="breadcrumb-item">
                    <div id="notification-bell" class="d-inline">
                        <i class="fas fa-bell fa-1.5x"></i>
                        <span class="badge badge-danger badge-pill notification-count">{{$myunapprovedTicketCounts}}</span>
                    </div>
                </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <div class="content">
    <div class="container-fluid">
    <div class="card" style="padding-left: 20px; padding-top:10px;">
    <div class="row">
     
      <div class="col-12 col-sm-6 col-md-5">
        <div class="info-box mb-8">
          <span class="info-box-icon bg-warning elevation-1">{{$myunapprovedTicketCounts}}</span>

          <div class="info-box-content">
            <a href="{{route('approver.index')}}">
            <span class="info-box-text">Tickets Awaiting my Approval</span>
            </a>
            <span class="info-box-number"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-5">
        <div class="info-box mb-8">
          <span class="info-box-icon bg-danger elevation-1">{{$UnapprovedTicketCounts}}</span>

          <div class="info-box-content">
            <a href="{{route('hod.departmentunapproved')}}">
            <span class="info-box-text">Unapproved in My Department</span>
          </a>
            <span class="info-box-number"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
      </div>
      </div>
    </div>
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
                    
                      <!-- fix for small devices only -->
                    
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                         <!---Search Form on Left---->
                         <div class="card-header">
                            <div class="card-title">
                               <form id="searchForm" action="{{ route('hod.departmentunapproved') }}" method="GET">
                                  <div class="form-check form-check-inline">
                                     <input class="form-check-input" type="checkbox" name="approved" id="approved">
                                     <label class="form-check-label" for="approved">Approved</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                     <input class="form-check-input" type="checkbox" name="unapproved" id="unapproved">
                                     <label class="form-check-label" for="unapproved">Unapproved</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                     <input class="form-check-input" type="radio" name="TicketStatus[]" id="open" value="Open">
                                     <label class="form-check-label" for="open">Open</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                     <input class="form-check-input" type="radio" name="TicketStatus[]" id="pending" value="Pending">
                                     <label class="form-check-label" for="pending">Pending</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                     <input class="form-check-input" type="radio" name="TicketStatus[]" id="closed" value="Closed">
                                     <label class="form-check-label" for="closed">Closed</label>
                                  </div>
                                  <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                               </form>
                            </div>
                            <div class="card-tools">
                               <form id="searchForm" action="{{ route('hod.departmentunapproved') }}" method="GET">
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
                 
                    <div class="row">
                      <div class="col-md-12">
                        <p>All UnApproved Tickets in My Department: {{$UnapprovedTicketCounts}} Tickets</p>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                
                        <tr>
                            <th>Ticket_No</th>
                            <th>Requester</th>
                            <th>Ticket Details</th>
                            <th>Ticket Urgency</th>
                            <th>Approved Status</th>
                            <th>Ticket Status</th>
                           
                            <th>Selected Approver</th>
                            <th>Created on</th>
                            <th>Approve</th>
                        </tr>
                            </thead>

                        
                            <tbody>
                              @foreach ($filteredItems as $item)
                              <tr>
                                 <td>{{$item->id}}</td>
                                 <td>{{$item->section_head1}}</td>
                                 <td>{{$item->Record_No}}</td>
                                 <td>{{$item->Ticket_Urgency}}</td>
                                
                                 <td>{{$item->HodApprovalStatus}}</td>
                                 <td>{{$item->TicketStatus}}</td>
                                 @if($item->approver)
                                 <td>{{$item->approver->name}}</td>
                                 @else
                                 <td></td>
                                 @endif
                             
                                 
                                 @if ($item->created_at)
                                 <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                                 @else
                                 <td>No date available</td>
                                 @endif
                                 <td><a href="/approver/{{$item->id}}/edit">Approve&ensp;<i class="fa fa-check-circle"></i>  </a></td>
                              </tr>
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
@endsection