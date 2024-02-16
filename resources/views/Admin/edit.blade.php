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

 .viewtickettopform{
   background-color: #e2f2e3;

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
#UserComments{

   position: relative;
   background-color: #cce3d3;
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
#TicketDetails{
 height: 500px;
 overflow: auto;
}
#Type-Department-Section{
 border-bottom: 1px solid rgb(248, 255, 251);
}
#CorrectionType{
 border: none !important;
 background:none;
 font-size:14px; 
 width:80%;
}
#Type-Department-Section{
 border: 1px solid rgb(248, 255, 251);
 background-color:#e2f2e3;
}
.topformdetails{
  background-color:rgb(168, 201, 157);
  border-radius:2px;
  padding:1px;
  margin:10px;
}
   .topform{
   background-color: #e2f2e3;

   }
   .topform1{
   background-color: rgb(237, 238, 237);;

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
   .viewtickettopform{
   background-color: #e2f2e3;
   border-bottom: 2px;
   border-color: black;
   }
   #UserAvatar{
   background: #db6b57;
   padding-left: 6px;
   position: relative;
   font-size: 14px;
   margin-right: -5%;
   top: -2%;
   position: relative;
   z-index:1;
   }
   #TechnicianAvatar{
   background: #1e293b;
   color: white;
   padding-left: 6px;
   position: relative;
   font-size: 13px;
   margin-right: -5%;
   top: -2%;
   position: relative;
   z-index:1;
   }
   #TechnicianAvatar2{
   background: #1e293b;
   color: white;
   padding-left: 6px;
   position: relative;
   font-size: 13px;
   margin-right: -5%;
   top:4%;
   position: relative;
   z-index:1;
   }
   .tabsnav {
    padding-top: 60px;
    background: #ebf1eab6;
    min-height: 500px;
}
.timeline {
        position: relative;
    }

    .timeline-item {
        display: flex;
        justify-content: space-between;
         align-items: center;
         margin-bottom: 20px; /* Adjust the margin as needed */
    
    }
    .timeline-line {
        position: absolute;
        top:48%;
        bottom: 0;
        left: 55%;
        height: 90px;
        width: 2px;
        background-color: #ccc; /* Adjust the color as needed */
        transform: translateX(-50%);
    }

    .timeline-point {
        position: absolute;
        top: 30%;
        left: 55%;
        width: 15px;
        height: 15px;
        transform: translate(-50%, -50%);
        z-index: 1;
    }
    .timeline-date,
    .timeline-action {
        position: relative;
        z-index: 2; /* Ensure date and action are above the line and point */
        margin: 0 10px; /* Adjust the spacing between date, point, and action */
    }
    .fa-thumbs-up{
      color:green;
    }
    .fa-thumbs-down{
      color:red;
    }
    .fa-plus{
      color:#7ebb2b;
    }
    .fa-upload{
      color:green;
    }
    .fa-check-circle{
      color:rgb(15, 163, 196)
    }
    .fa-check-circle{
      color:rgb(15, 163, 196)
    }
    .fa-spin{
      color:rgb(255, 0, 0);
    }
   </style>
<div class="container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h5 class="m-0"><i class="fa fa-edit"></i>&ensp;&ensp;Edit tickets</h5>
            </div>
            <link rel="stylesheet" href="{{asset('css/AdminEdit.css')}}">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
   </div>
<div class="container mt-1 card card-success">
   <div class="row">
      <div class="col-md-2 tabsnav">
         <div class="nav flex-column nav-pills" id="myVerticalTabs">
            <a class="nav-link active" id="tab1-tab" data-toggle="pill" href="#tab1">Ticket</a>
            <a class="nav-link" id="tab2-tab" data-toggle="pill" href="#tab2">Statistics</a>
            <a class="nav-link" id="tab3-tab" data-toggle="pill" href="#tab3">Approvals</a>
         </div>
      </div>
      <div class="col-md-10">
         <div class="tab-content" id="myVerticalTabsContent">
            <div class="tab-pane fade show active" id="tab1"><!---Tab 1--->
               <div class="row justify-content-center">
                  <!-- left column -->
                  <div class="col-md-12">
                     <div class="card card-success">
                        <!---Reject-->
                        <div class="modal fade" id="rejectConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="rejectConfirmationModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                 <div class="modal-body">
                                    <form id="rejectForm" action="/Admin/{{$ticket->id}}" method="POST">
                                       @csrf
                                       @method('PUT')
                                       <input type="hidden" name="TicketStatus" class="form-control" value="rejected">
                                       <input type="hidden" name="AdminStatus" class="form-control"  value="Completed">
                                       <input type="hidden" name="Solvedby"  class="form-control"  value="{{Auth::user()->name}}">
                                       <div class="form-group">
                                          <label for="rejectionReason">Rejection Reason:</label>
                                          <textarea class="form-control" id="rejectionReason" name="ITTechnicianComments" rows="4" required></textarea>
                                       </div>
                                       <p>Are you sure you want to reject this ticket?</p>
                                       <button type="submit" class="btn btn-danger">Confirm Ticket Reject</button>
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!--Reject Modal-->

                     <!--Escalate Modal-->
                     <div id="statusModal" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title">Ticket Escalation</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <form method="POST" action="{{ route('admin.escalate',$ticket->id) }}">
                                    @csrf
                                    <div class="form-group">
                                       <label for="status">Escalate Ticket to</label>
                                       <select id="admin_select" name="EScalatedto" class="form-control" required>
                                          <option value="">Select an Admin</option>
                                          @foreach ($Admins as $admin)
                                          <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                                          @endforeach
                                       </select>
                                       <label for="EscalatorComments">Comments</label>
                                       <textarea name="EscalatorComments" id="EscalatorComments" class="form-control" rows="2">
                                             I am Unable to resolve the Ticket. Please Assist. Thank you.
                                          </textarea>
                                       <input type="text" name="EScalatedBy" value="{{ Auth::user()->name }}"  hidden>
                                    </div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                 </form>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!--Escalate Modal--->

                        <form id="ticketForm" action="/Admin/{{$ticket->id}}" method="POST">
                           @csrf
                           @method('PUT') 
                              <div class="row approvalrow" >
                                 <div class="col-md-8 mx-md-auto animate__animated animate__fadeInDown mt-2">
                                    <h6>Solve Correction Form</h6>
                                 </div>
                              </div>
                              <div class="form-row">
                                 <div class="col-md-8" >
                                    <!--<div class="card">-->
                                       <div class="form-row">
                                          @include('partials._requester_details')
                                       <!--Requester-->
                                       @if($ticket->Solvedby>0)
                                       <div class="form-row mt-3">
                                          <!--Initial Response-->
                                          <div class="col-md-2 ml-3">
                                             <div id="TechnicianAvatar">
                                                {{$ticket->Solvedby}}
                                             </div>
                                          </div>
                                          <div class="col-md-9">
                                             <div class="form-row topform1" style="">
                                                <span class="topheader">Technician Comments</span>
                                                <textarea class="form-control" name="ITTechnicianComments" id="CorrectionDetails" rows="4"  readonly>{{$ticket->ITTechnicianComments }}</textarea>
                                             </div>
                                          </div>
                                       </div>
                                       @else
                                       @endif
                                       <!--Requester-->
                                       @if($ticket->ReopeningComments>0)
                                       <div class="form-row mt-3">
                                          <!--Initial Response-->
                                          <div class="col-md-2 ml-3">
                                             <div id="UserAvatar">
                                                {{$ticket->section_head1}}
                                             </div>
                                          </div>
                                          <div class="col-md-9">
                                             <div class="form-row topform" >
                                                <span class="topheader">Reopening Comments</span>
                                                <textarea class="form-control" name="ReopeningComments" id="CorrectionDetails" rows="4" 
                                                   style="border: none !important; background:none; font-size:14px; width:100%;" readonly>{{$ticket->ReopeningComments }}</textarea>
                                                   @if($ticket->NewAdditionaldocument)
                                                   @php
                                                   $attachments = explode(',', $ticket->NewAdditionaldocument);
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
                                       @else
                                       @endif
                                       <div class="form-row mt-4" >
                                          <!--Reply-->
                                          <div class="col-md-2">
                                             <div id="TechnicianAvatar2">
                                                @if($ticket->Solvedby >1)
                                                {{Auth::user()->name}}
                                                @else
                                                ICT Technician
                                                @endif
                                             </div>
                                          </div>
                                          <div class="col-md-10" style="background-color:#e4e4e4">
                                             <div class="form-row topform1 mt-3">
                                                <div class="col-md-6">
                                                   <span class="topheader">Solved By
                                                   <select class="form-control" id="SolvedBy" name="Solvedby" required>
                                                      <option value="">--Select--</option>
                                                      <option value="{{Auth::user()->name}}">{{Auth::user()->name}}</option>
                                                   </select>
                                                </div>
                                                <div class="col-md-6">
                                                   <span class="topheader">Ticket Status</span>
                                                   <select class="form-control" id="TicketStatus" name="TicketStatus" required>
                                                      <option value="">--Select--</option>
                                                      <option value="Open">Open</option>
                                                      <option value="Solved">Solved</option>
                                                      <option value="Pending">Pending</option>
                                                      <!--<option value="Closed">Close</option>-->
                                                   </select>
                                                </div>
                                             </div>
                                             <div>
                                                @if(!empty($ticket->ReopeningComments))
                                                <label>Technician Reply</label>
                                                <textarea class="form-control" name="ITTechnicianReply" id="CorrectionDetails" 
                                                   rows="3" style="background:none; font-size:14px; width:100%;"></textarea>
                                                @else
                                                <label>Technician Comments</label> 
                                                <textarea class="form-control" name="ITTechnicianComments" id="CorrectionDetails1" 
                                                   rows="3" style="background:none; font-size:14px; width:100%;"></textarea>
                                                @endif
                                             </div>
                                          </div>
                                       </div>
                                       <!--</div>
                                       --Card-->
                                    <div class="row">
                                       <div class="col-md-6 text-left">
                                          <!-- Reject Button -->
                                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rejectConfirmationModal">
                                          <i class="fa fa-window-close" aria-hidden="true"></i> Reject Ticket
                                          </button>
                                       </div>
                                       <div class="col-md-6 text-right">
                                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#statusModal">
                                          <i class="fas fa-upload"></i> Escalate Ticket
                                          </button>
                                          <button type="submit" class="btn btn-success btn-sm">
                                          <i class="fas fa-check"></i> Solve Ticket
                                          </button>
                                       </div>
                                    </div>
                                 </div>
                                 <!----->
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
                        </form>
                        <div class="col-md-12 text-right">
                           <form method="post" action="{{ route('admin.release', $ticket->id) }}">
                              @csrf
                              <span class="topheader">Note:This Ticket is locked. If you are not working on it release for it to be opened
                              by another technician.
                              </span>
                              <button type="submit" class="btn btn-warning">
                              <i class="fas fa-refresh"></i> Release Ticket
                              </button>
                           </form>
                        </div>
                     </div>
                     <!--Modal-->
                     <div id="statusModal" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title">Ticket Escalation</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <form method="POST" action="{{ route('admin.escalate',$ticket->id) }}">
                                    @csrf
                                    <div class="form-group">
                                       <label for="status">Escalate Ticket to</label>
                                       <select id="admin_select" name="EScalatedto" class="form-control" required>
                                          <option value="">Select an Admin</option>
                                          @foreach ($Admins as $admin)
                                          <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                                          @endforeach
                                       </select>
                                       <label for="EscalatorComments">Comments</label>
                                       <textarea name="EscalatorComments" id="EscalatorComments" class="form-control" rows="2">
                                             I am Unable to resolve the Ticket. Please Assist. Thank you.
                                          </textarea>
                                       <input type="text" name="EScalatedBy" value="{{ Auth::user()->name }}"  hidden>
                                    </div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                 </form>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!--Modal-->
                     <script>
                        $(document).ready(function () {
                           $('#update-status').click(function () {
                              // Populate the form with the current user's status here if needed
                              var currentUserStatus = "{{ auth()->user()->status }}";
                              $('#status').val(currentUserStatus); // Update the select field
                        
                              $('#statusModal').modal('show');
                           });
                        });
                     </script>
                     <!-- /.card -->
                  </div>
               </div> <!-- /.row -->
            </div><!--Tab 1--->
            
               <div class="tab-pane fade" id="tab2">
                  <div class="row mt-4">
                        <div class="col-md-12 mx-md-auto animate__animated animate__fadeInDown">
                            <h6>
                               Ticket No {{$ticket->id}} LifeCycle
                                @if($ticket->HodApprovalStatus == 'rejected')
                                   <i class="fa fa-ban text-danger "> Rejected By Supervisor</i>
                                @else
        
                                @endif
                            </h6>
                            <hr>
                            <div class="timeline">
                              @foreach ($ticketWithLogs->activityLogs as $key => $ticketWithLog)
                              <div class="timeline-item">
                                  <div class="timeline-date">{{ $ticketWithLog->created_at->format('d-m-Y, H:i:s') }}</div>
                          
                                  @if($key < count($ticketWithLogs->activityLogs) - 1)
                                      <!-- Render the line only if there is another action -->
                                      <div class="timeline-line"></div>
                                  @endif
                          
                                  <div class="timeline-point">
                                      @if($ticketWithLog->action == 'Approved')
                                          <i class="fa fa-thumbs-up"></i>
                                      @elseif($ticketWithLog->action == 'created')
                                          <i class="fa fa-plus"></i>
                                      @elseif($ticketWithLog->action == 'Rejected')
                                          <i class="fa fa-thumbs-down"></i>
                                       @elseif($ticketWithLog->action == 'updated')
                                       <i class="fa fa-upload"></i>
                                       @elseif($ticketWithLog->action == 'Rejected')
                                       <i class="fa fa-thumbs-down"></i>
                                       @elseif($ticketWithLog->action == 'Solved')
                                       <i class="fa fa-check-circle"></i>
                                       @elseif($ticketWithLog->action == 'Reopened')
                                       <i class="fas fa-sync-alt fa-spin"></i>   
                                       @elseif($ticketWithLog->action == 'Escalated')
                                       <i class="fa fa-upload"></i>   
                                       @elseif($ticketWithLog->action == 'Viewed')
                                       <i class="fa fa-eye"></i>  
                                       @else
                                       <!-- Default icon or no icon for other actions -->
                                       @endif
                                  </div>
                                  <div class="timeline-action">
                                
                                    <p>{{$ticketWithLog->action }} <span style="font-size:10px; color:#056936; font-weight:bold;">({{$ticketWithLog->user->name }})</span></p>
                                    <p></p>
                                </div>
                              </div>
                          @endforeach
                          </div>
                    </div>  
                  </div>  
                </div>
                <div class="tab-pane fade" id="tab3">
                  <div class="row mt-4">
                    <div class="col-md-12 mx-md-auto animate__animated animate__fadeInDown">
                        <h6>
                           Ticket No {{$ticket->id}} Approvals
                            @if($ticket->HodApprovalStatus == 'rejected')
                              
                            @else
                            @endif
                        </h6>
                    </div>
                    <div class="col-md-12 mx-md-auto animate__animated animate__fadeInDown">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">State</th>
                            <th scope="col">Request Date</th>
                            <th scope="col">Approval Requester</th>
                            <th scope="col">Chosen Approver</th>
                            <th scope="col">Approver Comments</th>
                            <th scope="col">Date Approved</th>
                        
                        
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @if($ticket->HodApprovalStatus == 'approved')
                            <td style="background: #9BA563;">{{$ticket->HodApprovalStatus}}</td>
                            @elseif ($ticket->HodApprovalStatus == 'rejected')
                            <td style="background: #cf9b9b;"><i class="fa fa-thumbs-down"></i>{{$ticket->HodApprovalStatus}}</td>
                            @else
                              <td style="background: #cbceba;">{{$ticket->HodApprovalStatus}}</td>
                            @endif
                            <td>{{$ticket->created_at}}</td>
                            <td>{{$ticket->section_head1}}</td>
                            <td>{{$ticket->hiddenApproverName}}</td>
                            <td>{{$ticket->rejectionReason}}</td>
                            <td>{{$ticket->updated_at->format('m-Y, H:i:s') }}</td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th scope="col">State</th>
                            <th scope="col">Request Date</th>
                            <th scope="col">Approval Requester</th>
                            <th scope="col">Chosen Approver</th>
                            <th scope="col">Approver Comments</th>
                            <th scope="col">Date Approved</th>
                        
                        
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div><!--Tab 3-->
         </div>
         </div><!--Tabs--->
      </div><!---Columns---->
   </div><!---Row--->
            
</div><!-- /.container-fluid -->
</div>

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
</div><!-- /.container-fluid -->
@endsection
