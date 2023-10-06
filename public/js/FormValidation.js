$(document).ready(function() {
    $('#TicketForm').submit(function(e) {
        e.preventDefault(); // Prevent the form from submitting initially

        // Validation logic
        var RecordNo = $('#RecordNo').val();
        var CorrectionType = $('#CorrectionType').val();
        var CorrectionDetails = $('#CorrectionDetails').val();
        var formFile = $('#formFile').val();
        var HodApprovalName= $('#HodApprovalName').val();
        var isValid = true;
     

            // Check if name is empty
            if (CorrectionType.trim() === '') {
                $('#CorrectionType').next('.error').remove();
                $('#CorrectionType').after('<span class="error">Please Select the Correction Type</span>');
                isValid = false;
            } else {
                $('#CorrectionType').next('.error').remove();
            }

            if(RecordNo.trim()=== ''){
                $('#RecordNo').next('.error').remove();
                $('#RecordNo').after('<span class="error">Please Enter Policy Number</span>');
                isValid=false              
            }
            else{
                $('#RecordNo').next('.error').remove();
            }
              
            if(CorrectionDetails.trim()===''){
              $('#CorrectionDetails').next('.error').remove();
              $('#CorrectionDetails').after('<span class="error">Please provide details of your correction request</span>');
              isValid=false
            }
            else{
                $('#CorrectionDetails').next('.error').remove();
            }

              
            if(HodApprovalName.trim()===''){
              $('#HodApprovalName').next('.error').remove();
              $('#HodApprovalName').after('<span class="error">Please select Correction form Approver</span>');
              isValid=false
            }
            else{
                $('#CorrectionDetails').next('.error').remove();
            }
         

            if(formFile.trim()=== ''){
                $('#formFile').next('.error').remove();
                $('#formFile').after('<span class="error">Please note that Attachment document is required</span>');
                isValid=false              
            }
            else{
                $('#formFile').next('.error').remove();
            }
              

        //Valid Form? , submit it
        if (isValid) {
             //the Bootstrap modal
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
