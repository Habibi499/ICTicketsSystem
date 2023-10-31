<!DOCTYPE html>
<html>
<head>
    <title>PDF Export</title>
    <style>
        /* Define your CSS styles here for the PDF content */
        /* For example, you can add table styling */
        body {
            background-color: #f0f0f0;
            width:100%
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid rgb(51, 53, 47);
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .dark-bg {
            background-color: #4ea47b;
            color: #fff;
        }
        .striped-table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
        <P><center>Toners Stock Levels as at:&ensp;&ensp;{{ $currentTime }}</center></P>
    </div>
   
    
    <table class="striped-table">
      
        <thead style="background-color:#7ebb2b; color:white;">
            <tr>
                <th>Name</th>
                <th>Model</th>
                <th>Location</th>
                <th>Toner Name</th>
                <th>Quantity in store</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach($printers as $printer)
                <tr>
                    <td>{{ $printer->PrinterName }}</td>
                    <td>{{ $printer->PrinterModel }}</td>
                    <td>{{ $printer->PrinterLocation }}</td>
                    <td>
                        @foreach($printer->Toners as $toner)
                            {{ $toner->TonerName }}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($printer->Toners as $toner)
                            {{ $toner->TonerQuantity }}<br>
                        @endforeach
                    </td>
                 
                </tr>
            @endforeach
        </tbody>

      
    </table>

    
    @include('pdf.footer')
</body>
</html>
