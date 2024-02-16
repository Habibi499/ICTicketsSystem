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
      <div class="row mt-4" >
        <div class="col-md-8">
            <span class="topheader">Correction Type:
            <input type="text" name="Correction_Type" class="form-control1" id="CorrectionType"  value="{{$ticket->Correction_Type}}" readonly>           
            </span>    
        </div>
        <div class="col-md-4">
          <span class="topheader">Correction Department:
          <input type="text" name="Correction_Dept" class="form-control1" id="CorrectionType"  value="{{$ticket->Correction_Dept}}"" readonly>           
          </span>
        </div>
    </div>
    @if($ticket->Correction_Dept=='Accounts/Admin')
        <div class="row" >
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
        @elseif($ticket->Correction_Type == 'NewBusiness')
        <span class="topheader">Policy Code</span>
        <input type="text" class="form-control2" id="CorrectionType" value="{{ $ticket->Record_No }}" readonly>
        @elseif($ticket->Correction_Type == 'Policy Reinstatement')
        <span class="topheader">Policy Code</span>
        <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->Record_No }}" readonly>
        @elseif ($ticket->Correction_Type == 'Renewal' || $ticket->Correction_Type == 'Endorsement')
        <span class="topheader">Policy  No</span>
        <input type="text" class="form-control1" id="CorrectionType" 
        value="{{ $ticket->Record_No }}" readonly>
        @else
       
        @endif 
      </div>
      @if($ticket->correction_sub_category == 'Payment-Reversal' ||
       $ticket->correction_sub_category=='Reversal-of-Reversal')
        <div class="col-md-6">
          <span class="topheader">To be Reversed to date:(YYYY-MM-DD)</span>
          <input type="text" class="form-control1" id="CorrectionType" value="{{ $ticket->ReversalDate }}"  readonly>
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
      <hr>
    </div>

    <div class="form-row topform" style="border-top:1px solid rgb(203, 203, 203);">
        <span class="topheader">Ticket Details:</span>
        <textarea class="form-control" name="Correction_Details" id="CorrectionType" rows="4"  readonly>{{$ticket->Correction_Details}}{{$ticket->SystemNa}}</textarea>
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
            <span class="topheader">HoD Approval </span>
            <input type="text" name="Correction_Type" class="form-control1" id="CorrectionType"  value="{{$ticket->HodApprovalStatus}}" readonly>           
        </div>
      </div>
  </div>
</div><!--Requester---->