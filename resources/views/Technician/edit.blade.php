@extends('Admin.app')

@section('content')
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
      
      <div class="col-md-8">
        <!-- jquery validation -->

        <div class="card card-success">
      
          <!-- /.card-header -->
          <!-- form start -->
          <form id="quickForm" action="/Admin/{{$ticket->id}}" method="POST">
            @csrf
           @method('PUT') 
            <div class="card-body">
            <div class="form-row">
              <div class="card-body">
                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="Requester">Requested By</label>
                        <input type="text" name="section_head1" class="form-control" id="RequesterName" value="{{$ticket->section_head1}}" readonly>           
                    </div>
                  </div>
                    <div class="col-md-6">
                      <label for="Section-Head">Section Head</label>
                      <input type="text" name="Section_Head" class="form-control" id="SectionHead" value="{{$ticket->Section_Head}}"  readonly>
                    </div>
                  </div>
                  
  
              <div class="form-row">
               
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Correction Type</label>
                    <input type="text" name="Section_Head" class="form-control" id="CorectionType" value="{{$ticket->Correction_Type}}" readonly>
                  </div>
                </div>
                <div class="col-md-6">
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
            <div class="col-md-6">
              <div class="form-group">
                <label for="HodApproval">HOD Approval Status</label>
                <Input type="text" class="form-control" name="HodApprovalStatus" id="exampleFormControlTextarea1"  value="{{$ticket->HodApprovalStatus}}" readonly>
              </div>
            </div>
            <div class="col-md-6">
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
          

           
              </div>
            </div>
     
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
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