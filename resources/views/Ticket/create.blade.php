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
            <h5 class="m-0">Correction Form</h5>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('ticket.index')}}">Home</a></li>
               <li class="breadcrumb-item">Correction Form</li>
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
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="RequesterName">Requested By</label>
                        <input type="text" name="section_head1" class="form-control" id="RequesterName" value=" {{ Auth::user()->name }}" readonly>           
                     </div>
                  </div>
                  <div class="col-md-6">
                     <label for="HOD">Section Head</label>
                     <input type="text" name="Section_Head" class="form-control" id="HOD"  value="{{ $headOfDepartment }}" readonly>
                  </div>
               </div>
               <div class="form-row">
                  
                  <div class="col-md-4">
                     <div class="form-group">
                         <label for="CorrectionCategory">Correction Category</label>
                         <select class="form-control" id="CorrectionCategory" name="CorrectionCategory">
                             <option value="">---Select---</option>
                             <option value="Underwriting" @if(old('CorrectionCategory') == 'Underwriting') selected @endif>Underwriting</option>
                             <option value="Marine" @if(old('CorrectionCategory') == 'Marine') selected @endif>Marine</option>
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
                         <select class="form-control" id="CorrectionType" name="Correction_Type">
                             <option value="">---Select---</option>
                             <option value="NewBusiness" @if(old('Correction_Type') == 'New Business') selected @endif>New Business</option>
                             <option value="Renewal" @if(old('Correction_Type') == 'Renewal') selected @endif>Renewal</option>
                             <option value="Endorsement" @if(old('Correction_Type') == 'Endorsement') selected @endif>Endorsements</option>
                         </select>
                         @error('Correction_Type')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>
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
               <div class="mb-3">
                  <label for="formFile" class="form-label">Attachment</label>
                  <input class="form-control" type="file" id="formFile" name="documents" value="{{old('documents')}}" >
                  @error('documents')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
               </div>
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
            <!-- HTML for your loading modal -->
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
         <!-- /.card -->
      </div>
      <!--/.col (left) -->
      <!-- right column -->
      <!--/.col (right) -->
   </div>
   <!-- /.row -->
</div>
<!-- /.container-fluid -->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!-- ... Your previous HTML content ... -->

<!-- Update this script to select the correct dropdown element by its ID -->
<script>
   $(document).ready(function() {
         $('#TicketForm').submit(function(e) {
             e.preventDefault(); // Prevent the form from submitting initially

             // Validation logic
             var RecordNo = $('#RecordNo').val();
             var CorrectionCategory = $('#CorrectionCategory').val();
             var CorrectionType = $('#CorrectionType').val();
             var CorrectionDetails = $('#CorrectionDetails').val();
             var formFile = $('#formFile').val();
             var HodApprovalName = $('#HodApprovalName').val();
             var isValid = true;

             // Check if CorrectionType is empty
             if (CorrectionType.trim() === '') {
                 $('#CorrectionType').next('.error').remove();
                 $('#CorrectionType').after('<span class="error">Please Select the Correction Type</span>');
                 isValid = false;
             } else {
                 $('#CorrectionType').next('.error').remove();
             }

             // Check if CorrectionCategory is empty 
             if (CorrectionCategory.trim() === '') {
                 $('#CorrectionCategory').next('.error').remove();
                 $('#CorrectionCategory').after('<span class="error">Please Select the Correction Category</span>');
                 isValid = false;
             } else {
                 $('#CorrectionCategory').next('.error').remove();
             }

             // Check if CorrectionDetails is empty
             if (CorrectionDetails.trim() === '') {
                 $('#CorrectionDetails').next('.error').remove();
                 $('#CorrectionDetails').after('<span class="error">Please provide details of your correction request</span>');
                 isValid = false;
             } else {
                 $('#CorrectionDetails').next('.error').remove();
             }

             // Check if HodApprovalName is empty
             if (HodApprovalName.trim() === '') {
                 $('#HodApprovalName').next('.error').remove();
                 $('#HodApprovalName').after('<span class="error">Please select Correction form Approver</span>');
                 isValid = false;
             } else {
                 $('#HodApprovalName').next('.error').remove();
             }

             // Check if formFile is empty
             if (formFile.trim() === '') {
                 $('#formFile').next('.error').remove();
                 $('#formFile').after('<span class="error">Please note that Attachment document is required</span>');
                 isValid = false;
             } else {
                 $('#formFile').next('.error').remove();
             }

             // Valid Form? , submit it
             if (isValid) {
                 // The Bootstrap modal
                 $('#confirmationModal').modal('show');

                 // Form Submission
                 $('#confirmButton').click(function() {
                     $('#confirmationModal').modal('hide');
                     // Form is confirmed, submit it
                     $('#TicketForm')[0].submit();
                     $('#loadingModal').modal('show');
                 });
             }
         });

         // Function to validate email format
         function isValidEmail(email) {
             var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
             return emailRegex.test(email);
         }
     });
</script>

@endsection