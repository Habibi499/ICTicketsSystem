<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Toner;
use App\Models\Printer;
use App\Models\TonersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades;
class TonerController extends Controller
{
    public function allocationForm()
{
    $printers = Printer::all();
    $toners = Toner::all();
    $departments = Department::all();
    
    return view('Printers.allocation-form', compact('printers', 'toners','departments'));
}
public function allocate(Request $request)
{
    $printerId = $request->input('printer');
    $selectedToners = $request->input('toners');
   
    $printer = Printer::find($printerId);  
    
    if (!$printer) {
        return redirect()->route('printer.index')->with('error', 'Printer not found');
    }

    DB::transaction(function () use ($selectedToners, $printer, $request) {
        foreach ($selectedToners as $tonerId) {
            $toner = Toner::find($tonerId);
        
            if ($toner) {
                $toner->decrement('QuantityInStore', 1); // Deduct 1 from QuantityInStore
                //$toner->update(['printer_id' => $printer->id]); // Associate the toner with the printer
        
                // Update Toner Request
                TonersRequest::create([
                    'Department' => $request->input('Department'), 
                    'QuantityRequested' => $request->input('QuantityRequested'), 
                    'ItemName' => $toner->TonerName, 
                    'Recipient' => $request->input('Recipient'), 
                    'Updated_by' => $request->input('Updated_by'), 
                    
                ]);

            }
        }
    });

    return redirect()->route('printer.index')->with('success', 'Toners allocated successfully');
}



}
