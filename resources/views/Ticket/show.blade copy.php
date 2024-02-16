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
  .viewtickettopform{
    background-color: #e2f2e3;
    border-bottom: 2px;
    border-color: black;
  
    
  }
  .topheader{
    font-size:12px;
    font-weight: 600;
  }

  .animate-slow {
        animation-duration: 60s; /* Adjust the duration as needed for your desired speed */
    }

  .approvalrow{
    margin-bottom: 20px;
    color:#1c533d;
  }
  .fa, .fas {
    font-weight: 600;
}
.middleTicketDetailsform{
    padding-left:20px;
}
#UserAvatar{
    background: #db6b57;
    padding-left: 6px;
    position: relative;
    font-size: 14px;
    margin-right: -5%;
    top: -2%;
}
#TechnicianAvatar{
    background: #1e293b;
    color: white;
    padding-left: 6px;
    position: relative;
    font-size: 14px;
    min-height: 40px;
    margin-right: -5%;
    top: 30%;
}
#TechnicianComments{
    top:40%;
    position: relative;
    background-color: #ececec;
    font-size: 13px;
    padding: 20px;
}
.card-body {
    -webkit-flex: 1 1 auto;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height:500px;
    padding: 1.25rem;
    overflow: auto;
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
            <li class="breadcrumb-item"><a href="{{route('ticket.index')}}">Home</a></li>
         
            <li class="breadcrumb-item">Ticket Details</li>
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
      
      <div class="col-md-11">
        <!-- jquery validation -->

        <div class="card card-success">
         
            <form id="ticketForm" action="/Admin/{{$ticket->id}}" method="POST">
              @csrf
              @method('PUT') 

            <div class="card-body">
              <div class="row approvalrow" >
                <div class="col-md-12 mx-md-auto animate__animated animate__fadeInDown">
                    <h6>
                        <center>Ticket No {{$ticket->id}} Details 
                        @if($ticket->HodApprovalStatus == 'rejected')
                           <i class="fa fa-ban text-danger "> Rejected By Supervisor</i>
                        @else

                        @endif
                    </center>
                    </h6>
                    <hr>
                </div>
              </div>

              <div class="form-row">
               
                   <div class="col-md-2" style="background-color: #f8f9fa;">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Tickets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Statistics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Approvals</a>
                        </li>
                        <!-- Add more list items for additional navigation links -->
                    </ul>


                </div>

                <div class="col-md-7 middleTicketDetailsform">
                    <div class="row">
                      <div class="col-md-2"><!--Requester-->
                        <div id="UserAvatar">
                          {{$ticket->section_head1}}
                        </div>
                      </div>
                      <div class="col-md-10" ><!---Ticket Details--->
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
                  
                        <div class="form-row topform" style="border-top:1px solid rgb(203, 203, 203);">
                            <span class="topheader">Ticket Details:</span>
                            <textarea class="form-control" name="Correction_Details" id="CorrectionDetails" rows="4"  style="border: none !important; background:none; font-size:14px; width:100%;" readonly>{{$ticket->Correction_Details}}{{$ticket->SystemNa}}</textarea>
                        </div>
                  
                        <div class="form-row topform" style="border-top:1px solid rgb(203,203,203);">
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
                      
                          <div class="form-row topform" style="border-top:1px solid rgb(203,203,203);">
                            <div class="col-md-12 ">
                                <span class="topheader">HoD Approval 
                                <input type="text" name="Correction_Type" class="form-control1" id="CorrectionType"  value="{{$ticket->HodApprovalStatus}}" style="border: none !important; background:none; font-size:14px; width:80%;" readonly>           
                            </div>
                          </div>
                      </div>
                  
                    </div><!--Requester---->
                    @if($ticket->HodApprovalStatus == 'approved' || $ticket->HodApprovalStatus == 'Approved')
                    <div class="row">
                      <div class="col-md-2">
                     
                            <div id="TechnicianAvatar">
                                {{$ticket->Solvedby}}
                            </div>
                        </div><!--Technician--->
                    
                        <div class="col-md-10">
                            <div id="TechnicianComments">
                                {{$ticket->ITTechnicianComments}}
                            </div>
                        </div><!--Reply--->
                  
                    </div>
                @else
                @endif
                  </div><!---Middle Panel ticket Details-->
       
                <div class="col-md-3" id="RightTicketPanel" >
                 
                  <div class="form-row">
            
                    <div class="col-md-12">
                      <div class="form-group">
                        <span class="topheader">Section Head</span>
                        <input type="text" name="Section_Head" class="form-control" id="" style="font-size:14px;" value="{{$ticket->Section_Head}}" readonly>
                      </div>
                    </div>
               
                    <div class="col-md-12">
                      <div class="form-group">
                        @if($ticket->HodApprovalStatus=='approved' || $ticket->HodApprovalStatus==='Approved')
                        <span class="topheader">Approved By</span>
                        @elseif($ticket->HodApprovalStatus=='rejected' || $ticket->HodApprovalStatus==='rejected')
                        <span class="topheader">Rejected By</span>
                        @else
                        <span class="topheader">Choosen Approver</span>

                        @endif
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
                  @if($ticket->HodApprovalStatus=='Approved' || $ticket->HodApprovalStatus=='approved' ) 
                  <div class="col-md-12">
                    <div class="form-group">
                      <span class="topheader">Ticket Solved By:</span>
                      <input type="text" class="form-control" id="" style="font-size:14px;"  value="{{$ticket->Solvedby}}" readonly>
                    </div>
                  </div>   

                  <div class="col-md-12">
                    <div class="form-group">
                      <span class="topheader">Ticket Status:</span>
                      <input type="text" class="form-control" id="" style="font-size:14px;"  value="{{$ticket->TicketStatus}}" readonly>
                    </div>
                  </div>   
                  @else
                  @endif
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




@endsection