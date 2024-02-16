<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Search Results</title>
      <style>
         table {
         width: 100%;
         border-collapse: collapse;
         }
         table, th, td {
         border: 1px solid black;
         }
         th, td {
         padding: 8px;
         text-align: left;
         }
         th {
         background-color: #f2f2f2;
         }
         .Tickets tr { line-height:20px; }
      </style>
   </head>
   <body>
      <table class="Tickets">
         <tr>
            <td> 
               <img src="{{ public_path('images/OIC_Logo.gif') }}" width="200" height="110" alt="My Image">
            </td>
            <td> 
               <img src="{{ public_path('images/AdminLTELogo.png') }}" width="90" height="90" alt="My Image">ICT Desk I-Tickets
            </td>
         </tr>
         <thead>
            @foreach($filteredItems as $item)
            <tr>
               <th>OCCIDENTAL INSURANCE COMPANY LIMITED</th>
               <th>Ticket No:{{ $item->id }}</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td><strong>Request Category:</strong></td>
               <td>{{ $item->TicketCategory  }}</td>
            </tr>
            <tr>
               <td><strong>Correction Type:</strong></td>
               <td> {{ $item->Correction_Type}}</td>
            </tr>
            <tr>
               <td><strong>Date requested:</strong></td>
               <td>{{ $item->created_at->format('Y-m-d H:i:s')}}</td>
            </tr>
            <tr>
               <td><strong>Section Head:</strong></td>
               <td> {{ $item->Section_Head }}</td>
            </tr>
            <tr>
               <td><strong>Requested  By:</strong></td>
               <td>  {{ $item->section_head1}}</td>
            </tr>
            <tr>
               <td><strong>Approval:</strong></td>
               <td>{{ $item->HodApprovalStatus }}</td>
            </tr>
            <tr>
               <td><strong>Approved By:</strong></td>
               <td>{{ $item->approver->name  }}</td>
            </tr>
            <tr>
               <td><strong>Correction Category:</strong></td>
               <td>    {{ $item->Correction_Dept}}</td>
            </tr>
            <tr>
               <td><strong>Policy No:</strong></td>
               <td>{{ $item->Record_No}}</td>
            </tr>
       
            <tr>
                @if ($item->Correction_Type == 'Renewal')
                    <td><strong>Renewal Number:</strong></td>
                    <td> {{ $item->RenewalNo}}</td>
               @elseif ($item->Correction_Type == 'Endorsement')
               <td><strong>Endorsement Number:</strong></td>
               <td> {{ $item->EndorsementNo}}</td>
               @else
              
               @endif
            </tr>
            <tr style="height:20px;">
               <td><strong>What is Required</strong></td>
               <td> {{ $item->Correction_Details}}</td>
            </tr>
            
            <tr>
               <td><strong>Done By (IT Staff)</strong></td>
               <td>{{ $item->Solvedby}}</td>
            </tr>
            <tr>
               <td><strong>Comments</strong></td>
               <td>{{ $item->ITTechnicianComments}}</td>
            </tr>
            <tr>
               <td><strong>Date Completed</strong></td>
               <td>{{ $item->updated_at->format('Y-m-d H:i:s')}}</td>
            </tr>
            @if($item->documents)
            @php
              $attachments = explode(',', $item->documents);
              $totalAttachments = count($attachments);
             @endphp
          <td><strong>{{ $totalAttachments }}: Document(s) Associated with ticket:</td></strong> 
        
          </span>&ensp;&ensp;
              <td>
                <ul>
                  @foreach($attachments as $index => $attachment)
                      <li>
                          <a href="{{ asset('uploads/' . $attachment) }}" target="_blank">View Document {{ $index + 1 }}</a>
                      </li>
                  @endforeach
                    </ul>
            @else
                No documents associated with this ticket.
            @endif
            </td>
           
         </tbody>

         @endforeach
      </table>
      @include('pdf.footer')
   </body>
</html>