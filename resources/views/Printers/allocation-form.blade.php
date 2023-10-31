@extends('Admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h5 class="m-0"><span class="fa fa-print"></span>Assign Toners</h5>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('ticket.index')}}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{route('printer.index')}}">Printers</a></li>
               <li class="breadcrumb-item">Toners Assignment</li>
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
      <div class="col-md-9">
         <div class="card card-success" style="padding:20px;">
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ route('toner.allocate') }}">
               @csrf
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="printer">Select Printer:</label>
                     <select name="printer" id="printer" class="form-control">
                        @foreach ($printers as $printer)
                        <option value="{{$printer->Id}}">{{ $printer->PrinterName }}&ensp;{{ $printer->PrinterLocation }}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="toners">Select Toners:</label>
                     <select name="toners[]" id="toners" class="form-control" multiple size="3">
                        @foreach ($toners as $toner)
                        <option value="{{ $toner->id }}">
                           {{ $toner->TonerName }} (Available : {{ $toner->QuantityInStore}})
                        </option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="printer">Receipt Name:</label>
                     <input type="text" class="form-control" name="Recipient" placeholder="Please Input Requester name">
                  </div>
                  <div class="form-group col-md-6">
                     <label for="department">Department</label>
                     <select name="Department" id="Department" class="form-control">
                        @foreach ($departments as $department)
                        <option value="{{$department->DepartmentName}}">{{$department->DepartmentName}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="toners">Quantity</label>
                     <select name="QuantityRequested" class="form-control">
                     <?php
                        for ($i = 1; $i <= 5; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>   
                     </select>
                     <!--Who Assigned Tickets??--->
                     <input type="tex/css" value="{{ Auth::user()->name }}" class="form-control" name="Updated_by" hidden>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary">Allocate Toners</button>
            </form>
         </div> <!-- /.card -->
      </div>
   </div> <!-- /.row -->
</div><!-- /.container-fluid -->
@endsection
