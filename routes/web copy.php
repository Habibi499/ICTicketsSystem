<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApproverController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
   Route::get('/admin/status/{user}/edit', [App\Http\Controllers\AdminStatusController::class, 'edit'])->name('admin.status.edit');
    Route::put('/admin/status/{user}', [App\Http\Controllers\AdminStatusController::class, 'update'])->name('admin.status.update');
   
    //Printers and Cartridges
    Route::get('/printers', [\App\Http\Controllers\PrinterController::class, 'index'])->name('printer.index');
    Route::get('/printers/create',[App\Http\Controllers\PrinterController::class,'create'])->name('printer.create');
    Route::post('/printers',[App\Http\Controllers\PrinterController::class,'store'])->name('printer.post');
    Route::get('/printers/assigntoners',[App\Http\Controllers\TonerController::class,'allocationForm'])->name('printer.assigntoners');
    Route::post('/printers/assigntoners',[App\Http\Controllers\TonerController::class,'allocate'])->name('toner.allocate');
    Route::get('pdf/generate-pdf', [\App\Http\Controllers\PrinterController::class, 'generatePDF'])->name('pdf.generate-pdf');
   
    Route::get('/printers/updatetoners', [\App\Http\Controllers\UpdateTonerStockController::class, 'index'])->name('printer.updatetoners');

    Route::post('/printers/updatetoners/edit', [\App\Http\Controllers\UpdateTonerStockController::class, 'update'])->name('printer.updatetoners.edit');
    //Printers and Catriges End

    Route::get('Admin/active', [\App\Http\Controllers\showActiveLoginsController::class, 'showActiveLogins'])->name('admin.active');
    Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

 
    Route::get('/approver/Hod', [\App\Http\Controllers\HodController::class, 'index'])->name('hod.index');
    Route::get('/approver/DepartmentUnapproved', [\App\Http\Controllers\HodController::class, 'allunapproved'])->name('hod.departmentunapproved');

    

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/firstlogin', [\App\Http\Controllers\ProfileController::class, 'firstlogin'])->name('profile.firstlogin');

    Route::get('Tickets/myunapprovedtickets', [\App\Http\Controllers\UnApprovedTicketsController::class, 'index'])->name('unapprovedTickets.index');
    Route::get('Tickets/myapprovedtickets',[App\Http\Controllers\MyApprovedTicketsController::class,'index'])->name('approvedTickets.index');
    Route::get('Tickets/myassignedtickets',[App\Http\Controllers\MyAssignedTicketsController::class,'index'])->name('myassignedTickets.index');
   
    //Search
    Route::get('Tickets/search',[App\Http\Controllers\RequestedTicketsController::class,'search'])->name('ticket.search');
   
   //Search
    Route::get('/Tickets', [\App\Http\Controllers\TicketController::class, 'index'])->name('ticket.index');
    Route::get('/Tickets/create',[\App\Http\Controllers\TicketController::class,'create'])->name('ticket.create');
    Route::get('/Tickets/accountsform',[\App\Http\Controllers\AccountsTicketController::class,'create'])->name('ticket.accountsform');
    Route::get('/Tickets/claimsform',[\App\Http\Controllers\ClaimsCorrectionFormController::class,'create'])->name('ticket.claimsform');
    
    Route::get('/Tickets/newstaffForm',[\App\Http\Controllers\NewStaffFormController::class,'create'])->name('ticket.newstaffForm');


    Route::post('/Tickets','App\Http\Controllers\TicketController@store')->name("ticket.post");
    Route::get('/Tickets/passwordchange', [\App\Http\Controllers\PasswordChangeController::class, 'index'])->name('passwordchange.index');
    Route::post('/Tickets/passwordchange', [\App\Http\Controllers\PasswordChangeController::class, 'store'])->name('passwordchange.post');
    Route::get('/Tickets/mytickets', [\App\Http\Controllers\RequestedTicketsController::class, 'index'])->name('requestedtickets.index');
    Route::get('/Tickets/{ticket}', [\App\Http\Controllers\RequestedTicketsController::class, 'show'])->name('tickets.show');
   
    

    Route::get('/approver', [ApproverController::class, 'index'])->name('approver.index');
    Route::get('/approver/{ticket}/edit',[\App\Http\Controllers\ApproverController::class,'edit'])->name('approver.edit');
    Route::put('/approver/{ticket}', [ApproverController::class, 'update'])->name('approver.update');
    Route::post('/approver',[\App\Http\Controllers\ApproverController::class,'post'])->name("approver.post");
    
    Route::get('/Admin/ticketlifecycle',[\App\Http\Controllers\TicketLifeCycleController::class,'index'])->name('admin.ticketlifecycle');
    Route::get('/Admin/statistics',[\App\Http\Controllers\AdminStatisticsController::class,'index'])->name('admin.statistics');
    Route::get('/Admin',[\App\Http\Controllers\AdminController::class,'index'])->name('admin.index');
    Route::get('/Admin/tickets',[\App\Http\Controllers\AllTicketsController::class,'index'])->name('alltickets.index');
    Route::get('/Admin/{ticket}/edit',[\App\Http\Controllers\AdminController::class,'edit'])->name('admin.edit');
    Route::put('/Admin/{ticket}', [AdminController::class, 'update'])->name('admin.update');
    Route::post('/Admin',[\App\Http\Controllers\AdminController::class,'post'])->name("admin.post");
    
    //Locked Tickets Relaese
    Route::post('/Admin/{ticket}/release',[\App\Http\Controllers\AdminController::class,'release'])->name("admin.release");
    Route::get('/Admin/AutoReleaseTicket',[\App\Http\Controllers\AdminController::class,'AutoReleaseTicket'])->name('admin.AutoReleaseTicket');
    Route::post('/Admin/{ticket}/escalate',[\App\Http\Controllers\AdminController::class,'escalate'])->name('admin.escalate');

   
    Route::get('/Technician',[\App\Http\Controllers\TechnicianController::class,'index'])->name('technician.index');
    Route::get('/Technician/{ticket}/edit',[\App\Http\Controllers\TechnicianController::class,'edit'])->name('technician.edit');
    Route::get('/Technician/{ticket}', [\App\Http\Controllers\TechnicianController::class, 'show'])->name('technician.show');

}

);

