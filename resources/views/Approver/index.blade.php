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
                    <span class="badge badge-danger badge-pill notification-count">{{$UnapprovedTicketCounts}}</span>
                </div>
            </li>
          </ol>
        </div><!-- /.col -->
      <!--  Success Alert (initially hidden) --->
      <div id="successAlert" class="alert alert-success alert-dismissible fade show" style="display: none;">
        <strong>Success!</strong> <span id="successMessage"></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">
                <div class="card" style="padding-left: 20px; padding-top:10px;">


                    <div class="row">
                          <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box mb-3">
                              <span class="info-box-icon bg-danger elevation-1">{{$UnapprovedTicketCounts}}</span>
                
                              <div class="info-box-content">
                                <a href="{{route('approver.index')}}">
                                <span class="info-box-text">Tickets Awaiting My Approval</span>
                                </a>
                                <span class="info-box-number"></span>
                              </div>
                              <!-- /.info-box-content -->
                            </div>
                            
                          </div>
                         
                      <div class="col-12 col-sm-6 col-md-2">
                   
                        <!-- /.info-box -->
                        
                      </div> 
                       
                                    <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-user"></i></span>
      
                    <div class="info-box-content">
                      <a href="{{route('hod.index')}}">
                      <span class="info-box-text">TO HOD Panel <i class="fa fa-arrow-right"></i></span>
                      </a>
                      <span class="info-box-number"></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                      <!-- fix for small devices only -->
                      <div class="clearfix hidden-md-up"></div>
  
                

                    </div>
                    
                 
                    <div class="row">
                      <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              
                      <tr>
                        <th>No</th>
                        <th>Ticket_No</th>
                          <th>Requester</th>
                          <th>Ticket Details</th>
                          <th>Approved Status</th>
                          <th>Ticket Status</th>
                          <th>Created on</th>
                          <th>Selected Approver</th>
                          <th>Approve</th>
                      </tr>
                          </thead>

                      
                      @foreach($tickets as $ticket)
                      <tr>
                      <td>{{$ticket->invoice_id ?? ''}}</td>
                      <td>{{$ticket->ticket_No ?? ''}}</td>
                      <td>{{$ticket->invoice_section_head1?? ''}}</td>
                      <td>{{$ticket->invoice_ticket_details ?? ''}}</td>
                      <td>{{$ticket->invoice_approval_status ??''}}</td>
                      <td>{{$ticket->invoice_ticket_status ??''}}</td>
                      
                      <td>{{$ticket->invoice_date_created ??''}}</td>
                      <td>{{$ticket->approver_name??''}}</td>
           
                     
                      <td>
                        @if($ticket->invoice_TicketCategory === 'Correction-Form' || $ticket->invoice_TicketCategory ==='Password_Change')
                        <a href="/approver/{{$ticket->invoice_id}}/edit">Approve&ensp;<i class="fa fa-check-circle"></i>  </a>
                        @else
                      <a href="/Rights/{{$ticket->ticket_No}}/edit">Approve&ensp;<i class="fa fa-check-circle"></i>  </a>
                        @endif
                     </td>

                  
                      </tr>
                       
                    @endforeach

                      </table>
                      
                 
              
                    </div>
                </div>
                </div>
            </div>
          </div>
            </div>
          </div>
        </div>
        <script>
          // Check if the session contains a success message
          @if(session('success'))
              // Display the success message
              $('#successMessage').text('{{ session('success') }}');
              $('#successAlert').show();
      
              // Automatically hide the success message after 10 seconds
              setTimeout(function() {
                  $('#successAlert').alert('close');
              }, 2000); // 10000 milliseconds = 10 seconds
          @endif
      </script>
      
    </div>
@endsection