@extends('layouts.app')
@section('content')
<style>
 .timeline {
        position: relative;
    }

    .timeline-item {
        display: flex;
        justify-content:space-evenly;
 
    
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
        <a class="nav-link" id="tab3-tab" data-toggle="pill" href="#tab3">Approvals</a>
      </div>
    </div>
    <div class="col-md-10">
      <div class="tab-content" id="myVerticalTabsContent">
        <div class="tab-pane fade show active" id="tab1">
          <div class="row justify-content-center">
            <!-- left column -->
            <div class="col-md-12">
              <div class="" id="TicketDetails">
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
                      <div class="col-md-9 middleTicketDetailsform">
                          <div class="row">
                            <!--Requester Section-->
                            @include('partials._requester_details')
                            <!---Requester Section--->
                          @if($ticket->HodApprovalStatus == 'rejected')
                          <div class="row">
                            <div class="col-md-2">
                                  <div id="TechnicianAvatar">
                                      {{$ticket->approver->name}}
                                  </div>
                              </div><!--Technician--->
                          
                              <div class="col-md-10">
                                  <div id="TechnicianComments">
                                      {{$ticket->rejectionReason}}
                                  </div>
                              </div><!--Reply--->
                          </div>
                        @else
                        @endif
      
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
      
                      @if($ticket->ReopeningComments >1)
                        <div class="row mt-5">
                          <div class="col-md-2 ">
                                <div id="UserAvatar">
                                    {{$ticket->section_head1}}
                                </div>
                            </div>
                            <div class="col-md-10 ">
                                <div id="UserComments">
                                 
                                    {{$ticket->ReopeningComments}}
                                  </span>
                                </div>
                            </div><!--Reply--->
                        </div>
      
                        <div class="row mt-1">
                          <div class="col-md-2 ">
                                <div id="TechnicianAvatar">
                                    {{$ticket->Solvedby}}
                                </div>
                            </div>
                            <div class="col-md-10 ">
                                <div id="TechnicianComments">
                                 
                                    {{$ticket->ITTechnicianReply}}
                                  </span>
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
                                <span class="topheader">Chosen Approver</span>
                                @elseif($ticket->HodApprovalStatus=='rejected' || $ticket->HodApprovalStatus==='rejected')
                                <span class="topheader">Rejected By</span>
                                @else
                                  <!--span class="topheader">Choosen Approver</span>-->
                                  <span class="topheader">Approved By</span>
                                @endif
                              <input type="text" class="form-control" id="" style="font-size:14px;" value="{{{$ticket->approver->name}}}" readonly>
                                <!--<input type="text" class="form-control" id="" style="font-size:14px;" value="{{$ticket->ApproverName}}" readonly>-->
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
              </div>
          </div>      
        </div><!---Tab 1--->
        <div class="tab-pane fade" id="tab2">
          <div class="row">
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
                      @foreach ($ticket->activityLogs as $key => $activityLog)
                          <div class="timeline-item">
                              <div class="timeline-date">{{ $activityLog->created_at->format('d-m-Y, H:i:s') }}</div>
                              @if($key < count($ticket->activityLogs) - 1)
                              <!-- Render the line only if there is another action -->
                              <div class="timeline-line"></div>
                          @endif
                              <div class="timeline-line"></div>
                              <div class="timeline-point">
                                @if($activityLog->action == 'Approved')
                                <i class="fa fa-thumbs-up"></i>
                                @elseif($activityLog->action == 'created')
                                <i class="fa fa-plus"></i>
                                @elseif($activityLog->action == 'Rejected')
                                <i class="fa fa-thumbs-down"></i>
                                @elseif($activityLog->action == 'updated')
                                <i class="fa fa-upload"></i>
                                @elseif($activityLog->action == 'Rejected')
                                <i class="fa fa-thumbs-down"></i>
                                @elseif($activityLog->action == 'Solved')
                                <i class="fa fa-check-circle"></i>
                                @elseif($activityLog->action == 'Reopened')
                                <i class="fas fa-sync-alt fa-spin"></i>  
                                @elseif($activityLog->action == 'Escalated')
                                <i class="fa fa-upload"></i>   
                                @else
                                      <!-- Default icon or no icon for other actions -->
                                @endif


                              </div>
                              <div class="timeline-action">
                                
                                  <p>{{ $activityLog->action }}<span style="font-size:10px; color:#056936; font-weight:bold;">({{$activityLog->user->name }})</span></p></p>
                              </div>
                          </div>
                      @endforeach
                  </div>
            </div>    
        </div>
   
      </div>
      <div class="tab-pane fade" id="tab3">
        <div class="row">
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
  </div>
</div>




@endsection