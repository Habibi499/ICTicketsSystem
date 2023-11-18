@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Search Results</h2>

        <form action="{{ route('search') }}" method="get">
            <input type="text" name="query" value="{{ $query ?? '' }}" placeholder="Search...">
            <button type="submit">Search</button>
        </form>

        @if ($filteredItems->isNotEmpty())
            <a href="{{ route('search', ['query' => $query ?? '', 'export' => true]) }}" class="btn btn-primary">Export to PDF</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Section Head</th>
                        <th>HOD Approval Status</th>
                        <th>Ticket Status</th>
                        <th>Record No</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filteredItems as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->section_head1 }}</td>
                            <td>{{ $item->HodApprovalStatus }}</td>
                            <td>{{ $item->TicketStatus }}</td>
                            <td>{{ $item->Record_No }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No results found.</p>
        @endif
    </div>
@endsection
