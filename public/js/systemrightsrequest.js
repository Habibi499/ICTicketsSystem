$(document).ready(function () {
    $('#motorCheckbox').change(function () {
       if ($(this).is(':checked')) {
          populateMotorCategories();
          $('#motorDetails').removeClass('hidden');
       } else {
          $('#motorDetails').addClass('hidden');
       }
    });
 
    $('#fireCheckbox').change(function () {
       if ($(this).is(':checked')) {
          populateFireCategories();
          $('#fireDetails').removeClass('hidden');
       } else {
          $('#fireDetails').addClass('hidden');
       }
    });
 
    $('#marineCheckbox').change(function () {
       if ($(this).is(':checked')) {
          populateMarineCategories();
          $('#marineDetails').removeClass('hidden');
       } else {
          $('#marineDetails').addClass('hidden');
       }
    });
 
    $('#MiscCheckbox').change(function () {
       if ($(this).is(':checked')) {
          populateMiscCategories();
          $('#MiscDetails').removeClass('hidden');
       } else {
          $('#MiscDetails').addClass('hidden');
       }
    });
 
    $('#fireEndorsementCheckbox').change(function () {
       if ($(this).is(':checked')) {
          populateFireEndorsementCategories();
          $('#fireEndorsementDetails').removeClass('hidden');
       } else {
          $('#fireEndorsementDetails').addClass('hidden');
       }
    });
 
    $('#motorEndorsementCheckbox').change(function () {
       if ($(this).is(':checked')) {
          populateMotorEndorsementCategories();
          $('#motorEndorsementDetails').removeClass('hidden');
       } else {
          $('#motorEndorsementDetails').addClass('hidden');
       }
    });
 
    $('#miscellaneousCheckbox').change(function () {
       if ($(this).is(':checked')) {
          populateMiscellaneousCategories();
          $('#miscellaneousDetails').removeClass('hidden');
       } else {
          $('#miscellaneousDetails').addClass('hidden');
       }
    });
    $('#marineEndorsementsCheckbox').change(function () {
       if ($(this).is(':checked')) {
          populateMarineEndorsementsCategories();
          $('#marineEndorsementsDetails').removeClass('hidden');
       } else {
          $('#marineEndorsementsDetails').addClass('hidden');
       }
    });
    $('#listingCheckbox').change(function () {
        if ($(this).is(':checked')) {
            populateListingCategories();
            $('#listingDetails').removeClass('hidden');
        } else {
            $('#listingDetails').addClass('hidden');
        }
    });

    $('#noticeCheckbox').change(function () {
        if ($(this).is(':checked')) {
            populateNoticeCategories();
            $('#noticeDetails').removeClass('hidden');
        } else {
            $('#noticeDetails').addClass('hidden');
        }
    });

    
    $('#processMotorCheckbox').change(function () {
        if ($(this).is(':checked')) {
            populateProcessMotorCategories();
            $('#processMotorDetails').removeClass('hidden');
        } else {
            $('#processMotorDetails').addClass('hidden');
        }
    });

    $('#processFireCheckbox').change(function () {
        if ($(this).is(':checked')) {
            populateProcessFireCategories();
            $('#processFireDetails').removeClass('hidden');
        } else {
            $('#processFireDetails').addClass('hidden');
        }
    });

    $('#processMiscellaneousCheckbox').change(function () {
        if ($(this).is(':checked')) {
            populateProcessMiscellaneousCategories();
            $('#processMiscellaneousDetails').removeClass('hidden');
        } else {
            $('#processMiscellaneousDetails').addClass('hidden');
        }
    });
    
    $('#matatuNewBusinessCheckbox').change(function () {
        if ($(this).is(':checked')) {
            populateMatatuNewBusinessCategories();
            $('#matatuNewBusinessDetails').removeClass('hidden');
        } else {
            $('#matatuNewBusinessDetails').addClass('hidden');
        }
    });

    $('#matatuRenewalsCheckbox').change(function () {
        if ($(this).is(':checked')) {
            populateMatatuRenewalsCategories();
            $('#matatuRenewalsDetails').removeClass('hidden');
        } else {
            $('#matatuRenewalsDetails').addClass('hidden');
        }
    });

    $('#matatuEndorsementsCheckbox').change(function () {
        if ($(this).is(':checked')) {
            populateMatatuEndorsementsCategories();
            $('#matatuEndorsementsDetails').removeClass('hidden');
        } else {
            $('#matatuEndorsementsDetails').addClass('hidden');
        }
    });

    $('#motorReportsCheckbox').change(function () {
        if ($(this).is(':checked')) {
            populateMotorReportsCategories();
            $('#motorReportsDetails').removeClass('hidden');
        } else {
            $('#motorReportsDetails').addClass('hidden');
        }
    });
    $('#newBusinessReportsCheckbox').change(function () {
        if ($(this).is(':checked')) {
            populateNewBusinessReportsCategories();
            $('#newBusinessReportsDetails').removeClass('hidden');
        } else {
            $('#newBusinessReportsDetails').addClass('hidden');
        }
    });

    $('#bordereauxCheckbox').change(function () {
        if ($(this).is(':checked')) {
            populateBordereauxCategories();
            $('#bordereauxDetails').removeClass('hidden');
        } else {
            $('#bordereauxDetails').addClass('hidden');
        }
    });

    $('#bordereauxMarineCheckbox').change(function () {
        if ($(this).is(':checked')) {
            populateBordereauxMarineCategories();
            $('#bordereauxMarineDetails').removeClass('hidden');
        } else {
            $('#bordereauxMarineDetails').addClass('hidden');
        }
    });

    $('#eBordereauxCheckbox').change(function () {
        if ($(this).is(':checked')) {
            populateEBordereauxCategories();
            $('#eBordereauxDetails').removeClass('hidden');
        } else {
            $('#eBordereauxDetails').addClass('hidden');
        }
    });

    $('#renewalBordereauxCheckbox').change(function () {
        if ($(this).is(':checked')) {
            populateRenewalBordereauxCategories();
            $('#renewalBordereauxDetails').removeClass('hidden');
        } else {
            $('#renewalBordereauxDetails').addClass('hidden');
        }
    });
    
    $('#premiumRegisterCheckbox').change(function () {
        if ($(this).is(':checked')) {
            populatePremiumRegisterCategories();
            $('#premiumRegisterDetails').removeClass('hidden');
        } else {
            $('#premiumRegisterDetails').addClass('hidden');
        }
    });

    $('#transactionCheckbox').change(function () {
      if ($(this).is(':checked')) {
          populateTransactionCategories();
          $('#transactionDetails').removeClass('hidden');
      } else {
          $('#transactionDetails').addClass('hidden');
      }
  });

  $('#propertyCheckbox').change(function () {
    if ($(this).is(':checked')) {
        populatePropertyCategories();
        $('#propertyDetails').removeClass('hidden');
    } else {
        $('#propertyDetails').addClass('hidden');
    }
});
$('#reportsCheckbox').change(function () {
  const isChecked = $(this).is(':checked');
  $('#reportsDetails').toggleClass('hidden', !isChecked);
  if (isChecked) {
      populateReportsCategories();
  }
});
$('#misCheckbox').change(function () {
  const isChecked = $(this).is(':checked');
  $('#misDetails').toggleClass('hidden', !isChecked);
  if (isChecked) {
      populateMISCategories();
  }
});
$('#masterCheckbox').change(function () {
  const isChecked = $(this).is(':checked');
  $('#masterDetails').toggleClass('hidden', !isChecked);
  if (isChecked) {
      populateMasterCategories();
  }
});
$('#claimsCheckbox').change(function () {
  const isChecked = $(this).is(':checked');
  $('#claimsDetails').toggleClass('hidden', !isChecked);
  if (isChecked) {
      populateClaimsCategories();
  }
});
$('#claimsReportsCheckbox').change(function () {
  const isChecked = $(this).is(':checked');
  $('#claimsReportsDetails').toggleClass('hidden', !isChecked);
  if (isChecked) {
      populateClaimsReportsCategories();
  }
});
$('#claimsPaidBordereauCheckbox').change(function () {
  const isChecked = $(this).is(':checked');
  $('#claimsPaidBordereauDetails').toggleClass('hidden', !isChecked);
  if (isChecked) {
    populateClaimsPaidBordereauCategories();
  }
});

$('#claimsVoucherReportsCheckbox').change(function () {
  const isChecked = $(this).is(':checked');
  $('#claimsVoucherReportsDetails').toggleClass('hidden', !isChecked);
  if (isChecked) {
    populateClaimsVoucherReportsCategories();
  }
});

$('#illicitClaimsCheckbox').change(function () {
  const isChecked = $(this).is(':checked');
  $('#illicitClaimsDetails').toggleClass('hidden', !isChecked);
  if (isChecked) {
    populateIllicitClaimsCategories();
  }
});

$('#retailClaimsSummaryReportsCheckbox').change(function () {
  const isChecked = $(this).is(':checked');
  $('#retailClaimsSummaryReportsDetails').toggleClass('hidden', !isChecked);
  if (isChecked) {
    populateRetailClaimsSummaryReportsCategories();
  }
});
    $('#saveButton').click(function () {
       const formData = collectFormData();
       console.log(formData);
 
    });
 });
 /*
 |--------------------------------------------------------------------------
 | Motor Classes
 |--------------------------------------------------------------------------
 |
 */
 function populateMotorCategories() {
    const motorDetails = $('#motorDetails');
    motorDetails.empty(); // Clear existing categories
  
    // Add your motor categories here
    const motorCategories = [
      'Private Car',
      'Commercial Vehicle',
      'Motor Cycle',
      'Motor Cycle PSV',
      'Pedal Cycle',
      'Authority to Issue Certificate',
      'Issue Certificate Before Receipting',
      'Issue Certificate',
    ];
  
    //"Select All" for CRUD operation
    motorDetails.append(`
      <div class="row category-checkbox" style="border:1px solid #ffc107;color:green;">
        <div class="col-md-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-categories" value="Select All Categories">
            <label class="form-check-label">Select All</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-views" value="1">
            <label class="form-check-label">Views</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-adds" value="Add">
            <label class="form-check-label">Add</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-saves" value="Save">
            <label class="form-check-label">Save</label>
          </div>
        </div>
        <div class="col-md-1.5">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-drnotes" value="DrCrNote">
            <label class="form-check-label">DrCrNote</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-queries" value="Query">
            <label class="form-check-label">Query</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-prints" value="Print">
            <label class="form-check-label">Print</label>
          </div>
        </div>
        <hr>
      </div>
    `);
  
    motorCategories.forEach(category => {
      motorDetails.append(`
        <div class="row category-checkbox">
          <div class="col-md-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input motor-category" name="vehicleDetails[]" value="${category.replace(/\s/g, '')}">
              <label class="form-check-label">${category}</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="1">
              <label class="form-check-label">View</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
              <label class="form-check-label">Add</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
              <label class="form-check-label">Save</label>
            </div>
          </div>
          <div class="col-md-1.5">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
              <label class="form-check-label">DrCrNote</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
              <label class="form-check-label">Query</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
              <label class="form-check-label">Print</label>
            </div>
          </div>
        </div>
      `);
  
      // Attach change event handler to dynamically added checkboxes
      $(`.motor-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
        const categoryId = $(this).val();
        const crudDiv = $(`.${categoryId}Crud`);
        if ($(this).is(':checked')) {
          crudDiv.removeClass('hidden');
        } else {
          crudDiv.addClass('hidden');
        }
      });
    });
  
    // Attach change event handler to "Select All" checkboxes for each CRUD operation
    $('.select-all-views').change(function () {
      const isChecked = $(this).is(':checked');
      $('.view-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-adds').change(function () {
      const isChecked = $(this).is(':checked');
      $('.add-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-saves').change(function () {
      const isChecked = $(this).is(':checked');
      $('.save-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-drnotes').change(function () {
      const isChecked = $(this).is(':checked');
      $('.drnote-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-queries').change(function () {
      const isChecked = $(this).is(':checked');
      $('.query-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-prints').change(function () {
      const isChecked = $(this).is(':checked');
      $('.print-checkbox').prop('checked', isChecked);
    });
  
    // Attach change event handler to "Select All Categories" checkbox
    $('.select-all-categories').change(function () {
      const isChecked = $(this).is(':checked');
      $('.motor-category').prop('checked', isChecked).change();
    });
  }
  
 /*
 |--------------------------------------------------------------------------
 | Marine
 |--------------------------------------------------------------------------
 |
 */
 function populateMarineCategories() {
    const marineDetails = $('#marineDetails');
    marineDetails.empty(); // Clear existing categories
    const marineCategories  = [
      'Open Cover',
      'Certificate',
      'Policy',
      'Marine Hull',
    ];
  
    // Add "Select All" checkboxes for each CRUD operation
    marineDetails.append(`
      <div class="row category-checkbox" style="border:1px solid #ffc107;color:green;">
        <div class="col-md-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-marine-categories" value="Select All Categories">
            <label class="form-check-label">Select All Categories</label>
          </div>
        </div>
  
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-marine-views" value="1">
            <label class="form-check-label">Views</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-marine-adds" value="Add">
            <label class="form-check-label">Add</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-marine-saves" value="Save">
            <label class="form-check-label">Save</label>
          </div>
        </div>
        <div class="col-md-1.5">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-marine-drnotes" value="DrNote">
            <label class="form-check-label">DrCrNotes</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-marine-queries" value="Query">
            <label class="form-check-label">Query</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-marine-prints" value="Print">
            <label class="form-check-label">Print</label>
          </div>
        </div>
      </div>
    `);
  
    marineCategories.forEach(category => {
      marineDetails.append(`
        <div class="row category-checkbox">
          <div class="col-md-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input marine-category" 
              name="marineDetails[]" value="${category.replace(/\s/g, '')}">
              <label class="form-check-label">${category}</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input marine-view-checkbox" 
              name="View[${category.replace(/\s/g, '')}]" value="1">
              <label class="form-check-label">View</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input marine-add-checkbox" 
              name="Add[${category.replace(/\s/g, '')}]" value="Add">
              <label class="form-check-label">Add</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input marine-save-checkbox" 
              name="Save[${category.replace(/\s/g, '')}]" value="Save">
              <label class="form-check-label">Save</label>
            </div>
          </div>
          <div class="col-md-1.5">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input marine-drnote-checkbox" 
              name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
              <label class="form-check-label">DrCrNotes</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input marine-query-checkbox" 
              name="Query[${category.replace(/\s/g, '')}]" value="Query">
              <label class="form-check-label">Query</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input marine-print-checkbox" 
              name="Print[${category.replace(/\s/g, '')}]" value="Print">
              <label class="form-check-label">Print</label>
            </div>
          </div>
        </div>
      `);
  
      // Attach change event handler to dynamically added checkboxes
      $(`.marine-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
        const categoryId = $(this).val();
        const crudDiv = $(`.${categoryId}Crud`);
        if ($(this).is(':checked')) {
          crudDiv.removeClass('hidden');
        } else {
          crudDiv.addClass('hidden');
        }
      });
    });
  
    // Attach change event handler to "Select All" checkboxes for each CRUD operation
    $('.select-all-marine-views').change(function () {
      const isChecked = $(this).is(':checked');
      $('.marine-view-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-marine-adds').change(function () {
      const isChecked = $(this).is(':checked');
      $('.marine-add-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-marine-saves').change(function () {
      const isChecked = $(this).is(':checked');
      $('.marine-save-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-marine-drnotes').change(function () {
      const isChecked = $(this).is(':checked');
      $('.marine-drnote-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-marine-queries').change(function () {
      const isChecked = $(this).is(':checked');
      $('.marine-query-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-marine-prints').change(function () {
      const isChecked = $(this).is(':checked');
      $('.marine-print-checkbox').prop('checked', isChecked);
    });
  
    // Attach change event handler to "Select All Categories" checkbox
    $('.select-all-marine-categories').change(function () {
      const isChecked = $(this).is(':checked');
      $('.marine-category').prop('checked', isChecked).change();
    });
  }
  
 /*
 |--------------------------------------------------------------------------
 | Miscellaneous Classes
 |--------------------------------------------------------------------------
 |
 */
 function populateMiscCategories() {
    const MiscDetails = $('#MiscDetails');
    MiscDetails.empty();
    const categories = [
      'Travel Insurance',
      'All Risk',
      'Bond',
      'Burglary',
      'Cash-in-Transit',
      'Goods-in-Transit',
      'Contractors All Risk',
      'Fidelity Guarantee',
      'Golf Insurance',
      'Medical Insurance',
      'Personal Accident',
      'Public Liability',
      'Carriers Liability',
      'Plate Glass',
      'Workmen Compensation',
      'Work Injury Benefits Ins',
      'WIBI Employers Liability',
      'Boiler  Pressure Vessels',
      'Machinery',
      'Erection All Risk',
      'EDP or Electronic Equipment',
      'Professional Indemnity',
      'Cancel - Others',


    ];
  
    // Add "Select All" checkboxes for each CRUD operation
    MiscDetails.append(`
      <div class="row category-checkbox" style="border:1px solid #ffc107;color:green;">
        <div class="col-md-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-misc-categories" value="Select All Categories">
            <label class="form-check-label">Select All Categories</label>
          </div>
        </div>
   
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-misc-views" value="1">
            <label class="form-check-label">View</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-misc-adds" value="Add">
            <label class="form-check-label">Add</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-misc-saves" value="Save">
            <label class="form-check-label">Save</label>
          </div>
        </div>
        <div class="col-md-1.5">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-misc-drnotes" value="DrNote">
            <label class="form-check-label">DrCrNotes</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-misc-queries" value="Query">
            <label class="form-check-label">Query</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-misc-prints" value="Print">
            <label class="form-check-label">Prints</label>
          </div>
        </div>
      </div>
    `);
  
    categories.forEach(category => {
      MiscDetails.append(`
        <div class="row category-checkbox">
          <div class="col-md-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input Misc-category" name="MiscDetails[]" 
              value="${category.replace(/\s/g, '')}">
              <label class="form-check-label">${category}</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input misc-view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="1">
              <label class="form-check-label">View</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input misc-add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
              <label class="form-check-label">Add</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input misc-save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
              <label class="form-check-label">Save</label>
            </div>
          </div>
          <div class="col-md-1.5">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input misc-drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
              <label class="form-check-label">DrCrNote</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input misc-query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
              <label class="form-check-label">Query</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input misc-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
              <label class="form-check-label">Print</label>
            </div>
          </div>
        </div>
      `);
  
      // Attach change event handler to dynamically added checkboxes
      $(`.Misc-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
        const categoryId = $(this).val();
        const crudDiv = $(`.${categoryId}Crud`);
        if ($(this).is(':checked')) {
          crudDiv.removeClass('hidden');
        } else {
          crudDiv.addClass('hidden');
        }
      });
    });
  
    // Attach change event handler to "Select All" checkboxes for each CRUD operation
    $('.select-all-misc-views').change(function () {
      const isChecked = $(this).is(':checked');
      $('.misc-view-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-misc-adds').change(function () {
      const isChecked = $(this).is(':checked');
      $('.misc-add-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-misc-saves').change(function () {
      const isChecked = $(this).is(':checked');
      $('.misc-save-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-misc-drnotes').change(function () {
      const isChecked = $(this).is(':checked');
      $('.misc-drnote-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-misc-queries').change(function () {
      const isChecked = $(this).is(':checked');
      $('.misc-query-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-misc-prints').change(function () {
      const isChecked = $(this).is(':checked');
      $('.misc-print-checkbox').prop('checked', isChecked);
    });
  
    // Attach change event handler to "Select All Categories" checkbox
    $('.select-all-misc-categories').change(function () {
      const isChecked = $(this).is(':checked');
      $('.Misc-category').prop('checked', isChecked).change();
    });
  }
  
 /*
  |--------------------------------------------------------------------------
  | Fire
  |--------------------------------------------------------------------------
  |
  */
  function populateFireCategories() {
    const fireDetails = $('#fireDetails');
    fireDetails.empty(); // Clear existing categories
    const fireCategories = [
      'Industrial',
      'Domestic',
      'Fire Consequential Loss',
      'Industrial All Risk',
      'Political Risks Policy',
    ];
  
    // Add "Select All" checkboxes for each CRUD operation
    fireDetails.append(`
      <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
        <div class="col-md-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-fire-categories" value="Select All Categories">
            <label class="form-check-label">Select All Categories</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class-form-check">
            <input type="checkbox" class="form-check-input select-all-fire-views" value="1">
            <label class="form-check-label">View</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-fire-adds" value="Add">
            <label class="form-check-label">Add</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-fire-saves" value="Save">
            <label class="form-check-label">Save</label>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-fire-drnotes" value="DrNote">
            <label class="form-check-label">Dr CrNotes</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-fire-queries" value="Query">
            <label class="form-check-label">Query</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-fire-prints" value="Print">
            <label class="form-check-label">Print</label>
          </div>
        </div>
      </div>
    `);
  
    fireCategories.forEach(category => {
      fireDetails.append(`
        <div class="row category-checkbox">
          <div class="col-md-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input fire-category" name="fireDetails[]" value="${category.replace(/\s/g, '')}">
              <label class="form-check-label">${category}</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input fire-view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="1">
              <label class="form-check-label">View</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input fire-add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
              <label class="form-check-label">Add</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input fire-save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
              <label class="form-check-label">Save</label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input fire-drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
              <label class="form-check-label">Dr CrNotes</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input fire-query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
              <label class="form-check-label">Query</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input fire-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
              <label class="form-check-label">Print</label>
            </div>
          </div>
        </div>
      `);
  
      // Attach change event handler to dynamically added checkboxes
      $(`.fire-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
        const categoryId = $(this).val();
        const crudDiv = $(`.${categoryId}Crud`);
        if ($(this).is(':checked')) {
          crudDiv.removeClass('hidden');
        } else {
          crudDiv.addClass('hidden');
        }
      });
    });
  
    // Attach change event handler to "Select All" checkboxes for each CRUD operation
    $('.select-all-fire-categories').change(function () {
      const isChecked = $(this).is(':checked');
      $('.fire-category').prop('checked', isChecked).change();
    });
  
    $('.select-all-fire-views').change(function () {
      const isChecked = $(this).is(':checked');
      $('.fire-view-checkbox').prop('checked', isChecked).change();
    });
  
    $('.select-all-fire-adds').change(function () {
      const isChecked = $(this).is(':checked');
      $('.fire-add-checkbox').prop('checked', isChecked).change();
    });
  
    $('.select-all-fire-saves').change(function () {
      const isChecked = $(this).is(':checked');
      $('.fire-save-checkbox').prop('checked', isChecked).change();
    });
  
    $('.select-all-fire-drnotes').change(function () {
      const isChecked = $(this).is(':checked');
      $('.fire-drnote-checkbox').prop('checked', isChecked).change();
    });
  
    $('.select-all-fire-queries').change(function () {
      const isChecked = $(this).is(':checked');
      $('.fire-query-checkbox').prop('checked', isChecked).change();
    });
  
    $('.select-all-fire-prints').change(function () {
      const isChecked = $(this).is(':checked');
      $('.fire-print-checkbox').prop('checked', isChecked).change();
    });
  }
  
 /****************************ENDORSEMENTS**********************************/
    /*
     |--------------------------------------------------------------------------
     | Motor ENDORSEMENTS
     |--------------------------------------------------------------------------
     |
    */
     function populateMotorEndorsementCategories() {
        const motorEndorsementDetails = $('#motorEndorsementDetails');
        motorEndorsementDetails.empty();
        // Motor Endorsement categories here
        const motorEndorsementCategories = [
          'Cancellation',
          'Suspension',
          'Policy Reinstatement',
          'PTA',
          'Others',
          'Extension of Period',
        ];
      
        // Add "Select All" checkboxes for each CRUD operation
        motorEndorsementDetails.append(`
          <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
            <div class="col-md-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input select-all-motorEndorsement-categories" value="Select All Categories">
                <label class="form-check-label">Select All Categories</label>
              </div>
              </div>
         
            <div class="col-md-1">
              <div class="form-check">
                <input type="checkbox" class="form-check-input select-all-motorEndorsement-views" value="1">
                <label class="form-check-label">View</label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check">
                <input type="checkbox" class="form-check-input select-all-motorEndorsement-adds" value="Add">
                <label class="form-check-label">Add</label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check">
                <input type="checkbox" class="form-check-input select-all-motorEndorsement-saves" value="Save">
                <label class="form-check-label">Save</label>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-check">
                <input type="checkbox" class="form-check-input select-all-motorEndorsement-drnotes" value="DrNote">
                <label class="form-check-label">Dr CrNotes</label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check">
                <input type="checkbox" class="form-check-input select-all-motorEndorsement-queries" value="Query">
                <label class="form-check-label"> Query</label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check">
                <input type="checkbox" class="form-check-input select-all-motorEndorsement-prints" value="Print">
                <label class="form-check-label">Print</label>
              </div>
            </div>
          </div>
        `);
      
        motorEndorsementCategories.forEach(category => {
          motorEndorsementDetails.append(`
            <div class="row category-checkbox">
              <div class="col-md-3">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input motorEndorsement-category" name="motorEndorsementDetails[]" value="${category.replace(/\s/g, '')}">
                  <label class="form-check-label">${category}</label>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                  <input type="checkbox" class="form-check-input motorEndorsement-view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="1">
                  <label class="form-check-label">View</label>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                  <input type="checkbox" class="form-check-input motorEndorsement-add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
                  <label class="form-check-label">Add</label>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                  <input type="checkbox" class="form-check-input motorEndorsement-save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
                  <label class="form-check-label">Save</label>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                  <input type="checkbox" class="form-check-input motorEndorsement-drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
                  <label class="form-check-label">Dr CrNotes</label>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                  <input type="checkbox" class="form-check-input motorEndorsement-query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
                  <label class="form-check-label">Query</label>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                  <input type="checkbox" class="form-check-input motorEndorsement-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                  <label class="form-check-label">Print</label>
                </div>
              </div>
            </div>
          `);
      
          // Attach change event handler to dynamically added checkboxes
          $(`.motorEndorsement-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
            const categoryId = $(this).val();
            const crudDiv = $(`.${categoryId}Crud`);
            if ($(this).is(':checked')) {
              crudDiv.removeClass('hidden');
            } else {
              crudDiv.addClass('hidden');
            }
          });
        });
      
        // Attach change event handler to "Select All" checkboxes for each CRUD operation
        $('.select-all-motorEndorsement-categories').change(function () {
          const isChecked = $(this).is(':checked');
          $('.motorEndorsement-category').prop('checked', isChecked).change();
        });
      
        $('.select-all-motorEndorsement-views').change(function () {
          const isChecked = $(this).is(':checked');
          $('.motorEndorsement-view-checkbox').prop('checked', isChecked).change();
        });
      
        $('.select-all-motorEndorsement-adds').change(function () {
          const isChecked = $(this).is(':checked');
          $('.motorEndorsement-add-checkbox').prop('checked', isChecked).change();
        });
      
        $('.select-all-motorEndorsement-saves').change(function () {
          const isChecked = $(this).is(':checked');
          $('.motorEndorsement-save-checkbox').prop('checked', isChecked).change();
        });
      
        $('.select-all-motorEndorsement-drnotes').change(function () {
          const isChecked = $(this).is(':checked');
          $('.motorEndorsement-drnote-checkbox').prop('checked', isChecked).change();
        });
      
        $('.select-all-motorEndorsement-queries').change(function () {
          const isChecked = $(this).is(':checked');
          $('.motorEndorsement-query-checkbox').prop('checked', isChecked).change();
        });
      
        $('.select-all-motorEndorsement-prints').change(function () {
          const isChecked = $(this).is(':checked');
          $('.motorEndorsement-print-checkbox').prop('checked', isChecked).change();
        });
      }
      
 /*
 |--------------------------------------------------------------------------
 | FIRE ENDORSEMENTS
 |--------------------------------------------------------------------------
 |
 */
 function populateFireEndorsementCategories() {
    const fireEndorsementDetails = $('#fireEndorsementDetails');
    fireEndorsementDetails.empty(); // Clear existing categories
  
    // Add your Fire Endorsement categories here
    const fireEndorsementCategories = [
      'Fire Industrial',
      'Fire Domestic package',
      'Fire Consequential Loss',
      'Fire Industrial All Risk',
    ];
  
    // Add "Select All" checkboxes for each CRUD operation
    fireEndorsementDetails.append(`
      <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
        <div class="col-md-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-fireEndorsement-categories" value="Select All Categories">
            <label class="form-check-label">Select All Categories</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-fireEndorsement-views" value="1">
            <label class="form-check-label">View</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-fireEndorsement-adds" value="Add">
            <label class="form-check-label">Adds</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-fireEndorsement-saves" value="Save">
            <label class="form-check-label">Save</label>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-fireEndorsement-drnotes" value="DrNote">
            <label class="form-check-label">Dr CrNotes</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-fireEndorsement-queries" value="Query">
            <label class="form-check-label">Query</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-fireEndorsement-prints" value="Print">
            <label class="form-check-label">Print</label>
          </div>
        </div>
      </div>
    `);
  
    fireEndorsementCategories.forEach(category => {
      fireEndorsementDetails.append(`
        <div class="row category-checkbox" >
          <div class="col-md-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input fireEndorsement-category" name="fireEndorsementDetails[]" value="${category.replace(/\s/g, '')}">
              <label class="form-check-label">${category}</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input fireEndorsement-view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="1">
              <label class="form-check-label">View</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input fireEndorsement-add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
              <label class="form-check-label">Add</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input fireEndorsement-save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
              <label class="form-check-label">Save</label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input fireEndorsement-drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
              <label class="form-check-label">Dr CrNote</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input fireEndorsement-query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
              <label class="form-check-label">Query</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input fireEndorsement-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
              <label class="form-check-label">Print</label>
            </div>
          </div>
        </div>
      `);
  
      // Attach change event handler to dynamically added checkboxes
      $(`.fireEndorsement-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
        const categoryId = $(this).val();
        const crudDiv = $(`.${categoryId}Crud`);
        if ($(this).is(':checked')) {
          crudDiv.removeClass('hidden');
        } else {
          crudDiv.addClass('hidden');
        }
      });
    });
  
    // Attach change event handler to "Select All" checkboxes for each CRUD operation
    $('.select-all-fireEndorsement-categories').change(function () {
      const isChecked = $(this).is(':checked');
      $('.fireEndorsement-category').prop('checked', isChecked).change();
    });
  
    $('.select-all-fireEndorsement-views').change(function () {
      const isChecked = $(this).is(':checked');
      $('.fireEndorsement-view-checkbox').prop('checked', isChecked).change();
    });
  
    $('.select-all-fireEndorsement-adds').change(function () {
      const isChecked = $(this).is(':checked');
      $('.fireEndorsement-add-checkbox').prop('checked', isChecked).change();
    });
  
    $('.select-all-fireEndorsement-saves').change(function () {
      const isChecked = $(this).is(':checked');
      $('.fireEndorsement-save-checkbox').prop('checked', isChecked).change();
    });
  
    $('.select-all-fireEndorsement-drnotes').change(function () {
      const isChecked = $(this).is(':checked');
      $('.fireEndorsement-drnote-checkbox').prop('checked', isChecked).change();
    });
  
    $('.select-all-fireEndorsement-queries').change(function () {
      const isChecked = $(this).is(':checked');
      $('.fireEndorsement-query-checkbox').prop('checked', isChecked).change();
    });
  
    $('.select-all-fireEndorsement-prints').change(function () {
      const isChecked = $(this).is(':checked');
      $('.fireEndorsement-print-checkbox').prop('checked', isChecked).change();
    });
  }
  
 /*
 |--------------------------------------------------------------------------
 | MISCELLANEOUS ENDORSEMENTS
 |--------------------------------------------------------------------------
 |
 */
 function populateMiscellaneousCategories() {
    const miscellaneousDetails = $('#miscellaneousDetails');
    miscellaneousDetails.empty(); // Clear existing categories
  
    // Add your Miscellaneous categories here
    const miscellaneousCategories = [
      'All Risk',
      'Bond',
      'Burglary Policy',
      'Cash-in-Transit',
      'Goods-in-Transit',
      'Contractors All Risk',
      'Fidelity Guarantee',
      'Golf',
      'Medical',
      'Personal Accident',
      'Public Liability',
      'Carriers Liability',
      'Plate Glass',
      'Workmen Compensation',
      'Work Injury benefits Ins',
      'WIBI Employers Liability',
      'Boiler Pressure Vessels',
      'Machinery',
      'Erection All Risk',
      'EDP Electronic Equipment',
      'Professional Indemnity',
      'Cancel - Others',
    ];
  
    // Add "Select All" checkboxes for each CRUD operation
    miscellaneousDetails.append(`
      <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
        <div class="col-md-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-miscellaneous-categories" value="Select All Categories">
            <label class="form-check-label">Select All Categories</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-miscellaneous-views" value="1">
            <label class="form-check-label">View</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-miscellaneous-adds" value="Add">
            <label class="form-check-label">Add</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-miscellaneous-saves" value="Save">
            <label class="form-check-label">Save</label>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-miscellaneous-drnotes" value="DrNote">
            <label class="form-check-label">Dr CrNotes</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-miscellaneous-queries" value="Query">
            <label class="form-check-label">Query</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-miscellaneous-prints" value="Print">
            <label class="form-check-label">Print</label>
          </div>
        </div>
      </div>
    `);
  
    miscellaneousCategories.forEach(category => {
      miscellaneousDetails.append(`
        <div class="row category-checkbox" >
          <div class="col-md-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input miscellaneous-category" name="miscellaneousDetails[]" value="${category.replace(/\s/g, '')}">
              <label class="form-check-label">${category}</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input miscellaneous-view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="1">
              <label class="form-check-label">View</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input miscellaneous-add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
              <label class="form-check-label">Add</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input miscellaneous-save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
              <label class="form-check-label">Save</label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input miscellaneous-drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
              <label class="form-check-label">Dr CrNote</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input miscellaneous-query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
              <label class="form-check-label">Query</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input miscellaneous-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
              <label class="form-check-label">Print</label>
            </div>
          </div>
        </div>
      `);
  
      // Attach change event handler to dynamically added checkboxes
      $(`.miscellaneous-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
        const categoryId = $(this).val();
        const crudDiv = $(`.${categoryId}Crud`);
        if ($(this).is(':checked')) {
          crudDiv.removeClass('hidden');
        } else {
          crudDiv.addClass('hidden');
        }
      });
    });
  
    // Attach change event handler to "Select All" checkboxes for each CRUD operation
    $('.select-all-miscellaneous-categories').change(function () {
      const isChecked = $(this).is(':checked');
      $('.miscellaneous-category').prop('checked', isChecked).change();
    });
  
    $('.select-all-miscellaneous-views').change(function () {
      const isChecked = $(this).is(':checked');
      $('.miscellaneous-view-checkbox').prop('checked', isChecked).change();
    });
  
    $('.select-all-miscellaneous-adds').change(function () {
      const isChecked = $(this).is(':checked');
      $('.miscellaneous-add-checkbox').prop('checked', isChecked).change();
    });
  
    $('.select-all-miscellaneous-saves').change(function () {
      const isChecked = $(this).is(':checked');
      $('.miscellaneous-save-checkbox').prop('checked', isChecked).change();
    });
  
    $('.select-all-miscellaneous-drnotes').change(function () {
      const isChecked = $(this).is(':checked');
      $('.miscellaneous-drnote-checkbox').prop('checked', isChecked).change();
    });
  
    $('.select-all-miscellaneous-queries').change(function () {
      const isChecked = $(this).is(':checked');
      $('.miscellaneous-query-checkbox').prop('checked', isChecked).change();
    });
  
    $('.select-all-miscellaneous-prints').change(function () {
      const isChecked = $(this).is(':checked');
      $('.miscellaneous-print-checkbox').prop('checked', isChecked).change();
    });
  }
/*
|--------------------------------------------------------------------------
| MARINE ENDORSEMENTS
|--------------------------------------------------------------------------
|
*/
function populateMarineEndorsementsCategories() {
    const marineEndorsementsDetails = $('#marineEndorsementsDetails');
    marineEndorsementsDetails.empty(); // Clear existing categories

    // Add your Marine Endorsements categories here
    const marineEndorsementsCategories = [
        'Marine Open Cover',
        'Details',
        'Marine Hull',
    ];

    // Add "Select All" checkboxes for each CRUD operation
    marineEndorsementsDetails.append(`
        <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
            <div class="col-md-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-marine-endorsements-categories" value="Select All Categories">
                    <label class="form-check-label">Select All Categories</label>
                </div>
            </div>
            <div class="col-md-1.5">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-marine-endorsements-views" value="View">
                    <label class="form-check-label">View</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-marine-endorsements-adds" value="Add">
                    <label class="form-check-label">Add</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-marine-endorsements-saves" value="Save">
                    <label class="form-check-label">Save</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-marine-endorsements-drnotes" value="DrNote">
                    <label class="form-check-label">DrNote</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-marine-endorsements-queries" value="Query">
                    <label class="form-check-label">Query</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-marine-endorsements-prints" value="Print">
                    <label class="form-check-label">Print</label>
                </div>
            </div>
        </div>
    `);

    marineEndorsementsCategories.forEach(category => {
        marineEndorsementsDetails.append(`
            <div class="row category-checkbox">
                <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input marine-endorsement-category" name="marineEndorsementsDetails[]" value="${category.replace(/\s/g, '')}">
                        <label class="form-check-label">${category}</label>
                    </div>
                </div>
                <div class="col-md-1.5">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input marine-endorsement-view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="View">
                        <label class="form-check-label">View</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input marine-endorsement-add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
                        <label class="form-check-label">Add</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input marine-endorsement-save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
                        <label class="form-check-label">Save</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input marine-endorsement-drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
                        <label class="form-check-label">DrNote</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input marine-endorsement-query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
                        <label class="form-check-label">Query</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input marine-endorsement-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                        <label class="form-check-label">Print</label>
                    </div>
                </div>
            </div>
        `);

        // Attach change event handler to dynamically added checkboxes
        $(`.marine-endorsement-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
            const categoryId = $(this).val();
            const crudDiv = $(`.${categoryId}Crud`);
            if ($(this).is(':checked')) {
                crudDiv.removeClass('hidden');
            } else {
                crudDiv.addClass('hidden');
            }
        });
    });

    // Attach change event handler to "Select All" checkboxes for each CRUD operation
    $('.select-all-marine-endorsements-categories').change(function () {
        const isChecked = $(this).is(':checked');
        $('.marine-endorsement-category').prop('checked', isChecked).change();
        toggleCrudCheckboxes('marine-endorsement', isChecked);
    });

    $('.select-all-marine-endorsements-views').change(function () {
        const isChecked = $(this).is(':checked');
        $('.marine-endorsement-view-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-marine-endorsements-adds').change(function () {
        const isChecked = $(this).is(':checked');
        $('.marine-endorsement-add-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-marine-endorsements-saves').change(function () {
        const isChecked = $(this).is(':checked');
        $('.marine-endorsement-save-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-marine-endorsements-drnotes').change(function () {
        const isChecked = $(this).is(':checked');
        $('.marine-endorsement-drnote-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-marine-endorsements-queries').change(function () {
        const isChecked = $(this).is(':checked');
        $('.marine-endorsement-query-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-marine-endorsements-prints').change(function () {
        const isChecked = $(this).is(':checked');
        $('.marine-endorsement-print-checkbox').prop('checked', isChecked).change();
    });
}

function toggleCrudCheckboxes(category, isChecked) {
    const crudDiv = $(`.${category}-Crud`);
    crudDiv.find('input[type="checkbox"]').prop('checked', isChecked).change();
}


/*-
|-----------------------------------------------------------------------------------------------------
| RENEWALS
|----------------------------------------------------------------------------------------------------
*/
function populateListingCategories() {
    const listingDetails = $('#listingDetails');
    listingDetails.empty(); // Clear existing categories

    // Add your Listing categories here
    const listingCategories = [
        'Motor',
        'Summary',
        'Fire',
        'WIBA or EC',
        'Miscellaneous',
    ];

    // Add "Select All" checkboxes for each CRUD operation
    listingDetails.append(`
        <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
            <div class="col-md-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-listing-categories" value="Select All Categories">
                    <label class="form-check-label">Select All Categories</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-listing-views" value="View">
                    <label class="form-check-label">View</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-listing-adds" value="Add">
                    <label class="form-check-label">Add</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-listing-saves" value="Save">
                    <label class="form-check-label">Save</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-listing-drnotes" value="DrNote">
                    <label class="form-check-label">Dr CrNotes</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-listing-queries" value="Query">
                    <label class="form-check-label">Query</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-listing-prints" value="Print">
                    <label class="form-check-label">Print</label>
                </div>
            </div>
        </div>
    `);

    listingCategories.forEach(category => {
        listingDetails.append(`
            <div class="row category-checkbox">
                <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input listing-category" name="listingDetails[]" value="${category.replace(/\s/g, '')}">
                        <label class="form-check-label">${category}</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input listing-view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="View">
                        <label class="form-check-label">View</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input listing-add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
                        <label class="form-check-label">Add</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input listing-save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
                        <label class="form-check-label">Save</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input listing-drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
                        <label class="form-check-label">Dr CrNotes</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input listing-query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
                        <label class="form-check-label">Query</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input listing-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                        <label class="form-check-label">Print</label>
                    </div>
                </div>
            </div>
        `);

        // Attach change event handler to dynamically added checkboxes
        $(`.listing-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
            const categoryId = $(this).val();
            const crudDiv = $(`.${categoryId}Crud`);
            if ($(this).is(':checked')) {
                crudDiv.removeClass('hidden');
            } else {
                crudDiv.addClass('hidden');
            }
        });
    });

    // Attach change event handler to "Select All" checkboxes for each CRUD operation
    $('.select-all-listing-categories').change(function () {
        const isChecked = $(this).is(':checked');
        $('.listing-category').prop('checked', isChecked).change();
        toggleCrudCheckboxes('listing', isChecked);
    });

    $('.select-all-listing-views').change(function () {
        const isChecked = $(this).is(':checked');
        $('.listing-view-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-listing-adds').change(function () {
        const isChecked = $(this).is(':checked');
        $('.listing-add-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-listing-saves').change(function () {
        const isChecked = $(this).is(':checked');
        $('.listing-save-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-listing-drnotes').change(function () {
        const isChecked = $(this).is(':checked');
        $('.listing-drnote-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-listing-queries').change(function () {
        const isChecked = $(this).is(':checked');
        $('.listing-query-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-listing-prints').change(function () {
        const isChecked = $(this).is(':checked');
        $('.listing-print-checkbox').prop('checked', isChecked).change();
    });
}

function toggleCrudCheckboxes(category, isChecked) {
    const crudDiv = $(`.${category}-Crud`);
    crudDiv.find('input[type="checkbox"]').prop('checked', isChecked).change();
}

 /*
 |--------------------------------------------------------------------------
 | NOTICE RENEWALS
 |--------------------------------------------------------------------------
 |
 */
 function populateNoticeCategories() {
    const noticeDetails = $('#noticeDetails');
    noticeDetails.empty();

    const noticeCategories = [
        'Motor',
        'Fire',
        'Plate Glass',
        'Workmen Compensation',
        'Miscellaneous',
    ];

    // Add "Select All" checkboxes for each CRUD operation
    noticeDetails.append(`
        <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
            <div class="col-md-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-notice-categories" value="Select All Categories">
                    <label class="form-check-label">Select All Categories</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-notice-views" value="View">
                    <label class="form-check-label">View</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-notice-adds" value="Add">
                    <label class="form-check-label">Add</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-notice-saves" value="Save">
                    <label class="form-check-label">Save</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-notice-drnotes" value="DrNote">
                    <label class="form-check-label">Dr CrNotes</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-notice-queries" value="Query">
                    <label class="form-check-label">Query</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-notice-prints" value="Print">
                    <label class="form-check-label">Print</label>
                </div>
            </div>
        </div>
    `);

    noticeCategories.forEach(category => {
        noticeDetails.append(`
            <div class="row category-checkbox">
                <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input notice-category" name="noticeDetails[]" value="${category.replace(/\s/g, '')}">
                        <label class="form-check-label">${category}</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input notice-view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="View">
                        <label class="form-check-label">View</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input notice-add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
                        <label class="form-check-label">Add</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input notice-save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
                        <label class="form-check-label">Save</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input notice-drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
                        <label class="form-check-label">Dr CrNotes</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input notice-query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
                        <label class="form-check-label">Query</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input notice-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                        <label class="form-check-label">Print</label>
                    </div>
                </div>
            </div>
        `);

        // Attach change event handler to dynamically added checkboxes
        $(`.notice-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
            const categoryId = $(this).val();
            const crudDiv = $(`.${categoryId}Crud`);
            if ($(this).is(':checked')) {
                crudDiv.removeClass('hidden');
            } else {
                crudDiv.addClass('hidden');
            }
        });
    });

    // Attach change event handler to "Select All" checkboxes for each CRUD operation
    $('.select-all-notice-categories').change(function () {
        const isChecked = $(this).is(':checked');
        $('.notice-category').prop('checked', isChecked).change();
        toggleCrudCheckboxes('notice', isChecked);
    });

    $('.select-all-notice-views').change(function () {
        const isChecked = $(this).is(':checked');
        $('.notice-view-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-notice-adds').change(function () {
        const isChecked = $(this).is(':checked');
        $('.notice-add-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-notice-saves').change(function () {
        const isChecked = $(this).is(':checked');
        $('.notice-save-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-notice-drnotes').change(function () {
        const isChecked = $(this).is(':checked');
        $('.notice-drnote-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-notice-queries').change(function () {
        const isChecked = $(this).is(':checked');
        $('.notice-query-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-notice-prints').change(function () {
        const isChecked = $(this).is(':checked');
        $('.notice-print-checkbox').prop('checked', isChecked).change();
    });
}

function toggleCrudCheckboxes(category, isChecked) {
    const crudDiv = $(`.${category}-Crud`);
    crudDiv.find('input[type="checkbox"]').prop('checked', isChecked).change();
}

/*
|------------------------------------------------------------------------------------------------
| PROCESS RENEWALS MOTOR CATEGORIES
|----------------------------------------------------------------------------------------------
*/

function populateProcessMotorCategories() {
    const processMotorDetails = $('#processMotorDetails');
    processMotorDetails.empty(); // Clear existing categories

    // Add your ProcessMotor categories here
    const processMotorCategories = [
        'Private Car',
        'Others',
    ];

    processMotorCategories.forEach(category => {
        processMotorDetails.append(`
            <div class="row category-checkbox">
                <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input processMotor-category" name="processMotorDetails[]" value="${category.replace(/\s/g, '')}">
                        <label class="form-check-label">${category}</label>
                    </div>
                </div>
              
                <div class="col-md-1.5">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                  <input type="checkbox" class="form-check-input" name="View[${category.replace(/\s/g, '')}]" value="View">
                  <label class="form-check-label">View</label>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                  <input type="checkbox" class="form-check-input" name="Add[${category.replace(/\s/g, '')}]" value="Add">
                  <label class="form-check-label">Add</label>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                  <input type="checkbox" class="form-check-input" name="Save[${category.replace(/\s/g, '')}]" value="Save">
                  <label class="form-check-label">Save</label>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                  <input type="checkbox" class="form-check-input" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
                  <label class="form-check-label">DrNote</label>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                  <input type="checkbox" class="form-check-input" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                  <label class="form-check-label">Query</label>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                  <input type="checkbox" class="form-check-input" name="Query[${category.replace(/\s/g, '')}]" value="Query">
                  <label class="form-check-label">Query</label>
                </div>
              </div>
       
            </div>
        `);
    
        $(`.processMotor-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
            const categoryId = $(this).val();
            const crudDiv = $(`.${categoryId}Crud`);
            if ($(this).is(':checked')) {
                crudDiv.removeClass('hidden');
            } else {
                crudDiv.addClass('hidden');
            }
        });
    });
}
/*
|-------------------------------------------------------------------------------------------------------------
| FIRE RENEWALS CATEGORIES
|-------------------------------------------------------------------------------------------------------------
*/
function populateProcessFireCategories() {
    const processFireDetails = $('#processFireDetails');
    processFireDetails.empty(); // Clear existing categories

    const processFireCategories = [
        'Industrial',
        'Domestic',
        'Fire Consequential Loss',
        'Industrial All Risk',
        'Political Risks Policy',
    ];

    // Add "Select All" checkboxes for each CRUD operation
    processFireDetails.append(`
        <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
            <div class="col-md-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-processFire-categories" value="Select All Categories">
                    <label class="form-check-label">Select All Categories</label>
                </div>
            </div>
            <div class="col-md-1.5">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-processFire-views" value="View">
                    <label class="form-check-label">View</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-processFire-adds" value="Add">
                    <label class="form-check-label">Add</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-processFire-saves" value="Save">
                    <label class="form-check-label">Save</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-processFire-drnotes" value="DrNote">
                    <label class="form-check-label">Dr CrNotes</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-processFire-queries" value="Query">
                    <label class="form-check-label">Query</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-processFire-prints" value="Print">
                    <label class="form-check-label">Print</label>
                </div>
            </div>
        </div>
    `);

    processFireCategories.forEach(category => {
        processFireDetails.append(`
            <div class="row category-checkbox">
                <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input processFire-category" name="processFireDetails[]" value="${category.replace(/\s/g, '')}">
                        <label class="form-check-label">${category}</label>
                    </div>
                </div>
                <div class="col-md-1.5">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input processFire-view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="View">
                        <label class="form-check-label">View</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input processFire-add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
                        <label class="form-check-label">Add</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input processFire-save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
                        <label class="form-check-label">Save</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input processFire-drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
                        <label class="form-check-label">Dr CrNotes</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input processFire-query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
                        <label class="form-check-label">Query</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input processFire-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                        <label class="form-check-label">Print</label>
                    </div>
                </div>
            </div>
        `);

        // Attach change event handler to dynamically added checkboxes
        $(`.processFire-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
            const categoryId = $(this).val();
            const crudDiv = $(`.${categoryId}Crud`);
            if ($(this).is(':checked')) {
                crudDiv.removeClass('hidden');
            } else {
                crudDiv.addClass('hidden');
            }
        });
    });

    // Attach change event handler to "Select All" checkboxes for each CRUD operation
    $('.select-all-processFire-categories').change(function () {
        const isChecked = $(this).is(':checked');
        $('.processFire-category').prop('checked', isChecked).change();
        toggleCrudCheckboxes('processFire', isChecked);
    });

    $('.select-all-processFire-views').change(function () {
        const isChecked = $(this).is(':checked');
        $('.processFire-view-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-processFire-adds').change(function () {
        const isChecked = $(this).is(':checked');
        $('.processFire-add-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-processFire-saves').change(function () {
        const isChecked = $(this).is(':checked');
        $('.processFire-save-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-processFire-drnotes').change(function () {
        const isChecked = $(this).is(':checked');
        $('.processFire-drnote-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-processFire-queries').change(function () {
        const isChecked = $(this).is(':checked');
        $('.processFire-query-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-processFire-prints').change(function () {
        const isChecked = $(this).is(':checked');
        $('.processFire-print-checkbox').prop('checked', isChecked).change();
    });

    function toggleCrudCheckboxes(category, isChecked) {
        const crudDiv = $(`.${category}-Crud`);
        crudDiv.find('input[type="checkbox"]').prop('checked', isChecked).change();
    }
}

/*
|----------------------------------------------------------------------------------------------------------------
| MISCELLANEOUS RENEWALS
|----------------------------------------------------------------------------------------------------------------
*/

function populateProcessMiscellaneousCategories() {
    const processMiscellaneousDetails = $('#processMiscellaneousDetails');
    processMiscellaneousDetails.empty(); // Clear existing categories
  
    const processMiscellaneousCategories = [
      'All Risk',
      'Bonds',
      'Burglary',
      'Cash-in-Transit',
      'Goods-in-Transit',
      'Contractors All Risk',
      'Fidelity Guarantee',
      'Golf Insurance',
      'Medical',
      'Personal Accident',
      'Public Liability',
      'Carriers Liability',
      'Plate Glass',
      'Workmen Compensation',
      'Boiler',
      'Machinery',
      'Electronic Equipment',
      'Erection All Risk',
      'EDP',
      'Professional Indemnity',
      'Marine Hull',
      'Marine Open Cover Renewal',
    ];
  
    // Add "Select All" checkboxes for each CRUD operation
    processMiscellaneousDetails.append(`
      <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
        <div class="col-md-4">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-processMiscellaneous-categories" value="Select All Categories">
            <label class="form-check-label">All Categories</label>
          </div>
        </div>
    
        <div class="col-md-1.5">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-views" value="1">
            <label class="form-check-label">Views</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-adds" value="Add">
            <label class="form-check-label">Add</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-saves" value="Save">
            <label class="form-check-label">Save</label>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-drnotes" value="DrNote">
            <label class="form-check-label">Dr CrNotes</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-queries" value="Query">
            <label class="form-check-label">Query</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-prints" value="Print">
            <label class="form-check-label">Prints</label>
          </div>
        </div>
      </div>
    `);
  
    processMiscellaneousCategories.forEach(category => {
      processMiscellaneousDetails.append(`
        <div class="row category-checkbox">
          <div class="col-md-4">
            <div class="form-check">
              <input type="checkbox" class="form-check-input processMiscellaneous-category" name="processMiscellaneousDetails[]" value="${category.replace(/\s/g, '')}">
              <label class="form-check-label">${category}</label>
            </div>
          </div>
          <div class="col-md-1.5">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="1">
              <label class="form-check-label">View</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
              <label class="form-check-label">Add</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
              <label class="form-check-label">Save</label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
              <label class="form-check-label">Dr CrNotes</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
              <label class="form-check-label">Query</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
              <label class="form-check-label">Print</label>
            </div>
          </div>
        </div>
      `);
  
      // Attach change event handler to dynamically added checkboxes
      $(`.processMiscellaneous-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
        const categoryId = $(this).val();
        const crudDiv = $(`.${categoryId}Crud`);
        if ($(this).is(':checked')) {
          crudDiv.removeClass('hidden');
        } else {
          crudDiv.addClass('hidden');
        }
      });
    });
  
    // Attach change event handler to "Select All" checkboxes for each CRUD operation
    $('.select-all-views').change(function () {
      const isChecked = $(this).is(':checked');
      $('.view-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-adds').change(function () {
      const isChecked = $(this).is(':checked');
      $('.add-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-saves').change(function () {
      const isChecked = $(this).is(':checked');
      $('.save-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-drnotes').change(function () {
      const isChecked = $(this).is(':checked');
      $('.drnote-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-queries').change(function () {
      const isChecked = $(this).is(':checked');
      $('.query-checkbox').prop('checked', isChecked);
    });
  
    $('.select-all-prints').change(function () {
      const isChecked = $(this).is(':checked');
      $('.print-checkbox').prop('checked', isChecked);
    });
  
    // Attach change event handler to "Select All Categories" checkbox
    $('.select-all-processMiscellaneous-categories').change(function () {
      const isChecked = $(this).is(':checked');
      $('.processMiscellaneous-category').prop('checked', isChecked).change();
    });
  }
  
/*
|--------------------------------------------------------------------------
| Matatus
|--------------------------------------------------------------------------
|
*/
function populateMatatuNewBusinessCategories() {
    const matatuNewBusinessDetails = $('#matatuNewBusinessDetails');
    matatuNewBusinessDetails.empty(); // Clear existing categories

    // Add your MatatuNewBusiness categories here
    const matatuNewBusinessCategories = [
        'Matatu',
        'Matatu Motor Pool',
    ];

    // Add "Select All" checkboxes for each CRUD operation
    matatuNewBusinessDetails.append(`
        <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
            <div class="col-md-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-matatuNewBusiness-categories"
                     value="Select All Categories">
                    <label class="form-check-label">Select All Categories</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-matatuNewBusiness-views" value="View">
                    <label class="form-check-label">View</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-matatuNewBusiness-adds" value="Add">
                    <label class="form-check-label">Add</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-matatuNewBusiness-saves" value="Save">
                    <label class="form-check-label">Save</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-matatuNewBusiness-drnotes" value="DrNote">
                    <label class="form-check-label">Dr CrNotes</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-matatuNewBusiness-queries" value="Query">
                    <label class="form-check-label">Query</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-matatuNewBusiness-prints" value="Print">
                    <label class="form-check-label">Print</label>
                </div>
            </div>
        </div>
    `);

    matatuNewBusinessCategories.forEach(category => {
        matatuNewBusinessDetails.append(`
            <div class="row category-checkbox">
                <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input matatuNewBusiness-category" name="matatuNewBusinessDetails[]" value="${category.replace(/\s/g, '')}">
                        <label class="form-check-label">${category}</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input matatuNewBusiness-view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="View">
                        <label class="form-check-label">View</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input matatuNewBusiness-add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
                        <label class="form-check-label">Add</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input matatuNewBusiness-save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
                        <label class="form-check-label">Save</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input matatuNewBusiness-drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
                        <label class="form-check-label">DrCrNotes</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input matatuNewBusiness-query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
                        <label class="form-check-label">Query</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input matatuNewBusiness-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                        <label class="form-check-label">Print</label>
                    </div>
                </div>
            </div>
        `);

        // Attach change event handler to dynamically added checkboxes
        $(`.matatuNewBusiness-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
            const categoryId = $(this).val();
            const crudDiv = $(`.${categoryId}Crud`);
            if ($(this).is(':checked')) {
                crudDiv.removeClass('hidden');
            } else {
                crudDiv.addClass('hidden');
            }
        });
    });

    // Attach change event handler to "Select All" checkboxes for each CRUD operation
    $('.select-all-matatuNewBusiness-categories').change(function () {
        const isChecked = $(this).is(':checked');
        $('.matatuNewBusiness-category').prop('checked', isChecked).change();
        toggleCrudCheckboxes('matatuNewBusiness', isChecked);
    });

    $('.select-all-matatuNewBusiness-views').change(function () {
        const isChecked = $(this).is(':checked');
        $('.matatuNewBusiness-view-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-matatuNewBusiness-adds').change(function () {
        const isChecked = $(this).is(':checked');
        $('.matatuNewBusiness-add-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-matatuNewBusiness-saves').change(function () {
        const isChecked = $(this).is(':checked');
        $('.matatuNewBusiness-save-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-matatuNewBusiness-drnotes').change(function () {
        const isChecked = $(this).is(':checked');
        $('.matatuNewBusiness-drnote-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-matatuNewBusiness-queries').change(function () {
        const isChecked = $(this).is(':checked');
        $('.matatuNewBusiness-query-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-matatuNewBusiness-prints').change(function () {
        const isChecked = $(this).is(':checked');
        $('.matatuNewBusiness-print-checkbox').prop('checked', isChecked).change();
    });

    function toggleCrudCheckboxes(category, isChecked) {
        const crudDiv = $(`.${category}-Crud`);
        crudDiv.find('input[type="checkbox"]').prop('checked', isChecked).change();
    }
}

function populateMatatuRenewalsCategories() {
    const matatuRenewalsDetails = $('#matatuRenewalsDetails');
    matatuRenewalsDetails.empty(); // Clear existing categories

    // Add your MatatuRenewals categories here
    const matatuRenewalsCategories = [
        'Motor Pool Matatu',
    ];

    matatuRenewalsCategories.forEach(category => {
        matatuRenewalsDetails.append(`
            <div class="row category-checkbox">
                <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input matatuRenewals-category" name="matatuRenewalsDetails[]" value="${category.replace(/\s/g, '')}">
                        <label class="form-check-label">${category}</label>
                    </div>
                </div>
                <div class="col-md-1">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                  <input type="checkbox" class="form-check-input" name="View[${category.replace(/\s/g, '')}]" value="View">
                  <label class="form-check-label">View</label>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                  <input type="checkbox" class="form-check-input" name="Add[${category.replace(/\s/g, '')}]" value="Add">
                  <label class="form-check-label">Add</label>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                  <input type="checkbox" class="form-check-input" name="Save[${category.replace(/\s/g, '')}]" value="Save">
                  <label class="form-check-label">Save</label>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                  <input type="checkbox" class="form-check-input" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
                  <label class="form-check-label">Dr CrNotes</label>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                  <input type="checkbox" class="form-check-input" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                  <label class="form-check-label">Query</label>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                  <input type="checkbox" class="form-check-input" name="Query[${category.replace(/\s/g, '')}]" value="Query">
                  <label class="form-check-label">Query</label>
                </div>
              </div>
            </div>
        `);

        // Attach change event handler to dynamically added checkboxes
        $(`.matatuRenewals-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
            const categoryId = $(this).val();
            const crudDiv = $(`.${categoryId}Crud`);
            if ($(this).is(':checked')) {
                crudDiv.removeClass('hidden');
            } else {
                crudDiv.addClass('hidden');
            }
        });
    });
}
 


/*
|--------------------------------------------------------------------------
| Matatus
|--------------------------------------------------------------------------
|
*/
function populateMatatuEndorsementsCategories() {
    const matatuEndorsementsDetails = $('#matatuEndorsementsDetails');
    matatuEndorsementsDetails.empty(); // Clear existing categories

    // Add your MatatuEndorsements categories here
    const matatuEndorsementsCategories = [
        'Motor Cancellation',
        'Motor Suspension',
        'Name Address',
        'PTA',
        'Motor Others-Pool',
        'Motor Extension Of Period',
    ];

    matatuEndorsementsDetails.append(`
        <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
            <div class="col-md-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-matatuEndorsements-categories" value="Select All Categories">
                    <label class="form-check-label">Select All Categories</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-matatuEndorsements-views" value="View">
                    <label class="form-check-label">View</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-matatuEndorsements-adds" value="Add">
                    <label class="form-check-label">Add</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-matatuEndorsements-saves" value="Save">
                    <label class="form-check-label">Save</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-matatuEndorsements-drnotes" value="DrNote">
                    <label class="form-check-label">Dr CrNotes</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-matatuEndorsements-queries" value="Query">
                    <label class="form-check-label">Query</label>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input select-all-matatuEndorsements-prints" value="Print">
                    <label class="form-check-label">Print</label>
                </div>
            </div>
        </div>
    `);

    matatuEndorsementsCategories.forEach(category => {
        matatuEndorsementsDetails.append(`
            <div class="row category-checkbox">
                <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input matatuEndorsements-category" name="matatuEndorsementsDetails[]" value="${category.replace(/\s/g, '')}">
                        <label class="form-check-label">${category}</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input matatuEndorsements-view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="View">
                        <label class="form-check-label">View</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input matatuEndorsements-add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
                        <label class="form-check-label">Add</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input matatuEndorsements-save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
                        <label class="form-check-label">Save</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input matatuEndorsements-drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
                        <label class="form-check-label">Dr CrNotes</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input matatuEndorsements-query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
                        <label class="form-check-label">Query</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input matatuEndorsements-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                        <label class="form-check-label">Print</label>
                    </div>
                </div>
            </div>
        `);

        // Attach change event handler to dynamically added checkboxes
        $(`.matatuEndorsements-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
            const categoryId = $(this).val();
            const crudDiv = $(`.${categoryId}Crud`);
            if ($(this).is(':checked')) {
                crudDiv.removeClass('hidden');
            } else {
                crudDiv.addClass('hidden');
            }
        });
    });

    // Attach change event handler to "Select All" checkboxes for each CRUD operation
    $('.select-all-matatuEndorsements-categories').change(function () {
        const isChecked = $(this).is(':checked');
        $('.matatuEndorsements-category').prop('checked', isChecked).change();
        toggleCrudCheckboxes('matatuEndorsements', isChecked);
    });

    $('.select-all-matatuEndorsements-views').change(function () {
        const isChecked = $(this).is(':checked');
        $('.matatuEndorsements-view-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-matatuEndorsements-adds').change(function () {
        const isChecked = $(this).is(':checked');
        $('.matatuEndorsements-add-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-matatuEndorsements-saves').change(function () {
        const isChecked = $(this).is(':checked');
        $('.matatuEndorsements-save-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-matatuEndorsements-drnotes').change(function () {
        const isChecked = $(this).is(':checked');
        $('.matatuEndorsements-drnote-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-matatuEndorsements-queries').change(function () {
        const isChecked = $(this).is(':checked');
        $('.matatuEndorsements-query-checkbox').prop('checked', isChecked).change();
    });

    $('.select-all-matatuEndorsements-prints').change(function () {
        const isChecked = $(this).is(':checked');
        $('.matatuEndorsements-print-checkbox').prop('checked', isChecked).change();
    });

    function toggleCrudCheckboxes(category, isChecked) {
        const crudDiv = $(`.${category}-Crud`);
        crudDiv.find('input[type="checkbox"]').prop('checked', isChecked).change();
    }
}


/*
 |--------------------------------------------------------------------------
 | Underwriting Reports
 |--------------------------------------------------------------------------
 |
 */
/*
|--------------------------------------------------------------------------
| NEW BUSINESS U/W REPORTS
|--------------------------------------------------------------------------
*/
function populateNewBusinessReportsCategories() {
  const newBusinessReportsDetails = $('#newBusinessReportsDetails');
  newBusinessReportsDetails.empty(); // Clear existing categories

  // Add your NewBusinessReports categories here
  const newBusinessReportsCategories = [
      'Certificate Purchase',
      'Certificates Issued Register',
      'Motor Certificates Register',
      'Matatu Certificates Register',
  ];

  newBusinessReportsDetails.append(`
      <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
          <div class="col-md-3">
              <div class form-check>
                  <input type="checkbox" class="form-check-input select-all-newBusinessReports-categories" value="Select All Categories">
                  <label class="form-check-label">Select All Categories</label>
              </div>
          </div>
          <div class="col-md-1.5">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-newBusinessReports-prints" value="Print">
                  <label class="form-check-label">Print</label>
              </div>
          </div>
          <!-- Add other CRUD checkboxes as needed -->
      </div>
  `);

  newBusinessReportsCategories.forEach(category => {
      newBusinessReportsDetails.append(`
          <div class="row category-checkbox">
              <div class="col-md-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input newBusinessReports-category" name="newBusinessReportsDetails[]" value="${category.replace(/\s/g, '')}">
                      <label class="form-check-label">${category}</label>
                  </div>
              </div>
              <div class="col-md-1.5">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input newBusinessReports-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                      <label class="form-check-label">Print</label>
                  </div>
              </div>
              <!-- Add other CRUD checkboxes as needed -->
          </div>
      `);

      // Attach change event handler to dynamically added checkboxes
      $(`.newBusinessReports-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
          const categoryId = $(this).val();
          const crudDiv = $(`.${categoryId}Crud`);
          if ($(this).is(':checked')) {
              crudDiv.removeClass('hidden');
          } else {
              crudDiv.addClass('hidden');
          }
      });
  });

  // Attach change event handler to "Select All" checkboxes for each CRUD operation
  $('.select-all-newBusinessReports-categories').change(function () {
      const isChecked = $(this).is(':checked');
      $('.newBusinessReports-category').prop('checked', isChecked).change();
      toggleCrudCheckboxes('newBusinessReports', isChecked);
  });

  $('.select-all-newBusinessReports-prints').change(function () {
      const isChecked = $(this).is(':checked');
      $('.newBusinessReports-print-checkbox').prop('checked', isChecked).change();
  });

  // Add similar event handlers for other CRUD operations as needed

  function toggleCrudCheckboxes(category, isChecked) {
      const crudDiv = $(`.${category}-Crud`);
      crudDiv.find('input[type="checkbox"]').prop('checked', isChecked).change();
  }
}
/*
|--------------------------------------------------------------------------------------------
|Motor Certificate Reports
|--------------------------------------------------------------------------------------------
*/

function populateNewBusinessReportsCategories() {
  const newBusinessReportsDetails = $('#newBusinessReportsDetails');
  newBusinessReportsDetails.empty(); // Clear existing categories

  // Add your NewBusinessReports categories here
  const newBusinessReportsCategories = [
      'Issues Certificates',
      'Certificate Details',
      'Certificates - by Agent',
  ];

  newBusinessReportsDetails.append(`
      <div class="row category-checkbox">
          <div class="col-md-3">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input newBusinessReports-category select-all-newBusinessReports-categories" value="Select All Categories">
                  <label class="form-check-label">Select All Categories</label>
              </div>
          </div>
          <div class="col-md-1.5">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-newBusinessReports-prints" value="Print">
                  <label class="form-check-label">Print</label>
              </div>
          </div>
      </div>
  `);

  newBusinessReportsCategories.forEach(category => {
      newBusinessReportsDetails.append(`
          <div class="row category-checkbox">
              <div class="col-md-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input newBusinessReports-category" name="newBusinessReportsDetails[]" value="${category.replace(/\s/g, '')}">
                      <label class="form-check-label">${category}</label>
                  </div>
              </div>
              <div class="col-md-1.5">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input newBusinessReports-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                      <label class="form-check-label">Print</label>
                  </div>
              </div>
          </div>
      `);

      // Attach change event handler to dynamically added checkboxes
      $(`.newBusinessReports-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
          const categoryId = $(this).val();
          const crudDiv = $(`.${categoryId}Crud`);
          if ($(this).is(':checked')) {
              crudDiv.removeClass('hidden');
          } else {
              crudDiv.addClass('hidden');
          }
      });
  });

  // Attach change event handler to "Select All" checkboxes for each CRUD operation
  $('.select-all-newBusinessReports-categories').change(function () {
      const isChecked = $(this).is(':checked');
      $('.newBusinessReports-category').prop('checked', isChecked).change();
      toggleCrudCheckboxes('newBusinessReports', isChecked);
  });

  $('.select-all-newBusinessReports-prints').change(function () {
      const isChecked = $(this).is(':checked');
      $('.newBusinessReports-print-checkbox').prop('checked', isChecked).change();
  });

  function toggleCrudCheckboxes(category, isChecked) {
      const crudDiv = $(`.${category}-Crud`);
      crudDiv.find('input[type="checkbox"]').prop('checked', isChecked).change();
  }
}


/*
|-----------------------------------------------------------------------------------------------
| NEW BUSINESS U/W REPORTS
|-----------------------------------------------------------------------------------------------
*/
function populateNewBusinessReportsCategories() {
  const newBusinessReportsDetails = $('#newBusinessReportsDetails');
  newBusinessReportsDetails.empty(); // Clear existing categories

  // Add your NewBusinessReports categories here
  const newBusinessReportsCategories = [
      'Issues Certificates',
      'Certificate Details',
      'Certificates - by Agent',
  ];

  newBusinessReportsDetails.append(`
      <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
          <div class="col-md-3">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-newBusinessReports-categories" value="Select All Categories">
                  <label class="form-check-label">Select All Categories</label>
              </div>
          </div>
          <div class="col-md-1.5">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-newBusinessReports-views" value="Print">
                  <label class="form-check-label">Print</label>
              </div>
          </div>
     
          <!-- Add other CRUD checkboxes as needed -->
      </div>
  `);

  newBusinessReportsCategories.forEach(category => {
      newBusinessReportsDetails.append(`
          <div class="row category-checkbox">
              <div class="col-md-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input newBusinessReports-category" name="newBusinessReportsDetails[]" value="${category.replace(/\s/g, '')}">
                      <label class="form-check-label">${category}</label>
                  </div>
              </div>
              <div class="col-md-1.5">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input newBusinessReports-view-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="View">
                      <label class="form-check-label">Print</label>
                  </div>
              </div>
         
              <!-- Add other CRUD checkboxes as needed -->
          </div>
      `);

      // Attach change event handler to dynamically added checkboxes
      $(`.newBusinessReports-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
          const categoryId = $(this).val();
          const crudDiv = $(`.${categoryId}Crud`);
          if ($(this).is(':checked')) {
              crudDiv.removeClass('hidden');
          } else {
              crudDiv.addClass('hidden');
          }
      });
  });

  // Attach change event handler to "Select All" checkboxes for each CRUD operation
  $('.select-all-newBusinessReports-categories').change(function () {
      const isChecked = $(this).is(':checked');
      $('.newBusinessReports-category').prop('checked', isChecked).change();
      toggleCrudCheckboxes('newBusinessReports', isChecked);
  });

  $('.select-all-newBusinessReports-views').change(function () {
      const isChecked = $(this).is(':checked');
      $('.newBusinessReports-view-checkbox').prop('checked', isChecked).change();
  });

  $('.select-all-newBusinessReports-adds').change(function () {
      const isChecked = $(this).is(':checked');
      $('.newBusinessReports-add-checkbox').prop('checked', isChecked).change();
  });

  // Add similar event handlers for other CRUD operations as needed

  function toggleCrudCheckboxes(category, isChecked) {
      const crudDiv = $(`.${category}-Crud`);
      crudDiv.find('input[type="checkbox"]').prop('checked', isChecked).change();
  }
}

// Add a similar structure for bordereauxCategories with "Select All" functionalities
function populateBordereauxCategories() {
  const bordereauxDetails = $('#bordereauxDetails');
  bordereauxDetails.empty(); // Clear existing categories

  // Add your Bordereaux categories here
  const bordereauxCategories = [
      'Motor',
      'Motor Pool',
      'G.I.T',
      'Miscellaneous',
      'Bonds',
      'Fire',      
      'Outstanding Particular Bonds',
      'Oustanding General Bonds',
      'Matatu Bordereau',	
      'Matatu Register',		
      'PSV Certificates Returns',	
  ];

  bordereauxDetails.append(`
      <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
          <div class="col-md-3">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-bordereaux-categories" value="Select All Categories">
                  <label class="form-check-label">Select All Categories</label>
              </div>
          </div>
          <div class="col-md-1.5">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-bordereaux-prints" value="Print">
                  <label class="form-check-label">Print</label>
              </div>
          </div>
          <!-- Add other CRUD checkboxes as needed -->
      </div>
  `);

  bordereauxCategories.forEach(category => {
      bordereauxDetails.append(`
          <div class="row category-checkbox">
              <div class="col-md-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input bordereaux-category" name="bordereauxDetails[]" value="${category.replace(/\s/g, '')}">
                      <label class="form-check-label">${category}</label>
                  </div>
              </div>
              <div class="col-md-1.5">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input bordereaux-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                      <label class="form-check-label">Print</label>
                  </div>
              </div>
              <!-- Add other CRUD checkboxes as needed -->
          </div>
      `);

      // Attach change event handler to dynamically added checkboxes
      $(`.bordereaux-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
          const categoryId = $(this).val();
          const crudDiv = $(`.${categoryId}Crud`);
          if ($(this).is(':checked')) {
              crudDiv.removeClass('hidden');
          } else {
              crudDiv.addClass('hidden');
          }
      });
  });

  // Attach change event handler to "Select All" checkboxes for each CRUD operation
  $('.select-all-bordereaux-categories').change(function () {
      const isChecked = $(this).is(':checked');
      $('.bordereaux-category').prop('checked', isChecked).change();
      toggleCrudCheckboxes('bordereaux', isChecked);
  });

  $('.select-all-bordereaux-prints').change(function () {
      const isChecked = $(this).is(':checked');
      $('.bordereaux-print-checkbox').prop('checked', isChecked).change();
  });

  // Add similar event handlers for other CRUD operations as needed

  function toggleCrudCheckboxes(category, isChecked) {
      const crudDiv = $(`.${category}-Crud`);
      crudDiv.find('input[type="checkbox"]').prop('checked', isChecked).change();
  }
}

/*
|---------------------------------------------------------------------------
|BORDEREAUX REPORTS MARINE
|---------------------------------------------------------------------------
|
*/
function populateBordereauxMarineCategories() {
    const bordereauxMarineDetails = $('#bordereauxMarineDetails');
    bordereauxMarineDetails.empty(); // Clear existing categories

    // Add your BordereauxMarine categories here
    const bordereauxMarineCategories = [
        'Policy',
        'Certificate',
        'Marine Hull',
    ];

    bordereauxMarineCategories.forEach(category => {
        bordereauxMarineDetails.append(`
            <div class="row category-checkbox">
                <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input bordereauxMarine-category" name="bordereauxMarineDetails[]" value="${category.replace(/\s/g, '')}">
                        <label class="form-check-label">${category}</label>
                    </div>
                </div>
                <div class="col-md-1.5">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                        <label class="form-check-label">Print</label>
                    </div>
                </div>
    
            </div>
        `);
        $(`.bordereauxMarine-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
            const categoryId = $(this).val();
            const crudDiv = $(`.${categoryId}Crud`);
            if ($(this).is(':checked')) {
                crudDiv.removeClass('hidden');
            } else {
                crudDiv.addClass('hidden');
            }
        });
    });
}
/*
|-----------------------------------------------------------------------------------------------------------
|ENDORSEMENTS BORDEREAUX REPORTS RIGHTS
|----------------------------------------------------------------------------------------------------------
*/
function populateEBordereauxCategories() {
  const eBordereauxDetails = $('#eBordereauxDetails');
  eBordereauxDetails.empty(); // Clear existing categories

  // Add your EBordereaux categories here
  const eBordereauxCategories = [
      'Motor',
      'Motor Pool',
      'Matatu',
      'Fire',
      'Marine',
      'Marine Hull',
      'GIT',
      'Bonds',
      'Miscellaneous',
      'Premium JVs',
      'Cancelled Bonds',
  ];

  eBordereauxDetails.append(`
      <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
          <div class="col-md-3">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-eBordereaux-categories" value="Select All Categories">
                  <label class="form-check-label">Select All Categories</label>
              </div>
          </div>
          <div class="col-md-1.5">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-eBordereaux-prints" value="Print">
                  <label class="form-check-label">Print</label>
              </div>
          </div>
          <!-- Add other CRUD checkboxes as needed -->
      </div>
  `);

  eBordereauxCategories.forEach(category => {
      eBordereauxDetails.append(`
          <div class="row category-checkbox">
              <div class="col-md-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input eBordereaux-category" name="eBordereauxDetails[]" value="${category.replace(/\s/g, '')}">
                      <label class="form-check-label">${category}</label>
                  </div>
              </div>
              <div class="col-md-1.5">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input eBordereaux-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                      <label class="form-check-label">Print</label>
                  </div>
              </div>
              <!-- Add other CRUD checkboxes as needed -->
          </div>
      `);

      // Attach change event handler to dynamically added checkboxes
      $(`.eBordereaux-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
          const categoryId = $(this).val();
          const crudDiv = $(`.${categoryId}Crud`);
          if ($(this).is(':checked')) {
              crudDiv.removeClass('hidden');
          } else {
              crudDiv.addClass('hidden');
          }
      });
  });

  // Attach change event handler to "Select All" checkboxes for each CRUD operation
  $('.select-all-eBordereaux-categories').change(function () {
      const isChecked = $(this).is(':checked');
      $('.eBordereaux-category').prop('checked', isChecked).change();
      toggleCrudCheckboxes('eBordereaux', isChecked);
  });

  $('.select-all-eBordereaux-prints').change(function () {
      const isChecked = $(this).is(':checked');
      $('.eBordereaux-print-checkbox').prop('checked', isChecked).change();
  });

  // Add similar event handlers for other CRUD operations as needed

  function toggleCrudCheckboxes(category, isChecked) {
      const crudDiv = $(`.${category}-Crud`);
      crudDiv.find('input[type="checkbox"]').prop('checked', isChecked).change();
  }
}

/*
|----------------------------------------------------------------------------------------------------------------------------
|RENEWAL REPORTS RIGHTS
|---------------------------------------------------------------------------------------------------------------------------
*/
function populateRenewalBordereauxCategories() {
  const renewalBordereauxDetails = $('#renewalBordereauxDetails');
  renewalBordereauxDetails.empty(); // Clear existing categories

  // Add your RenewalBordereaux categories here
  const renewalBordereauxCategories = [
      'Motor - Agent Wise',
      'Motor',
      'Motor Pool',
      'Matatu',
      'Fire',
      'Marine Hull',
      'GIT',
      'Miscellaneous',
      'Bonds',
  ];

  renewalBordereauxDetails.append(`
      <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
          <div class="col-md-3">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-renewalBordereaux-categories" value="Select All Categories">
                  <label class="form-check-label">Select All Categories</label>
              </div>
          </div>
          <div class="col-md-1.5">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-renewalBordereaux-prints" value="Print">
                  <label class="form-check-label">Print</label>
              </div>
          </div>
          <!-- Add other CRUD checkboxes as needed -->
      </div>
  `);

  renewalBordereauxCategories.forEach(category => {
      renewalBordereauxDetails.append(`
          <div class="row category-checkbox">
              <div class="col-md-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input renewalBordereaux-category" name="renewalBordereauxDetails[]" value="${category.replace(/\s/g, '')}">
                      <label class="form-check-label">${category}</label>
                  </div>
              </div>
              <div class="col-md-1.5">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input renewalBordereaux-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                      <label class="form-check-label">Print</label>
                  </div>
              </div>
              <!-- Add other CRUD checkboxes as needed -->
          </div>
      `);

      // Attach change event handler to dynamically added checkboxes
      $(`.renewalBordereaux-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
          const categoryId = $(this).val();
          const crudDiv = $(`.${categoryId}Crud`);
          if ($(this).is(':checked')) {
              crudDiv.removeClass('hidden');
          } else {
              crudDiv.addClass('hidden');
          }
      });
  });

  // Attach change event handler to "Select All" checkboxes for each CRUD operation
  $('.select-all-renewalBordereaux-categories').change(function () {
      const isChecked = $(this).is(':checked');
      $('.renewalBordereaux-category').prop('checked', isChecked).change();
      toggleCrudCheckboxes('renewalBordereaux', isChecked);
  });

  $('.select-all-renewalBordereaux-prints').change(function () {
      const isChecked = $(this).is(':checked');
      $('.renewalBordereaux-print-checkbox').prop('checked', isChecked).change();
  });

  // Add similar event handlers for other CRUD operations as needed

  function toggleCrudCheckboxes(category, isChecked) {
      const crudDiv = $(`.${category}-Crud`);
      crudDiv.find('input[type="checkbox"]').prop('checked', isChecked).change();
  }
}


/*
|----------------------------------------------------------------------------------------------------------------------
|REPORTS RIGHTS
|----------------------------------------------------------------------------------------------------------------------
*/
function populatePremiumRegisterCategories() {
    const premiumRegisterDetails = $('#premiumRegisterDetails');
    premiumRegisterDetails.empty(); // Clear existing categories

    // Add your Premium Register categories here
    const premiumRegisterCategories = [

        'Premium Register Retail Division',
        'Premium Register Specific',
        
    ];

    premiumRegisterCategories.forEach(category => {
        premiumRegisterDetails.append(`
            <div class="row category-checkbox">
                <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input ${category.replace(/\s/g, '')}-category" name="premiumRegisterDetails[]" value="${category.replace(/\s/g, '')}">
                        <label class="form-check-label">${category}</label>
                    </div>
                </div>
                <div class="col-md-1.5">
                    <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                        <input type="checkbox" class="form-check-input" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                        <label class="form-check-label">Print</label>
                    </div>
                </div>
                <div class="col-md-1.5">
                <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                    <input type="checkbox" class="form-check-input" name="View[${category.replace(/\s/g, '')}]" value="View">
                    <label class="form-check-label">View</label>
                </div>
            </div>
                <!-- Add other CRUD checkboxes as needed -->
            </div>
        `);

        // Attach change event handler to dynamically added checkboxes
        $(`.${category.replace(/\s/g, '')}-category`).change(function () {
            const categoryId = $(this).val();
            const crudDiv = $(`.${categoryId}Crud`);
            if ($(this).is(':checked')) {
                crudDiv.removeClass('hidden');
            } else {
                crudDiv.addClass('hidden');
            }
        });
    });
}
/*
|---------------------------------------------------------------------------------------------------------------------
| ACCOUNTS RIGHTS TRANSACTIONS
|---------------------------------------------------------------------------------------------------------------------
*/
/*
|------------------------------------------------------------------------------------------------------------------------
|  MASTER
|------------------------------------------------------------------------------------------------------------------------
*/
function populateMasterCategories() {
  const masterDetails = $('#masterDetails');
  masterDetails.empty(); // Clear existing categories

  // Master subcategories here
  const masterCategories = [
      'Accounts Head',
      'Trial Balance Format',
      'Agent Balances',
      'MIS Report Definitions',
      'Claims Payment Categories',
      'Deposit Shares'
  ];

  masterDetails.append(`
      <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
      <div class="col-md-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-categories" value="Select All Categories">
            <label class="form-check-label">Select All</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-views" value="1">
            <label class="form-check-label">Views</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-adds" value="Add">
            <label class="form-check-label">Add</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-saves" value="Save">
            <label class="form-check-label">Save</label>
          </div>
        </div>
        <div class="col-md-1.5">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-drnotes" value="DrCrNote">
            <label class="form-check-label">DrCrNote</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-queries" value="Query">
            <label class="form-check-label">Query</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-prints" value="Print">
            <label class="form-check-label">Print</label>
          </div>
        </div>
        <hr>
      </div>
  `);

  masterCategories.forEach(category => {
      masterDetails.append(`
          <div class="row category-checkbox">
              <div class="col-md-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input master-category" name="masterDetails[]" value="${category.replace(/\s/g, '')}">
                      <label class="form-check-label">${category}</label>
                  </div>
              </div>
              <div class="col-md-1">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="1">
                <label class="form-check-label">View</label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
                <label class="form-check-label">Add</label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
                <label class="form-check-label">Save</label>
              </div>
            </div>
            <div class="col-md-1.5">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
                <label class="form-check-label">DrCrNote</label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
                <label class="form-check-label">Query</label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                <label class="form-check-label">Print</label>
              </div>
            </div>
          </div>
      `);

      $(`.master-category[value^="${category.replace(/\s/g, '')}"]`).change(function () {
        const categoryId = $(this).val();
        const crudDiv = $(`.${categoryId}Crud`);
        if ($(this).is(':checked')) {
            crudDiv.removeClass('hidden');
        } else {
            crudDiv.addClass('hidden');
        }
    });
    
  });

  // Attach change event handler to "Select All" checkboxes for Master category
  $('.select-all-categories').change(function () {
      const isChecked = $(this).is(':checked');
      $('.master-category').prop('checked', isChecked).change();
      
  });

 // Attach change event handler to "Select All" checkboxes for each CRUD operation
 $('.select-all-views').change(function () {
  const isChecked = $(this).is(':checked');
  $('.view-checkbox').prop('checked', isChecked);
});

$('.select-all-adds').change(function () {
  const isChecked = $(this).is(':checked');
  $('.add-checkbox').prop('checked', isChecked);
});

$('.select-all-saves').change(function () {
  const isChecked = $(this).is(':checked');
  $('.save-checkbox').prop('checked', isChecked);
});

$('.select-all-drnotes').change(function () {
  const isChecked = $(this).is(':checked');
  $('.drnote-checkbox').prop('checked', isChecked);
});

$('.select-all-queries').change(function () {
  const isChecked = $(this).is(':checked');
  $('.query-checkbox').prop('checked', isChecked);
});

$('.select-all-prints').change(function () {
  const isChecked = $(this).is(':checked');
  $('.print-checkbox').prop('checked', isChecked);
});
}
/*
|-----------------------------------------------------------------------------------------------------------------------
|  ACCOUNT REPORTS
|---------------------------------------------------------------------------------------------------------------------
*/
function populateReportsCategories() {
  const reportsDetails = $('#reportsDetails');
  reportsDetails.empty();

  // Report subcategories here
  const reportCategories = [
      'Receipt Register Datewise',
      'Receipt Register Brokerwise',
      'Payments Register',
      'DrCr Notes Register',
      'Inter Bank Report',
      'Petty Cash Book',
      'List of Receipts Reversals',
      'Journal Register',
      'General Ledger',
      'Transaction for a period',
      'Cashflow',
      'Accounts Schedule',
      'Agent or Broker or Agency',
      'Reinsurer Statement of Accounts',
      'Misc Category payments',
      'Stamp Duty register Marine',
      'Stamp Duty register Non-Marine',
  ];

  // Add "Select All" checkboxes for report subcategories
  reportsDetails.append(`
      <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
          <div class="col-md-3">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-categories" value="Select All Subcategories">
                  <label class="form-check-label">Select All Subcategories</label>
              </div>
          </div>
          <div class="col-md-1">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-views" value="1">
                  <label class="form-check-label">Views</label>
              </div>
          </div>
          <div class="col-md-1">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-adds" value="Add">
                  <label class="form-check-label">Add</label>
              </div>
          </div>
          <div class="col-md-1">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-saves" value="Save">
                  <label class="form-check-label">Save</label>
              </div>
          </div>
          <div class="col-md-1.5">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-drnotes" value="DrCrNote">
                  <label class="form-check-label">DrCrNote</label>
              </div>
          </div>
          <div class="col-md-1">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-queries" value="Query">
                  <label class="form-check-label">Query</label>
              </div>
          </div>
          <div class="col-md-1">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-prints" value="Print">
                  <label class="form-check-label">Print</label>
              </div>
          </div>
          <hr>
      </div>
  `);

  reportCategories.forEach(category => {
      reportsDetails.append(`
          <div class="row category-checkbox">
              <div class="col-md-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input report-category" name="reportDetails[]" value="${category.replace(/\s/g, '')}">
                      <label class="form-check-label">${category}</label>
                  </div>
              </div>
              <div class="col-md-1">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="1">
                      <label class="form-check-label">View</label>
                  </div>
              </div>
              <div class="col-md-1">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
                      <label class="form-check-label">Add</label>
                  </div>
              </div>
              <div class="col-md-1">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
                      <label class="form-check-label">Save</label>
                  </div>
              </div>
              <div class="col-md-1.5">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
                      <label class="form-check-label">DrCrNote</label>
                  </div>
              </div>
              <div class="col-md-1">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
                      <label class="form-check-label">Query</label>
                  </div>
              </div>
              <div class="col-md-1">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                      <label class="form-check-label">Print</label>
                  </div>
              </div>
          </div>
      `);

      // Attach change event handler to dynamically added checkboxes
      $(`.report-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
          const categoryId = $(this).val();
          const crudDiv = $(`.${categoryId}Crud`);
          if ($(this).is(':checked')) {
              crudDiv.removeClass('hidden');
          } else {
              crudDiv.addClass('hidden');
          }
      });
  });
// Attach change event handler to "Select All" checkboxes for Master category
$('.select-all-categories').change(function () {
  const isChecked = $(this).is(':checked');
  $('.report-category').prop('checked', isChecked).change();
  
});
  // Attach change event handler to "Select All" checkboxes for report subcategories
  $('.select-all-views').change(function () {
    const isChecked = $(this).is(':checked');
    $('.view-checkbox').prop('checked', isChecked);
  });
  
  $('.select-all-adds').change(function () {
    const isChecked = $(this).is(':checked');
    $('.add-checkbox').prop('checked', isChecked);
  });
  
  $('.select-all-saves').change(function () {
    const isChecked = $(this).is(':checked');
    $('.save-checkbox').prop('checked', isChecked);
  });
  
  $('.select-all-drnotes').change(function () {
    const isChecked = $(this).is(':checked');
    $('.drnote-checkbox').prop('checked', isChecked);
  });
  
  $('.select-all-queries').change(function () {
    const isChecked = $(this).is(':checked');
    $('.query-checkbox').prop('checked', isChecked);
  });
  
  $('.select-all-prints').change(function () {
    const isChecked = $(this).is(':checked');
    $('.print-checkbox').prop('checked', isChecked);
  });
}
/*
|------------------------------------------------------------------------------------------------------------------------
| ACCOUNTS MISC 
|------------------------------------------------------------------------------------------------------------------------
*/
function populateMISCategories() {
  const misDetails = $('#misDetails');
  misDetails.empty();

  // MIS subcategories here
  const misCategories = [
      'Trial Balance All Business',
      'Trial Balance General Department',
      'Trial Balance Properties',
      'Management Expenses',
      'MIS Formats',
      'Statutory Reports',
      'Banking Time',
      'Commission Adjustment',
      'Withholding Tax Commissions',
      'Certificate of Commissions',
      'Withholding VAT Returns',
      'Withholding VAT Returns New',
      'VAT on Salvage',
      'Accounts Users Tracker Report',
    ];

  // Add "Select All" checkboxes for MIS category
  misDetails.append(`
      <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
          <div class="col-md-3">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-mis" value="Select All MIS">
                  <label class="form-check-label">Select All MIS</label>
              </div>
          </div>
          <div class="col-md-1">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-views" value="1">
                  <label class="form-check-label">View</label>
              </div>
          </div>
          <div class="col-md-1">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-adds" value="Add">
                  <label class="form-check-label">Add</label>
              </div>
          </div>
          <div class="col-md-1">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-saves" value="Save">
                  <label class="form-check-label">Save</label>
              </div>
          </div>
          <div class="col-md-1.5">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-drnotes" value="DrCrNote">
                  <label class="form-check-label">DrCrNote</label>
              </div>
          </div>
          <div class="col-md-1">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-queries" value="Query">
                  <label class="form-check-label">Query</label>
              </div>
          </div>
          <div class="col-md-1">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-prints" value="Print">
                  <label class="form-check-label">Print</label>
              </div>
          </div>
          <hr>
      </div>
  `);

  misCategories.forEach(category => {
      misDetails.append(`
          <div class="row category-checkbox">
              <div class="col-md-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input mis-category" name="misDetails[]" value="${category.replace(/\s/g, '')}">
                      <label class="form-check-label">${category}</label>
                  </div>
              </div>
              <div class="col-md-1">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="1">
                      <label class="form-check-label">View</label>
                  </div>
              </div>
              <div class="col-md-1">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
                      <label class="form-check-label">Add</label>
                  </div>
              </div>
              <div class="col-md-1">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
                      <label class="form-check-label">Save</label>
                  </div>
              </div>
              <div class="col-md-1.5">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
                      <label class="form-check-label">DrCrNote</label>
                  </div>
              </div>
              <div class="col-md-1">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
                      <label class="form-check-label">Query</label>
                  </div>
              </div>
              <div class="col-md-1">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                      <label class="form-check-label">Print</label>
                  </div>
              </div>
          </div>
      `);

      // Attach change event handler to dynamically added checkboxes
      $(`.mis-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
          const categoryId = $(this).val();
          const crudDiv = $(`.${categoryId}Crud`);
          if ($(this).is(':checked')) {
              crudDiv.removeClass('hidden');
          } else {
              crudDiv.addClass('hidden');
          }
      });
  });
   // Attach change event handler to "Select All" checkboxes for each CRUD operation
   $('.select-all-mis').change(function () {
    const isChecked = $(this).is(':checked');
    $('.mis-category').prop('checked', isChecked).change();
});
// Attach change event handler to "Select All" checkboxes for each CRUD operation
$('.select-all-views').change(function () {
const isChecked = $(this).is(':checked');
$('.view-checkbox').prop('checked', isChecked);
});

$('.select-all-adds').change(function () {
const isChecked = $(this).is(':checked');
$('.add-checkbox').prop('checked', isChecked);
});

$('.select-all-saves').change(function () {
const isChecked = $(this).is(':checked');
$('.save-checkbox').prop('checked', isChecked);
});

$('.select-all-drnotes').change(function () {
const isChecked = $(this).is(':checked');
$('.drnote-checkbox').prop('checked', isChecked);
});

$('.select-all-queries').change(function () {
const isChecked = $(this).is(':checked');
$('.query-checkbox').prop('checked', isChecked);
});

$('.select-all-prints').change(function () {
const isChecked = $(this).is(':checked');
$('.print-checkbox').prop('checked', isChecked);
});
}
/*
|----------------------------------------------------------------------------------------------------------------------
|PROPERTY 
|----------------------------------------------------------------------------------------------------------------------
*/
function populatePropertyCategories() {
  const propertyDetails = $('#propertyDetails');
  propertyDetails.empty();
  // Property categories here
  const propertyCategories = [
      'Tenant Master',
      'Property Receipts',
      'Property Receipts Reversal',
      'Property Payments',
      'Property Payment Reversal',
      'Approval Sheet',
      'Rent Demand Note',
      'Journal',
      'Asset Register',
      'Property Reports',
  ];

  // Add "Select All" checkboxes for each CRUD operation
  propertyDetails.append(`
  <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
  <div class="col-md-3">
      <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-property-categories" value="Select All Categories">
          <label class="form-check-label">Select All Categories</label>
      </div>
  </div>

  <div class="col-md-1">
  <div class="form-check">
    <input type="checkbox" class="form-check-input select-all-views" value="1">
    <label class="form-check-label">Views</label>
  </div>
</div>
<div class="col-md-1">
  <div class="form-check">
    <input type="checkbox" class="form-check-input select-all-adds" value="Add">
    <label class="form-check-label">Add</label>
  </div>
</div>
<div class="col-md-1">
  <div class="form-check">
    <input type="checkbox" class="form-check-input select-all-saves" value="Save">
    <label class="form-check-label">Save</label>
  </div>
</div>
<div class="col-md-1.5">
  <div class="form-check">
    <input type="checkbox" class="form-check-input select-all-drnotes" value="DrCrNote">
    <label class="form-check-label">DrCrNote</label>
  </div>
</div>
<div class="col-md-1">
  <div class="form-check">
    <input type="checkbox" class="form-check-input select-all-queries" value="Query">
    <label class="form-check-label">Query</label>
  </div>
</div>
<div class="col-md-1">
  <div class="form-check">
    <input type="checkbox" class="form-check-input select-all-prints" value="Print">
    <label class="form-check-label">Print</label>
  </div>
</div>
<hr>
  `);

  propertyCategories.forEach(category => {
      propertyDetails.append(`
      <div class="row category-checkbox">
      <div class="col-md-3">
          <div class="form-check">
              <input type="checkbox" class="form-check-input property-category" name="propertyDetails[]" value="${category.replace(/\s/g, '')}">
              <label class="form-check-label">${category}</label>
          </div>
      </div>
      <div class="col-md-1">
      <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
        <input type="checkbox" class="form-check-input view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="1">
        <label class="form-check-label">View</label>
      </div>
    </div>
    <div class="col-md-1">
      <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
        <input type="checkbox" class="form-check-input add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
        <label class="form-check-label">Add</label>
      </div>
    </div>
    <div class="col-md-1">
      <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
        <input type="checkbox" class="form-check-input save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
        <label class="form-check-label">Save</label>
      </div>
    </div>
    <div class="col-md-1.5">
      <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
        <input type="checkbox" class="form-check-input drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
        <label class="form-check-label">DrCrNote</label>
      </div>
    </div>
    <div class="col-md-1">
      <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
        <input type="checkbox" class="form-check-input query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
        <label class="form-check-label">Query</label>
      </div>
    </div>
    <div class="col-md-1">
      <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
        <input type="checkbox" class="form-check-input print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
        <label class="form-check-label">Print</label>
      </div>
    </div>
  </div>
  `);

      // Attach change event handler to dynamically added checkboxes
      $(`.property-category[value="${category.replace(/\s/g, '')}"]`).change(function () {
          const categoryId = $(this).val();
          const crudDiv = $(`.${categoryId}Crud`);
          if ($(this).is(':checked')) {
              crudDiv.removeClass('hidden');
          } else {
              crudDiv.addClass('hidden');
          }
      });
  });

  // Attach change event handler to "Select All" checkboxes for each CRUD operation
  $('.select-all-property-categories').change(function () {
      const isChecked = $(this).is(':checked');
      $('.property-category').prop('checked', isChecked).change();
  });
// Attach change event handler to "Select All" checkboxes for each CRUD operation
$('.select-all-views').change(function () {
  const isChecked = $(this).is(':checked');
  $('.view-checkbox').prop('checked', isChecked);
});

$('.select-all-adds').change(function () {
  const isChecked = $(this).is(':checked');
  $('.add-checkbox').prop('checked', isChecked);
});

$('.select-all-saves').change(function () {
  const isChecked = $(this).is(':checked');
  $('.save-checkbox').prop('checked', isChecked);
});

$('.select-all-drnotes').change(function () {
  const isChecked = $(this).is(':checked');
  $('.drnote-checkbox').prop('checked', isChecked);
});

$('.select-all-queries').change(function () {
  const isChecked = $(this).is(':checked');
  $('.query-checkbox').prop('checked', isChecked);
});

$('.select-all-prints').change(function () {
  const isChecked = $(this).is(':checked');
  $('.print-checkbox').prop('checked', isChecked);
});
}

function populateTransactionCategories() {
  const transactionDetails = $('#transactionDetails');
  transactionDetails.empty();
  
  // Transaction categories here
  const transactionCategories = [
    'Receipts->Premium',
    'Receipts->Others',
    'Receipts->Premium Payments Details',
    'Receipts->Reverse or Cancel Receipt',
    'Policy No Search Via Reg No',

    'Inter Bank Transactions',
    'Intra Bank Transactions',

    'Payments->Policy Related',
    'Payments->Others',
    'Payments->Reverse or Cancel Payment',
    'Payments->Reverse a payment reversal',
    'Payments->Other Payments Approval Sheet',
    'Payments->Payment Authorization',
    'Payments->Cheque Printing',

    'Journal Accounts',
    'Journal Statements',
          'DrCrNotes->Other DrCr Notes Approval Sheet',
          'DrCrNotes->Policy Related DrCr Notes',
          'DrCrNotes->Other DrCr Notes',

    'Invoices',
    'Bordereaux Adjustments',
    'Broker Statements',
    'Re-insurers Statements',
    'Update U/w Commissions',
      'Petty Cash->IOU',
      'Petty Cash Voucher',
      'Petty Cash Reversals',
  ];

  // Add "Select All" checkboxes for each CRUD operation
  transactionDetails.append(`
  <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
  <div class="col-md-3 mr-3">
      <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-transaction-categories" value="Select All Categories">
          <label class="form-check-label">Select All Categories</label>
      </div>
  </div>


  <div class="col-md-1">
  <div class="form-check">
      <input type="checkbox" class="form-check-input select-all-views" value="1">
      <label class="form-check-label">View</label>
  </div>
</div>
<div class="col-md-1">
  <div class="form-check">
      <input type="checkbox" class="form-check-input select-all-adds" value="Add">
      <label class="form-check-label">Add</label>
  </div>
</div>
<div class="col-md-1">
  <div class="form-check">
      <input type="checkbox" class="form-check-input select-all-saves" value="Save">
      <label class="form-check-label">Save</label>
  </div>
</div>
<div class="col-md-1.5">
  <div class="form-check">
      <input type="checkbox" class="form-check-input select-all-drnotes" value="DrCrNote">
      <label class="form-check-label">DrCrNote</label>
  </div>
</div>
<div class="col-md-1">
  <div class="form-check">
      <input type="checkbox" class="form-check-input select-all-queries" value="Query">
      <label class="form-check-label">Query</label>
  </div>
</div>
<div class="col-md-1">
  <div class="form-check">
      <input type="checkbox" class="form-check-input select-all-prints" value="Print">
      <label class="form-check-label">Print</label>
  </div>
</div>
<hr>
</div>
      
  `);

  transactionCategories.forEach(category => {
      transactionDetails.append(`
          <div class="row category-checkbox">
              <div class="col-md-3 mr-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input transaction-category" name="transactionDetails[]" value="${category.replace(/\s/g, '')}">
                      <label class="form-check-label">${category}</label>
                  </div>
              </div>
       
              <div class="col-md-1">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="1">
                <label class="form-check-label">View</label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
                <label class="form-check-label">Add</label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
                <label class="form-check-label">Save</label>
              </div>
            </div>
            <div class="col-md-1.5">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
                <label class="form-check-label">DrCrNote</label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
                <label class="form-check-label">Query</label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                <label class="form-check-label">Print</label>
              </div>
            </div>
          </div>
      `);

 
     
      /*--Debit Credit Notes---*/
     if (category === 'Debit or Credit Notes') {
      const subcategories = [
          'Other DrCr Notes Approval Sheet',
          'Policy Related DrCr Notes',
          'Other DrCr Notes',
     
      ];

      subcategories.forEach(subcategory => {
          transactionDetails.append(`
              <div class="row category-checkbox ml-2 subcategory" style="display: none;">
                  <div class="col-md-3">
                      <div class="form-check">
                          <input type="checkbox" class="form-check-input transaction-subcategory" name="transactionDetails[]" value="${subcategory.replace(/\s/g, '')}">
                          <label class="form-check-label">${subcategory}</label>
                      </div>
                  </div>
                  <div class="col-md-1">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                    <input type="checkbox" class="form-check-input view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="1">
                    <label class="form-check-label">View</label>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                    <input type="checkbox" class="form-check-input add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
                    <label class="form-check-label">Add</label>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                    <input type="checkbox" class="form-check-input save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
                    <label class="form-check-label">Save</label>
                  </div>
                </div>
                <div class="col-md-1.5">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                    <input type="checkbox" class="form-check-input drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
                    <label class="form-check-label">DrCrNote</label>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                    <input type="checkbox" class="form-check-input query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
                    <label class="form-check-label">Query</label>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                    <input type="checkbox" class="form-check-input print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                    <label class="form-check-label">Print</label>
                  </div>
                </div>
              </div>
          `);
      });
  }
  });

  /*--Petty Cash Sub Categories----*/
  
  /*--Transactions Receipts---*/

    // Attach change event handler to dynamically added checkboxes
    $('.transaction-category, .transaction-subcategory').change(function () {
      const isChecked = $(this).is(':checked');
      const subcategories = $(this).closest('.row').nextAll('.subcategory');
      subcategories.toggle(isChecked);

      // Toggle visibility of CRUD checkboxes based on the checked state
      const crudCheckboxes = $(this).closest('.row').find('.crud-checkbox');
      crudCheckboxes.toggle(isChecked);
  });

  // Attach change event handler to "Select All" checkboxes for each CRUD operation
  $('.select-all-transaction-categories').change(function () {
      const isChecked = $(this).is(':checked');
      $('.transaction-category').prop('checked', isChecked).change();
      $('.transaction-subcategory').prop('checked', isChecked).change();
      $('.subcategory').toggle(isChecked);

      // Toggle visibility of all CRUD checkboxes based on the checked state
      $('.crud-checkbox').toggle(isChecked);

      // Attach change event handler to "Select All" checkboxes for each CRUD operation
$('.select-all-views').change(function () {
  const isChecked = $(this).is(':checked');
  $('.view-checkbox').prop('checked', isChecked);
  });
  
  $('.select-all-adds').change(function () {
  const isChecked = $(this).is(':checked');
  $('.add-checkbox').prop('checked', isChecked);
  });
  
  $('.select-all-saves').change(function () {
  const isChecked = $(this).is(':checked');
  $('.save-checkbox').prop('checked', isChecked);
  });
  
  $('.select-all-drnotes').change(function () {
  const isChecked = $(this).is(':checked');
  $('.drnote-checkbox').prop('checked', isChecked);
  });
  
  $('.select-all-queries').change(function () {
  const isChecked = $(this).is(':checked');
  $('.query-checkbox').prop('checked', isChecked);
  });
  
  $('.select-all-prints').change(function () {
  const isChecked = $(this).is(':checked');
  $('.print-checkbox').prop('checked', isChecked);
  });
  });
}
/*
|------------------------------------------------------------------------------------------------------------------------
| ACCOUNTS  RIGHTS END
|------------------------------------------------------------------------------------------------------------------------
*/

/*
|------------------------------------------------------------------------------------------------------------------------
| CLAIMS RIGHTS
|------------------------------------------------------------------------------------------------------------------------
*/

function populateClaimsCategories() {
  const claimsDetails = $('#claimsDetails');
  claimsDetails.empty(); // Clear existing categories

  // Add your Claims categories here
  const claimsCategories = [
      'Claims Entry Sheet',
      'Recoveries Master',
      'Premium Payment Details',
      'Claims Voucher Preparation',
      'Debit or Credit Note Preparation',
      'Provisions Revival and No Claim Preparation',
      'Court Cases',
      'ISB',
      'Miscellaneous Claims Functions',
      'Claims Experience',
      'Claims Paid and Registered Update',
      'Others',
  ];

  claimsDetails.append(`
      <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
          <div class="col-md-3">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-claims" value="Select All Claims">
                  <label class="form-check-label">Select All Claims</label>
              </div>
          </div>
          <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-views" value="1">
            <label class="form-check-label">Views</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-adds" value="Add">
            <label class="form-check-label">Add</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-saves" value="Save">
            <label class="form-check-label">Save</label>
          </div>
        </div>
        <div class="col-md-1.5">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-drnotes" value="DrCrNote">
            <label class="form-check-label">DrCrNote</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-queries" value="Query">
            <label class="form-check-label">Query</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-prints" value="Print">
            <label class="form-check-label">Print</label>
          </div>
        </div>
        <hr>
      </div>
  `);

  claimsCategories.forEach(category => {
      claimsDetails.append(`
          <div class="row category-checkbox">
              <div class="col-md-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input claims-subcategory" name="claimsDetails[]" value="${category.replace(/\s/g, '')}">
                      <label class="form-check-label">${category}</label>
                  </div>
              </div>
              <div class="col-md-1">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="1">
                <label class="form-check-label">View</label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
                <label class="form-check-label">Add</label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
                <label class="form-check-label">Save</label>
              </div>
            </div>
            <div class="col-md-1.5">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
                <label class="form-check-label">DrCrNote</label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
                <label class="form-check-label">Query</label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                <label class="form-check-label">Print</label>
              </div>
            </div>
          </div>
          </div>
      `);

      // Attach change event handler to dynamically added checkboxes
      $(`.claims-subcategory[value="${category.replace(/\s/g, '')}"]`).change(function () {
          const categoryId = $(this).val();
          const crudDiv = $(`.${categoryId}Crud`);
          if ($(this).is(':checked')) {
              crudDiv.removeClass('hidden');
          } else {
              crudDiv.addClass('hidden');
          }
      });
  });

  // Attach change event handler to "Select All" checkboxes for Claims category
  $('.select-all-claims').change(function () {
      const isChecked = $(this).is(':checked');
      $('.claims-subcategory').prop('checked', isChecked).change();
  });
// Attach change event handler to "Select All" checkboxes for each CRUD operation
$('.select-all-views').change(function () {
  const isChecked = $(this).is(':checked');
  $('.view-checkbox').prop('checked', isChecked);
});

$('.select-all-adds').change(function () {
  const isChecked = $(this).is(':checked');
  $('.add-checkbox').prop('checked', isChecked);
});

$('.select-all-saves').change(function () {
  const isChecked = $(this).is(':checked');
  $('.save-checkbox').prop('checked', isChecked);
});

$('.select-all-drnotes').change(function () {
  const isChecked = $(this).is(':checked');
  $('.drnote-checkbox').prop('checked', isChecked);
});

$('.select-all-queries').change(function () {
  const isChecked = $(this).is(':checked');
  $('.query-checkbox').prop('checked', isChecked);
});

$('.select-all-prints').change(function () {
  const isChecked = $(this).is(':checked');
  $('.print-checkbox').prop('checked', isChecked);
});
}

/**---------------------------CLAIMS REPORTS----------------------**/
function populateClaimsReportsCategories() {
  const claimsReportsDetails = $('#claimsReportsDetails');
  claimsReportsDetails.empty(); // Clear existing categories

  // Add your Claims Reports Provisonal Bordereau categories here
  const claimsReportsCategories = [
      'All Classes',
      'Fire',
      'Marine',
      'Motor Matatu',
      'Motor Pool',
      'Motor',
      'WIBA',
      'Miscellaneous',
      'Medical'
  ];
  claimsReportsDetails.append(`
  <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
          <div class="col-md-3">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input select-all-claims-reports" value="Select All Claims">
                  <label class="form-check-label">Select All Claims</label>
              </div>
          </div>
          <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-views" value="1">
            <label class="form-check-label">Views</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-adds" value="Add">
            <label class="form-check-label">Add</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-saves" value="Save">
            <label class="form-check-label">Save</label>
          </div>
        </div>
        <div class="col-md-1.5">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-drnotes" value="DrCrNote">
            <label class="form-check-label">DrCrNote</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-queries" value="Query">
            <label class="form-check-label">Query</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input select-all-prints" value="Print">
            <label class="form-check-label">Print</label>
          </div>
        </div>
        <hr>
      </div>
`);


  claimsReportsCategories.forEach(category => {
      claimsReportsDetails.append(`
          <div class="row category-checkbox">
              <div class="col-md-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input ${category.replace(/\s/g, '')}-category" name="claimsReportsDetails[]" value="${category.replace(/\s/g, '')}">
                      <label class="form-check-label">${category}</label>
                  </div>
              </div>
        
              <div class="col-md-1.5">
                  <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                      <input type="checkbox" class="form-check-input view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="View">
                      <label class="form-check-label">View</label>
                  </div>
              </div>
              <div class="col-md-1">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
                <label class="form-check-label">Add</label>
              </div>
            </div>
              <div class="col-md-1">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
                <label class="form-check-label">Save</label>
              </div>
            </div>
            <div class="col-md-1.5">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
                <label class="form-check-label">DrCrNote</label>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
                <label class="form-check-label">Query</label>
              </div>
            </div>
            <div class="col-md-1.5">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
                <input type="checkbox" class="form-check-input" name="Print[${category.replace(/\s/g, '')}]" value="Print">
                <label class="form-check-label">Print</label>
            </div>
        </div>
          </div>
      `);

      // Attach change event handler to dynamically added checkboxes
      $(`.${category.replace(/\s/g, '')}-category`).change(function () {
          const categoryId = $(this).val();
          const crudDiv = $(`.${categoryId}Crud`);
          if ($(this).is(':checked')) {
              crudDiv.removeClass('hidden');
          } else {
              crudDiv.addClass('hidden');
          }
      });
  });


  // Attach change event handler to "Select All" checkboxes for each CRUD operation
 // Attach change event handler to "Select All" checkboxes for Claims category
 $('.select-all-claims-reports').change(function () {
  const isChecked = $(this).is(':checked');
  $('.category-checkbox input[type="checkbox"]').prop('checked', isChecked).change();
});

//$('.select-all-claims-reports').change(function () {
 // const isChecked = $(this).is(':checked');
 // $('.claims-paid-category').prop('checked', isChecked).change();
//});



// Attach change event handler to "Select All" checkboxes for each CRUD operation
$('.select-all-views').change(function () {
const isChecked = $(this).is(':checked');
$('.view-checkbox').prop('checked', isChecked);
});

$('.select-all-adds').change(function () {
const isChecked = $(this).is(':checked');
$('.add-checkbox').prop('checked', isChecked);
});

$('.select-all-saves').change(function () {
const isChecked = $(this).is(':checked');
$('.save-checkbox').prop('checked', isChecked);
});

$('.select-all-drnotes').change(function () {
const isChecked = $(this).is(':checked');
$('.drnote-checkbox').prop('checked', isChecked);
});

$('.select-all-queries').change(function () {
const isChecked = $(this).is(':checked');
$('.query-checkbox').prop('checked', isChecked);
});

$('.select-all-prints').change(function () {
const isChecked = $(this).is(':checked');
$('.print-checkbox').prop('checked', isChecked);
});
}
/*************CLAIMS PAID BORDEREAU********************* */
function populateClaimsPaidBordereauCategories() {
  const claimsPaidBordereauDetails = $('#claimsPaidBordereauDetails');
  claimsPaidBordereauDetails.empty(); // Clear existing categories

  // ClaimsPaidBordereau subcategories here
  const claimsPaidBordereauCategories = [
    'All Claims Paid',
    'Fire-Marine',
    'Motor',
    'Motor Pool',
    'Matatu',
    'WorkMen Compensation',
    'Bonds',
    'Miscellaneous Excl Bonds',
    'Medical'
  ];

  claimsPaidBordereauDetails.append(`
    <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
      <div class="col-md-3">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-claims-paid-categories" value="Select All Categories">
          <label class="form-check-label">Select All</label>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-claims-paid-views" value="1">
          <label class="form-check-label">Views</label>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-claims-paid-adds" value="Add">
          <label class="form-check-label">Add</label>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-claims-paid-saves" value="Save">
          <label class="form-check-label">Save</label>
        </div>
      </div>
      <div class="col-md-1.5">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-claims-paid-drnotes" value="DrCrNote">
          <label class="form-check-label">DrCrNote</label>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-claims-paid-queries" value="Query">
          <label class="form-check-label">Query</label>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-claims-paid-prints" value="Print">
          <label class="form-check-label">Print</label>
        </div>
      </div>
      <hr>
    </div>
  `);

  claimsPaidBordereauCategories.forEach(category => {
    claimsPaidBordereauDetails.append(`
      <div class="row category-checkbox">
        <div class="col-md-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input claims-paid-category" name="claimsPaidBordereauDetails[]" value="${category.replace(/\s/g, '')}">
            <label class="form-check-label">${category}</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
            <input type="checkbox" class="form-check-input claims-paid-view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="1">
            <label class="form-check-label">View</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
            <input type="checkbox" class="form-check-input claims-paid-add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
            <label class="form-check-label">Add</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
            <input type="checkbox" class="form-check-input claims-paid-save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
            <label class="form-check-label">Save</label>
          </div>
        </div>
        <div class="col-md-1.5">
          <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
            <input type="checkbox" class="form-check-input claims-paid-drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
            <label class="form-check-label">DrCrNote</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
            <input type="checkbox" class="form-check-input claims-paid-query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
            <label class="form-check-label">Query</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
            <input type="checkbox" class="form-check-input claims-paid-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
            <label class="form-check-label">Print</label>
          </div>
        </div>
      </div>
    `);

    $(`.claims-paid-category[value^="${category.replace(/\s/g, '')}"]`).change(function () {
      const categoryId = $(this).val();
      const crudDiv = $(`.${categoryId}Crud`);
      if ($(this).is(':checked')) {
        crudDiv.removeClass('hidden');
      } else {
        crudDiv.addClass('hidden');
      }
    });
  });

  // Attach change event handler to "Select All" checkboxes for ClaimsPaidBordereau category
  $('.select-all-claims-paid-categories').change(function () {
    const isChecked = $(this).is(':checked');
    $('.claims-paid-category').prop('checked', isChecked).change();
  });

  // Attach change event handler to "Select All" checkboxes for each CRUD operation
  $('.select-all-claims-paid-views').change(function () {
    const isChecked = $(this).is(':checked');
    $('.claims-paid-view-checkbox').prop('checked', isChecked);
  });

  $('.select-all-claims-paid-adds').change(function () {
    const isChecked = $(this).is(':checked');
    $('.claims-paid-add-checkbox').prop('checked', isChecked);
  });

  $('.select-all-claims-paid-saves').change(function () {
    const isChecked = $(this).is(':checked');
    $('.claims-paid-save-checkbox').prop('checked', isChecked);
  });

  $('.select-all-claims-paid-drnotes').change(function () {
    const isChecked = $(this).is(':checked');
    $('.claims-paid-drnote-checkbox').prop('checked', isChecked);
  });

  $('.select-all-claims-paid-queries').change(function () {
    const isChecked = $(this).is(':checked');
    $('.claims-paid-query-checkbox').prop('checked', isChecked);
  });

  $('.select-all-claims-paid-prints').change(function () {
    const isChecked = $(this).is(':checked');
    $('.claims-paid-print-checkbox').prop('checked', isChecked);
  });
}
/*******************CLAIMS VOUCHER REPORTS***************************/
function populateClaimsVoucherReportsCategories() {
  const claimsVoucherReportsDetails = $('#claimsVoucherReportsDetails');
  claimsVoucherReportsDetails.empty(); // Clear existing categories

  // ClaimsVoucherReports subcategories here
  const claimsVoucherReportsCategories = [
    'All Classes Excluding Matatu',
    'Matatu',
    'Unpaid',
    'DrCr Notes Monthly Analysis',
    'Claims Crredit Notes Classwise',
    'Claims Credit Notes Brokerwise',
  ];

  claimsVoucherReportsDetails.append(`
    <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
      <div class="col-md-3">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-claims-voucher-categories" value="Select All Categories">
          <label class="form-check-label">Select All</label>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-claims-voucher-views" value="1">
          <label class="form-check-label">Views</label>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-claims-voucher-adds" value="Add">
          <label class="form-check-label">Add</label>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-claims-voucher-saves" value="Save">
          <label class="form-check-label">Save</label>
        </div>
      </div>
      <div class="col-md-1.5">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-claims-voucher-drnotes" value="DrCrNote">
          <label class="form-check-label">DrCrNote</label>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-claims-voucher-queries" value="Query">
          <label class="form-check-label">Query</label>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-claims-voucher-prints" value="Print">
          <label class="form-check-label">Print</label>
        </div>
      </div>
      <hr>
    </div>
  `);

  claimsVoucherReportsCategories.forEach(category => {
    claimsVoucherReportsDetails.append(`
      <div class="row category-checkbox">
        <div class="col-md-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input claims-voucher-category" name="claimsVoucherReportsDetails[]" value="${category.replace(/\s/g, '')}">
            <label class="form-check-label">${category}</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
            <input type="checkbox" class="form-check-input claims-voucher-view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="1">
            <label class="form-check-label">View</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
            <input type="checkbox" class="form-check-input claims-voucher-add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
            <label class="form-check-label">Add</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
            <input type="checkbox" class="form-check-input claims-voucher-save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
            <label class="form-check-label">Save</label>
          </div>
        </div>
        <div class="col-md-1.5">
          <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
            <input type="checkbox" class="form-check-input claims-voucher-drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
            <label class="form-check-label">DrCrNote</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
            <input type="checkbox" class="form-check-input claims-voucher-query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
            <label class="form-check-label">Query</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
            <input type="checkbox" class="form-check-input claims-voucher-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
            <label class="form-check-label">Print</label>
          </div>
        </div>
      </div>
    `);

    $(`.claims-voucher-category[value^="${category.replace(/\s/g, '')}"]`).change(function () {
      const categoryId = $(this).val();
      const crudDiv = $(`.${categoryId}Crud`);
      if ($(this).is(':checked')) {
        crudDiv.removeClass('hidden');
      } else {
        crudDiv.addClass('hidden');
      }
    });
  });

  // Attach change event handler to "Select All" checkboxes for ClaimsVoucherReports category
  $('.select-all-claims-voucher-categories').change(function () {
    const isChecked = $(this).is(':checked');
    $('.claims-voucher-category').prop('checked', isChecked).change();
  });

  // Attach change event handler to "Select All" checkboxes for each CRUD operation
  $('.select-all-claims-voucher-views').change(function () {
    const isChecked = $(this).is(':checked');
    $('.claims-voucher-view-checkbox').prop('checked', isChecked);
  });

  $('.select-all-claims-voucher-adds').change(function () {
    const isChecked = $(this).is(':checked');
    $('.claims-voucher-add-checkbox').prop('checked', isChecked);
  });

  $('.select-all-claims-voucher-saves').change(function () {
    const isChecked = $(this).is(':checked');
    $('.claims-voucher-save-checkbox').prop('checked', isChecked);
  });

  $('.select-all-claims-voucher-drnotes').change(function () {
    const isChecked = $(this).is(':checked');
    $('.claims-voucher-drnote-checkbox').prop('checked', isChecked);
  });

  $('.select-all-claims-voucher-queries').change(function () {
    const isChecked = $(this).is(':checked');
    $('.claims-voucher-query-checkbox').prop('checked', isChecked);
  });

  $('.select-all-claims-voucher-prints').change(function () {
    const isChecked = $(this).is(':checked');
    $('.claims-voucher-print-checkbox').prop('checked', isChecked);
  });
}
/************************ILLICIT CLAIMS REPORT********************************* */
function populateIllicitClaimsCategories() {
  const illicitClaimsDetails = $('#illicitClaimsDetails');
  illicitClaimsDetails.empty(); // Clear existing categories

  // Illicit Claims subcategories here
  const illicitClaimsCategories = [
    'Miscellaneous',
    'Motor Claims'
  ];

  illicitClaimsDetails.append(`
    <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
      <div class="col-md-3">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-illicit-claims-categories" value="Select All Categories">
          <label class="form-check-label">Select All</label>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-illicit-claims-views" value="View">
          <label class="form-check-label">Views</label>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-illicit-claims-adds" value="Add">
          <label class="form-check-label">Add</label>
        </div>
      </div>
      <div class="col-md-1">
      <div class="form-check">
        <input type="checkbox" class="form-check-input select-all-illicit-claims-save" value="Save">
        <label class="form-check-label">Save</label>
      </div>
    </div>
      <div class="col-md-1.5">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-illicit-claims-drnotes value="DrCrNote">
          <label class="form-check-label">DrCrNote</label>
        </div>
      </div>
    
    <div class="col-md-1">
      <div class="form-check">
        <input type="checkbox" class="form-check-input select-all-illicit-claims-query" value="Query">
        <label class="form-check-label">Query</label>
      </div>
    </div>
    <div class="col-md-1">
    <div class="form-check">
      <input type="checkbox" class="form-check-input select-all-illicit-claims-print" value="Print">
      <label class="form-check-label">Print</label>
    </div>
  </div>
      <hr>
    </div>
  `);

  illicitClaimsCategories.forEach(category => {
    illicitClaimsDetails.append(`
      <div class="row category-checkbox">
        <div class="col-md-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input illicit-claims-category" name="illicitClaimsDetails[]" value="${category.replace(/\s/g, '')}">
            <label class="form-check-label">${category}</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
            <input type="checkbox" class="form-check-input illicit-claims-view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="1">
            <label class="form-check-label">View</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
            <input type="checkbox" class="form-check-input illicit-claims-add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
            <label class="form-check-label">Add</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
            <input type="checkbox" class="form-check-input illicit-claims-save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
            <label class="form-check-label">Save</label>
          </div>
        </div>
        <div class="col-md-1.5">
          <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
            <input type="checkbox" class="form-check-input illicit-claims-drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
            <label class="form-check-label">DrCrNote</label>
          </div>
        </div>
  
        <div class="col-md-1">
          <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
            <input type="checkbox" class="form-check-input illicit-claims-query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
            <label class="form-check-label">Query</label>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
            <input type="checkbox" class="form-check-input illicit-claims-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
            <label class="form-check-label">Print</label>
          </div>
        </div>
      </div>
    `);

    $(`.illicit-claims-category[value^="${category.replace(/\s/g, '')}"]`).change(function () {
      const categoryId = $(this).val();
      const crudDiv = $(`.${categoryId}Crud`);
      if ($(this).is(':checked')) {
        crudDiv.removeClass('hidden');
      } else {
        crudDiv.addClass('hidden');
      }
    });
  });

  // Attach change event handler to "Select All" checkboxes for Illicit Claims category
  $('.select-all-illicit-claims-categories').change(function () {
    const isChecked = $(this).is(':checked');
    $('.illicit-claims-category').prop('checked', isChecked).change();
  });

  // Attach change event handler to "Select All" checkboxes for each CRUD operation
  $('.select-all-illicit-claims-views').change(function () {
    const isChecked = $(this).is(':checked');
    $('.illicit-claims-view-checkbox').prop('checked', isChecked);
  });

  $('.select-all-illicit-claims-adds').change(function () {
    const isChecked = $(this).is(':checked');
    $('.illicit-claims-add-checkbox').prop('checked', isChecked);
  });

  $('.select-all-illicit-claims-save').change(function () {
    const isChecked = $(this).is(':checked');
    $('.illicit-claims-save-checkbox').prop('checked', isChecked);
  });

  $('.select-all-illicit-claims-drnotes').change(function () {
    const isChecked = $(this).is(':checked');
    $('.illicit-claims-drnote-checkbox').prop('checked', isChecked);
  });

  $('.select-all-illicit-claims-query').change(function () {
    const isChecked = $(this).is(':checked');
    $('.illicit-claims-query-checkbox').prop('checked', isChecked);
  });

  $('.select-all-illicit-claims-print').change(function () {
    const isChecked = $(this).is(':checked');
    $('.illicit-claims-print-checkbox').prop('checked', isChecked);
  });
}

/******************************************RETAIL REPORTS SUMMARY************************************************************************ */
function populateRetailClaimsSummaryReportsCategories() {
  const retailClaimsSummaryReportsDetails = $('#retailClaimsSummaryReportsDetails');
  retailClaimsSummaryReportsDetails.empty(); // Clear existing categories

  // Retail Claims Summary Reports subcategories here
  const retailClaimsSummaryReportsCategories = [
    'Claims Paid Brokerwise',
    'Claims Paid Classwise',
    'Claims Paid Brokerwise or Classwise'
  ];

  retailClaimsSummaryReportsDetails.append(`
    <div class="row category-checkbox" style="border:1px solid #ffc107; color:green;">
      <div class="col-md-3">
        <div class="form-check">
          <input type="checkbox" class="form-check-input select-all-retail-claims-summary-reports-categories" value="Select All Categories">
          <label class="form-check-label">Select All</label>
        </div>
      </div>
      <div class="col-md-1">
      <div class="form-check">
        <input type="checkbox" class="form-check-input select-all-views" value="1">
        <label class="form-check-label">Views</label>
      </div>
    </div>
    <div class="col-md-1">
      <div class="form-check">
        <input type="checkbox" class="form-check-input select-all-adds" value="Add">
        <label class="form-check-label">Add</label>
      </div>
    </div>
    <div class="col-md-1">
      <div class="form-check">
        <input type="checkbox" class="form-check-input select-all-saves" value="Save">
        <label class="form-check-label">Save</label>
      </div>
    </div>
    <div class="col-md-1.5">
      <div class="form-check">
        <input type="checkbox" class="form-check-input select-all-drnotes" value="DrCrNote">
        <label class="form-check-label">DrCrNote</label>
      </div>
    </div>
    <div class="col-md-1">
      <div class="form-check">
        <input type="checkbox" class="form-check-input select-all-queries" value="Query">
        <label class="form-check-label">Query</label>
      </div>
    </div>
    <div class="col-md-1">
      <div class="form-check">
        <input type="checkbox" class="form-check-input select-all-prints" value="Print">
        <label class="form-check-label">Print</label>
      </div>
    </div>
    <hr>
    </div>
`);

  retailClaimsSummaryReportsCategories.forEach(category => {
    retailClaimsSummaryReportsDetails.append(`
      <div class="row category-checkbox">
        <div class="col-md-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input retail-claims-summary-reports-category" name="retailClaimsSummaryReportsDetails[]" value="${category.replace(/\s/g, '')}">
            <label class="form-check-label">${category}</label>
          </div>
        </div>

        <div class="col-md-1">
        <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
          <input type="checkbox" class="form-check-input claims-voucher-view-checkbox" name="View[${category.replace(/\s/g, '')}]" value="1">
          <label class="form-check-label">View</label>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
          <input type="checkbox" class="form-check-input claims-voucher-add-checkbox" name="Add[${category.replace(/\s/g, '')}]" value="Add">
          <label class="form-check-label">Add</label>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
          <input type="checkbox" class="form-check-input claims-voucher-save-checkbox" name="Save[${category.replace(/\s/g, '')}]" value="Save">
          <label class="form-check-label">Save</label>
        </div>
      </div>
      <div class="col-md-1.5">
        <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
          <input type="checkbox" class="form-check-input claims-voucher-drnote-checkbox" name="DrNote[${category.replace(/\s/g, '')}]" value="DrNote">
          <label class="form-check-label">DrCrNote</label>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
          <input type="checkbox" class="form-check-input claims-voucher-query-checkbox" name="Query[${category.replace(/\s/g, '')}]" value="Query">
          <label class="form-check-label">Query</label>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
          <input type="checkbox" class="form-check-input claims-voucher-print-checkbox" name="Print[${category.replace(/\s/g, '')}]" value="Print">
          <label class="form-check-label">Print</label>
        </div>
      </div>
      </div>
        
    `);

    $(`.retail-claims-summary-reports-category[value^="${category.replace(/\s/g, '')}"]`).change(function () {
      const categoryId = $(this).val();
      const crudDiv = $(`.${categoryId}Crud`);
      if ($(this).is(':checked')) {
        crudDiv.removeClass('hidden');
      } else {
        crudDiv.addClass('hidden');
      }
    });
  });

  // Attach change event handler to "Select All" checkboxes for Retail Claims Summary Reports category
  $('.select-all-retail-claims-summary-reports-categories').change(function () {
    const isChecked = $(this).is(':checked');
    $('.retail-claims-summary-reports-category').prop('checked', isChecked).change();
  });

  // Attach change event handler to "Select All" checkboxes for each CRUD operation
  $('.select-all-views').change(function () {
   const isChecked = $(this).is(':checked');
   $('.claims-voucher-view-checkbox').prop('checked', isChecked);
 });
 
 $('.select-all-adds').change(function () {
   const isChecked = $(this).is(':checked');
   $('.claims-voucher-add-checkbox').prop('checked', isChecked);
 });
 
 $('.select-all-saves').change(function () {
   const isChecked = $(this).is(':checked');
   $('.claims-voucher-save-checkbox').prop('checked', isChecked);
 });
 
 $('.select-all-drnotes').change(function () {
   const isChecked = $(this).is(':checked');
   $('.claims-voucher-drnote-checkbox').prop('checked', isChecked);
 });
 
 $('.select-all-queries').change(function () {
   const isChecked = $(this).is(':checked');
   $('.claims-voucher-query-checkbox').prop('checked', isChecked);
 });
 
 $('.select-all-prints').change(function () {
   const isChecked = $(this).is(':checked');
   $('.claims-voucher-print-checkbox').prop('checked', isChecked);
 });
 }


/*
|---------------------------------------------------------------------------------------------------------------------------
| CLAIMS RIGHTS END
|---------------------------------------------------------------------------------------------------------------------------
*/
function collectFormData() {
  const formData = {
 
    // Main Categories


 

    AllClassesExcludingMatatu: $('AllClassesExcludingMatatuCheckbox').prop('checked'),
    MatatuCheckbox: $('MatatuCheckbox').prop('checked'),
    UnpaidCheckbox: $('UnpaidCheckbox').prop('checked'),
    DrCrNotesMonthlyAnalysisCheckbox: $('DrCrNotesMonthlyAnalysisCheckbox').prop('checked'),
    ClaimsCrNotesCheckbox: $('ClaimsCrNotesCheckbox').prop('checked'),
    ClasswiseCheckbox: $('ClasswiseCheckbox').prop('checked'),
    BrokerwiseCheckbox: $('BrokerwiseCheckbox').prop('checked'),
    MiscellaneousCheckbox: $('MiscellaneousCheckbox').prop('checked'),
    BrokerwiseCheckbox: $('MotorClaims').prop('checked'),

    Fire: $('FireCheckbox').prop('checked'),
    MarineCheckbox: $('MarineCheckbox').prop('checked'),
    paymentsCheckbox: $('paymentsCheckbox').prop('checked'),
    MotorMatatuCheckbox: $('MotorMatatuCheckbox').prop('checked'),
    MotorPoolCheckbox: $('MotorPoolCheckbox').prop('checked'),
    MotorCheckbox: $('MotorCheckbox').prop('checked'),
    WIBACheckbox: $('WIBACheckbox').prop('checked'),
    MiscellaneousCheckbox: $('MiscellaneousCheckbox').prop('checked'),
    MedicalCheckbox: $('MedicalCheckbox').prop('checked'),

    interBankTransactionsCheckbox: $('interBankTransactionsCheckbox').prop('checked'),
    intraBankTransactionsCheckbox: $('intraBankTransactionsCheckbox').prop('checked'),
    paymentsCheckbox: $('paymentsCheckbox').prop('checked'),
    journalAccountsCheckbox: $('journalAccountsCheckbox').prop('checked'),
    journalStatementsCheckbox: $('journalStatementsCheckbox').prop('checked'),
    debitOrCreditNotesCheckbox: $('debitOrCreditNotesCheckbox').prop('checked'),
    invoicesCheckbox: $('invoicesCheckbox').prop('checked'),
    bordereauxAdjustmentsCheckbox: $('bordereauxAdjustmentsCheckbox').prop('checked'),
    brokerStatementsCheckbox: $('brokerStatementsCheckbox').prop('checked'),
    reInsurersStatementsCheckbox: $('reInsurersStatementsCheckbox').prop('checked'),
    updateUWCommissionsCheckbox: $('updateUWCommissionsCheckbox:').prop('checked'),
    pettyCashCheckbox: $('pettyCashCheckbox').prop('checked'),
    receiptsCheckbox: $('receiptsCheckbox').prop('checked'),
    premiumCheckbox: $('receiptsCheckbox').prop('checked'),
    propertyCheckbox: $('#premiumCheckbox').prop('checked'),
    misCheckbox: $('#misCheckbox').prop('checked'),
    masterCheckbox: $('#masterCheckbox').prop('checked'),
    motorCheckbox: $('#motorCheckbox').prop('checked'),
    fireCheckbox: $('#fireCheckbox').prop('checked'),
    marineCheckbox: $('#marineCheckbox').prop('checked'),
    miscCheckbox: $('#miscCheckbox').prop('checked'),
    fireEndorsementCheckbox: $('#fireEndorsementCheckbox').prop('checked'),
    motorEndorsementCheckbox: $('#motorEndorsementCheckbox').prop('checked'),
    marineEndorsementsCheckbox: $('#marineEndorsementsCheckbox').prop('checked'),
    listingCheckbox: $('#listingCheckbox').prop('checked'),
    noticeCheckbox: $('#noticeCheckbox').prop('checked'),
    processMotorCheckbox: $('#processMotorCheckbox').prop('checked'),
    processFireCheckbox: $('#processFireCheckbox').prop('checked'),
    processMiscellaneousCheckbox: $('#processMiscellaneousCheckbox').prop('checked'),
    matatuNewBusinessCheckbox: $('#matatuNewBusinessCheckbox').prop('checked'),
    matatuRenewalsCheckbox: $('#matatuRenewalsCheckbox').prop('checked'),
    matatuEndorsementsCheckbox: $('#matatuEndorsementsCheckbox').prop('checked'),
    motorReportsCheckbox: $('#motorReportsCheckbox').prop('checked'),
    newBusinessReportsCheckbox: $('#newBusinessReportsCheckbox').prop('checked'),
    bordereauxCheckbox: $('#bordereauxCheckbox').prop('checked'),
    bordereauxMarineCheckbox: $('#bordereauxMarineCheckbox').prop('checked'),
    eBordereauxCheckbox: $('#eBordereauxCheckbox').prop('checked'),
    renewalBordereauxCheckbox: $('#renewalBordereauxCheckbox').prop('checked'),
    premiumRegisterCheckbox: $('#premiumRegisterCheckbox').prop('checked'),

  };

  // Collect data for subcategories (Update the selectors accordingly)
  $('.motor-category:checked').each(function () {
    collectSubcategoryData(formData, 'motor', $(this).val());
  });

  $('.marine-category:checked').each(function () {
    collectSubcategoryData(formData, 'marine', $(this).val());
  });

  $('.misc-category:checked').each(function () {
    collectSubcategoryData(formData, 'misc', $(this).val());
  });

  $('.fire-category:checked').each(function () {
    collectSubcategoryData(formData, 'fire', $(this).val());
  });

  $('.master-subcategory:checked').each(function () {
    collectSubcategoryData(formData, 'master', $(this).val());
});
$('.mis-subcategory:checked').each(function () {
  collectSubcategoryData(formData, 'mis', $(this).val());
});
$('.property-subcategory:checked').each(function () {
  collectSubcategoryData(formData, 'property', $(this).val());
});
$('.transaction-subcategory:checked').each(function () {
  collectSubcategoryData(formData, 'transaction', $(this).val());
});
$('.claimsReports-subcategory:checked').each(function () {
  collectSubcategoryData(formData, 'claimsReports', $(this).val());
});
$('. claimsVoucherReports-subcategory:checked').each(function () {
  collectSubcategoryData(formData, ' claimsVoucherReports', $(this).val());
});

  // Collect data for endorsements
  collectEndorsementData(formData, 'motorEndorsement', $('.motorEndorsement-category:checked'));
  collectEndorsementData(formData, 'fireEndorsement', $('.fireEndorsement-category:checked'));
  collectEndorsementData(formData, 'miscellaneous', $('.miscellaneous-category:checked'));
  collectEndorsementData(formData, 'marineEndorsement', $('.marine-endorsement-category:checked'));
  collectEndorsementData(formData, 'listing', $('.listing-category:checked'));
  collectEndorsementData(formData, 'notice', $('.notice-category:checked'));
  collectEndorsementData(formData, 'processMotor', $('.processMotor-category:checked'));
  collectEndorsementData(formData, 'processFire', $('.processFire-category:checked'));
  collectEndorsementData(formData, 'processMiscellaneous', $('.processMiscellaneous-category:checked'));
  collectEndorsementData(formData, 'matatuNewBusiness', $('.matatuNewBusiness-category:checked'));
  collectEndorsementData(formData, 'matatuRenewals', $('.matatuRenewals-category:checked'));
  collectEndorsementData(formData, 'matatuEndorsements', $('.matatuEndorsements-category:checked'));
  collectEndorsementData(formData, 'motorReports', $('.motorReports-category:checked'));
  collectEndorsementData(formData, 'newBusinessReports', $('.newBusinessReports-category:checked'));
  collectEndorsementData(formData, 'bordereaux', $('.bordereaux-category:checked'));
  collectEndorsementData(formData, 'bordereauxMarine', $('.bordereauxMarine-category:checked'));



  return formData;
}




function collectEndorsementData(formData, category, $checkboxes) {
  $checkboxes.each(function () {
    const categoryId = $(this).val();
    formData[`View[${category}${categoryId}]`] = $(`input[name="View[${category}${categoryId}]"]`).prop('checked');
    formData[`Add[${category}${categoryId}]`] = $(`input[name="Add[${category}${categoryId}]"]`).prop('checked');
    formData[`Save[${category}${categoryId}]`] = $(`input[name="Save[${category}${categoryId}]"]`).prop('checked');
    formData[`DrNote[${category}${categoryId}]`] = $(`input[name="DrNote[${category}${categoryId}]"]`).prop('checked');
    formData[`Print[${category}${categoryId}]`] = $(`input[name="Print[${category}${categoryId}]"]`).prop('checked');
    formData[`Query[${category}${categoryId}]`] = $(`input[name="Query[${category}${categoryId}]"]`).prop('checked');
  });
}

function validateForm() {
  const isMotorSelected = $('#motorCheckbox').prop('checked');
  const selectedMotorCategories = $('.motor-category:checked');

  if (isMotorSelected && selectedMotorCategories.length === 0) {
    // Display a red alert for motor category not selected when "Motor" is selected
    alert('Please select at least one motor category when "Motor" is selected.');

    // Scroll to the top of the page (optional)
    $('html, body').animate({
      scrollTop: 0
    }, 500);

    return false; // Prevent form submission
  }

  // ... (other validation checks if needed)

  // If all conditions pass, allow form submission
  return true;
}

// Attach the validateForm function to the form submission event
$('form').submit(function () {
  return validateForm();
});
