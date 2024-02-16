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
</style>
<link rel="stylesheet" href="{{asset('css/TicketShow.css')}}">
<div class="container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h5 class="m-0"><i class="fa fa-edit"></i>&ensp;&ensp;Edit tickets</h5>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('ticket.index')}}">Home</a></li>
                  <li class="breadcrumb-item">Ticket Details</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="container mt-1 card card-success">
<div class="row">
   <div class="col-md-2 tabsnav">
      <div class="nav flex-column nav-pills" id="myVerticalTabs">
         <a class="nav-link active" id="tab1-tab" data-toggle="pill" href="#tab1">Ticket</a>
         <a class="nav-link" id="tab2-tab" data-toggle="pill" href="#tab2">Statistics</a>
      </div>
   </div>
   <div class="col-md-10">
      <div class="tab-content" id="myVerticalTabsContent">
         <div class="tab-pane fade show active" id="tab1">
            <!---Reject Modal--->
            <div class="modal fade" id="rejectConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="rejectConfirmationModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-body">
                        <form id="rejectForm" action="/Rights/Admin/{{$tickets->first()->ticket_No}}" method="POST">
                           @csrf
                           @method('PUT')
                           <input type="hidden" name="TicketStatus" class="form-control" value="Declined">
                           <input type="hidden" name="AdminStatus" class="form-control"  value="Completed">
                           <input type="hidden" name="Solvedby"  class="form-control"  value="{{Auth::user()->name}}">
                           <div class="form-group">
                              <label for="rejectionReason">Reason for Decling:</label>
                              <textarea class="form-control" id="rejectionReason" name="ITTechnicianComments" rows="4" required></textarea>
                           </div>
                           <p>Are you sure you want to Decline this ticket?</p>
                           <button type="submit" class="btn btn-danger">Confirm Declining This Ticket</button>
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!--Reject Modal-->
            <!---Escalate Modal--->
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
                           <form action="{{ route('escalateTicket', ['ticket_No' => $ticket_No]) }}" method="post">
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


            <!--Escalate Modal>--->
            <div class="row justify-content-center">
               <!-- left column -->
               <div class="col-md-12">
                  <div class="" id="TicketDetails">
                     <form id="ticketForm" action="/Rights/Admin/{{$tickets->first()->ticket_No}}" method="POST">
                        @csrf
                        @method('PUT') 
                        <div class="card-body">
                           <div class="row approvalrow" >
                              <div class="col-md-12 mx-md-auto animate__animated animate__fadeInDown">
                                 <h6>
                                    <center>Ticket No {{$tickets->first()->ticket_No }} Details 
                                    </center>
                                 </h6>
                                 <hr>
                              </div>
                           </div>
                           <div class="form-row">
                              <div class="col-md-10 middleTicketDetailsform">
                                 <div class="row">
                                    <div class="col-md-2">
                                       <!--Requester-->
                                       <div id="UserAvatar">
                                          {{$tickets->first()->Requester_Name}}
                                       </div>
                                    </div>
                                    <div class="col-md-10" >
                                       <!---Ticket Details--->
                                       <div class="form-row viewtickettopform">
                                          <div class="col-md-12" style="font-size:10px; ">
                                             <span style="background-color:rgb(168, 201, 157);border-radius:2px; padding:1px;margin:10px;">
                                             Created on:&ensp; <span class="fa fa-clock"></span> {{$tickets->first() ->created_at->format('Y-m-d H:i:s')}} 
                                             &ensp;&ensp;&ensp;&ensp;By&ensp;<span class="fa fa-user"></span>  {{$tickets->first()->Requester_Name}}
                                             </span>  
                                             <span style="background-color:rgb(168, 201, 157);border-radius:2px; padding:2px;margin-bottom:10px;">
                                             Update:&ensp; <span class="fa fa-clock"></span> {{$tickets->first()->updated_at->format('m-d H:i:s')}}
                                             </span> 
                                          </div>
                                          <div class="col-md-4 mt-4" style="font-size:10px; ">
                                             <span class="topheader">Correction Type:
                                             <input type="text" name="Correction_Type" class="form-control1" id="CorrectionType"  
                                                value="System Rights Requisition" readonly>           
                                             </span> 
                                          </div>
                                          <div class="col-md-4 mt-4" style="font-size:10px; ">
                                             <span class="topheader">Rights requested For:
                                             <input type="text" name="" class="form-control1" id="CorrectionType"  
                                                value="{{$tickets->first()->Requested_For}}" readonly>           
                                             </span> 
                                          </div>
                                          <div class="col-md-4 mt-4" style="font-size:10px; ">
                                             <span class="topheader">Department:
                                             <input type="text" name="" class="form-control1" id="CorrectionType"  
                                                value="{{$tickets->first()->Department}}" readonly>           
                                             </span>
                                          </div>
                                          <div class="col-md-12">
                                             @if($tickets->isEmpty())
                                             <p>No records found for the specified Ticket Number.</p>
                                             @else
                                             <table class="table-bordered" style="font-size: 14px;">
                                                <thead>
                                                   <tr>
                                                      <th>Class Name</th>
                                                      <th>Category</th>
                                                      <th>View</th>
                                                      <th>Add</th>
                                                      <th>Save</th>
                                                      <th>DrNote</th>
                                                      <th>Query</th>
                                                      <th>Print</th>
                                                      <!-- Add other headers as needed -->
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach ($tickets as $key => $ticket)
                                                   <tr>
                                                      <td>
                                                         @if ($key === 0 || $ticket->Main_Class_Name !== $tickets[$key - 1]->Main_Class_Name)
                                                         {{ $ticket->Main_Class_Name }}
                                                         @endif
                                                      </td>
                                                      <td>
                                                         @if ($ticket->Categories != 0)
                                                         {{ $ticket->Categories }}
                                                         @endif
                                                      </td>
                                                      <td>
                                                         @if ($ticket->view_only != 0)
                                                         ✓
                                                         @endif
                                                      </td>
                                                      <td>
                                                         @if ($ticket->add_details != 0)
                                                         ✓
                                                         @endif
                                                      </td>
                                                      <td>
                                                         @if ($ticket->save_details != 0)
                                                         ✓
                                                         @endif
                                                      </td>
                                                      <td>
                                                         @if ($ticket->DrNote != 0)
                                                         ✓
                                                         @endif
                                                      </td>
                                                      <td>
                                                         @if ($ticket->Query_data != 0)
                                                         ✓
                                                         @endif
                                                      </td>
                                                      <td>
                                                         @if ($ticket->print_data != 0)
                                                         ✓
                                                         @endif
                                                      </td>
                                                      <!-- Add other fields as needed -->
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                             @endif
                                          </div>
                                          <hr>
                                          <div class="col-md-4">
                                          </div>
                                          <hr>
                                       </div>
                                       <div class="form-row topform" style="border-top:1px solid rgb(203,203,203);">
                                          <div class="col-md-12 ">
                                             <span class="topheader">HoD Approval 
                                             <input type="text"  class="form-control1" id="CorrectionType"  
                                                value="{{$tickets->first()->HodApprovalStatus}}" readonly>           
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!--Ticket Details---->
                                 <div class="form-row mt-4">
                                    <!--Reply-->
                                    <div class="col-md-2 ">
                                       <div id="TechnicianAvatar2">
                                          @if($ticket->Solvedby >1)
                                          {{Auth::user()->name}}
                                          @else
                                          ICT Technician
                                          @endif
                                       </div>
                                    </div>
                                    <div class="col-md-10" style="background-color: rgb(237, 238, 237);">
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
                                             <span class="topheader">Impact Analysis,Remarks & other - Technical (For ICT Use)</span>
                                             <textarea class="form-control" name="ImpactAnalysis" id="CorrectionDetails1" 
                                                rows="3" style="background:none; font-size:14px; width:100%;"></textarea>
                                             @else
                                          <label>Technician Comments</label> 
                                          <textarea class="form-control" name="ITTechnicianComments" id="CorrectionDetails1" 
                                             rows="3" style="background:none; font-size:14px; width:100%;"></textarea>
                                             <span class="topheader">Impact Analysis,Remarks & other - Technical (For ICT Use)</span>
                                             <textarea class="form-control" name="ImpactAnalysis" id="CorrectionDetails1" 
                                                rows="3" style="background:none; font-size:14px; width:100%;"></textarea>
                                           @endif
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row mt-2">
                                    <div class="col-md-6 text-left">
                                       <!-- Reject Button -->
                                       <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rejectConfirmationModal">
                                       <i class="fa fa-window-close" aria-hidden="true"></i> Decline Ticket
                                       </button>
                                    </div>
                                    <div class="col-md-6 text-right">
                                       <button type="button" id="confirmEscalateButton"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#statusModal">
                                       <i class="fas fa-upload"></i> Escalate Ticket
                                       </button>
                                       <button type="submit" class="btn btn-success btn-sm">
                                       <i class="fas fa-check"></i> Solve Ticket
                                       </button>
                                    </div>
                                 </div>
                              </div>
                              <!---Middle Panel ticket Details-->
                              <div class="col-md-2" id="RightTicketPanel" >
                                 <div class="form-row">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <span class="topheader">Section Head:</span>
                                          <input type="text" class="form-control" id="" style="font-size:14px;" value="{{ $tickets->first()->Section_Head }}" readonly>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <span class="topheader">Chosen Approver:</span>
                                       <input type="text" class="form-control" id="" style="font-size:14px;"  value="{{$tickets->first()->hiddenApproverName}}" readonly>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <span class="topheader">Approved By:</span>
                                       <input type="text" class="form-control" id="" style="font-size:14px;"  value="{{$tickets->first()->hiddenApproverName}}" readonly>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <span class="topheader">Automatically Assigned to:</span>
                                       <input type="text" class="form-control" id="" style="font-size:14px;"  value="{{$tickets->first()->AssignedtoName}}" readonly>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <span class="topheader">Ticket Solved By:</span>
                                       <input type="text" class="form-control" id="" value="{{$ticket->first()->TicketStatus}}" style="font-size:14px;"  readonly>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <span class="topheader">Ticket Status:</span>
                                       <input type="text" class="form-control" id="" value="{{$ticket->first()->TicketStatus}}" style="font-size:14px;" readonly>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                     <div class="col-md-12 text-right">
                        <!-- Rights.Admin.Edit.blade.php -->
                        <form action="{{ route('releaseTicket', ['ticket_No' => $ticket_No]) }}" method="post">
                           @csrf
                           @method('post')
                           <span class="topheader">Note: This Ticket is locked. If you are not working on it, release it for it to be opened by another technician.</span>
                           <button type="submit" class="btn btn-warning">
                           <i class="fas fa-refresh"></i> Release Ticket
                           </button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!---Tab 1--->
         <div class="tab-pane fade" id="tab2">
            <div class="row">
               <div class="col-md-12 mx-md-auto animate__animated animate__fadeInDown">
                  <h6>
                     Ticket No  Details 
                  </h6>
                  <hr>
               </div>
            </div>
            <div class="tab-pane fade" id="tab3">
               <h3>Content for Tab 3</h3>
            </div>
         </div>
      </div>
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
   
      // Attach a click event listener to the "Escalate Ticket" button
      $('#escalateTicketButton').on('click', function (e) {
          e.preventDefault(); // Prevent the default form submission behavior
          $('#statusModal').modal('show'); // Display the modal
      });
   
      // Attach a click event listener to the "Update" button within the modal
      $('#confirmEscalateButton').on('click', function () {
          // Trigger the form submission when the user confirms the escalation
          $('#escalateForm').submit();
      });
   </script>
   
</div>
@endsection