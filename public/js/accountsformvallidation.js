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