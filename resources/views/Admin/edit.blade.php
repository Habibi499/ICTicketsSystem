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

  .animate-slow {
        animation-duration: 60s; /* Adjust the duration as needed for your desired speed */
    }

  .approvalrow{
    margin-bottom: 20px;
    color:#1c533d;
  }

</style>
    <!-- Content Header (Page header) -->
    
        
    <!-- /.content-header -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0"><i class="fa fa-edit"></i>&ensp;&ensp;Edit tickets</h5>
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      
      
   
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('alltickets.index')}}">Unsolved Tickets</a></li>
            <li class="breadcrumb-item">Solve Ticket</li>
          </ol>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>

    <div class="row justify-content-center">
      <!-- left column -->
      
      <div class="col-md-10">
        <!-- jquery validation -->

        <div class="card card-success">
      
          <!-- /.card-header -->
          <!-- form start -->
          <!-- Add these links to your HTML -->

          <div class="modal fade" id="rejectConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="rejectConfirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-body">
            
                  
                  <!-- Input field for the rejection reason -->
               
                  <p>Are you sure you want to reject this ticket?</p>
                  
                  <!-- "Confirm Reject" button in your modal -->
              <button type="button" class="btn btn-danger" id="confirmRejectModalButton">
                <i class="fa fa-window-close" aria-hidden="true"></i> Confirm Reject
              </button>

              <!-- "Cancel" button in your modal -->
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>


              
            </div>
          </div>
            </div>
          </div>

          <!--Modal-->
            <form id="ticketForm" action="/Admin/{{$ticket->id}}" method="POST">
              @csrf
              @method('PUT') 

            <div class="card-body">
              <div class="row approvalrow" >
                <div class="col-md-8 mx-md-auto animate__animated animate__fadeInDown">
                    <h6>Solve Correction Form</h6>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-8">
                 
                  <div class="card">
                    
                    <div class="card-body">
                      
                      <div class="form-row topform">
                        <div class="col-md-6">
                          <span class="topheader">Correction Type
                          <input type="text" name="Correction_Type" class="form-control1" id="RequesterName"  value="{{$ticket->Correction_Type}}" style="border: none !important; background:none; font-size:14px; width:80%;" readonly>           
                        </div>
                        <div class="col-md-6">
                          <span class="topheader">Policy No/PV No:</span>
                              <input type="text"  class="form-control1" id="RequesterName" value="{{ $ticket->Record_No }}" style="border: none !important; background:none;font-size:12px; width:100%;" readonly>           
                          </div>
                      </div>
                   
                      
                      <div class="form-row topform" style="border-top:1px solid rgb(203, 203, 203);">
                        <span class="topheader">Ticket Details:</span>
                        <textarea class="form-control" name="Correction_Details" id="CorrectionDetails" rows="8"  style="border: none !important; background:none; font-size:14px; width:100%;" readonly>{{$ticket->Correction_Details}}</textarea>
                      </div>
                      <div class="form-row topform" style="border-top:1px solid rgb(203,203,203);">
                        <span class="topheader">Attachments:</span>&ensp;&ensp;
                        <td>
                          @if($ticket->documents)
                          <a href="{{ asset('uploads/' . $ticket->documents) }}" target="_blank">View Documents Attached</a>
                           @else
                          No document associated with this ticket.
                           @endif
                          </td>
                      </div>
                      <div class="form-row topform" style="margin-top:12px;">
                        <div class="col-md-6">
                          <span class="topheader">Solved By
                            <select class="form-control" id="InvoicePayment" name="Solvedby" required>
                              <option value="">--Select--</option>
                              <option value="{{Auth::user()->name}}">{{Auth::user()->name}}</option>
                           
                            </select>
                        </div>
                        <div class="col-md-6">
                          <span class="topheader">Ticket Status</span>
                          <select class="form-control" id="InvoicePayment" name="TicketStatus" required>
                            <option value="">--Select--</option>
                            <option value="Open">Open</option>
                            <option value="Pending">Pending</option>
                            <option value="Closed">Close</option>
                          </select>
                            
                          </div>
                      </div>
                   
                
                      <div class="form-row topform" style="border-top:1px solid rgb(203, 203, 203);margin-top:5px;">
                        <label>Technician Comment</label>
                        <textarea class="form-control" name="ITTechnicianComments" id="CorrectionDetails" rows="3"  style=" background:none; font-size:14px; width:100%;" required></textarea>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6 text-left">
                      <!-- Reject Button -->
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectConfirmationModal">
                        <i class="fa fa-window-close" aria-hidden="true"></i> Reject Ticket
                    </button>
                    
                  </div>
                  
                    <div class="col-md-6 text-right">
                        <!-- Approve Button -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check"></i> Solve Ticket
                        </button>
                    </div>
                 
                </div>
                </div>
                <div class="col-md-4" id="RightTicketPanel" >
                  <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <span class="topheader">Ticket Number</span>
                      <input type="text" class="form-control" id="" style="font-size:14px;" value="{{$ticket->id}}" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <span class="topheader">Ticket Urgency</span>
                      <input type="text" name="Ticket_Urgency" class="form-control" id="" style="font-size:14px;" value="{{$ticket->Ticket_Urgency}}" readonly>
                    </div>
                  </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <span class="topheader">Requested By</span>
                        <input type="text" name="section_head1" class="form-control" id="" style="font-size:14px;" value="{{$ticket->section_head1}}" readonly>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <span class="topheader">Section Head</span>
                        <input type="text" name="Section_Head" class="form-control" id="" style="font-size:14px;" value="{{$ticket->Section_Head}}" readonly>
                      </div>
                    </div>
               
                    <div class="col-md-6">
                      <div class="form-group">
                        <span class="topheader">Created on</span>
                        <input type="text"  class="form-control" id="" style="font-size:14px;" value="{{$ticket->created_at->format('Y-m-d H:i:s')}}" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <span class="topheader">Last Update </span>
                        <input type="text" class="form-control" id="" style="font-size:14px;" value="{{$ticket->updated_at->format('Y-m-d H:i:s')}}" readonly>
                      </div>
                    </div>
                 
      
                    <div class="col-md-6">
                      <div class="form-group">
                        <span class="topheader">Approval Status</span>
                        <input type="text" name="HodApprovalStatus" class="form-control" id="" style="font-size:14px;" value="{{{$ticket->HodApprovalStatus}}}" readonly>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <span class="topheader">Approved By</span>
                        <input type="text" class="form-control" id="" style="font-size:14px;" value="{{{$ticket->approver->name}}}" readonly>
                      </div>
                    </div>
                 
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <span class="topheader">Automatically Assigned to:</span>
                      <input type="text" class="form-control" id="" style="font-size:14px;"  value="{{optional($ticket->assignedAdmin)->name}}" readonly>
                    </div>
                  </div>   

                  <div class="col-md-12">
                    <div class="form-group">
                      <span class="topheader">Ticket Status:</span>
                      <input type="text" class="form-control" id="" style="font-size:14px;"  value="{{$ticket->TicketStatus}}" readonly>
                    </div>
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

<!-- ... your HTML content ... -->

<!-- Add this script at the end of your Blade view, just before </body> -->
<script>
  // Attach a click event listener to the "Confirm Reject" button
  $('#rejectConfirmationModalButton').on('click', function (e) {
      e.preventDefault(); // Prevent the default form submission behavior
      $('#rejectConfirmationModal').modal('show'); // Display the modal
  });

  // Attach a click event listener to the "Confirm Reject" button within the modal
  $('#confirmRejectModalButton').on('click', function () {
      // Trigger the form submission when the user confirms the rejection
      $('#ticketForm').submit();
  });
</script>



@endsection