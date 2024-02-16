@extends('layouts.app') @section('content') <style>
   .hidden {
     display: none;
   }
    
   .category-checkbox {
     margin-bottom: 5px;
   }
    
   .crud-checkbox {
     margin-bottom: 5px;
     margin-right: 2%;
   }
    
   .card-success {
     max-height: 700px;
     max-width: 90%;
     overflow-x: auto;
   }
</style>
<div class="container mt-4 ">
    <div class="col-md-12 mx-auto">
        <P class="text-success mt-4"><strong>System Rights Requisition Form</strong></p>
    </div>
   <div class="card card-success mt-5">
    <form method="POST" action="{{ route('submitForm') }}">
        @csrf
            <div class="form-row ml-4 mr-5">
                <div class="col-md-4">
                   <div class="form-group">
                      <label for="RequesterName">Requested By</label>
                      <input type="text" name="Requester_Name" class="form-control" id="RequesterName" value=" {{ Auth::user()->name }}" readonly>           
                   </div>
                </div>
                <div class="col-md-4">
                    <label for="RequesterName">Requested For</label>
                    <input type="text" name="Requested_For" class="form-control" id="RequesterName" placeholder="Name of person Requiring Rights" required>           
                    <input type="text" name="departmentID" class="form-control" id="HOD" value="{{Auth::user()->department_id}}" hidden>
                    <input type="text" name="Department" class="form-control" id="HOD" value="{{$departmentName}}" hidden>
                    <input type="text" name="Section_Head" class="form-control" id="HOD" value="{{ $headOfDepartment}}" hidden>
                     <input type="text" name="UserID" class="form-control" id="HOD"  value="{{Auth::user()->id }}" hidden>
                    </div>
                <div class="col-md-4">
           
                    <label for="approver">Select Approver</label>
                    <select class="form-control" id="HodApprovalName" name="HodApproverName" required>
                       <option value="">---Select---</option>
                       @foreach($approvers as $approver)
                       <option value="{{$approver->id}}">{{$approver->name}}</option>
                       
                       @endforeach
                    </select>
                    @error('HodApprovalName')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                      <!-- Add a hidden input field for the approver name -->
               <div class="form-group">
                <label for="hiddenApproverName" style="display: none;">Hidden Approver Name</label>
                <input type="hidden" id="hiddenApproverName" name="hiddenApproverName" value="">
             </div>
             </div>
       <ul class="nav nav-tabs " id="myTabs">
           <li class="nav-item">
               <a class="nav-link active" id="tab1" data-toggle="tab" href="#contentTab1">New Business</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" id="tab2" data-toggle="tab" href="#contentTab2">Endorsements</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" id="tab3" data-toggle="tab" href="#contentTab3">Renewals</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" id="tab3" data-toggle="tab" href="#contentTab4">Matatu</a>
           </li>
           <li class="nav-item">
                <a class="nav-link" id="tab3" data-toggle="tab" href="#contentTab5">U/W Reports</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab6" data-toggle="tab" href="#contentTab6">Accounts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab7" data-toggle="tab" href="#contentTab7">Claims</a>
            </li>
       </ul>
       <div class="tab-content">
    
     
           <div class="tab-pane fade show active" id="contentTab1">
            <div class="row ml-4">
                <!-- Motor Category -->
                <div class="col-md-2">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="motorCheckbox" name="vehicleType[]" value="MOTOR">
                        <label class="form-check-label" for="motorCheckbox">Motor</label>
                    </div>
                </div>
                <div class="col-md-10">
                
                     
                     <div id="motorDetails" class="hidden">
                         
                     </div>
                </div>
            </div>
               <!-- Fire Category -->
               <div class="row ml-4">
                   <div class="col-md-2">
                       <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="fireCheckbox" name="vehicleType[]" value="FIRE">
                           <label class="form-check-label" for="fireCheckbox">Fire</label>
                       </div>
                   </div>
                   <div class="col-md-10">
                       <div id="fireDetails" class="hidden">
                           <!-- Fire Categories -->
                       </div>
                   </div>
               </div>
               <!-- Misc Category -->
               <div class="row ml-4">
                   <div class="col-md-2">
                       <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="MiscCheckbox" name="vehicleType[]" value="Misc">
                           <label class="form-check-label" for="MiscCheckbox">Misc</label>
                       </div>
                   </div>
                   <div class="col-md-10">
                       <div id="MiscDetails" class="hidden">
                           <!-- Misc Categories -->
                       </div>
                   </div>
               </div>
               <!-- Marine Category -->
               <div class="row ml-4">
                   <div class="col-md-2">
                       <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="marineCheckbox" name="vehicleType[]" value="MARINE">
                           <label class="form-check-label" for="marineCheckbox">Marine</label>
                       </div>
                   </div>
                   <div class="col-md-10">
                       <div id="marineDetails" class="hidden">
                           <!-- Marine Categories -->
                       </div>
                   </div>
               </div>
           </div>
           <div class="tab-pane fade" id="contentTab2">
               <div class="row ml-4">
                   <!-- Motor Category Endorsement -->
                   <div class="col-md-2">
                       <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="motorEndorsementCheckbox" name="vehicleType[]" value="MOTOR ENDORSEMENTS">
                           <label class="form-check-label" for="motorEndorsementCheckbox">Motor Endorsement</label>
                       </div>
                   </div>
                   <div class="col-md-10">
                       <div id="motorEndorsementDetails" class="hidden"></div>
                   </div>
               </div>
               <div class="row ml-4">
                   <div class="col-md-2">
                       <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="fireEndorsementCheckbox" name="vehicleType[]" value="FIRE Endorsements">
                           <label class="form-check-label" for="fireEndorsementCheckbox">Fire Endorsement</label>
                       </div>
                   </div>
                   <div class="col-md-10">
                       <div id="fireEndorsementDetails" class="hidden">
                           <!-- Fire Endorsement Categories -->
                       </div>
                   </div>
               </div>
               <!-- Miscellaneous Category -->
               <div class="row ml-4">
                   <div class="col-md-2">
                       <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="miscellaneousCheckbox" name="vehicleType[]" value="Miscellaneous Endorsements">
                           <label class="form-check-label" for="miscellaneousCheckbox">Miscellaneous Endorsements</label>
                       </div>
                   </div>
                   <div class="col-md-10">
                       <div id="miscellaneousDetails" class="hidden">
                           <!-- Miscellaneous Categories -->
                       </div>
                   </div>
               </div>
               <!-- Marine Endorsements Category -->
               <div class="row ml-4">
                   <div class="col-md-2">
                       <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="marineEndorsementsCheckbox" name="vehicleType[]" value="Marine Endorsements">
                           <label class="form-check-label" for="marineEndorsementsCheckbox">Marine Endorsements</label>
                       </div>
                   </div>
                   <div class="col-md-10">
                       <div id="marineEndorsementsDetails" class="hidden"></div>
                   </div>
               </div>
           </div><!----Tab 2------>

           <div class="tab-pane fade" id="contentTab3">
               <div class="row ml-4">
                   <div class="col-md-2">
                       <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="listingCheckbox" name="vehicleType[]" value="Renewal listing">
                           <label class="form-check-label" for="listingCheckbox">Listing</label>
                       </div>
                   </div>
                   <div class="col-md-10">
                       <div id="listingDetails" class="hidden"></div>
                   </div>
               </div>
               <div class="row ml-4">
                   <div class="col-md-2">
                       <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="noticeCheckbox" name="vehicleType[]" value="Renewal notice">
                           <label class="form-check-label" for="noticeCheckbox">Notice</label>
                       </div>
                   </div>
                   <div class="col-md-10">
                       <div id="noticeDetails" class="hidden"></div>
                   </div>
               </div>
               <!-- ProcessMotor Category -->
               <div class="row ml-4">
                   <div class="col-md-2">
                       <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="processMotorCheckbox" name="vehicleType[]" value="Renewal Process Motor">
                           <label class="form-check-label" for="processMotorCheckbox">ProcessMotor</label>
                       </div>
                   </div>
                   <div class="col-md-10">
                       <div id="processMotorDetails" class="hidden">

                       </div>
                   </div>
               </div>
               <!-- ProcessFire Category -->
               <div class="row ml-4">
                   <div class="col-md-2">
                       <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="processFireCheckbox" name="vehicleType[]" value="Renewal process Fire">
                           <label class="form-check-label" for="processFireCheckbox">ProcessFire</label>
                       </div>
                   </div>
                   <div class="col-md-10">
                       <div id="processFireDetails" class="hidden"></div>
                   </div>
               </div>
               <!-- ProcessMiscellaneous-->
               <div class="row ml-4">
                   <div class="col-md-2">
                       <div class="form-check">
                           <input type="checkbox" class="form-check-input" id="processMiscellaneousCheckbox" name="vehicleType[]" value="Renewal Process Miscellaneous">
                           <label class="form-check-label" for="processMiscellaneousCheckbox">ProcessMiscellaneous</label>
                       </div>
                   </div>
                   <div class="col-md-10">
                       <div id="processMiscellaneousDetails" class="hidden">

                       </div>
                   </div>
               </div>
           </div><!--Tab 3--->

           <div class="tab-pane fade" id="contentTab4">
               <div class="row ml-4"> <!---Matatus--->
                  <div class="col-md-3">
                  <div class="form-check">
                     <input type="checkbox" class="form-check-input" id="matatuNewBusinessCheckbox" 
                     name="vehicleType[]" value="matatuNewBusiness">
                     <label class="form-check-label" for="matatuNewBusinessCheckbox">MatatuNewBusiness</label>
                  </div>
                  </div>
                  <div class="col-md-9">
                  <div id="matatuNewBusinessDetails" class="hidden">
                     
                  </div>
                  </div>
               </div>
               
               <div class="row ml-4"><!-- MatatuRenewals Categories -->
                  <div class="col-md-3">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="matatuRenewalsCheckbox"
                       name="vehicleType[]" value="matatuRenewals">
                      <label class="form-check-label" for="matatuRenewalsCheckbox">MatatuRenewals</label>
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div id="matatuRenewalsDetails" class="hidden">
                   
                    </div>
                  </div>
               </div>
               <div class="row ml-4"><!-- MatatuEndorsements Categories -->
                    <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="matatuEndorsementsCheckbox" 
                        name="vehicleType[]" value="matatuEndorsements">
                        <label class="form-check-label" for="matatuEndorsementsCheckbox">MatatuEndorsements</label>
                    </div>
                    </div>
                    <div class="col-md-9">
                    <div id="matatuEndorsementsDetails" class="hidden">
                        
                    </div>
                    </div>
                </div>
            </div><!--Tab 4-->

            <div class="tab-pane fade" id="contentTab5"><!-- MotorReports Categories -->
                <div class="row ml-4">
                    <div class="col-md-2">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="motorReportsCheckbox" name="vehicleType" value="motorReports">
                            <label class="form-check-label" for="motorReportsCheckbox">New Business MotorReports</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div id="motorReportsDetails" class="hidden"> 

                        </div>
                    </div>
                </div>
                <div class="row ml-4"><!-- NewBusinessReports Categories -->
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="newBusinessReportsCheckbox" name="vehicleType[]" value="newBusinessReports">
                            <label class="form-check-label" for="newBusinessReportsCheckbox">NewBusinessReports</label>
                        </div>
                    </div>
            
                    <div class="col-md-9">
                        <div id="newBusinessReportsDetails" class="hidden">
                            
                        </div>
                    </div>
                </div>
                <div class="row ml-4">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="bordereauxCheckbox" name="vehicleType[]" value="bordereaux">
                            <label class="form-check-label" for="bordereauxCheckbox">Bordereaux</label>
                        </div>
                    </div>
            
                    <div class="col-md-9">
                        <div id="bordereauxDetails" class="hidden">
                            <!-- Bordereaux Categories -->
                        </div>
                    </div>
                </div>

                <div class="row ml-4"><!-- BordereauxMarine Categories -->
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="bordereauxMarineCheckbox" name="vehicleType[]" value="bordereauxMarine">
                            <label class="form-check-label" for="bordereauxMarineCheckbox">BordereauxMarine</label>
                        </div>
                    </div>
            
                    <div class="col-md-9">
                        <div id="bordereauxMarineDetails" class="hidden">
                            
                        </div>
                    </div>
                </div> 
                <div class="row ml-4">  <!-- EBordereaux Category -->
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="eBordereauxCheckbox" name="vehicleType[]" value="eBordereaux">
                            <label class="form-check-label" for="eBordereauxCheckbox">Endorsement Bordereaux</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div id="eBordereauxDetails" class="hidden">
                            <!-- EBordereaux Categories -->
                        </div>
                    </div>
                </div>
                <div class="row ml-4"><!-- RenewalBordereaux Category -->
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="renewalBordereauxCheckbox" name="vehicleType[]" value="renewalBordereaux">
                            <label class="form-check-label" for="renewalBordereauxCheckbox">RenewalBordereaux</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div id="renewalBordereauxDetails" class="hidden">
                            <!-- RenewalBordereaux Categories -->
                        </div>
                    </div>
                </div>
                 <!-- Premium Register Category -->
                <div class="row ml-4">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="premiumRegisterCheckbox" name="vehicleType[]" value="premiumRegister">
                            <label class="form-check-label" for="premiumRegisterCheckbox">Premium Register</label>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div id="premiumRegisterDetails" class="hidden">
                            <!-- Reports Categories -->
                            <div class="row category-checkbox">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input reports-category" name="premiumRegisterDetails[]" value="Reports">
                                        <label class="form-check-label">Reports</label>
                                    </div>
                                </div>
                                <div class="col-md-1.5">
                                    <div class="form-check hidden crud-checkbox ReportsCrud">
                                        <input type="checkbox" class="form-check-input" name="Print[Reports]" value="Print">
                                        <label class="form-check-label">Print</label>
                                    </div>
                                </div>
                                <!-- Add other CRUD checkboxes as needed -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--Tab-->
            <div class="tab-pane fade" id="contentTab6">
      
         
                <div class="row ml-4">
                    <!-- Transaction Category -->
                    <div class="col-md-2">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="transactionCheckbox" name="vehicleType[]" value="TRANSACTION">
                            <label class="form-check-label" for="transactionCheckbox">Transaction</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div id="transactionDetails" class="hidden">
                            <!-- Content populated by the JavaScript function populateTransactionCategories() -->
                        </div>
                    </div>
                </div>

                <div class="row ml-4">
                    <!-- Property Category -->
                    <div class="col-md-2">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="propertyCheckbox" name="vehicleType[]" value="ACCOUNTS PROPERTY">
                            <label class="form-check-label" for="propertyCheckbox">Property</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div id="propertyDetails" class="hidden">
                            <!-- Content populated by the JavaScript function -->
                        </div>
                    </div>
                </div>
                <div class="row ml-4">
                    <!-- Reports Category -->
                    <div class="col-md-2">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="reportsCheckbox" name="vehicleType[]" value="ACCOUNTS REPORTS">
                            <label class="form-check-label" for="reportsCheckbox">Reports</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div id="reportsDetails" class="hidden">
                            <!-- Content populated by the JavaScript function -->
                        </div>
                    </div>
                </div>

                <div class="row ml-4">
                    <!-- MIS Category -->
                    <div class="col-md-2">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="misCheckbox" name="vehicleType[]" value="MIS">
                            <label class="form-check-label" for="misCheckbox">MIS</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div id="misDetails" class="hidden">
                            <!-- Content populated by the JavaScript function -->
                        </div>
                    </div>
                </div>

                <div class="row ml-4">
                    <!-- Master Category -->
                    <div class="col-md-2">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="masterCheckbox" name="vehicleType[]" value="Master">
                            <label class="form-check-label" for="masterCheckbox">Master</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div id="masterDetails" class="hidden">
                            <!-- Content populated by the JavaScript function -->
                        </div>
                    </div>
                </div>

        
            </div><!--Tab-->
            <div class="tab-pane fade" id="contentTab7">
                <div class="row ml-4">
                    <!-- Claims Category -->
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="claimsCheckbox" name="vehicleType[]" value="Claims">
                            <label class="form-check-label" for="claimsCheckbox">Claims</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div id="claimsDetails" class="hidden">
                            <!-- Content populated by the JavaScript function -->
                        </div>
                    </div>
                </div>
                
                <div class="row ml-4">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="claimsReportsCheckbox" name="vehicleType[]" value="ClaimsReports">
                            <label class="form-check-label" for="claimsReportsCheckbox">Claims Reports->Provisonal Bordereau</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div id="claimsReportsDetails" class="hidden">
                            <!-- Content populated by the JavaScript function populateClaimsReportsCategories -->
                        </div>
                    </div>
                </div>

                <div class="row ml-4">
                    <div class="col-md-3">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="claimsPaidBordereauCheckbox" name="vehicleType[]" value="ClaimsPaidBordereau">
                        <label class="form-check-label" for="claimsPaidBordereauCheckbox">ClaimsReports -> Paid Bordereau</label>
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div id="claimsPaidBordereauDetails" class="hidden">
                        <!-- Content populated by the JavaScript function populateClaimsPaidBordereauCategories -->
                      </div>
                    </div>
                  </div>

                <div class="row ml-4">
                <div class="col-md-3">
                    <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="claimsVoucherReportsCheckbox" name="vehicleType[]" value="ClaimsVoucherReports">
                    <label class="form-check-label" for="claimsVoucherReportsCheckbox">Claims Voucher Reports</label>
                    </div>
                </div>
                <div class="col-md-9">
                    <div id="claimsVoucherReportsDetails" class="hidden">
                    <!-- Content populated by the JavaScript function populateClaimsVoucherReportsCategories -->
                    </div>
                </div>
                </div>

                <div class="row ml-4">
                    <div class="col-md-3">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="illicitClaimsCheckbox" name="vehicleType[]" value="IllicitClaimsReport">
                        <label class="form-check-label" for="illicitClaimsCheckbox">Illicit Claims Report</label>
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div id="illicitClaimsDetails" class="hidden">
                        <!-- Content populated by the JavaScript function populateIllicitClaimsCategories -->
                      </div>
                    </div>
                  </div>

                  <div class="row ml-4">
                    <div class="col-md-3">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="retailClaimsSummaryReportsCheckbox" name="vehicleType[]" value="RetailClaimsSummaryReports">
                        <label class="form-check-label" for="retailClaimsSummaryReportsCheckbox">Retail Claims Summary Reports</label>
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div id="retailClaimsSummaryReportsDetails" class="hidden">
                        <!-- Content populated by the JavaScript function populateRetailClaimsSummaryReportsCategories -->
                      </div>
                    </div>
                  </div>
            </div><!--Tab-->
        </div>
        <script>
            document.getElementById('HodApprovalName').addEventListener('change', function() {
             var selectedApprover = this.options[this.selectedIndex].text;
             document.getElementById('hiddenApproverName').value = selectedApprover;
         });
        </script>
   
        <div class="card-footer">
           <button type="submit" class="btn btn-primary" id="saveButton">Submit</button>
       </div>
       
    </form>
   </div>
</div>
<script src="{{asset('js/systemrightsrequest.js')}}"></script> @endsection
