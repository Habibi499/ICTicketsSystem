@extends('Admin.app')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0"><span class="fa fa-print"></span>Printers Creation</h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('ticket.index')}}">Home</a></li>
              <li class="breadcrumb-item">Add Printer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<div class="container-fluid">
    <div class="row justify-content-center">
      <!-- left column -->
      
      <div class="col-md-8">


        <div class="card card-success">
      
          <!-- /.card-header -->
          <!-- form start -->
          <form id="TicketForm" action="{{route('printer.post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="RequesterName">Created By</label>
                      <input type="text" name="section_head1" class="form-control" id="RequesterName" value=" {{ Auth::user()->name }}" readonly>           
                  </div>
                </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="PrinterName">Printer Name</label>
               <input type="text" name="PrinterName" class="form-control" id="PrinterName" placeholder="Printer Name" value="{{old('PrinterName')}}">
                @error('PrinterName')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
              <div class="form-group">
                <label for="PrinterModel">Printer Model</label>
               <input type="text" name="PrinterModel" class="form-control" id="PrinterModel" placeholder="Printer Model" value="{{old('PrinterModel')}}">
                @error('PrinterModel')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              </div>
            
              <div class="col-md-6">
              <div class="form-group">
                <label for="PrinterLocation">Printer Location</label>
               <input type="text" name="PrinterLocation" class="form-control" id="PrinterLocation" placeholder="Record No" value="{{old('Record_No')}}">
                @error('PrinterLocation')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            </div>

              <div class="form-group">
                <label for="PrinterIPaddress">Printer IP address</label>
               <input type="text" name="PrinterIPaddress" class="form-control" id="PrinterIPaddress" placeholder="Printer IP Address" value="{{old('PrinterIPaddress')}}">
                @error('PrinterIPaddress')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            
              <div class="form-group">
                <label for="ticket_categories">Printer Toners</label>
                <select class="form-control"  name="ticket_categories[]" id="printerOptions" multiple >
    
                    <optgroup label="C5870i">
                        <option value="C5870i Black">C5870i Black</option>
                        <option value="C5870i Yellow">C5870i Yellow</option>
                        <option value="C5870i Cyan">C5870i Cyan</option>
                        <option value="C5870i Magenta">C5870i Magenta</option>
                    </optgroup>
                    <optgroup label="205A">
                        <option value="205A Cyan">205A Cyan</option>
                        <option value="205A Magenta">205A Magenta</option>
                        <option value="205A Yellow">205A Yellow</option>
                        <option value="205A Black">205A Black</option>
                    </optgroup>
                    <optgroup label="963">
                        <option value="963 Yellow">963 Yellow</option>
                        <option value="963 Black">963 Black</option>
                        <option value="963 Magenta">963 Magenta</option>
                        <option value="963 Cyan">963 Cyan</option>
                    </optgroup>
                    <optgroup label="415A">
                        <option value="415A Yellow-W2033A">415A Yellow-W2033A</option>
                        <option value="415A Magenta-W2033A">415A Magenta-W2033A</option>
                        <option value="415A Cyan-W2031A">415A Cyan-W2031A</option>
                        <option value="415A Black-W2030A">415A Black-W2030A</option>
                    </optgroup>
                    <optgroup label="103">
                        <option value="103 Black">103 Black</option>
                        <option value="103 Yellow">103 Yellow</option>
                        <option value="103 Magenta">103 Magenta</option>
                        <option value="103 Cyan">103 Cyan</option>
                    </optgroup>
                    <optgroup label="TK - 5280">
                        <option value="TK - 5280 Black">TK - 5280 Black</option>
                    </optgroup>
                </select>
              
           
            </div>

            <div id="toner-quantities">
              <!-- Toner quantities input fields will be generated dynamically based on the selected toners. -->
            </div>
           
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>

       
        

        </div>
        <!-- /.card -->
        </div>
      <!--/.col (left) -->
      <!-- right column -->
    
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->


  <script>
    // Add an event listener to update toner quantities input fields when toners are selected.
    document.getElementById('printerOptions').addEventListener('change', function () {
      const selectedToners = Array.from(this.selectedOptions, option => option.value);

      const tonerQuantities = document.getElementById('toner-quantities');

      // Remove existing toner quantities input fields.
      while (tonerQuantities.firstChild) {
        tonerQuantities.removeChild(tonerQuantities.firstChild);
      }

      // Create toner quantities input fields based on selected toners.
      selectedToners.forEach(toner => {
        const inputGroup = document.createElement('div');
        inputGroup.className = 'form-group';

        const label = document.createElement('label');
        label.textContent = `Quantity for ${toner}`;
        label.htmlFor = `quantity_${toner}`;

        const input = document.createElement('input');
        input.type = 'text';
        input.name = `toner_quantities[${toner}]`;
        input.id = `quantity_${toner}`;
        input.className = 'form-control';

        inputGroup.appendChild(label);
        inputGroup.appendChild(input);

        tonerQuantities.appendChild(inputGroup);
      });
    });
  </script>



@endsection