@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">{{ __('Dashboard') }}</h1>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card" style="padding-left: 20px; padding-top:10px;">
               <div class="row">
                  <div class="col-12 col-sm-6 col-md-3">
                     <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1">{{$tickets->total()}}</span>
                        <div class="info-box-content">
                           <a href="{{route('requestedtickets.index')}}">
                           <span class="info-box-text">My Tickets</span>
                           </a>
                        </div>
                        <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                  <div class="col-12 col-sm-6 col-md-3">
                     <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"> {{ $approvedTicketCount }}</span>
                        <div class="info-box-content">
                           <span class="info-box-text">Approved Tickets</span>
                           </a>
                        </div>
                        <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                  </div>
                  <!-- fix for small devices only -->
                  <div class="clearfix hidden-md-up"></div>
                  <div class="col-12 col-sm-6 col-md-3">
                     <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1">{{$UnapprovedTicketCount}}</span>
                        <div class="info-box-content">
                           <a href="{{route('unapprovedTickets.index')}}">
                           <span class="info-box-text">Unapproved Tickets</span>
                           </a>
                        </div>
                        <!-- /.info-box-content -->
                     </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-2">
                     <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1">{{ $AssignedTicketCount}}</span>
                        <div class="info-box-content">
                           <span class="info-box-text">Assigned</span>
                           <span class="info-box-number">
                           </span>
                        </div>
                        <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                  </div>
               </div>
               <div class="row" style="margin-top:16px;">
                  <div class="col-md-6">
                     <h5>My Ticketing Catalogue</h5>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="card" id="fcard">
                        <div class="card-header">{{ __('') }}</div>
                        <div class="card-body">
                           <div class="row justify-content-center">
                              <div class="col-md-6 tree-box">
                                  <p><i class="fa fa-check"></i>&ensp;Genesys Correction Forms</p>
                                  <div class="line line-top-to-box1"></div>
                                  <div class="line line-top-to-box2"></div>
                                  <div class="line line-top-to-box3"></div>
                              </div>
                          </div>
                          <div class="row justify-content-center">
                              <div class="col-md-3 sub-box">
                                  <a href="{{route('ticket.accountsform')}}">Accounts Corrections</a>
                              </div>
                              <div class="col-md-3 sub-box">
                                 <a href="{{route('ticket.create')}}">UnderWriting or Re-insurance</a> 
                              </div>
                              <div class="col-md-3 sub-box">
                                 <a href="{{route('ticket.create')}}">Claims or Legal</a>
                              </div>
                          </div>
                      </div>
                          
                        </div>
                     </div>
                

                 <!-- <div class="col-md-4">
                     <div class="card" id="fcard">
                        <div class="card-header">{{ __('') }}</div>
                        <div class="card-body">
                           <i class="fa fa-2x fa-check success"></i>
                           <a href="{{route('ticket.create')}}">
                              <p>Genesys Correction Form</p>
                           </a>
                        </div>
                     </div>
                  </div>-->
                  

                  <div class="col-md-4">
                     <div class="card" id="fcard">
                        <div class="card-header">{{ __('') }}</div>
                        <div class="card-body">
                           <a href="{{route('passwordchange.index')}}">
                              <i class="fa fa-2x fa-question-circle"></i>
                              <p>Password Change Request Form</p>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>
@endsection