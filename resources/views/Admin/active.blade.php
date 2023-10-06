@extends('Admin.app')

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0">Logged in User</h5>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.active')}}">Active Users</a></li>
            <li class="breadcrumb-item">Approved Tickets</li>
          </ol>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
<div class="row">
    @foreach ($activeLogins as $login)
        <div class="col-md-3"> <!-- Adjust the column size as needed -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <p><i class="fa fa-3x fa-user text-secondary"></i>
                        @if ($login->user)
                            {{ $login->user->name }}
                        @else
                            User Not Found
                        @endif
                    </h5>
                    <p class="card-text"><i class="fa fa-calendar text-secondary"></i> Login Time: {{ $login->login_time }}</p>
                    <p class="card-text"><i class="fa fa-clock text-secondary"></i>  Duration: {{ $login->calculateDuration() }} <!-- Adjust this part based on your logic to calculate login duration --></p>
                    @if ($login->isUserActive())
                    <i class="fa fa-circle text-success" aria-hidden="true"></i>
                    <span class="text-success">Active</span>
                    
                @else
                    <span class="text-danger">Inactive</span>
                @endif
                    
                </div>
            </div>
        </div>

        @if ($loop->iteration % 4 == 0) <!-- Add a new row every 5 cards -->
            </div><div class="row">
        @endif
    @endforeach
</div>

@endsection