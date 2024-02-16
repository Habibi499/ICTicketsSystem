<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApproverController;
use App\Http\Controllers\StockRequestController;
use App\Http\Controllers\UsersprofilesupdateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['role:approver'])->group(function () {
    Route::get('/approver', [ApproverController::class, 'index'])->name('approver.index');
});

Auth::routes();

Route::get(
    '/home', [App\Http\Controllers\HomeController::class, 'index']
)->name('home');

Route::middleware('auth')->group(function () {
   Route::get(
    '/admin/status/{user}/edit', [App\Http\Controllers\AdminStatusController::class, 'edit']
    )->name('admin.status.edit');
    Route::put(
        '/admin/status/{user}', [App\Http\Controllers\AdminStatusController::class, 'update']
    )->name('admin.status.update');

    //****************Printers and Cartridges************//
    Route::get(
        '/printers', [\App\Http\Controllers\PrinterController::class, 'index']
    )->name('printer.index');

    Route::get(
        '/printers/create',[App\Http\Controllers\PrinterController::class,'create']
    )->name('printer.create');
    
    Route::post(
        '/printers',[App\Http\Controllers\PrinterController::class,'store']
    )->name('printer.post');

    Route::get(
        '/printers/assigntoners',[App\Http\Controllers\TonerController::class,'allocationForm']
    )->name('printer.assigntoners');

    Route::post(
            '/printers/assigntoners',[App\Http\Controllers\TonerController::class,'allocate']
    )->name('toner.allocate');

    Route::get(
        'pdf/generate-pdf', [\App\Http\Controllers\PrinterController::class, 'generatePDF']
    )->name('pdf.generate-pdf');

    Route::get(
        '/printers/updatetoners', [\App\Http\Controllers\UpdateTonerStockController::class, 'index']
    )->name('printer.updatetoners');
    Route::post(
            '/printers/updatetoners/edit', [\App\Http\Controllers\UpdateTonerStockController::class, 'update']
     )->name('printer.updatetoners.edit');
    //******Printers and Catriges End******//

    Route::get(
        'Admin/active', [\App\Http\Controllers\showActiveLoginsController::class, 'showActiveLogins']
    )->name('admin.active');
  
    Route::get(
        'logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']
    )->name('logout');

  
    Route::get(
        '/approver/Hod', [\App\Http\Controllers\HodController::class, 'index']
    )->name('hod.index');
    Route::get(
        '/approver/DepartmentUnapproved', [\App\Http\Controllers\HodController::class, 'allunapproved']
    )->name('hod.departmentunapproved');

    //Users
    Route::get(
        'users', [\App\Http\Controllers\UserController::class, 'index'])
    ->name('users.index');

    Route::get('/users/{id}/edit',  [\App\Http\Controllers\UserController::class, 'edit'])
    ->name('users.edit');
    
    Route::put('/users/{id}', [\App\Http\Controllers\UserController::class, 'update'])
    ->name('users.update');

    Route::get(
        'profile', [\App\Http\Controllers\ProfileController::class, 'show'])
    ->name('profile.show');
    Route::put(
        'profile', [\App\Http\Controllers\ProfileController::class, 'update'])
    ->name('profile.update');
    Route::get(
        'profile/firstlogin', [\App\Http\Controllers\ProfileController::class, 'firstlogin'])
    ->name('profile.firstlogin');
    Route::get(
        'Tickets/myunapprovedtickets', [\App\Http\Controllers\UnApprovedTicketsController::class, 'index'])
    ->name('unapprovedTickets.index');
    Route::get(
        'Tickets/myapprovedtickets',[App\Http\Controllers\MyApprovedTicketsController::class,'index'])
    ->name('approvedTickets.index');
    Route::get(
        'Tickets/myassignedtickets',[App\Http\Controllers\MyAssignedTicketsController::class,'index'])
    ->name('myassignedTickets.index');
   
    //Search
    Route::get(
        'Tickets/search',[App\Http\Controllers\RequestedTicketsController::class,'search']
    )->name('ticket.search');
   
   //Search
    Route::get(
        '/Tickets', [\App\Http\Controllers\TicketController::class, 'index']
    )->name('ticket.index');
    Route::get(
        '/Tickets/create',[\App\Http\Controllers\TicketController::class,'create']
    )->name('ticket.create');
    Route::get(
        '/Tickets/accountsform',[\App\Http\Controllers\AccountsTicketController::class,'create']
    )->name('ticket.accountsform');
    Route::get(
        'Ticket/view-all-documents/{ticket}', [\App\Http\Controllers\TicketController::class, 'viewAllDocuments']
    )->name('tickets.viewAllDocuments');
    Route::get(
        '/Tickets/claimsform',[\App\Http\Controllers\ClaimsCorrectionFormController::class,'create']
    )->name('ticket.claimsform');
    Route::get(
        '/Tickets/reinsurance',[\App\Http\Controllers\ReinsuranaceCorrectionsController::class,'create']
    )->name('ticket.reinscorrections');
    Route::get(
        '/Tickets/Rights-Request',[\App\Http\Controllers\NewStaffFormController::class,'create']
    )->name('ticket.rightsrequest');
    Route::get(
        '/Tickets/bypass-of-cancellation',[\App\Http\Controllers\BypassOfCancellationController::class,'index']
    )->name('ticket.bypass-of-cancellation');
    Route::get(
        '/Tickets/Reinstate-Policy',[\App\Http\Controllers\PolicyreinstatementController::class,'index']
    )->name('ticket.Reinstate-Policy');
    Route::post('/Tickets','App\Http\Controllers\TicketController@store')->name("ticket.post");
    Route::get(
        '/Tickets/passwordchange', [\App\Http\Controllers\PasswordChangeController::class, 'index']
    )->name('passwordchange.index');
    Route::post(
        '/Tickets/passwordchange', [\App\Http\Controllers\PasswordChangeController::class, 'store']
    )->name('passwordchange.post');
    Route::get(
        '/Tickets/mytickets', [\App\Http\Controllers\RequestedTicketsController::class, 'index']
    )->name('requestedtickets.index');
    Route::get(
        '/Tickets/myrightstickets', [\App\Http\Controllers\RequestedTicketsController::class, 'myRightsrequestshow']
    )->name('requestedrightstickets.index');
    
    Route::get(
        '/Tickets/{ticket}', [\App\Http\Controllers\RequestedTicketsController::class, 'show']
    )->name('tickets.show');
    Route::get(
        '/Tickets/{ticket}/edit',[\App\Http\Controllers\TicketController::class,'edit']
    )->name('tickets.edit');
    Route::put(
        '/Tickets/{ticket}', [\App\Http\Controllers\TicketController::class, 'update'])
    ->name('tickets.update');
    //*****System Rights******//
    Route::get(
        '/Tickets/newstaffForm',[\App\Http\Controllers\NewStaffFormController::class,'create']
    )->name('ticket.newstaffForm');
    Route::post(
        '/submitForm',[App\Http\Controllers\RightsRequisitionController::class,'submitForm']
    )->name("submitForm");
    Route::get(
        '/Rights/{ticket}', [\App\Http\Controllers\RightsRequisitionController::class, 'show']
    )->name('Rights.show');
    Route::get(
        '/Rights/{ticket}/edit',[\App\Http\Controllers\RightsRequestApproverController::class,'edit']
    )->name('Rights.edit');
    Route::put(
        '/Rights/{ticket}', [\App\Http\Controllers\RightsRequestApproverController::class, 'update'])
    ->name('Rights.update');
    Route::get(
        '/Rights/Admin/{ticket}/edit',[\App\Http\Controllers\RightsRequestAdminEditController::class,'edit']
    )->name('Rights.adminedit');
    Route::put(
        '/Rights/Admin/{ticket}', [\App\Http\Controllers\RightsRequestAdminEditController::class, 'update'])
    ->name('Rights.adminupdate');

    Route::post('/release-ticket/{ticket_No}', [\App\Http\Controllers\RightsRequestAdminEditController::class, 'release'])
    ->name('releaseTicket');

    Route::post('/escalate-ticket/{ticket_No}', [\App\Http\Controllers\RightsRequestAdminEditController::class, 'escalate'])
    ->name('escalateTicket');

    //*****Stationery Stock*****//
    Route::get(
        '/Stationerystore', [\App\Http\Controllers\StationeryStoreController::class, 'index'])
    ->name('stationerystore.index');
    Route::get(
        '/Stationerystore/create', [\App\Http\Controllers\StationeryStoreController::class, 'create']
    )->name('stationerystore.create');
    Route::post(
        '/Stationerystore/create',[App\Http\Controllers\StationeryStoreController::class,'store']
    )->name("stationery.post");
    Route::get(
        '/request-stationery', [StockRequestController::class, 'showRequestForm']
    )->name('request-stationery');
    Route::post(
        '/submit-request', [StockRequestController::class, 'submitRequest']
    )->name('submit-request');
    Route::post(
        '/Stationerystore/assignStationery',[App\Http\Controllers\StationeryStoreController::class,'assignStationery']
    )->name("stationery.assignStationery");

    //*****Approver*******//
        Route::get('/approver', [ApproverController::class, 'index'])->name('approver.index');
        Route::get(
            '/approver/{ticket}/edit',[\App\Http\Controllers\ApproverController::class,'edit']
        )->name('approver.edit');
        Route::put(
            '/approver/{ticket}', [ApproverController::class, 'update']
        )->name('approver.update');
        Route::post(
            '/approver',[\App\Http\Controllers\ApproverController::class,'post']
        )->name("approver.post");
    //*****Approver*******//

    Route::get(
        '/Admin/ticketlifecycle',[\App\Http\Controllers\TicketLifeCycleController::class,'index'])
    ->name('admin.ticketlifecycle');
    Route::get(
        '/Admin/statistics',[\App\Http\Controllers\AdminStatisticsController::class,'index'])
    ->name('admin.statistics');
    Route::get(
        '/Admin',[\App\Http\Controllers\AdminController::class,'index'])
    ->name('admin.index');
    Route::get(
        '/Admin/tickets',[\App\Http\Controllers\AllTicketsController::class,'index'])
    ->name('alltickets.index');
    Route::get(
        '/Admin/allrightsticket',[\App\Http\Controllers\AllTicketsController::class,'AllRightsrequestshow'])
    ->name('allrightsticket.index');
    Route::get(
        '/Admin/{ticket}/edit',[\App\Http\Controllers\AdminController::class,'edit'])
    ->name('admin.edit');
    Route::put(
        '/Admin/{ticket}', [AdminController::class, 'update'])
    ->name('admin.update');
    Route::post(
        '/Admin',[\App\Http\Controllers\AdminController::class,'post'])
    ->name("admin.post");
    
    //Locked Tickets Relaese
    Route::post(
        '/Admin/{ticket}/release',[\App\Http\Controllers\AdminController::class,'release'])
    ->name("admin.release");
    Route::get(
        '/Admin/AutoReleaseTicket',[\App\Http\Controllers\AdminController::class,'AutoReleaseTicket']
    )->name('admin.AutoReleaseTicket');
    Route::post(
        '/Admin/{ticket}/escalate',[\App\Http\Controllers\AdminController::class,'escalate'])
    ->name('admin.escalate');
    Route::get(
        '/users/{user}/edit',[\App\Http\Controllers\UsersprofilesupdateController::class,'edit'])
    ->name('users.edit');
    Route::put(
        '/users/{ticket}', [UsersprofilesupdateController::class, 'update'])
    ->name('users.update');
   
    Route::get(
        '/Technician',[\App\Http\Controllers\TechnicianController::class,'index'])
    ->name('technician.index');
    Route::get(
        '/Technician/{ticket}/edit',[\App\Http\Controllers\TechnicianController::class,'edit'])
    ->name('technician.edit');
    Route::get(
        '/Technician/{ticket}', [\App\Http\Controllers\TechnicianController::class, 'show'])
    ->name('technician.show');

}

);

