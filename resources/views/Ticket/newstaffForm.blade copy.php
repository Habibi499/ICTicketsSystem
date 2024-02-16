@extends('layouts.app')
@section('content')

<style>
  .hidden {
    display: none;
  }

  .category-checkbox {
    margin-bottom: 5px;
  }

  .crud-checkbox {
    margin-bottom: 5px;
    margin-right: 2%;
  }
</style>

<div class="container mt-4">
    <div class="card card-success mt-5">
        <p>System Rights Requisition</p>
        <div class="row ml-4">
            <!-- Motor Category -->
            <div class="col-md-2">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="motorCheckbox" name="vehicleType" value="motor">
                <label class="form-check-label" for="motorCheckbox">Motor</label>
            </div>
            </div>

            <div class="col-md-10">
            <div id="motorDetails" class="hidden">
                <!-- Motor Categories -->
            </div>
            </div>
        </div>

        <!-- Fire Category -->
        <div class="row ml-4">
            <div class="col-md-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="fireCheckbox" name="vehicleType" value="fire">
                    <label class="form-check-label" for="fireCheckbox">Fire</label>
                </div>
            </div>

            <div class="col-md-10">
                <div id="fireDetails" class="hidden">
                    <!-- Fire Categories -->
                </div>
            </div>
        </div>

        <!-- Fire Category -->
        <div class="row ml-4">
            <div class="col-md-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="marineCheckbox" name="vehicleType" value="Marine">
                    <label class="form-check-label" for="marineCheckbox">Marine</label>
                </div>
            </div>

            <div class="col-md-10">
                <div id="marineDetails" class="hidden">
                    <!-- Fire Categories -->
                </div>
            </div>
        </div>
        

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
         </div>
    </div>
</div>

<script>
  $(document).ready(function() {
    $('#motorCheckbox').change(function() {
      if ($(this).is(':checked')) {
        populateMotorCategories();
        $('#motorDetails').removeClass('hidden');
      } else {
        $('#motorDetails').addClass('hidden');
      }
    });

    $('#fireCheckbox').change(function() {
      if ($(this).is(':checked')) {
        populateFireCategories();
        $('#fireDetails').removeClass('hidden');
      } else {
        $('#fireDetails').addClass('hidden');
      }
    });

    $('#marineCheckbox').change(function() {
      if ($(this).is(':checked')) {
        populateMarineCategories();
        $('#marineDetails').removeClass('hidden');
      } else {
        $('#marineDetails').addClass('hidden');
      }
    });

    $('#saveButton').click(function() {
      const formData = collectFormData();
      console.log(formData);
      // Send data to the server using an AJAX request or traditional form submission
      // ...
    });
  });

  function populateMotorCategories() {
    const motorDetails = $('#motorDetails');
    motorDetails.empty(); // Clear existing categories

    // Add your motor categories here
    const categories = [
      'Private Car',
      'Commercial Vehicle',
      'Motor Cycle',
      'Motor Cycle PSV',
      'Pedal Cycle',
      'Authority to Issue Certificate',
      'Issue Certificate Before Receipting',
      'Issue Certificate',
    ];

    categories.forEach(category => {
      motorDetails.append(`
        <div class="row category-checkbox">
          <div class="col-md-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input motor-category" name="vehicleDetails[]" value="${category.replace(/\s/g, '')}">
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
              <label class="form-check-label">Print</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input" name="Print[${category.replace(/\s/g, '')}]" value="Print">
              <label class="form-check-label">Print</label>
            </div>
          </div>
   
        </div>
      `);

      // Attach change event handler to dynamically added checkboxes
      $(`.motor-category[value="${category.replace(/\s/g, '')}"]`).change(function() {
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

  function populateMarineCategories() {
    const marineDetails = $('#marineDetails');
    marineDetails.empty(); // Clear existing categories

    // Add your motor categories here
    const categories = [
      'Open Cover',
      'Certificate',
      'Policy',
      'Marine Hull',
    ];

    categories.forEach(category => {
      marineDetails.append(`
        <div class="row category-checkbox">
          <div class="col-md-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input motor-category" name="marineDetails[]" value="${category.replace(/\s/g, '')}">
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
              <label class="form-check-label">Print</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-check hidden crud-checkbox ${category.replace(/\s/g, '')}Crud">
              <input type="checkbox" class="form-check-input" name="Print[${category.replace(/\s/g, '')}]" value="Print">
              <label class="form-check-label">Print</label>
            </div>
          </div>
   
        </div>
      `);

      // Attach change event handler to dynamically added checkboxes
      $(`.marine-category[value="${category.replace(/\s/g, '')}"]`).change(function() {
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






  function populateFireCategories() {
    const fireDetails = $('#fireDetails');
    fireDetails.empty(); // Clear existing categories

    // Add your fire categories here
    const fireCategories = [
      'Industrial',
      'Domestic',
      'Fire Consequential Loss',
      'Industrial All Risk',
      'Political Risks Policy',
    ];

    fireCategories.forEach(category => {
      fireDetails.append(`
        <div class="row category-checkbox">
          <div class="col-md-3">
            <div class="form-check">
              <input type="checkbox" class="form-check-input fire-category" name="fireDetails[]" value="${category.replace(/\s/g, '')}">
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
              <label class="form-check-label">Print</label>
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
      $(`.fire-category[value="${category.replace(/\s/g, '')}"]`).change(function() {
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

  function collectFormData() {
    const formData = {
      motorCheckbox: $('#motorCheckbox').prop('checked'),
      fireCheckbox: $('#fireCheckbox').prop('checked'),
      marineCheckbox: $('#marineCheckbox').prop('checked'),
      // Add other checkboxes and data as needed
    };

    $('.motor-category:checked').each(function() {
      const categoryId = $(this).val();
      formData[`View[${categoryId}]`] = $(`input[name="View[${categoryId}]"]`).prop('checked');
      formData[`Edit[${categoryId}]`] = $(`input[name="Edit[${categoryId}]"]`).prop('checked');
      formData[`Print[${categoryId}]`] = $(`input[name="Print[${categoryId}]"]`).prop('checked');
    });

    $('.fire-category:checked').each(function() {
      const categoryId = $(this).val();
      formData[`View[${categoryId}]`] = $(`input[name="View[${categoryId}]"]`).prop('checked');
      formData[`Edit[${categoryId}]`] = $(`input[name="Edit[${categoryId}]"]`).prop('checked');
      formData[`Print[${categoryId}]`] = $(`input[name="Print[${categoryId}]"]`).prop('checked');

    });

    return formData;
  }
</script>

@endsection
