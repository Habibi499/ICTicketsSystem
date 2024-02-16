<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RightsMainCategory;
use App\Models\SystemRights;
class RightsRequisitionController extends Controller
{
    public function submitForm(Request $request)
    {   
        // Validate the form data
        $request->validate([
            'vehicleType' => 'required|string',
            'vehicleDetails' => 'array',
        ]);
        //dd($request->all());
        try {
            // Create a new instance of the RightsMainCategory model
            $mainCategory = RightsMainCategory::create([
                'Main_Class' => $request->input('vehicleType'),
            ]);
          
            // Save the selected subcategories and CRUD permissions under the main category
            foreach ($request->input('vehicleDetails', []) as $category) {
            
                $mainCategory->SystemRights()->create([
                   
                    'Categories' => $category,
                    'Main_Class_Name' => $mainCategory->Main_Class,
                    'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                    'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                    'save_details' =>$request->has("Save." . str_replace(' ', '', $category)),
                    'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                    'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                    'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                   
                 
    
                ]);
            }
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Form submitted successfully!');
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., database errors)
            return redirect()->back()->with('error', 'An error occurred while processing the form.');
        }
    }
}