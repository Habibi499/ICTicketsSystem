<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Toner;
use App\Models\Printer;
use App\Models\TonersRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades;
use Illuminate\Http\Request;

class UpdateTonerStockController extends Controller
{
    public function index()
    {
        $printers = Printer::all();
        $toners = Toner::all();
        return view('Printers.updatetoners', compact('printers', 'toners'));
    }

    public function update(Request $request)
    {
        // Validate the form data
        $request->validate([
            'toner' => 'required|integer', // Ensure a valid toner is selected
            'QuantityInStore' => 'required|integer|min:1|max:8', // Ensure the quantity is valid
        ]);
        
        $tonerId = $request->input('toner');
        $quantity = $request->input('QuantityInStore');
        
        $toner = Toner::find($tonerId);
    
        if ($toner) {
            // Update the 'QuantityInStore' for the selected toner
            $toner->QuantityInStore = $quantity;
            $toner->save();
    
            return redirect()->back()->with('success', 'Toner quantity updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Toner not found.');
        }
    }
     

}
