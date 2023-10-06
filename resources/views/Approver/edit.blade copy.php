@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
     <div class="row mb-2">
        <div class="col-sm-6">
           <h5 class="m-0">Approve/Reject Ticket</h5>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('approver.index')}}">Approver Home</a></li>
              <li class="breadcrumb-item">Ticket</li>
           </ol>
        </div>
        <!-- /.col -->
     </div>
     <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
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
            <form id="quickForm" action="/approver/{{$ticket->id}}" method="POST">
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
                              <input type="text" name="Section_Head" class="form-control" id="InvoiceAmount" value="{{$ticket->Section_Head}}"  readonly>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">Correction Type</label>
                                 <input type="text" name="Correction_Type" class="form-control" id="InvoiceAmount" value="{{$ticket->Correction_Type}}" readonly>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">Urgency/priority</label>
                                 <input type="text" name="Ticket_Urgency" class="form-control" id="InvoiceAmount" value="{{$ticket->Ticket_Urgency}}" readonly>
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
                                <label for="CorrectionDetails">What is Required</label>
                                <textarea class="form-control" name="Correction_Details" id="CorrectionDetails" rows="2" readonly>{{$ticket->Correction_Details}}</textarea>
                             </div>
                             @error('Correction_Details')
                             <span class="text-danger">{{$message}}</span>
                             @enderror
                          </div>
                       </div>

                        <div class="form-row">
                           <div class="col">
                              <div class="form-group">
                                 <label for="WhatIsRequired">Ticket Category</label>
                                 <Input type="text" class="form-control" name="TicketCategory" id="exampleFormControlTextarea1"  value="{{$ticket->TicketCategory}}" readonly>
                               </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="HodApproval">HOD Approval Status</label>
                           <select class="form-control" id="InvoicePayment" name="HodApprovalStatus" required>
                              <option value="">--Select--</option>
                              <option value="1">Approved</option>
                              <option value="Reject">Reject</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <Input type="text" class="form-control" name="Hod-Approver-Name" id="exampleFormControlTextarea1"  value="{{ Auth::user()->name }}" hidden>
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
</div>
<!-- /.container-fluid -->
@endsection