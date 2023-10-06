@extends('Admin.app')

@section('content')
<style type="text/css">
   input:hover {
    border-color: transparent;
  }

  /* Remove the outline when the input is focused */
  input:focus {
    outline: none;
  }
  .topform{
    background-color: #e2f2e3;
    border-bottom: 2px;
    border-color: black;
  }
  .topheader{
    font-size:12px;
  }
</style>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   <h6 class=""><a href="/Admin"><i class="fa fa-arrow-left"></i>&nbsp;Go Back</a></h6>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <h6 class="">{{ __('Sort out Ticket') }}</h6>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="container-fluid">
    <div class="row justify-content-center">
      <!-- left column -->
      
      <div class="col-md-10">
        <!-- jquery validation -->

        <div class="card card-success">
      
          <!-- /.card-header -->
          <!-- form start -->
          <form id="AdminEditForm" action="/Admin/{{$ticket->id}}" method="POST">
              @csrf
              @method('PUT') 
            <div class="card-body">
              <div class="form-row">
                <div class="col-md-8">
                  <div class="card">
                    <div class="card-body">
                      <div class="form-row topform">
                        <div class="col-md-6">
                          <span class="topheader">Created by:</span>
                          <input type="text" name="section_head1" class="form-control1" id="RequesterName" value="{{$ticket->section_head1}}" style="border: none !important; background:none; font-size:12px; width:80%;" readonly>           
                        </div>
                        <div class="col-md-6">
                          <span class="topheader">Last Update:</span>
                              <input type="text" name="section_head1" class="form-control1" id="RequesterName" value="{{ $ticket->created_at->format('Y-m-d H:i:s') }}" style="border: none !important; background:none;font-size:12px; width:100%;" readonly>           
                          </div>
                      </div>
                      <div class="form-row topform" style="border-top:1px solid rgb(220, 219, 219)";>
                        <span class="topheader">Ticket Title:</span>
                        <input type="text" name="Correction_Type" class="form-control1" id="RequesterName" value="{{$ticket->Correction_Type}}" style="border: none !important; background:none; font-size:18px; width:80%;" readonly>           
                      </div>
                      
                      <div class="form-row topform" style="border-top:1px solid rgb(203, 203, 203);">
                        <span class="topheader">Ticket Details:</span>
                        <input type="text" name="Correction_Details" class="form-control1" id="RequesterName" value="{{$ticket->Correction_Details}}" style="border: none !important; background:none; font-size:18px; width:80%;" readonly>           
                      </div>

                
                    </div>
                    
                  </div>
                </div>
                <div class="col-md-4" id="RightTicketPanel" >
                  <div class="form-row">
               
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Correction Type</label>
                        <input type="text" name="Correction_Type" class="form-control" id="CorectionType" value="{{$ticket->Correction_Type}}" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Urgency/priority</label>
    
                          <input type="text" name="Ticket_Urgency" class="form-control" id="TicketUrgency" value="{{$ticket->Ticket_Urgency}}" readonly>
                     
                      </div>
                    </div>
                    </div>
      
                    <div class="form-group">
                      <label for="InvoiceAmount">Record No</label>
                     <input type="text" name="Record_No" class="form-control" id="RecordNo" value="{{$ticket->Record_No}}" readonly>
                    </div>
                    <div class="form-row">
                     <div class="col">
                          <div class="form-group">
                            <label for="InvoiceAmount">What is Required</label>
                            <Input type="text" class="form-control" name="Correction_Details" id="exampleFormControlTextarea1"  value="{{$ticket->Correction_Details}}" readonly>
                          </div>
                      </div>
                  </div>
                <div class="form-row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="HodApproval">HOD Approval Status</label>
                    <Input type="text" class="form-control" name="HodApprovalStatus" id="exampleFormControlTextarea1"  value="{{$ticket->HodApprovalStatus}}" readonly>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="HodApproval">Assigned to</label>
                    <select class="form-control" id="InvoicePayment" name="Assignedto" required>
                        <option value="">--Select--</option>
                        <option value="LKhalumba">Lucas</option>
                        <option value="KNgure">Kevin Ngure</option>
                        <option value="RMwaura">Robinson Mwaura</option>
                    </select>
                  </div>
                </div>
                </div>
                  <div class="form-group">
                    <label for="HodApproval">Ticket Status</label>
                    <select class="form-control" id="InvoicePayment" name="TicketStatus" required>
                        <option value="">--Select--</option>
                        <option value="Open">Open</option>
                        <option value="Pending">Pending</option>
                        <option value="Closed">Close</option>
                    </select>
                  </div>
                </div>
              
            </div>           
		      </div>
         </form>
        </div>

        


        
        <!-- /.card -->
        </div>

    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->




@endsection