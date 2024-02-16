@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/Bypassform.css') }}">

<div class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <i class="fas fa-ban"></i>&ensp;&ensp;Authorization for ByPass Of Cancellation
          </div>  <!-- /.col -->
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('ticket.index')}}">Home</a></li>
                <li class="breadcrumb-item">ByPass of Cancellation</li>
             </ol>
          </div>  <!-- /.col -->
       </div> <!-- /.row -->
    </div>   <!-- /.container-fluid -->
 </div>
 
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="form_wrap"> 
                <h2>Authorization For Bypass of Cancellation form &ensp;<i class="fa fa-ban tex-danger"></i></h2>
                <form id="TicketForm" action="{{route("ticket.post")}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input_wrap">
                                <input type="text" name="section_head1" value="{{Auth::user()->name}}" required/>
                                <input type="text" name="Section_Head"   value="{{ $headOfDepartment }}" hidden>
                                <input type="text" name="Correction_Dept" value="Underwriting" hidden>
                                <input type="text" name="TicketCategory" value="Authorization For Bypass of Cancellation" hidden>
                                <input type="text" name="Correction_Type" value="Authorization For Bypass of Cancellation" hidden>
                                
                                <input type="text" name="Ticket_Urgency" value="Medium" hidden>
                                <label>Requested By</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input_wrap">
                                <input type="date" class="form-control"/>
                                <label>Date Requested</label>
                            </div>
                        </div>
                    </div>

             
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input_wrap">
                                <input type="number" name="Record_No" required />
                                <label>Policy Number</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input_wrap">
                                <input type="text" name="Policy_code" required />
                                <label>Policy Code</label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-row" >
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input_wrap">
                                <input type="number" name="EndorsementNo"  required />
                                <label>Endorsement Number</label>
                            </div> 
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input_wrap">
                            <input type="text" name="Endorsement_Code" required />
                            <label>Endorsement code</label>
                        </div> 
                    </div>
                </div>
           
                <div class="form-row" >
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">What is Required</label>
                            <div class="input_wrap">
                              
                                <textarea rows="3" class="form-control" name="Correction_Details" id="textarea">
                                    Please effect Bypass of Cancellation as per the details provided here

                                </textarea>
                              
                            </div> 
                        </div>
                    </div>
                </div>
            
            <div class="form-row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="approver" class="form-label">Select Approver</label>
                            <select class="form-control" id="textarea" name="HodApproverName">
                            <option value="">---Select---</option>
                            @foreach($approvers as $approver)
                            <option value="{{$approver->id}}">{{$approver->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                   <div class="col-md-5">
                        <div class="form-group">
                            <label for="formFile" class="form-label">Please add supporting document(s)</label>
                            <input class="form-control" type="file" id="textarea" name="documents[]" value="{{old('documents')}}"  multiple>
                            @error('documents')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
          
                <button type="submit" class="btn btn-primary">Submit&ensp;<i class="fa fa-check"></i></button>
            </form>
            </div><!--Form Wrap-->
        </div>
    </div>
</div>

@endsection