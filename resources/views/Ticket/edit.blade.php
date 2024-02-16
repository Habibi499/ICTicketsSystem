@extends('layouts.app')
@section('content')
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
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <Link rel="stylesheet" href="{{asset('css/TicketEdit.css')}}">
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('ticket.index')}}">Home</a></li>
                  <li class="breadcrumb-item">Ticket Details</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <div class="row justify-content-center">
      <!-- left column -->
      <div class="col-md-11">
         <div class="card card-success">
            <form id="ticketForm" action="/Tickets/{{$ticket->id}}" method="POST">
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
                        </ul>
                     </div>
                     <div class="col-md-7 middleTicketDetailsform">
                        <div class="row">
                           <div class="col-md-2">
                              <!--Requester-->
                              <div id="UserAvatar">
                                 {{$ticket->section_head1}}
                              </div>
                           </div>
                           <div class="col-md-10">
                              <div class="form-row viewtickettopform">
                                 <div class="col-md-12" style="font-size:10px; ">
                                    <span class="topformdetails">
                                    Created on:&ensp; <span class="fa fa-clock"></span> {{$ticket->created_at->format('Y-m-d H:i:s')}} 
                                    &ensp;By&ensp;<span class="fa fa-user"></span>{{$ticket->section_head1}}
                                    </span>  
                                    <span class="topformdetails">
                                    Update:&ensp; <span class="fa fa-clock"></span> {{$ticket->updated_at->format('m-d H:i:s')}}
                                    </span> 
                                 </div>
                                 <div class="col-md-8">
                                    <span class="topheader">Correction Type:
                                    <input type="text" name="Correction_Type" class="form-control1" id="CorrectionType"  
                                       value="{{$ticket->Correction_Type}}" readonly>           
                                 </div>
                                 <div class="col-md-4">
                                    <span class="topheader">Correction Department:
                                    <input type="text" name="Correction_Dept" class="form-control1" id="CorrectionType"  value="{{$ticket->Correction_Dept}}" readonly>           
                                    </span>
                                 </div>
                              </div>
                              @if($ticket->Correction_Dept=='Accounts/Admin')
                              <div class="row" id="Type-Department-Section">
                                 <div class="col-md-4">
                                    <span class="topheader">Correction category:
                                    <input type="text" name="correction_category" class="form-control1" id="CorrectionType"  value="{{$ticket->correction_category}}"  readonly>           
                                    </span>    
                                 </div>
                                 <div class="col-md-4">
                                    <span class="topheader">Correction Type:
                                    <input type="text" name="Correction_Type" class="form-control1" id="CorrectionType"  value="{{$ticket->Correction_Type}}"  readonly>           
                                    </span>
                                 </div>
                                 <div class="col-md-4">
                                    <span class="topheader">Category
                                    <input type="text" name="correction_sub_category" class="form-control1" id="CorrectionType"  value="{{$ticket->correction_sub_category}}"  readonly>           
                                    </span>
                                 </div>
                              </div>
                              @endif
                              <div class="row" id="Type-Department-Section">
                                 <div class="col-md-4">
                                    @if ($ticket->Record_No  == 'Password Change')
                                    <span class="topheader">System Name</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->SystemName}}"  readonly>
                                    @elseif ($ticket->Correction_Type == 'Endorsement')
                                    <span class="topheader">Policy Number</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->Record_No  }}" readonly>
                                    @elseif ($ticket->Correction_Type == 'Claims-Preparation-Sheet')
                                    <span class="topheader">Claim Number</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->claimNumber}}"  readonly>
                                    @elseif ($ticket->Correction_Type == 'Reports')
                                    <span class="topheader">Report Name</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->ReportName}}" readonly>
                                    @elseif ($ticket->Payment_Mode == 'Cheque')
                                    <span class="topheader">Cheque Number</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->chequeNumber}}"  readonly>
                                    @elseif ($ticket->Payment_Mode == 'Cash')
                                    <span class="topheader">Reference Number</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->ReferenceNumber}}"  readonly>
                                    @elseif ($ticket->Correction_Type == 'Journal-Voucher' || $ticket->correction_sub_category=='Journal Voucher')
                                    <span class="topheader">Journal Voucher No</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->JVNumber}}"  readonly>
                                    @elseif ($ticket->Correction_Type == 'Debit-or-Credit-Notes')
                                    <span class="topheader">Dr/Cr Note Number</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->DrCrNumber}}"  readonly>
                                    @elseif ($ticket->Correction_Type == 'Petty-Cash')
                                    <span class="topheader">Petty Cash Voucher Num</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->PettyCashVoucherNum}}"  readonly>
                                    @elseif ($ticket->Correction_Type == 'Rent-Demand-Note')
                                    <span class="topheader">Rent Demand Note Num</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->DemandNoteNo}}"  readonly>
                                    @elseif($ticket->ReversalNo > 0)
                                    <span class="topheader">Reversal No</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->ReversalNo}}"  readonly>
                                    @elseif($ticket->ReceiptNo > 0)
                                    <span class="topheader">Receipt No</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->ReceiptNo}}"  readonly>
                                    @elseif($ticket->Correction_Type == 'Authorization For Bypass of Cancellation')
                                    <span class="topheader">Policy Code</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->Record_No }}" readonly>
                                    @elseif($ticket->Correction_Type == 'Policy Reinstatement')
                                    <span class="topheader">Policy Number</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->Record_No }}" readonly>
                                    @elseif ($ticket->Correction_Type == 'Renewal' || $ticket->Correction_Type == 'NewBusiness' || $ticket->Correction_Type == 'Endorsement' )
                                    <span class="topheader">Policy Code</span>
                                    <input type="text" class="form-control2" id="CorrectionType" value="{{ $ticket->Record_No }}" readonly>
                                    @else
                                    @endif 
                                 </div>
                                 @if($ticket->correction_sub_category == 'Payment-Reversal' || $ticket->correction_sub_category=='Reversal-of-Reversal')
                                 <div class="col-md-6">
                                    <span class="topheader">To be Reversed to date:(YYYY-MM-DD)</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->ReversalDate }}"  readonly>
                                 </div>
                                 @elseif($ticket->Correction_Type == 'Policy Reinstatement')
                                 <div class="col-md-6">
                                    <span class="topheader">Policy Code</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->Policy_code }}" readonly>
                                 </div>
                                 @endif
                                 <hr>
                                 <div class="col-md-4">
                                    @if ($ticket->Correction_Type == 'Renewal')
                                    <span class="topheader">  Renewal No</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->RenewalNo }}" readonly>
                                    @elseif ($ticket->Correction_Type == 'Endorsement' || $ticket->Correction_Type == 'Authorization For Bypass of Cancellation')
                                    <span class="topheader">Endorsement No</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->EndorsementNo }}"  readonly>
                                    @elseif ($ticket->Payment_Mode == 'Cheque')
                                    <span class="topheader">Payment Voucher No</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->pvNumber }}"  readonly>
                                    @elseif ($ticket->Correction_Type== 'Claims-Preparation-Sheet')
                                    <span class="topheader">Payment Voucher No</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->pvNumber }}"  readonly>
                                    @else
                                    @endif  
                                 </div>
                                 @if ($ticket->Correction_Type == 'Authorization For Bypass of Cancellation')
                                 <div class="col-md-4">
                                    <span class="topheader">Endorsement Code</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->Endorsement_Code }}" readonly>
                                    <span class="topheader">Policy Number</span>
                                    <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->Policy_code }}"  readonly>
                                 </div>
                                 @else
                                 @endif
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
                              <div class="form-row topform">
                                 <span class="topheader">Ticket Details:</span>
                                 <textarea class="form-control" name="Correction_Details" id="CorrectionType" rows="4"  readonly>{{$ticket->Correction_Details}}{{$ticket->SystemName}}</textarea>
                              </div>
                           </div>
                        </div>
                        <!--Requester---->
                        @if($ticket->HodApprovalStatus == 'approved' || $ticket->HodApprovalStatus == 'Approved')
                        <div class="row">
                           <div class="col-md-2">
                              <div id="TechnicianAvatar">
                                 {{$ticket->Solvedby}}
                              </div>
                           </div>
                           <!--Technician--->
                           <div class="col-md-10">
                              <div id="TechnicianComments">
                                 {{$ticket->ITTechnicianComments}}
                              </div>
                           </div>
                        </div>
                        @if($ticket->ITTechnicianReply !== null)
                        <div class="row mt-4">
                           <div class="col-md-2">
                              <div id="TechnicianAvatar">
                                 {{$ticket->Solvedby}}
                              </div>
                           </div>
                           <!--Technician--->
                           <div class="col-md-10">
                              <div id="TechnicianComments">
                                 {{$ticket->ITTechnicianReply}}
                              </div>
                           </div>
                        </div>
                        @else 
                        @endif
                        @else
                        @endif
                        <div class="row py-3">
                           <!--User Reply--->   
                           <div class="modal" id="reopeningModal" tabindex="-1" role="dialog" aria-labelledby="reopeningModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h6 class="modal-title" id="reopeningModalLabel">Reopen Ticket</h6>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <div class="form-row">
                                          <span class="topheader">Describe What is Required</span>
                                          <textarea class="form-control" name="ReopeningComments" id="CorrectionDetails" rows="3" style="background:none; font-size:14px; width:100%;" required></textarea>
                                       </div>
                                       <input type="text" class="form-control" name="TicketStatus" value="open" hidden>
                                       <input type="text" class="form-control" name="Reopened" value="1" hidden>
                                       <div class="form-row topform" style="border-top:1px solid rgb(203,203,203);">
                                          <span class="topheader"> Additional document(s)</span>
                                          <input class="form-control" type="file" id="formFile" name="NewAdditionaldocument[]" value="{{old('NewAdditionaldocument')}}" multiple>
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                       <button type="submit" class="btn btn-sm btn-success">
                                       Re-Submit Ticket
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!--User reply-->
                           <!-- Success -->
                           <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="successModalLabel">Success</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       Your changes have been saved successfully.
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <button type="button" class="btn btn-sm btn-warning mt-3 " data-toggle="modal" data-target="#reopeningModal">
                              <i class="fa fa-refresh"></i> Reopen Ticket</button>
                           </div>
                           <hr>
                        </div>
                     </div>
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
                              <input type="text" class="form-control" style="font-size:14px;"  value="{{$ticket->Solvedby}}" readonly>
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
</div>
@if(session('success'))
<!-- Show success modal -->
<script>
   $(document).ready(function(){
       $("#successModal").modal("show");
       setTimeout(function(){ window.location.href = "{{ route('requestedtickets.index') }}"; }, 3000);
   });
</script>
@endif
@endsection
