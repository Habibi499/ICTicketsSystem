@extends('layouts.app')

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
          <h5 class="m-0"><i class="fa fa-check"></i>&ensp;&ensp;Approve tickets</h5>
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      
      
   
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('approver.index')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('approver.index')}}">UnApprovedTickets</a></li>
            <li class="breadcrumb-item">Approve Tickets</li>
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
              <form id="rejectForm" action="/approver/{{$ticket->id}}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" class="form-control" name="HodApprovalStatus" value="rejected">
                  <input type="hidden" class="form-control" name="TicketStatus" value="closed">
                  <input type="hidden" class="form-control" name="Assignedto" value="87">
                  <input type="hidden" class="form-control" name="Solvedby" value="Rejected at Approval Level">

                  <!-- Input field for the rejection reason -->
                  <div class="form-group">
                      <label for="rejectionReason">Rejection Reason:</label>
                      <textarea class="form-control" id="rejectionReason" name="rejectionReason" rows="4" required></textarea>
                  </div>
                  
                  <p>Are you sure you want to reject this ticket?</p>
                  
                  <button type="submit" class="btn btn-danger">Confirm Reject</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

              </form>
            </div>
          </div>
            </div>
          </div>

          <!--Modal-->
            <form id="ticketForm" action="/approver/{{$ticket->id}}" method="POST">
              @csrf
              @method('PUT') 

         
        
            <div class="card-body">
              <div class="row approvalrow" >
                <div class="col-md-8 mx-md-auto animate__animated animate__fadeInDown">
                    <h6>Correction Forms Approval</h6>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-8">
                 
                  <div class="card">
                    
                    <div class="card-body">
                      
                      <div class="form-row topform">
                        <div class="form-row viewtickettopform">
                          <div class="col-md-12" style="font-size:10px; ">
                              <span style="background-color:rgb(168, 201, 157);border-radius:2px; padding:1px;margin:10px;">
                              Created on:&ensp; <span class="fa fa-clock"></span> {{$ticket->created_at->format('Y-m-d H:i:s')}} 
                              &ensp;&ensp;&ensp;&ensp;By&ensp;<span class="fa fa-user"></span>  {{$ticket->section_head1}}
                              </span>  
                              <span style="background-color:rgb(168, 201, 157);border-radius:2px; padding:2px;margin-bottom:10px;">
                              Update:&ensp; <span class="fa fa-clock"></span> {{$ticket->updated_at->format('m-d H:i:s')}}
                              </span> 
                          </div>
                          <br><br>
                          <div class="col-md-12">
                             <span class="topheader">Correction Type:
                            <input type="text" name="Correction_Type" class="form-control1" id="CorrectionType"  value="{{$ticket->Correction_Type}}" style="border: none !important; background:none; font-size:14px; width:80%;" readonly>           
                            <hr>
                          </div>
                
                          <div class="col-md-4">
                            @if ($ticket->Record_No  == 'Password Change')
                            <span class="topheader">System Name</span>
                            <input type="text" class="form-control1" id="RecordNo" value="{{ $ticket->SystemName}}" style="border: none !important; background:none;font-size:12px; width:100%;" readonly>
                            @elseif ($ticket->Correction_Type == 'Endorsement')
                            <span class="topheader">Policy Number</span>
                            <input type="text" class="form-control1" id="RecordNo" value="{{ $ticket->Record_No  }}" style="border: none !important; background:none;font-size:12px; width:100%;" readonly>
                            @else
                            <span class="topheader">Policy Number</span>
                            <input type="text" class="form-control1" id="RecordNo" value="{{ $ticket->Record_No }}" style="border: none !important; background:none;font-size:12px; width:100%;" readonly>
                            @endif 
                          </div>
                  
                          <div class="col-md-4">
                              @if ($ticket->Correction_Type == 'Renewal')
                              <span class="topheader">  Renewal No</span>
                              <input type="text" class="form-control1" id="RequesterName" value="{{ $ticket->RenewalNo }}" style="border: none !important; background:none;font-size:12px; width:100%;" readonly>
                              @elseif ($ticket->Correction_Type == 'Endorsement' || $ticket->Correction_Type == 'Authorization For Bypass of Cancellation')
                              <span class="topheader">Endorsement No</span>
                              <input type="text" class="form-control1" id="RequesterName" value="{{ $ticket->EndorsementNo }}" style="border: none !important; background:none;font-size:12px; width:100%;" readonly>
                              @else
                              @endif
                          </div>
                          @if ($ticket->Correction_Type == 'Authorization For Bypass of Cancellation')
                            <div class="col-md-4">
                              <span class="topheader">Endorsement Code</span>
                              <input type="text" class="form-control1" id="RequesterName" value="{{ $ticket->Endorsement_Code }} "style="border: none !important; background:none;font-size:12px; width:100%;" readonly>
                            </div>
                          @else
                          @endif
                          <hr>
                        </div>
                  
                      </div>
                   
                      
                      <div class="form-row topform" style="border-top:1px solid rgb(203, 203, 203);">
                        <span class="topheader">Ticket Details:</span>
                        <textarea class="form-control" name="Correction_Details" id="CorrectionDetails" rows="4"  style="border: none !important; background:none; font-size:14px; width:80%;" readonly>{{$ticket->Correction_Details}}</textarea>
                      </div>
                      <div class="form-row topform" style="border-top:1px solid rgb(203,203,203);">
                        <span class="topheader">Attachments:</span>&ensp;&ensp;
                        <td>
                          @if($ticket->documents)
                          @php
                            $attachments = explode(',', $ticket->documents);
                            $totalAttachments = count($attachments);
                           @endphp
                        <span class="topheader">Attachment(s) Associated with ticket: {{ $totalAttachments }} 
                      
                        </span>&ensp;&ensp;
                            <td>
                              <ul>
                                @foreach($attachments as $index => $attachment)
                                    <li>
                                        <a href="{{ asset('uploads/' . $attachment) }}" target="_blank">View Document {{ $index + 1 }}</a>
                                    </li>
                                @endforeach
                                  </ul>
                          @else
                              No documents associated with this ticket.
                          @endif
                          </td>
                      </div>
                
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6 text-left">
                      <!-- Reject Button -->
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectConfirmationModal">
                        <i class="fas fa-check"></i> Reject
                    </button>
                    
                  </div>
                  
                    <div class="col-md-6 text-right">
                        <!-- Approve Button -->
                        <button type="submit" name="HodApprovalStatus" value="1" class="btn btn-success">
                            <i class="fas fa-check"></i> Approve
                        </button>
                    </div>
                 
                </div>
                </div>
                <div class="col-md-4" id="RightTicketPanel" >
                  <div class="form-row">
               
                    <div class="col-md-6">
                      <div class="form-group">
                        <span class="topheader">Section Head</span>
                        <input type="text" name="Section_Head" class="form-control" id="" style="font-size:14px;" value="{{$ticket->Section_Head}}" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <span class="topheader">Requested By</span>
                        <input type="text" name="section_head1" class="form-control" id="" style="font-size:14px;" value="{{$ticket->section_head1}}" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <span class="topheader">Created on</span>
                        <input type="text" name="created_at" class="form-control" id="" style="font-size:14px;" value="{{$ticket->created_at->format('Y-m-d H:i:s')}}" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <span class="topheader">Last Update </span>
                        <input type="text" class="form-control" id="" style="font-size:14px;" value="{{$ticket->updated_at->format('Y-m-d H:i:s')}}" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <span class="topheader">Ticket Number</span>
                        <input type="text" name="created_at" class="form-control" id="" style="font-size:14px;" value="{{$ticket->id}}" readonly>
                      </div>
                    </div>
              
                    <div class="col-md-12">
                      <div class="form-group">
                        <span class="topheader">Selected Approved</span>
                        <input type="text" class="form-control" id="" style="font-size:14px;" value="{{{$ticket->approver->name}}}" readonly>
                      </div>
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




@endsection