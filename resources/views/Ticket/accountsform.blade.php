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
            <h5 class="m-0"><i class="fa fa-dollar-sign"></i>&ensp;Accounts Correction Form</h5>
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
                        <label for="Ticket_Urgency">Urgency/priority</label>
                        <select class="form-control" id="Ticket_Urgency" name="Ticket_Urgency">
                           <option value="Low">Low</option>
                           <option value="Medium">Medium</option>
                           <option value="High">High</option>
                        </select>
                  </div>


               </div>
               <div class="form-row">
                 <div class="col-md-4">
                  <div class="form-group">
                      <label for="CorrectionCategory">Correction Category</label>
                      <select class="form-control" id="correctionCategory" name="CorrectionCategory">
                          <option value="">---Select---</option>
                          <option value="transactions" @if(old('CorrectionCategory') == 'Transactions') id="Transactions" selected @endif>Transactions</option>
                          <option value="property" @if(old('CorrectionCategory') == 'property') id="Property"  selected @endif>Property</option>
                          <option value="reports" @if(old('CorrectionCategory') == 'reports') id="Reports"  selected @endif>Reports</option>
                      </select>
                      @error('CorrectionCategory')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
              </div>

              <div class="col-md-4">
               <div class="form-group">
                   <label for="CorrectionCategory">Correction Type</label>
                   <select class="form-control" id="correctionType">
                     <option value="">----Select Type-----</option>
                   </select>
                 
               </div>
               </div>

                      <div class="col-md-4">
                     <div class="form-group">
                         <label for="CorrectionCategory">Category</label>
                         <select class="form-control" id="dropdown3">
                           <option value="">Select Type</option>
                         </select>
                     </div>
                
               </div>

           
               <div class="col-md-6" id="paymentmodeField">
                <label for="dropdown4">Payment Mode</label>
                <select id="dropdown4" name="Payment-Mode" class="form-control hidden">
                    <option value="">----Select Payment Mode-----</option>
                </select>
            </div>
            
            


                     <div class="col-md-6" id="chequeNumberField" class="form-group hidden">
                        <label for="chequeNumber">Cheque Number</label>
                        <input type="text" name="chequeNumber" class="form-control" id="chequeNumber" placeholder="Cheque Number" value="{{ old('chequeNumber') }}">
                     </div>
                     
                 
                 <div class="col-md-6" id="paymentVoucherField" class="hidden">
                    <label for="paymentVoucher">Payment Voucher Number</label>
                    <input type="text" name="PettycashVoucher" class="form-control" id="paymentVoucher" placeholder="Payment Voucher Number" value="{{ old('paymentVoucher') }}">
                 </div>

                 <div class="col-md-6" id="DrCrNoteField" class="hidden">
                    <label for="paymentVoucher">Debit/Credit Note Number</label>
                    <input type="text" name="DrCrNumber" class="form-control" id="DrCrNumber" placeholder="Enter Debit/Credit Note" value="{{ old('Enter Debit/Credit Note Number') }}">
                 </div>
            
                 <div class="col-md-12" id="PettyCashField" class="hidden">
                    <label for="pettycash">PettycashVoucher Number</label>
                    <input type="text" name="PettyCashVoucherNum" class="form-control" id="PettyCashNumber" placeholder="Enter Petty Cash Voucher Number" value="{{ old('Enter Debit/Credit Note Number') }}">
                 </div>
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

<script>
   $(document).ready(function() {
         $('#TicketForm').submit(function(e) {
             e.preventDefault(); // Prevent the form from submitting initially

             // Validation logic
             var RecordNo = $('#RecordNo').val();
             var CorrectionCategory = $('#CorrectionCategory').val();
             var DepartmentCategory = $('#DepartmentCategory').val();
             var CorrectionType = $('#CorrectionType').val();
             var CorrectionDetails = $('#CorrectionDetails').val();
             var formFile = $('#formFile').val();
             var HodApprovalName = $('#HodApprovalName').val();
             var isValid = true;

            
             // Check if Department is empty
             if (DepartmentCategory.trim() === '') {
                 $('#DepartmentCategory').next('.error').remove();
                 $('#DepartmentCategory').after('<span class="error">Please Select the Department</span>');
                 isValid = false;
             } else {
                 $('#CorrectionType').next('.error').remove();
             }

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

      
     });
</script>
<script>
const correctionCategory = document.getElementById("correctionCategory");
const correctionType = document.getElementById("correctionType");
const dropdown3 = document.getElementById("dropdown3");
const dropdown4 = document.getElementById("dropdown4");

   correctionCategory.addEventListener("change", function () {
       const selectedCategory = correctionCategory.value;
       correctionType.innerHTML = ""; // Clear the second dropdown
       dropdown3.innerHTML = ""; // Clear the third dropdown

       if (selectedCategory === "transactions") {
           // Populate the second dropdown based on the 'transactions' category
           const transactionTypes = ["Receipts", "Payments", "Petty-Cash", "Debit-or-Credit-Notes", "Journal Voucher"];
           transactionTypes.forEach(type => {
               const option = document.createElement("option");
               option.text = type;
               correctionType.add(option);
           });
       } else if (selectedCategory === "property") {
           // Populate the second dropdown based on the 'property' category
           const propertyTypes = ["Property-Receipts", "Property-Payments", "Property-Payment-Reversals"];
           propertyTypes.forEach(type => {
               const option = document.createElement("option");
               option.text = type;
               correctionType.add(option);
           });
       } else if (selectedCategory === "reports") {
        // Populate both the second and third dropdowns with the "Reports" option
        const reportOption = document.createElement("option");
        reportOption.text = "Reports";
        correctionType.add(reportOption);
        
        const reportOption2 = document.createElement("option");
        reportOption2.text = "Reports";
        dropdown3.add(reportOption2);
    }
   });

   correctionType.addEventListener("change", function () {
       const selectedType = correctionType.value;
       dropdown3.innerHTML = ""; // Clear the third dropdown
       dropdown4.innerHTML = ""; // Clear the fourth dropdown

       if (selectedType === "Receipts") {
           // Populate the third dropdown based on the 'Receipts' type
           const receiptSubTypes = ["Premium-Related", "Others", "Reversals"];
           receiptSubTypes.forEach(type => {
               const option = document.createElement("option");
               option.text = type;
               dropdown3.add(option);
           });
       } else if (selectedType === "Payments") {
           // Populate the third dropdown based on the 'Payments' type
           const paymentSubTypes = ["Policy-Related", "Others", "Payment-Reversal", "Reversal-of-Reversal", "Approval-Sheet"];
           paymentSubTypes.forEach(type => {
               const option = document.createElement("option");
               option.text = type;
               dropdown3.add(option);
           });
       } else if (selectedType === "Petty-Cash") {
           // Populate the third dropdown based on the 'Petty-Cash' type
           const pettyCashSubTypes = ["Petty-Cash-Voucher", "Petty-Cash-Reversal"];
           pettyCashSubTypes.forEach(type => {
               const option = document.createElement("option");
               option.text = type;
               dropdown3.add(option);
           });
       } else if (selectedType === "Debit-or-Credit-Notes") {
           // Populate the third dropdown based on the 'Debit-or-Credit-Notes' type
           const debitCreditNoteSubTypes = ["Other-Dr-Cr-Notes", "Policy-Related-Dr-Cr-Notes"];
           debitCreditNoteSubTypes.forEach(type => {
               const option = document.createElement("option");
               option.text = type;
               dropdown3.add(option);
           });
       }
   });

   dropdown3.addEventListener("change", function () {
       const selectedType = dropdown3.value;
       dropdown4.innerHTML = ""; // Clear the fourth dropdown

       if (selectedType === "Policy-Related") {
           // Populate the fourth dropdown with payment modes
           const paymentModes = ["Cheque", "Cash"];
           paymentModes.forEach(mode => {
               const option = document.createElement("option");
               option.text = mode;
               dropdown4.add(option);
           });
       }
   });


// Hide the Cheque Number field by default
$('#chequeNumberField').addClass('hidden');
$('#paymentVoucherField').addClass('hidden'); 
$('#DrCrNoteField').addClass('hidden');
$('#paymentmodeField').addClass('hidden');
$('#PettyCashField').addClass('hidden');

   $('#correctionType').change(function() {
       var selectedCorrectionType = $(this).val();
       if (selectedCorrectionType === 'Payments') {
           $('#dropdown4').removeClass('hidden');
           $('#chequeNumberField').addClass('hidden');
           $('#paymentmodeField').removeClass('hidden');
           $('#PettyCashField').addClass('hidden');
           $('#DrCrNoteField').addClass('hidden');
       } 
       
       else if (selectedCorrectionType === 'Debit-or-Credit-Notes') {
           $('#DrCrNoteField').removeClass('hidden');
           $('#paymentVoucherField').addClass('hidden');
       } 

       else if (selectedCorrectionType === 'Petty-Cash') {
           $('#PettyCashField').removeClass('hidden');
           $('#paymentVoucherField').addClass('hidden');
           $('#PaymentMode').addClass('hidden');
           $('#dropdown4').addClass('hidden');
       } 
       
       
       else {
           $('#chequeNumberField').addClass('hidden');
           $('#paymentVoucherField').addClass('hidden');
       }
   });





   $('#dropdown4').change(function() {
       var selectedPaymentMode = $(this).val();
       if (selectedPaymentMode === 'Cheque') {
           $('#chequeNumberField').removeClass('hidden');
           $('#paymentVoucherField').addClass('hidden');
       } else {
           $('#chequeNumberField').addClass('hidden');
           $('#paymentVoucherField').addClass('hidden');
       }
   });
</script>
   
@endsection