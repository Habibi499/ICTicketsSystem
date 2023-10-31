$(document).ready(function() {
    const selection = $('#CorrectionCategory');
    const correctionTypeField = $('#CorrectionType');

    // Store the original options for Correction Type
    const originalCorrectionTypeOptions = correctionTypeField.html();

    selection.on('change', function() {
        const selectedCategory = selection.val();
        if (selectedCategory === 'Underwriting') {
            // Update Correction Type options for Underwriting
            correctionTypeField.html(originalCorrectionTypeOptions);
        } else if (selectedCategory === 'Marine') {
            // Update Correction Type options for Marine
            correctionTypeField.html(originalCorrectionTypeOptions);
            // Remove the 'Renewal' option for Marine
            correctionTypeField.find('option[value="Renewal"]').remove();
        } else if (selectedCategory === 'Re-Insurance') {
            // Update Correction Type options for Re-Insurance
            correctionTypeField.html(originalCorrectionTypeOptions);
        } else {
            // Reset to default options when nothing is selected
            correctionTypeField.html(originalCorrectionTypeOptions);
        }
    });
});

   $(document).ready(function() {
       const selection = $('#CorrectionType');
       const NewBusinessField = $('#NewBusinessField');
       const endorsementField = $('#endorsementField');
       const renewalField = $('#renewalField');
       const endorsementNumberInput = $('#endorsementNumber');
       const renewalNumberInput = $('#renewalNumber');
       const endorsementNumberError = $('#endorsementNumberError');
       const renewalNumberError = $('#renewalNumberError');
       const accountsField = $('#accountsField'); // Add this line
       const claimsField = $('#claimsField'); // Add this line
       const pvNumberInput = $('#pvNumber'); // Add this line
       const claimNumberInput = $('#claimNumber'); // Add this line
       const pvTypeField = $('#pvTypeField');
       const pvTypeInput = $('#pvType'); // Add this line for PV Type input
       const RecordNoField = $('#RecordNoField');
       const RecordNoInput = $('#RecordNo'); 
       // ...

       selection.on('change', function() {
           if (selection.val() === 'Endorsement') {
               endorsementField.show();
               RecordNoField.show();
               RecordNoInput.show();
               renewalField.hide();
               endorsementNumberInput.attr('required', 'required');
               RecordNoInput.attr('required', 'required');
               endorsementNumberError.show();
               renewalNumberInput.removeAttr('required');
               renewalNumberError.hide();
               endorsementNumberInput[0].setCustomValidity('');
               renewalNumberInput[0].setCustomValidity('');
               accountsField.hide(); // Hide accounts field
               claimsField.hide(); // Hide claims field
               pvTypeField.hide();
               pvNumberInput.removeAttr('required'); // Remove required attribute from PV Number
               claimNumberInput.removeAttr('required'); // Remove required attribute from Claim Number
           } 
           
           else if(selection.val()==='NewBusiness')
           {
            RecordNoField.show();
            RecordNoInput.show();
            endorsementNumberInput.removeAttr('required');
            endorsementNumberError.hide();
            endorsementField.hide();
            renewalNumberInput.removeAttr('required');
            renewalNumberError.hide();
            renewalField.hide();
            renewalNumberInput[0].setCustomValidity('');
            RecordNoInput.attr('required', 'required');
           }
           
           
           else if (selection.val() === 'Renewal') {
               endorsementField.hide();
               renewalField.show();
               RecordNoField.show();
               RecordNoInput.show();
               endorsementNumberInput.removeAttr('required');
               endorsementNumberError.hide();
               renewalNumberInput.attr('required', 'required');
               RecordNoInput.attr('required', 'required');
               renewalNumberError.show();
               endorsementNumberInput[0].setCustomValidity('');
               renewalNumberInput[0].setCustomValidity('');
               accountsField.hide(); // Hide accounts field
               pvTypeField.hide();
               claimsField.hide(); // Hide claims field
               pvNumberInput.removeAttr('required'); //pvTypeField Remove required attribute from PV Number
               claimNumberInput.removeAttr('required'); // Remove required attribute from Claim Number
           } else  if (selection.val() === 'Accounts') {
            accountsField.show(); // Show accounts field
            pvTypeField.show(); // Show PV Type field and make it required
            claimsField.hide(); // Hide claims field
            RecordNoInput.hide();
            RecordNoField.hide();
            endorsementField.hide();
            renewalField.hide();
            endorsementNumberInput.removeAttr('required');
            endorsementNumberError.hide();
            renewalNumberInput.removeAttr('required');
            renewalNumberError.hide();
            endorsementNumberInput[0].setCustomValidity('');
            renewalNumberInput[0].setCustomValidity('');
            pvNumberInput.attr('required', 'required'); // Make PV Number required
            claimNumberInput.removeAttr('required'); // Remove required attribute from Claim Number
            RecordNoInput.removeAttr('required');
            pvTypeInput.attr('required', 'required');
         }

           else if (selection.val() === 'Claims') {
               accountsField.hide(); // Hide accounts field
               pvTypeField.hide();
               RecordNoField.hide();
               RecordNoInput.hide();
               claimsField.show(); // Show claims field
               endorsementField.hide();
               renewalField.hide();
               endorsementNumberInput.removeAttr('required');
               endorsementNumberError.hide();
               renewalNumberInput.removeAttr('required');
               renewalNumberError.hide();
               RecordNoInput.removeAttr('required');
               endorsementNumberInput.removeAttr('required'); // Remove required attribute from PV Number
               claimNumberInput.attr('required', 'required'); // Make Claim Number required
           } else {
               endorsementField.hide();
               pvTypeField.hide();
               renewalField.hide();
               accountsField.hide(); // Hide accounts field
               claimsField.hide(); // Hide claims field
               endorsementNumberInput.removeAttr('required');
               endorsementNumberError.hide();
               renewalNumberInput.removeAttr('required');
               renewalNumberError.hide();
               endorsementNumberInput.removeAttr('required'); // Remove required attribute from PV Number
               claimNumberInput.removeAttr('required'); // Remove required attribute from Claim Number
           }
       });
   });
