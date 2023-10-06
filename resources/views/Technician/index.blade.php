@extends('Technician.app')

@section('content')

  
  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Tickets</span>
                <span class="info-box-number">
                    {{$ticketsCount}}
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Approved Tickets</span>
                <span class="info-box-number">{{$approvedTicketCount }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-down"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Unapproved</span>
                <span class="info-box-number">{{$UnapprovedTicketCounts}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">AssignedTicketCount</span>
                <span class="info-box-number">{{$AssignedTicketCount}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-9">
            <!-- MAP & BOX PANE -->
      
    

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Approved Tickets</h3>

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
                      <th>Ticket ID</th>
                      <th>Requester</th>
                      <th>Status</th>
                      <th>Ticket Title</th>
                      <th>Date Submitted</th>
                      <th>Assigned To</th>
                      <th>View</th>
                      <th>Assign</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                        <tr>
                          <td>{{$ticket->id}}</td>
                          <td>{{$ticket->section_head1}}</td>
                          <td>{{$ticket->HodApprovalStatus}}</td>
                          <td>{{$ticket->Record_No}}</td>
                          
                            @if ($ticket->created_at)
                            <td>{{ $ticket->created_at->format('Y-m-d H:i:s') }}</td>
                            @else
                                <p>No date available</p>
                            @endif
                            <td>{{$ticket->Assignedto}}</td>
                            
                          <td><a href="{{route('technician.show',$ticket->id)}}">View</a></td>
                          <td><a href="{{route('technician.edit',$ticket->id)}}">Assign</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">

                <a href="{{route('alltickets.index')}}" class="btn btn-sm btn-secondary float-right">View All  Tickets</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-3">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fa fa-1x fa-close"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Closed Tickets</span>
                <span class="info-box-number">{{$ClosedTicketCount}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Open Tickets</span>
                <span class="info-box-number">{{$approvedTicketCount }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
              
          <!-- /.info-box -->



            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
@endsection