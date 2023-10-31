@extends('Admin.app')
@section('content')
<style type="text/css">
   @keyframes blink {
   0%, 100% { background-color: inherit; }
   50% { background-color: yellow; }
   }
   .blink-row {
   animation: blink 1s infinite;
   }
   /* Define background colors for different toner quantity levels */
   .table-danger {
   background-color:#FF6384;
   color: white; /* Optional: Change text color for better visibility */
   }
   .table-success {
   background-color: #7ebb2b;
   color: white; /* Optional: Change text color for better visibility */
   }
</style>
<div class="row">
   <div class="col-md-12">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h6 class="m-0">Catridges Stock</h6>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{route('printer.assigntoners')}}">Assign Toner</a></li>
               <li class="breadcrumb-item">Toners Stock by printer</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<div class="row">
   <div class="col-md-8">
      <!-- Adjust the column size as needed -->
      <div class="card">
         <div class="card-header border-transparent">
            <h3 class="card-title">Toners Levels in Store</h3>
            <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse">
               <i class="fas fa-minus"></i>
               </button>
               <button type="button" class="btn btn-tool" data-card-widget="remove">
               <i class="fas fa-times"></i>
               </button>
            </div>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th colspan="7">
                           <div class="btn-group" role="group" aria-label="Basic example">
                              <button type="button" class="btn btn-info btn-sm">
                              <a href="{{ route('printer.updatetoners') }}" style="color:white;">Update Toners Stock &ensp;<i class="fa fa-upload"></i></button>
                              |
                              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#statusModal">
                              <a href="{{ route('pdf.generate-pdf') }}" style="color:white;">Export Toner Levels Report &ensp;<i class="fa fa-download"></i></a>
                              </button>
                           </div>
                        </th>
                     </tr>
                  </thead>
                  <thead >
                     <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Model</th>
                        <th>Location</th>
                        <th>Toner Name</th>
                        <th>Quantity</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     @php
                     $counter = 1; //Initialize counter 
                     @endphp
                     @foreach ($printers as $printer)
                     <tr>
                        <td>{{ $counter++ }}</td>
                        <!-- Increment and display the counter -->
                        <td>{{ $printer->PrinterName }}</td>
                        <td>{{ $printer->PrinterModel }}</td>
                        <td>{{ $printer->PrinterLocation }}</td>
                        <td>
                           <table class="table" style="width:165%">
                              <tbody>
                                 @foreach ($printer->Toners as $toner)
                                 <tr style="width:180%">
                                    <td>{{ $toner->TonerName }}</td>
                                    <td>{{ $toner->TonerQuantity }}</td>
                                    <td class="level-cell
                                       {{ $toner->TonerQuantity < 1 ? 'table-danger' : ($toner->TonerQuantity > 3 ? 'table-success' : '') }}">
                                       <!-- This is where you can set the background color for the level status -->
                                       @if ($toner->TonerQuantity < 1)
                                       Depleted
                                       @elseif ($toner->TonerQuantity > 3)
                                       Sufficient
                                       @else
                                       Normal
                                       @endif
                                    </td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
         <!--Card Body-->
         <div class="card-footer clearfix">
            <a href="{{route('alltickets.index')}}" class="btn btn-sm btn-secondary float-right">View All
            Tickets</a>
         </div>
         <!--Card Footer-->
      </div>
      <!---Card End-->
   </div>
   <!---Column End--->
   <div class="col-md-4">
      <div class="card">
         <div class="card-title" style="background:#00ae5b; color:white;">
            
            <h3 class="card-title" style="margin:10px 20px;">Latest Toners Assigment</h3>
            
         </div>
         <div class="card-body">
            <table class="table m-0">
               <thead>
                  <tr>
                     <th>Name</th>
                     <th>Quantity </th>
                     <th>Assigned By</th>
                  </tr>
               </thead>
               @foreach ($TonersAssigneds as $TonersAssigned)
               <tr>
                  <td>{{$TonersAssigned->ItemName}}</td>
                  <td>{{$TonersAssigned->QuantityRequested}}</td>
                  <td>{{$TonersAssigned->Updated_by}}</td>
               </tr>
               @endforeach
            </table>
         </div>
         <!--Card Body-->
         <div class="card-footer clearfix">
            <a href="{{route('alltickets.index')}}" class="btn btn-sm btn-secondary float-right">View All
            Tickets</a>
         </div>
      </div>
      <!---Card End-->
   </div>
   <!---Column End--->
</div>
@endsection