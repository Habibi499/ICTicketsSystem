@extends('Admin.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   <h6 class=""><a href="{{route('admin.index')}}"><i class="fa fa-arrow-left"></i>&nbsp;Go Back</a></h6>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="card-body">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th></th><th>Invoice Number {{$ticket->id}}  Complete Details</th>
                    </tr>
                    <tr>
                        <td>ID</td><td>{{$ticket->id}}</td>
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
                        <td>Attachments </td>

                        <td>
                            @if($ticket->documents)
                            <a href="{{asset('uploads/'. $ticket->documents)}}" target="_blank">View Attachments</a>
                            @else
                            No Documents Attached to this Request
                            @endif
                        </td>

                    </tr>
                 
                        <td>Ticket Status</td><td>{{$ticket->TicketStatus}}</td>
                    </tr>

                    <tr>
                        <td>Approval Status</td><td>{{$ticket->HodApprovalStatus}}</td>
                    </tr>
                
                </table>
        </div>
</div>
</div>
@endsection