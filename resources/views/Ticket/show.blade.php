@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0"> <i class="fa fa-book"></i>&ensp;My  tickets</h5>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('ticket.index')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('requestedtickets.index')}}">All My Tickets</a></li>
            <li class="breadcrumb-item">View Ticket</li>
          </ol>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
<div class="card-body">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th></th><th>Ticket Number {{$ticket->id}}  Complete Details</th>
                    </tr>
                    <tr>
                        <td>Ticket No</td><td>{{$ticket->id}}</td>
                    </tr>
                    <tr>
                        <td>Requested By</td><td>{{$ticket->section_head1}}</td>
                    </tr>
                        <td>Ticket Title</td><td>{{$ticket->Correction_Type}}</td>

                    </tr>
                    <tr>
                        <td>Record Number</td><td>{{$ticket->Record_No}}</td>
                    </tr>
                    <tr>
                        <td>Correction Details</td><td>{{$ticket->Correction_Details}}</td>
                    </tr>

                    <tr>
                        <td>
                            Attachments
                        </td>
                        <td>
                        @if($ticket->documents)
                        <a href="{{ asset('uploads/' . $ticket->documents) }}" target="_blank">View Attachments</a>
                         @else
                        No document associated with this ticket.
                         @endif
                        </td>

                    </tr>
                 
                        <td>Ticket Status</td><td>{{$ticket->TicketStatus}}</td>
                    </tr>

                    <tr>
                        <td>Approval Status</td><td>{{$ticket->HodApprovalStatus}}</td>
                    </tr>
                    <tr>
                        <td>Approver By</td><td>{{$ticket->approver->name}}</td>
                    </tr>
                    <tr>
                        <td>Assigned to:</td><td>{{$ticket->approver->name}}</td>
                    </tr>
                    <tr>
                        <td>Solved By:</td><td>{{$ticket->Solvedby}}</td>
                    </tr>
                    <tr>
                        <td>Technician Comments</td><td>{{$ticket->ITTechnicianComments}}</td>
                    </tr>
                </table>
        </div>
</div>
</div>
@endsection