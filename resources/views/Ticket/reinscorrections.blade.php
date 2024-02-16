@extends('layouts.app')
@section('content')
<style>
   .error{
   color:red !important;
   }
   .hidden {
   display: none;
   }
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h6 class="m-0">Re-Insurance Correction Form</h6>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('ticket.index')}}">Home</a></li>
               <li class="breadcrumb-item">ReInsurance Correction Form</li>
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
         <div class="card card-success">
            <!-- /.card-header -->
            <!-- form start -->
            <form id="TicketForm" action="{{route("ticket.post")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
               <div class="form-row">
                  <div class="col-md-12 mt-2 text-center">
                     <p class="text-success">Re-insurance Corrections Form</p>
                     <hr>
                  </div>
               </div>
               <div class="form-row">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="RequesterName">Requested By</label>
                        <input type="text" name="section_head1" class="form-control" id="RequesterName" value=" {{ Auth::user()->name }}" readonly>           
                     </div>
                  </div>
                  <div class="col-md-4">
                     <label for="HOD">Section Head</label>
                     <input type="text" name="Section_Head" class="form-control" id="HOD"  value="{{ $headOfDepartment }}" readonly>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="Ticket_Urgency">Urgency/priority</label>
                        <select class="form-control" id="Ticket_Urgency" name="Ticket_Urgency">
                           <option value="Low">Low</option>
                           <option value="Medium">Medium</option>
                           <option value="High">High</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-row">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="CorrectionCategory">Correction Dept</label>
                        <select class="form-control" id="CorrectionCategory" name="Correction_Dept">
                    
                           <option value="Re-Insurance" @if(old('CorrectionCategory') == 'Re-Insurance') selected @endif>Re-Insurance</option>
                        </select>
                        @error('CorrectionCategory')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="CorrectionType">Correction Type</label>
                        <select class="form-control" id="CorrectionType" name="CorrectionCategory">
                           <option value="">---Select---</option>
                           <option value="Facultative" @if(old('correction_category') == 'Facultative') selected @endif>Facultative</option>
                           <option value="Treaty" @if(old('correction_category') == 'Treaty') selected @endif>Treaty</option>
                           <option value="MIS" @if(old('correction_category') == 'MIS') selected @endif>MIS</option>
                        </select>
                        @error('correction_category')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="CorrectionSubCategory">Category</label>
                        <select class="form-control" id="CorrectionType" name="correction_sub_category">
                           <option value="">---Select---</option>
                           <option value="Inward ReInsurance" @if(old('Correction_Type') == 'Inward ReInsurance') selected @endif>Inward ReInsurance</option>
                           <option value="Outward Reisnurance" @if(old('Correction_Type') == 'Outward Reinsurance') selected @endif>Outward Reinsurance</option>
                           <option value="Inward Borderaux" @if(old('Correction_Type') == 'Inward Borderaux') selected @endif>Inward Borderaux</option>
                           <option value="Outward Borderaux" @if(old('Correction_Type') == 'Outward Borderaux') selected @endif>Outward Borderaux</option>
                        </select>
                        @error('Correction_Type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
     
               </div>
               <div class="form-row">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="CorrectionSubCategory">Type</label>
                        <select class="form-control" id="CType" name="Correction_Type">
                           <option value="">---Select---</option>
                           <option value="New Business" @if(old('New Business') == 'New Business') selected @endif>New Business</option>
                           <option value="Renewals" @if(old('Renewals') == 'Renewals') selected @endif>Renewals</option>
                           <option value="Endorsements" @if(old('Endorsements') == 'Endorsements') selected @endif>Endorsements</option>
                           <option value="Endorsements Reversals" @if(old('Endorsements Reversals') == 'Endorsements Reversals') selected @endif>Endorsements Reversals</option>
                        </select>
                        @error('Correction_Type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-6" id="RecordNoField">
                     <label for="RecordNo">Policy Code</label>
                     <input type="text" name="Record_No" class="form-control" id="RecordNo" placeholder="Record No" value="{{old('Record_No')}}">
                     @error('Record_No')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>
                  <div class="col-md-6">
                     <div id="endorsementField" class="hidden">
                        <label for="endorsementNumber">Endorsement Number:</label>
                        <input type="text" class="form-control" id="endorsementNumber" name="EndorsementNo">
                     </div>
                     <div id="renewalField" class="hidden">
                        <label for="renewalNumber">Renewal Number:</label>
                        <input type="text" class="form-control" id="renewalNumber" name="RenewalNo" >
                     </div>
                  </div>
               </div>
               <div class="form-row">
                  <div class="col-md-6">
                     <div id="accountsField" class="hidden">   
                        <label for="pvNumber">PV Number:</label>
                        <input type="text" class="form-control" id="pvNumber" name="pvNumber" placeholder="Enter PV Number">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div id="pvTypeField" class="hidden">
                        <label for="pvType">PV Type:</label>
                        <select class="form-control" id="pvType" name="pvType">
                           <option value="">---Select---</option>
                           <option value="Policy Related">Policy Related</option>
                           <option value="Property Related">Property Related</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div id="claimsField" class="hidden">
                  <label for="claimsField">Claim Number</label>
                  <input type="text" class="form-control" id="claimNumber" name="claimNumber" >
               </div>
               <div class="form-row">
                  <div class="col">
                     <div class="form-group">
                        <label for="CorrectionDetails">What is Required</label>
                        <textarea class="form-control" name="Correction_Details" id="CorrectionDetails" rows="2" >{{old('Correction_Details')}}</textarea>
                     </div>
                     @error('Correction_Details')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
                  </div>
               </div>
               <div class="form-group">
                  <label for="approver">Select Approver</label>
                  <select class="form-control" id="HodApprovalName" name="HodApproverName">
                     <option value="">---Select---</option>
                     @foreach($approvers as $approver)
                     <option value="{{$approver->id}}">{{$approver->name}}</option>
                     @endforeach
                  </select>
                  @error('HodApprovalName')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
               </div>

               <!-- Add a hidden input field for the approver name -->
               <div class="form-group">
                  <label for="hiddenApproverName" style="display: none;">Hidden Approver Name</label>
                  <input type="hidden" id="hiddenApproverName" name="hiddenApproverName" value="">
               </div>
               
               <div class="mb-3">
                  <label for="formFile" class="form-label">Please add supporting document(s)</label>
                  <input class="form-control" type="file" id="formFile" name="documents[]" value="{{old('documents')}}"  multiple>
                  @error('documents')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
               </div>
               @if (session('document_error'))
               <div class="alert alert-danger">
                  {{ session('document_error') }}
               </div>
               @endif
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
            <!-- Request to Submit Form or Not -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        Are you sure you want to submit this form?
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary" id="confirmButton">Yes</button>
                     </div>
                  </div>
               </div>
            </div>
            <!--Saving Page Contents-->
        
            <div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="loadingModalLabel">Submitting your Request...</h5>
                     </div>
                     <div class="modal-body">
                        <div class="spinner-border" role="status"><span class="sr-only"></span></div>
                        Saving...
                     </div>
                  </div>
               </div>
            </div>
            <!--Loading Icon-->
         </div>
      
      </div>
   </div>
   <!-- /.row -->
</div>
<script>
       document.getElementById('HodApprovalName').addEventListener('change', function() {
        var selectedApprover = this.options[this.selectedIndex].text;
        document.getElementById('hiddenApproverName').value = selectedApprover;
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ asset('js/underwritingformvalidation.js') }}" defer></script>
@endsection