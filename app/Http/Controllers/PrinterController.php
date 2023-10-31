<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Printer;
use App\Models\TonersRequest;
use App\Models\Toner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades;

use PDF;

class PrinterController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        DB::enableQueryLog();
        $TonersAssigneds= TonersRequest::orderby('id','desc')
                         ->paginate(6);
        //query to fetch printer and toner data
        $query = "
        SELECT
            printers.id AS printer_id,
            printers.PrinterName,
            printers.PrinterModel,
            printers.PrinterLocation,
            printers.PrinterIPaddress,
            toners.TonerName,
            toners.QuantityInStore
        FROM printers
        LEFT JOIN toners ON printers.id = toners.printer_id
        ORDER BY printer_id DESC;
        ";

        $results = DB::select($query); // Fetch the raw results from the database

        $printers = []; // Organize the data
        foreach ($results as $result) {
            $printerId = $result->printer_id;
            if (!isset($printers[$printerId])) {
                $printers[$printerId] = (object) [
                    "PrinterName" => $result->PrinterName,
                    "PrinterModel" => $result->PrinterModel,
                    "PrinterLocation" => $result->PrinterLocation,
                    "PrinterIPaddress" => $result->PrinterIPaddress,
                    "Toners" => [],
                ];
            }
            $printers[$printerId]->Toners[] = (object) [
                "TonerName" => $result->TonerName,
                "TonerQuantity" => $result->QuantityInStore,
            ];
        }

        $queries = DB::getQueryLog();

        //Toners Allocated

        return view("Printers.index", compact("printers","TonersAssigneds"));
    }
    //------------Export Data to PDF--------------------------//
    public function generatePDF()
    {
        // Get the current time
        $currentTime = date("d-m-Y H:i:s");
        $user = auth()->user();
        $query = "
    SELECT
        printers.id AS printer_id,
        printers.PrinterName,
        printers.PrinterModel,
        printers.PrinterLocation,
        printers.PrinterIPaddress,
        toners.TonerName,
        toners.QuantityInStore
    FROM printers
    LEFT JOIN toners ON printers.id = toners.printer_id
    ORDER BY printer_id DESC;
    ";

        $results = DB::select($query);
        $printers = [];
        foreach ($results as $result) {
            $printerId = $result->printer_id;
            if (!isset($printers[$printerId])) {
                $printers[$printerId] = (object) [
                    "PrinterName" => $result->PrinterName,
                    "PrinterModel" => $result->PrinterModel,
                    "PrinterLocation" => $result->PrinterLocation,
                    "PrinterIPaddress" => $result->PrinterIPaddress,
                    "Toners" => [],
                ];
            }
            $printers[$printerId]->Toners[] = (object) [
                "TonerName" => $result->TonerName,
                "TonerQuantity" => $result->QuantityInStore,
            ];
        }
        $pdf = PDF::loadView( // Load the PDF view 
            "pdf.export",
            compact("printers", "user", "currentTime")
        );

        return $pdf->download("printer-data-export.pdf");
    }//--Export Data to PDF-----//

    
    public function create()
    {
        $user = auth()->user();
        $departmentName = $user->department
            ? $user->department->name
            : "Unknown Department";
        $headOfDepartment =
            $user->department && $user->department->head
                ? $user->department->head->name
                : "Unknown Head";
        $approvers = User::where("role_id", 2)
            ->where("department_id", $user->department_id)
            ->get();

        return view(
            "Printers.create",
            compact("approvers", "departmentName", "headOfDepartment")
        );
    }

    public function store(Request $request)
    {
        $user = auth()->user(); // Get the authenticated user

        // Validation passed, you can proceed with processing the data
        $printer = Printer::create([
            "section_head1" => $request->input("section_head1"),
            "PrinterName" => $request->input("PrinterName"),
            "PrinterModel" => $request->input("PrinterModel"),
            "PrinterLocation" => $request->input("PrinterLocation"),
            "PrinterIPaddress" => $request->input("PrinterIPaddress"),
        ]);

        $selectedToners = $request->input("ticket_categories", []);
        $tonerQuantities = $request->input("toner_quantities", []);

        foreach ($selectedToners as $tonerName) {
            $quantity = $tonerQuantities[$tonerName];
            $toner = Toner::create([
                "printer_id" => $printer->id, // Link the toner to the printer
                "TonerName" => $tonerName,
                "QuantityInStore" => $quantity,
            ]);
        }

        return redirect()->route("printer.index");
    }
}
