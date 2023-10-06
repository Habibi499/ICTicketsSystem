@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0">Password Change Request</h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('ticket.index')}}">Home</a></li>
              <li class="breadcrumb-item">Password</li>
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
        <!-- jquery validation -->

        <div class="card card-success">
      
          <!-- /.card-header -->
          <!-- form start -->
          <form id="quickForm" action="{{route("passwordchange.post")}}" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="Requester">Requested By</label>
                      <input type="text" name="Section_Head1" class="form-control" id="RequesterName" value=" {{ Auth::user()->name }}" readonly>           
                     
                    </div>
                </div>
                  <div class="col-md-6">
                    <label for="Section-Head">Section Head</label>
                    <input type="text" name="Section_Head" class="form-control" id="SectionHead" value="{{ $headOfDepartment }}" readonly>
                  </div>
                </div>
                <div class="form-group">
                  
                  <input type="text" name="TicketCategory" class="form-control" id="TicketCategory" value="Password_Change" hidden>           
              </div>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="SystemName">System Name</label>
                      <select class="form-control" id="SystemName" name="SystemName" >
                        <option value="">---Select---</option>
                        <option value="Genesys">Genesys</option>
                        <option value="Exodus">Exodus</option>
                        <option value="Genesys">CMS</option>
                        <option value="Exodus">Marine Portal</option>
                        <option value="Genesys">Agilis</option>
                  
                      </select>
                      @error('SystemName')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                  
                    </div>
                  </div>

                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="Username">User name</label>
                      <input type="text" name="UserName" class="form-control" id="userName" placeholder="Enter Your UserName for">
                      @error('UserName')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
              </div>

        
         
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
        </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-6">

      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->




@endsection