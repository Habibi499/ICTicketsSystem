@extends('Admin.app')
@section('content')
<div class="container-fluid">
    <div class="row mb-2">
       <div class="col-sm-6">
          <h5 class="m-0">Tickets Life Cycle</h5>
       </div>
       <!-- /.col -->
       <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
             <li class="breadcrumb-item"><a href="{{route('admin.statistics')}}">Analysis</a></li>
             <li class="breadcrumb-item"><a href="{{route('admin.ticketlifecycle')}}">Tickets Life Cycle</a></li>
             <li class="breadcrumb-item active">Dashboard</li>
          </ol>
       </div>
       <!-- /.col -->
    </div>
    <!-- /.row -->
 </div>
 <!-- /.container-fluid -->
 <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
       <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
          <div class="info-box-content">
             <span class="info-box-text">Total Tickets in System</span>
             <span class="info-box-number">
             {{$ticketsCount}}
             <small></small>
             </span>
          </div>
       </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
       <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>
          <div class="info-box-content">
             <span class="info-box-text">Approved Tickets</span>
             <span class="info-box-number">{{$approvedTicketCount }}</span>
          </div>
       </div>
    </div>
    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-6 col-md-3">
       <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
             <span class="info-box-text">Rejected Tickets Count</span>
             <span class="info-box-number">{{$RejectedTicketCounts }}</span>
          </div>
       </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
       <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-thumbs-down"></i></span>
          <div class="info-box-content">
             <span class="info-box-text">Unapproved</span>
             <span class="info-box-number">{{$UnapprovedTicketCounts}}</span>
          </div>
       </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
       <div class="info-box mb-3">
          <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-close"></i></span>
          <div class="info-box-content">
             <span class="info-box-text">Approved and open</span>
             <span class="info-box-number">{{$OpenTicketCount }}</span>
          </div>
       </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
       <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
             <span class="info-box-text">AssignedTicketCount</span>
             <span class="info-box-number">{{$AssignedTicketCount}}</span>
          </div>
       </div>
    </div>
 </div>
 <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
       <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>
          <div class="info-box-content">
             <span class="info-box-text">Total Closed Tickets</span>
             <span class="info-box-number">{{$ClosedTicketCount}}</span>
          </div>
       </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
       <div class="info-box mb-3">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-check"></i></span>
          <div class="info-box-content">
             <span class="info-box-text">Total Pending Tickets</span>
             <span class="info-box-number">{{$PendingTicketCount}}</span>
          </div>
       </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
       <div class="info-box mb-3 bg-info">
          <span class="info-box-icon"><i class="fa fa-user"></i></span>
          <div class="info-box-content">
             <span class="info-box-text">All Registered Users</span>
             <span class="info-box-number">{{$UsersCount }}</span>
          </div>
       </div>
    </div>
 </div>
 </div>
 @endsection