   $(document).ready(function() {
         $('#TicketForm').submit(function(e) {
             e.preventDefault(); // Prevent the form from submitting initially
   
             // Validation logic
             var RecordNo = $('#RecordNo').val();
             var CorrectionCategory = $('#CorrectionCategory').val();
             var CorrectionType = $('#CorrectionType').val();
             var CorrectionDetails = $('#CorrectionDetails').val();
             var formFile = $('#formFile')[0];
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
       if (formFile.files.length === 0) {
            $('#formFile').next('.error').remove();
            $('#formFile').after('<span class="error">Please note that Attachment document is required</span>');
            isValid = false;
        } else {
            $('#formFile').next('.error').remove();
        }
   
        // Check if the number of files exceeds the limit (in this case, 3)
        if (formFile.files.length > 3) {
            $('#formFile').next('.error').remove();
            $('#formFile').after('<span class="error">You can only attach up to 3 documents.</span>');
            isValid = false;
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
