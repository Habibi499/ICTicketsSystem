<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'section_head1' => 'required|string|max:255',
            'Section_Head' => 'required|string|max:255',
            'Correction_Type' => 'required|string|max:255',
            'Ticket_Urgency' => 'required|string|max:255',
            //'Record_No' => 'required|string|max:255',
            'Correction_Details' => 'required|string',
            
            'documents' => 'required|file|max:10240', // Example: Max file size of 10MB
        ];
    }
    public function messages(): array
    {
        return [
            'Correction_Type.required' => 'Please Select the Correction Type',
            'Ticket_Urgency.required' => 'Please Select Ticket Urgency',
            'Record_No.required' => 'Please Enter Policy Number',
            'Correction_Details.required' => 'Please provide details of your correction request',
            'documents.required' => 'Please note that Attachment document is required',
             'documents.file' => 'Please note that Attachment document is required',
           'HodApproverName'=>'Please Select your correction form Approver',
            'documents.max' => 'Please note that Attachment document is required', // Example: Max file size of 10MB
        ];
    }
}
