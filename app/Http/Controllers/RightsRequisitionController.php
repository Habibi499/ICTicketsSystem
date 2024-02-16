<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;
use App\Traits\ActivityLoggingTrait;
use App\Models\RightsMainCategory;
use App\Models\systemRights;
use App\Models\TicketNumbers;
use App\Traits\TicketNumberTrait;
use App\Traits\RightsTicketNumberTrait;
use Illuminate\Support\Facades\DB;
class RightsRequisitionController extends Controller
{
    use RightsTicketNumberTrait;
    use ActivityLoggingTrait;
    public function submitForm(Request $request)
    {   
        // Validate the form data
        $request->validate([
            'vehicleType' => 'required|array',
            'marineDetails' => 'array',
            'vehicleDetails' => 'array',
            'fireDetails'=>'array',
            'MiscDetails'=>'array',
            'motorEndorsementDetails'=>'array',
            'fireEndorsementDetails'=>'array',
            'miscellaneousDetails'=>'array',
            'marineEndorsementsDetails'=>'array',
            'listingDetails'=>'array',
            'noticeDetails'=>'array',
            'processFireDetails'=>'array',
            'processMotorDetails'=>'array',
            'processMiscellaneousDetails'=>'array',
            'matatuNewBusinessDetails'=>'array',
            'matatuRenewalsDetails'=>'array',
            'matatuEndorsementsDetails'=>'array',
            'newBusinessReportsDetails'=>'array',
            'bordereauxDetails'=>'array',
            'bordereauxMarineDetails'=>'array',
            'renewalBordereauxDetails'=>'array',
            'eBordereauxDetails'=>'array',
            'premiumRegisterDetails'=>'array',
            'masterDetails'=>'array',
            'transactionDetails'=>'array',
            'claimsDetails'=>'array',
            'claimsReportsDetails'=>'array',
            'claimsPaidBordereauDetails'=>'array',
            'illicitClaimsDetails'=>'array',
            'retailClaimsSummaryReportsDetails'=>'array',
     
        ]);
//dd($request);
        try {
            DB::beginTransaction();
            // Check the values of 'vehicleType' and handle each choice separately
            $selectedTypes = (array)$request->input('vehicleType');
            
            // Iterate over selected types
            foreach ($selectedTypes as $vehicleType) {
                // Create a new instance of RightsMainCategory for each selected type
                $mainCategory = RightsMainCategory::create([
                    'Main_Class' => ucfirst($vehicleType),
                ]);
            }
            // Generate a unique ticket number
                $ticketData = $this->generateTicketNumber();
                $ticketNumber=$ticketData['ticketNumber'];
                $hiddenApproverName=$request->input("hiddenApproverName");
             //dd($hiddenApproverName);
                // Create a new instance of TicketNumbers for the ticket
                $ticket = TicketNumbers::create([
                    'ticket_category' => 'System Rights Request',  // Replace 'YourCategory' with the actual category
                    'ticket_code' => $ticketData['ticketCode'],
                    'ticket_No' => $ticketData['ticketNumber'],
                ]);

            
                // Save the selected subcategories and CRUD permissions under the main category
                foreach ($request->input('marineDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([     
                        'Categories' => $category,
                        'Main_Class_Name' => 'Marine',
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'Requested_For'=>$request->input("Requested_For"),
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'UserID'=>$request->input("UserID"),
                        'Department'=>$request->input("Department"),
                        'TicketStatus'=>'open',
                        'HodApprovalStatus'=>'UnApproved',
                        "TicketCategory"=>'Rights_Request',
                        'hiddenApproverName'=>$hiddenApproverName,
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),

                    ]);
                }

                // Save the selected subcategories and CRUD permissions under the main category
                foreach ($request->input('vehicleDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'Main_Class_Name' => 'motor',
                        'hiddenApproverName'=>$hiddenApproverName,
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'Requested_For'=>$request->input("Requested_For"),
                        'HodApprovalStatus'=>'UnApproved',
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'UserID'=>$request->input("UserID"),
                        'Department'=>$request->input("Department"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }
                foreach ($request->input('fireDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'Main_Class_Name' => 'fire',
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'Requested_For'=>$request->input("Requested_For"),
                        'HodApprovalStatus'=>'UnApproved',
                        'TicketStatus'=>'Open',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }
                
                foreach ($request->input('MiscDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'Main_Class_Name' => 'miscelleneous',
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'Requested_For'=>$request->input("Requested_For"),
                        'HodApprovalStatus'=>'UnApproved',
                        'TicketStatus'=>'Open',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }
                              
                foreach ($request->input('motorEndorsementDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Motor Endorsements',
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'Requested_For'=>$request->input("Requested_For"),
                        'HodApprovalStatus'=>'UnApproved',
                        'TicketStatus'=>'Open',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }
                       
                foreach ($request->input('fireEndorsementDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Fire Endorsements',
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'Requested_For'=>$request->input("Requested_For"),
                        'HodApprovalStatus'=>'UnApproved',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }

                foreach ($request->input('miscellaneousDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'miscelleneous Endorsements',
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'Requested_For'=>$request->input("Requested_For"),
                        'HodApprovalStatus'=>'UnApproved',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }

                foreach ($request->input('marineEndorsementsDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Marine Endorsements',
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'Requested_For'=>$request->input("Requested_For"),
                        'HodApprovalStatus'=>'UnApproved',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }
                     
                foreach ($request->input('listingDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Renewal Listings',
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'Requested_For'=>$request->input("Requested_For"),
                        'HodApprovalStatus'=>'UnApproved',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }

                foreach ($request->input('noticeDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Renewal Notice',
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'Requested_For'=>$request->input("Requested_For"),
                        'HodApprovalStatus'=>'UnApproved',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }
                foreach ($request->input('processMotorDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Renewal Process Motor Details',
                        'Requested_For'=>$request->input("Requested_For"),
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'HodApprovalStatus'=>'UnApproved',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }
 
                foreach ($request->input('processFireDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Renewal Process Fire',
                        'Requested_For'=>$request->input("Requested_For"),
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'HodApprovalStatus'=>'UnApproved',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }

                foreach ($request->input('processMiscellaneousDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Renewal Process Miscellaneous',
                        'Requested_For'=>$request->input("Requested_For"),
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'HodApprovalStatus'=>'UnApproved',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }

                       
                foreach ($request->input('matatuNewBusinessDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'Department'=>$request->input("Department"),
                        'departmentID'=>$request->input("departmentID"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Matatu New Business',
                        'Requested_For'=>$request->input("Requested_For"),
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'HodApprovalStatus'=>'UnApproved',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }

                foreach ($request->input('matatuRenewalsDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Matatu Renewals',
                        'Requested_For'=>$request->input("Requested_For"),
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'HodApprovalStatus'=>'UnApproved',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }

                foreach ($request->input('matatuEndorsementsDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Matatu Endorsements',
                        'Requested_For'=>$request->input("Requested_For"),
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'HodApprovalStatus'=>'UnApproved',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }


                foreach ($request->input('newBusinessReportsDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Underwriting New Business Reports',
                        'Requested_For'=>$request->input("Requested_For"),
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'HodApprovalStatus'=>'UnApproved',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }
                foreach ($request->input('bordereauxDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Underwriting Reports Bordereaux',
                        'Requested_For'=>$request->input("Requested_For"),
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'HodApprovalStatus'=>'UnApproved',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }
                       
                foreach ($request->input('bordereauxMarineDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Bordereaux Marine',
                        'Requested_For'=>$request->input("Requested_For"),
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'HodApprovalStatus'=>'UnApproved',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }

                foreach ($request->input('eBordereauxDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Endorsements Bordereaux', 
                        'Requested_For'=>$request->input("Requested_For"), 
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'HodApprovalStatus'=>'UnApproved',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }
                    
                foreach ($request->input('renewalBordereauxDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Renewal Bordereaux', 
                        'Requested_For'=>$request->input("Requested_For"),
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'HodApprovalStatus'=>'UnApproved',
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }    

                foreach ($request->input('premiumRegisterDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Underwriting Reports', 
                        'HodApprovalStatus'=>'UnApproved',
                        'Requested_For'=>$request->input("Requested_For"), 
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }     

                foreach ($request->input('masterDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Accounts Master', 
                        'HodApprovalStatus'=>'UnApproved',
                        'Requested_For'=>$request->input("Requested_For"), 
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }

                foreach ($request->input('transactionDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Accounts Transactions', 
                        'HodApprovalStatus'=>'UnApproved',
                        'Requested_For'=>$request->input("Requested_For"), 
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }

                foreach ($request->input('claimsDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Claims Rights', 
                        'HodApprovalStatus'=>'UnApproved',
                        'Requested_For'=>$request->input("Requested_For"), 
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }

                foreach ($request->input('claimsReportsDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Claims Reports->Provisonal Bordereau', 
                        'HodApprovalStatus'=>'UnApproved',
                        'Requested_For'=>$request->input("Requested_For"), 
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }

                foreach ($request->input('claimsPaidBordereauDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Claims Reports->PaidBordereau', 
                        'HodApprovalStatus'=>'UnApproved',
                        'Requested_For'=>$request->input("Requested_For"), 
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }

                foreach ($request->input('claimsVoucherReportsDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Claims Reports->Claims Voucher Reports', 
                        'HodApprovalStatus'=>'UnApproved',
                        'Requested_For'=>$request->input("Requested_For"), 
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }

                
                foreach ($request->input('illicitClaimsDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Claims Reports->illicit Claims Reports', 
                        'HodApprovalStatus'=>'UnApproved',
                        'Requested_For'=>$request->input("Requested_For"), 
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }

                
                foreach ($request->input('retailClaimsSummaryReportsDetails', []) as $category) {
                    $mainCategory->SystemRights()->create([
                        'Categories' => $category,
                        'ticket_No'=>$ticketNumber,
                        'Section_Head'=>$request->input("Section_Head"),
                        'hiddenApproverName'=>$hiddenApproverName,
                        'HodApproverName'=>$request->input("HodApproverName"),
                        'departmentID'=>$request->input("departmentID"),
                        'Department'=>$request->input("Department"),
                        'UserID'=>$request->input("UserID"),
                        'TicketStatus'=>'open',
                        "TicketCategory"=>'Rights_Request',
                        'Main_Class_Name' => 'Claims Reports->Retail Claim Reports', 
                        'HodApprovalStatus'=>'UnApproved',
                        'Requested_For'=>$request->input("Requested_For"), 
                        'Requester_Name'=>$request->input("Requester_Name"),
                        'view_only' => $request->has("View." . str_replace(' ', '', $category)),
                        'add_details' => $request->has("Add." . str_replace(' ', '', $category)),
                        'save_details' => $request->has("Save." . str_replace(' ', '', $category)),
                        'DrNote' => $request->has("DrNote." . str_replace(' ', '', $category)),
                        'Query_data' => $request->has("Query." . str_replace(' ', '', $category)),
                        'print_data' => $request->has("Print." . str_replace(' ', '', $category)),
                    ]);
                }
            // Commit the transaction if all data is inserted successfully
            DB::commit(); DB::commit();
        } catch (\Exception $e) {
         // Rollback the transaction if an exception occurs
         DB::rollBack();

         // Log the exception message for debugging
         \Log::error('Error submitting form: ' . $e->getMessage());

         // Return a response or redirect with an error message
         return redirect()->back()->with('error', 'Failed to submit the form. Please try again.');
           
        }
        $this->logActivity(auth()->user(), $ticket, 'created', 'New ticket created');//Action Log
        return redirect()->route("requestedtickets.index")->with('success', 'Rights Request Submitted Successfully.');

    }

    public function show($ticket_No) {
        try {
            // Retrieve all records with the given ticket_No
            $tickets = systemRights::where('ticket_No', $ticket_No)->get();
            
            // Check if any records were found
            if ($tickets->isEmpty()) {

            }

            return view('Rights.show', compact('tickets'));
        } catch (\Exception $e) {
            // Log or dd($e) the exception for debugging
            dd($e->getMessage());
        }
    }

}

