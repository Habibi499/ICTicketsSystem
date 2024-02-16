@extends('layouts.app')
@section('content')
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
            <div class="row justify-content-center">
               <!-- left column -->
               <div class="col-md-12">
                  <div class="" id="TicketDetails">
                     <form id="ticketForm" action="/Rights/{{$tickets->first()->ticket_No}}" method="POST">
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
                                          <div class="row mt-4" id="Type-Department-Section">
                                             {{ $tickets->first()->requested_for }}
                                           <div class="col-md-4">
                                               <span class="topheader">Correction Type:
                                               <input type="text" name="Correction_Type" class="form-control1" id="CorrectionType"  
                                               value="System Rights Requisition" readonly>           
                                               </span>    
                                           </div>
                                           <div class="col-md-4">
                                             <span class="topheader">Rights requested For:
                                             <input type="text" name="" class="form-control1" id="CorrectionType"  
                                             value="{{$tickets->first()->Requested_For}}" readonly>           
                                             </span>
                                           </div>
                                           <div class="col-md-4">
                                             <span class="topheader">Department:
                                             <input type="text" name="" class="form-control1" id="CorrectionType"  
                                             value="{{$tickets->first()->Department}}" readonly>           
                                             </span>
                                           </div>
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
                                       </div>
                                       <div class="form-row topform" style="border-top:1px solid rgb(203,203,203);">
                                          <div class="col-md-12 ">
                                             <span class="topheader">HoD Approval 
                                             <input type="text"  class="form-control1" id="CorrectionType"  value="{{$tickets->first()->HodApprovalStatus}}" readonly>           
                                          </div>
                                       </div>
                                       <div class="row mt-2">
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
                                    
                                 </div>
                                 <!--Ticket Details---->
                      
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
                                       <input type="text" class="form-control" id="" style="font-size:14px;"  value="{{$ticket->first()->hiddenApproverName}}" readonly>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <span class="topheader">Approved By:</span>
                                       <input type="text" class="form-control" id="" style="font-size:14px;"  value="{{$ticket->first()->hiddenApproverName}}" readonly>
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
</div>
@endsection