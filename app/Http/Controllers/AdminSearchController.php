<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Spatie\PdfToText\Pdf;

class AdminSearchController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user(); // Logged-in user
        $pdfPath = storage_path('app/pdf/'); // Assuming your PDFs are stored in the 'storage/app/pdf/' directory

        // Search form by entering the data on the search form
        $query = $request->input('query'); // Input from Query
        $filteredItems = Ticket::where('UserID', $user->id)
            ->where(function ($q) use ($query) {
                $q->where('id', 'like', '%' . $query . '%')
                    ->orWhere('section_head1', 'like', '%' . $query . '%')
                    ->orWhere('HodApprovalStatus', 'like', '%' . $query . '%')
                    ->orWhere('TicketStatus', 'like', '%' . $query . '%')
                    ->orWhere('Record_No', 'like', '%' . $query . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
            foreach ($filteredItems as $item) {
                // Include the 'documents' field in the data passed to the view
                $item->documents = json_decode($item->documents, true);
    
                // Extract attachments
                $attachments = Pdf::getText($pdfPath . 'search-results-' . $item->id . '.pdf', '-attach')->getAttachments();
    
                $item->attachmentPaths = [];
                foreach ($attachments as $attachment) {
                    $attachmentPath = 'uploads/' . $attachment->filename;
                    \Storage::put($attachmentPath, $attachment->fileContent);
                    $item->attachmentPaths[] = public_path($attachmentPath);
                }
    
                // Generate the main PDF content
                $pdf = PDF::loadView('pdf', ['item' => $item]);
    
                // Save the combined PDF with attachments
                $pdf->save($pdfPath . 'search-results-' . $item->id . '.pdf');

        $totalRecords = $filteredItems->total(); // Total Records From search

        // You can return $totalRecords or any other response as needed
        return $totalRecords;
    }
}
?>