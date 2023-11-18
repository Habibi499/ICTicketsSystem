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
               <input type="text" class="form-control" name="Correction_Dept" value="Accounts/Admin" hidden>
               <div class="form-row">
                 <div class="col-md-4">
                  <div class="form-group">
                      <label for="correctionCategory">Correction Category</label>
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
                   <label for="correctionType">Correction Type</label>
                   <select class="form-control" id="correctionType" name="Correction_Type">
                     <option value="">----Select Type-----</option>
                   </select>
                 
               </div>
               </div>

                      <div class="col-md-4">
                     <div class="form-group">
                         <label for="dropdown3">Category</label>
                         <select class="form-control" id="dropdown3" name="correction_sub_category">
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
                
                <div class="col-md-6" id="ReferenceNumberField" class="form-group hidden">
                <label for="ReferenceNumber">Reference Number</label>
                <input type="text" name="ReferenceNumber" class="form-control" id="ReferenceNumber" placeholder="Refence Number" value="{{ old('ReferenceNumber') }}">
                </div>

                 <div class="col-md-6" id="paymentVoucherField" class="hidden">
                    <label for="paymentVoucher">Payment Voucher Number</label>
                    <input type="text" name="pvNumber" class="form-control" id="paymentVoucher" placeholder="Payment Voucher Number" value="{{ old('PettycashVoucher') }}">
                 </div>

                 <div class="col-md-6" id="DrCrNoteField" class="hidden">
                    <label for="DrCrNumber">Debit/Credit Note Number</label>
                    <input type="text" name="DrCrNumber" class="form-control" id="DrCrNumber" placeholder="Enter Debit/Credit Note" value="{{ old('DrCrNumber') }}">
                 </div>
            
                 <div class="col-md-12" id="PettyCashField" class="hidden">
                    <label for="PettyCashNumber">Petty Cash Voucher Number</label>
                    <input type="text" name="PettyCashVoucherNum" class="form-control" id="PettyCashNumber" placeholder="Enter Petty Cash Voucher Number" value="{{ old('PettyCashVoucherNum') }}">
                 </div>

                 <div class="col-md-12" id="ReversalNoField" class="hidden">
                    <label for="ReversalNo">Reversal Number</label>
                    <input type="text" name="ReversalNo" class="form-control" id="ReversalNo" placeholder="Enter Reversal Number" value="{{ old('ReversalNo') }}">
                 </div>

                 <div class="col-md-12" id="ReceiptNoField" class="hidden">
                    <label for="ReceiptNo">Receipt Number</label>
                    <input type="text" name="ReceiptNo" class="form-control" id="ReceiptNo" placeholder="Enter Receipt Number" value="{{ old('Enter Debit/Credit Note Number') }}">
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
                  <label for="HodApprovalName">Select Approver</label>
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
   </div>
   <!-- /.row -->
</div>
<!-- /.container-fluid -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
  $(document).ready(function () {
    $('#TicketForm').submit(function (e) {
      e.preventDefault(); // Prevent the form from submitting initially

      // Validation logic
      var CorrectionCategory = $('#correctionCategory').val();
      var CorrectionDetails = $('#CorrectionDetails').val();
      var HodApprovalName = $('#HodApprovalName').val();
      var isValid = true;

      // Check if CorrectionCategory is empty 
      if (CorrectionCategory.trim() === '') {
        $('#correctionCategory').next('.error').remove();
        $('#correctionCategory').after('<span class="error">Please Select the Correction Category</span>');
        isValid = false;
      } else {
        $('#correctionCategory').next('.error').remove();
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

      // Valid Form? , submit it
      if (isValid) {
        // The Bootstrap modal
        $('#confirmationModal').modal('show');

        // Form Submission
        $('#confirmButton').click(function () {
          $('#confirmationModal').modal('hide');
          // Form is confirmed, submit it
          $('#TicketForm')[0].submit();
          $('#loadingModal').modal('show');
        });
      }
    });
  });
</script>

<script >
const correctionCategory = document.getElementById("correctionCategory");
const correctionType = document.getElementById("correctionType");
const dropdown3 = document.getElementById("dropdown3");
const dropdown4 = document.getElementById("dropdown4");

correctionCategory.addEventListener("change", function () {
   const selectedCategory = correctionCategory.value;
   correctionType.innerHTML = ""; // Clear the second dropdown
   dropdown3.innerHTML = ""; // Clear the third dropdown
   dropdown4.innerHTML = ""; // Clear the third dropdown
   if (selectedCategory === "transactions") {
      // Populate the second dropdown based on the 'transactions' category
      const transactionTypes = ["--Please Select--", "Payments", "Receipts", "Petty-Cash", "Debit-or-Credit-Notes", "Journal-Voucher"];
      transactionTypes.forEach(type => {
         const option = document.createElement("option");
         option.text = type;
         correctionType.add(option);
      });
   } else if (selectedCategory === "property") {
      const propertyTypes = ["--Please Select--","Property-Receipts", "Property-Payments", "Property-Payment-Reversals"];
      propertyTypes.forEach(type => {
         const option = document.createElement("option");
         option.text = type;
         correctionType.add(option);
      });
   } else if (selectedCategory === "reports") {
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
      const receiptSubTypes = ["Premium-Related", "Receipts-others", "Reversals"];
      receiptSubTypes.forEach(type => {
         const option = document.createElement("option");
         option.text = type;
         dropdown3.add(option);
      });
   } else if (selectedType === "Payments") {
      const paymentSubTypes = ["--Please Select--", "Policy-Related", "Others", "Payment-Reversal", "Reversal-of-Reversal", "Approval-Sheet"];
      paymentSubTypes.forEach(type => {
         const option = document.createElement("option");
         option.text = type;
         dropdown3.add(option);
      });
   } else if (selectedType === "Petty-Cash") {
      const pettyCashSubTypes = ["Petty-Cash-Voucher", "Petty-Cash-Reversal"];
      pettyCashSubTypes.forEach(type => {
         const option = document.createElement("option");
         option.text = type;
         dropdown3.add(option);
      });
   } else if (selectedType === "Debit-or-Credit-Notes") {
      const debitCreditNoteSubTypes = ["Other-Dr-Cr-Notes", "Policy-Related-Dr-Cr-Notes"];
      debitCreditNoteSubTypes.forEach(type => {
         const option = document.createElement("option");
         option.text = type;
         dropdown3.add(option);
      });
   }

   else if (selectedType === "Property-Receipts") {
      const PropertypaymentsSubTypes = ["Property-Receipts"];
      PropertypaymentsSubTypes.forEach(type => {
         const option = document.createElement("option");
         option.text = type;
         dropdown3.add(option);
      });
   }

   else if (selectedType === "Property-Payments") {
      const PropertypaymentsSubTypes = ["----Select---","Property-Payments"];
      PropertypaymentsSubTypes.forEach(type => {
         const option = document.createElement("option");
         option.text = type;
         dropdown3.add(option);
      });
   }
   else if (selectedType === "Property-Payment-Reversals") {
      const PropertypaymentsSubTypes = ["----Select---","Property-Payment-Reversals"];
      PropertypaymentsSubTypes.forEach(type => {
         const option = document.createElement("option");
         option.text = type;
         dropdown3.add(option);
      });
   }
});

dropdown3.addEventListener("change", function () {
   const selectedType = dropdown3.value;
   dropdown4.innerHTML = ""; // Clear the fourth dropdown
   if (selectedType === "Policy-Related" || selectedType === "Others" || selectedType === "Payment-Reversal" || "Property-Payments") {
      const paymentModes = ["--Please Select Payment Mode--", "Cheque", "Cash"];
      paymentModes.forEach(mode => {
         const option = document.createElement("option");
         option.text = mode;
         dropdown4.add(option);
      });
   }



});


// Hide all  by default
$('#chequeNumberField').addClass('hidden');
$('#ReferenceNumberField').addClass('hidden');
$('#paymentVoucherField').addClass('hidden');
$('#DrCrNoteField').addClass('hidden');
$('#paymentmodeField').addClass('hidden');
$('#paymentmode').addClass('hidden');
$('#PettyCashField').addClass('hidden');
$('#Reports').addClass('hidden');
$('#ReversalNoField').addClass('hidden');
$('#ReceiptNoField').addClass('hidden');

$('#correctionType').change(function () {
   var selectedCorrectionType = $(this).val();
     if ( selectedCorrectionType === 'Property-Payments') {
     $('#paymentmode').removeClass('hidden');
     $('#paymentmodeField').removeClass('hidden');
      $('#dropdown4').removeClass('hidden');
      $('#chequeNumberField').addClass('hidden');
      $('#ReferenceNumberField').addClass('hidden');
      $('#PettyCashField').addClass('hidden');
      $('#DrCrNoteField').addClass('hidden');
      $('#ReversalNoField').addClass('hidden');
      $('#ReceiptNoField').addClass('hidden');
      
   }else if (selectedCorrectionType === 'Property-Receipts') {
     $('#ReceiptNoField').removeClass('hidden');
      $('#dropdown4').addClass('hidden');
      $('#chequeNumberField').addClass('hidden');
      $('#ReferenceNumberField').addClass('hidden');
      $('#paymentmodeField').addClass('hidden');
      $('#PettyCashField').addClass('hidden');
      $('#DrCrNoteField').addClass('hidden');
      $('#ReversalNoField').addClass('hidden');
      
   }else if (selectedCorrectionType === 'Payments') {
      $('#dropdown4').removeClass('hidden');
      $('#chequeNumberField').addClass('hidden');
      $('#ReferenceNumberField').addClass('hidden');
      $('#paymentmodeField').removeClass('hidden');
      $('#PettyCashField').addClass('hidden');
      $('#DrCrNoteField').addClass('hidden');
      $('#ReversalNoField').addClass('hidden');
      $('#ReceiptNoField').addClass('hidden');
   } else if (selectedCorrectionType === 'Debit-or-Credit-Notes') {
      $('#DrCrNoteField').removeClass('hidden');
      $('#paymentmodeField').addClass('hidden');
      $('#chequeNumberField').addClass('hidden');
      $('#paymentVoucherField').addClass('hidden');
      $('#PettyCashField').addClass('hidden');
      $('#ReferenceNumberField').addClass('hidden');
      $('#ReversalNoField').addClass('hidden');
   } else if (selectedCorrectionType === 'Petty-Cash') {
      $('#PettyCashField').removeClass('hidden');
      $('#paymentVoucherField').addClass('hidden');
      $('#chequeNumberField').addClass('hidden');
      $('#ReferenceNumberField').addClass('hidden');
      $('#paymentmodeField').addClass('hidden');
      $('#dropdown4').addClass('hidden');
      $('#DrCrNoteField').addClass('hidden');
      $('#ReversalNoField').addClass('hidden');
      $('#ReceiptNoField').addClass('hidden');
   } else if (selectedCorrectionType === 'Journal-Voucher') {
      $('#PettyCashField').addClass('hidden');
      $('#paymentVoucherField').addClass('hidden');
      $('#chequeNumberField').addClass('hidden');
      $('#ReferenceNumberField').addClass('hidden');
      $('#paymentmodeField').addClass('hidden');
      $('#dropdown4').addClass('hidden');
      $('#DrCrNoteField').addClass('hidden');
      $('#ReversalNoField').addClass('hidden');
      $('#ReceiptNoField').addClass('hidden');
   }else if (selectedCorrectionType === 'Receipts') {
      $('#ReceiptNoField').removeClass('hidden');
      $('#PettyCashField').addClass('hidden');
      $('#paymentVoucherField').addClass('hidden');
      $('#paymentmodeField').addClass('hidden');
      $('#dropdown4').addClass('hidden');
      $('#ReferenceNumberField').addClass('hidden');
      $('#ReversalNoField').addClass('hidden');
   }
   else if (selectedCorrectionType === 'Receipts' && selectedType === 'Others') {
    $('#ReceiptNoField').removeClass('hidden');
    $('#PettyCashField').addClass('hidden');
    $('#paymentVoucherField').addClass('hidden');
    $('#paymentmodeField').addClass('hidden');
    $('#dropdown4').addClass('hidden');
    $('#ReferenceNumberField').addClass('hidden');
    $('#ReversalNoField').addClass('hidden');
}
   else if (selectedCorrectionType === 'Reports') {
      $('#PettyCashField').addClass('hidden');
      $('#paymentVoucherField').addClass('hidden');
      $('#paymentmodeField').addClass('hidden');
      $('#dropdown4').addClass('hidden');
      $('#ReferenceNumberField').addClass('hidden');
      $('#ReversalNoField').addClass('hidden');
   }
     
   else {
      $('#chequeNumberField').addClass('hidden');
      $('#paymentVoucherField').addClass('hidden');
      $('#ReferenceNumberField').addClass('hidden');
      $('#ReversalNoField').addClass('hidden');
   }
});

$('#dropdown3').change(function () {
   var selectedType = $(this).val();
   if (selectedType === 'Reversal-of-Reversal') {
    $('#ReversalNoField').removeClass('hidden');
      $('#chequeNumberField').addClass('hidden');
      $('#ReferenceNumberField').addClass('hidden');
      $('#paymentVoucherField').addClass('hidden');
      $('#paymentmodeField').addClass('hidden');
   }
   
   else if (selectedType === "Policy-Related" || selectedType === "Others" || selectedType === "Payment-Reversal"){
    $('#paymentmodeField').removeClass('hidden');
      $('#paymentVoucherField').addClass('hidden');
      $('#chequeNumberField').addClass('hidden');
      $('#ReferenceNumberField').removeClass('hidden');
      $('#paymentVoucherField').addClass('hidden');
      $('#ReversalNoField').addClass('hidden');
   }   else if (selectedType === "Approval-Sheet"){
    $('#paymentmodeField').addClass('hidden');
      $('#paymentVoucherField').addClass('hidden');
      $('#chequeNumberField').addClass('hidden');
      $('#ReferenceNumberField').addClass('hidden');
      $('#paymentVoucherField').addClass('hidden');
      $('#ReversalNoField').addClass('hidden');
   }

   
}); 

$('#dropdown4').change(function () {
   var selectedPaymentMode = $(this).val();
   if (selectedPaymentMode === 'Cheque') {
      $('#chequeNumberField').removeClass('hidden');
      $('#ReferenceNumberField').addClass('hidden');
      $('#paymentVoucherField').addClass('hidden');
      $('#ReversalNoField').addClass('hidden');
   } else if (selectedPaymentMode === 'Cash') {
      $('#chequeNumberField').addClass('hidden');
      $('#ReferenceNumberField').removeClass('hidden');
      $('#paymentVoucherField').addClass('hidden');
      $('#ReversalNoField').addClass('hidden');
   } else {
      $('#chequeNumberField').addClass('hidden');
      $('#ReferenceNumberField').addClass('hidden');
      $('#paymentVoucherField').addClass('hidden');
      $('#ReversalNoField').addClass('hidden');
   }
}); 
</script>

@endsection