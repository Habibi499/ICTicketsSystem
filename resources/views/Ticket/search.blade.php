@extends('layouts.app')

@section('content')
<div class="content-header">
    <!-- ... (Your existing content header) ... -->
</div>

<div class="content">
    <!-- ... (Your existing content) ... -->
    <div class="row" style="margin-top:16px;margin-bottom:12px;">
        <div class="col-md-6">
          <h5>My Tickets</h5>
         
        </div>

        <div class="col-md-4">
          <form id="searchForm" action="{{ route('ticket.search') }}" method="GET">
            <div class="input-group">
              <div class="form-outline">
                <input type="text" name="query" class="form-control" placeholder="Search Ticket...">
              </div>  
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-search"></i>

                </button>
              </div>
          
        </form>

        </div>
      </div>
      
    <div class="row">
        <div class="col-md-11">
            <div id="tableContainer">

                <div id="searchResults">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            
                        <tr>
                          <th>Ticket_No</th>
                          <th>Ticket_Urgency</th>
                          <th>requester</th>
                          <th>Ticket Details</th>
                          <th>Approved Status</th>
                          <th>Selected Approver</th>
                          <th>Assigned to</th>
                          <th>Ticket Status</th>
                          <th>Created on</th>
                          <th>View</th>
             
                        </tr>
                        </thead>
                                @foreach ($filteredItems as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->Ticket_Urgency}}</td>
                                    <td>{{$item->section_head1}}</td>
                                    <td>{{$item->Record_No}}</td>
                                    <td>{{$item->HodApprovalStatus}}</td>
                                    @if($item->approver)
                                    <td>{{$item->approver->name}}</td>
                                    @else
                                    <td></td>
                                    @endif
                                    @if($item->assignedAdmin)
                                    <td>{{$item->assignedAdmin->name}}</td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{$item->TicketStatus}}</td>
                                    @if ($item->created_at)
                                    <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                                    @else
                                    <td>No date available</td>
                                    @endif
                                    <td><a href="{{route('tickets.show',$item->id)}}">View</a></td>
                                </tr>
                                @endforeach

                </div>

                <table id="example1" class="table table-bordered table-striped">
                    
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript code for handling the AJAX request and updating the results container
</script>
@endsection
