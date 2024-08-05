<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Reciept\PaymentReciept;
use App\Http\Controllers\UserController;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Attendance\AttendanceSheet;
use App\Livewire\Email\ContactForm;
use App\Livewire\Employee\EmployeeList;
use App\Livewire\Employee\EmployeeViewModal;
use App\Livewire\Events\EventManageModal;
use App\Livewire\Inquiry\InquiryList;
use App\Livewire\Leave\LeaveList;
use App\Livewire\Payment\PaidList;
use App\Livewire\SendEmail\SendMail;
use App\Livewire\Supervisor\SupervisorList;
use App\Livewire\User\Leave\ApplyLeave;
use App\Livewire\User\UserDashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

require __DIR__ . '/auth.php';

// Route::get('/', function (Request $request) {
//     return redirect($request->user()->role === "admin" ? 'admin/dashboard' : 'user/dashboard');
//     // return redirect($request->user()->role === "admin" ? 'user/dashboard' : 'admin/dashboard');
// })->middleware(['auth']);
Route::get('/', function (Request $request) {
    $role = $request->user()->role;

    if ($role === 'admin') {
        return redirect('admin/dashboard');
    } else {
        return redirect('user/dashboard');
    }
})->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
    // Route::get('/user/dashboard', AdminDashboard::class)->name('user.dashboard');
    Route::get('/user/dashboard', UserDashboard::class)->name('user.dashboard');

    Route::get('/employee/list', EmployeeList::class)->name('employee.list');
    Route::get('/supervisor/list', SupervisorList::class)->name('supervisor.list');
    Route::get('/inquiry/list', InquiryList::class)->name('inquiry.list');
    Route::get('/leave/list', LeaveList::class)->name('leave.list');
    // Route::get('/send/email', LeaveList::class)->name('send.email');
    Route::get('/send/email', ContactForm::class)->name('send.email');
    Route::get('/event/calender', EventManageModal::class)->name('event.calender');
    Route::get('/pay/list', PaidList::class)->name('pay.list');
    Route::get('/attendance/sheet', AttendanceSheet::class)->name('attendance.sheet');

    Route::get('/reciepts/{payment}', [PaymentReciept::class, 'index'])->name('payment.reciept');


});


//agent routes
Route::middleware(['auth', 'role:user'])->group(function () {

    // Route::get('user/dashboard',UserDashboard::class)->name('user.dashboard');

});

Route::get('test', function () {
    return view('layouts.admin');
});
