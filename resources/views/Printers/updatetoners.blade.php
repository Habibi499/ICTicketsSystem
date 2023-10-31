@extends('Admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h5 class="m-0"><span class="fa fa-print"></span>&ensp;Update Toners in Store</h5>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('ticket.index')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('printer.index')}}">Printers</a></li>
               <li class="breadcrumb-item"><a href="{{route('toner.allocate')}}">Assign Toners</a></li>
               <li class="breadcrumb-item">Update Toners Stock</li>
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
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        
        
            <form method="post" action="{{ route('printer.updatetoners.edit') }}">
               @csrf
               <div class="form-group col-md-8">
                   <label for="toner">Select Toner:</label>
                   <select name="toner" id="toner" class="form-control">
                       <option value="" disabled>Select a Toner</option>
                       @foreach ($toners as $toner)
                           <option value="{{ $toner->id }}" data-quantity="{{ $toner->QuantityInStore }}">
                               {{ $toner->TonerName }} (Available: {{ $toner->QuantityInStore }})
                           </option>
                       @endforeach
                   </select>
               </div>
               @error('toner')
               <span class="text-danger">{{ $message }}</span>
               @enderror
           
               <div class="form-group col-md-8">
                   <label for="quantity">Enter Quantity:</label>
                   <input type="number" name="QuantityInStore" id="quantity" class="form-control" min="1">
            
               @error('QuantityInStore')
               <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>
               <button type="submit" class="btn btn-success">Update Toner Quantity &ensp;<i class="fa fa-upload"></i></button>
           </form>
           
           

             
         </div> <!-- /.card -->
      </div>
   </div> <!-- /.row -->
</div><!-- /.container-fluid -->
@endsection
