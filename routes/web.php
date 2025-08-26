<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitorContrroler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\IdTypeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ParkingSlotController;
use App\Http\Controllers\ParkingStatusController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\VisitorPolicyController;
use App\Http\Controllers\ReceptionistParkingController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/super-admin', [DashboardController::class, 'superAdmin'])->name('dashboard.superAdmin');
        Route::get('/receptionist', [DashboardController::class, 'receptionist'])->name('dashboard.receptionist');
        Route::get('/host', [DashboardController::class, 'host'])->name('dashboard.host');
        Route::get('/company-admin', [DashboardController::class, 'companyAdmin'])->name('dashboard.companyAdmin');
        Route::get('/user-role-counts', [DashboardController::class, 'getUserRoleCounts'])->name('userRoleCounts');
    });
    Route::resource('/company', CompanyController::class);
    Route::get('/company/{compnyId}/department', [CompanyController::class, 'getDepartments'])->name('company.getDepartments');
    Route::get('/company/{compnyId}/designation/{departmentId?}', [CompanyController::class, 'getDesignations'])->name('company.getDesignations');
    Route::get('/company/{compnyId}/host/{departmentId?}/{designationId?}', [CompanyController::class, 'getHosts'])->name('company.getHosts');




    // in receptionist parking slot alotment
    Route::get('/receptionist/parking', [ReceptionistParkingController::class, 'index'])->name('ReceptionParking');
    Route::post('/receptionist/parking/release/{id}', [ReceptionistParkingController::class, 'release'])->name('receptionist.parking.release');

    // Route::resource('users', UsersController::class)->except(['create']);
    // Route::post('/update-user-role', [UsersController::class, 'updateUserRole'])->name('updateUserRole');
    Route::get('/company/setting/{compnyId}', [CompanyController::class, 'companySetting'])->name('company.setting');
    Route::put('/company/setting/{compnyId}', [CompanyController::class, 'updateCompany'])->name('company.update');

    Route::resource('receptionist', ReceptionistController::class);
    // get visitors in receptionist
    // Route::get('/receptionist', [ReceptionistController::class, 'receptionistPage'])->name('receptionist.page');
    Route::get('/receptionist/checkin/{id}', [ReceptionistController::class, 'checkIn'])->name('receptionist.checkin');

    Route::get('/visitor/logs', [VisitorContrroler::class, 'logs'])->name('system-logs');
    Route::put('/visitor/{visitorId}/update-exited-at', [VisitorContrroler::class, 'updateExitedAt'])->name('visitor.updateExitedAt');
    Route::post('/visitor/status_update', [VisitorContrroler::class, 'updateStatus'])->name('visitor.updateStatus');


    Route::resource('departments', DepartmentController::class);
    Route::resource('designations', DesignationController::class);

    Route::resource('hosts', HostController::class);
    Route::get('/departments/{department}/designations', [HostController::class, 'getDesignations'])->name('departments.designations');
    // for excel upload
    Route::post('/import-hosts', [HostController::class, 'import'])->name('hosts.import');
    Route::get('/export-hosts', [HostController::class, 'export'])->name('hosts.export');
    Route::get('/download/template', [HostController::class, 'downloadTemplate'])->name('hosts.downloadTemplate');


    Route::get('/building/create', [BuildingController::class, 'create'])->name('buildings.create');
    Route::post('/building/store/{id?}', [BuildingController::class, 'store'])->name('buildings.store');
});

Route::get('/public-form/{company_id}/{expire_at}/{host_id}', [HostController::class, 'showPublicForm'])->name('public.form');
// Route::get('/public-form/{company}/{timestamp}/{host}', function ($company, $timestamp, $host) {
//     return "Company: $company, Timestamp: $timestamp, Host: $host";
// });
Route::post('/public-form', [HostController::class, 'storePublicForm'])->name('public.form.store');
Route::resource('visitors', VisitorContrroler::class);

Route::get('/visitor/{id}/approve', [VisitorContrroler::class, 'approveVisitor'])->name('visitor.approve');
Route::get('/visitor/{id}/cancel', [VisitorContrroler::class, 'cancelVisitor'])->name('visitor.cancel');



















//notifications
Route::get('/notifications/fetch', [NotificationController::class, 'fetchNotifications'])->name('notifications.fetch');
// Route::get('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
Route::get('/visitors/{visitor}', [NotificationController::class, 'show'])->name('visitors.show');
Route::get('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
Route::post('/notifications/{notification}/read', function ($notificationId) {
    $notification = auth()->user()->notifications()->find($notificationId);
    if ($notification) {
        $notification->markAsRead();
    }
    return response()->json(['success' => true]);
})->name('notifications.read.post');



Route::resource('visitor-policy', VisitorPolicyController::class)->except(['create']);
Route::resource('parkingStatus', ParkingStatusController::class);
Route::resource('parkingSlot', ParkingSlotController::class);
Route::resource('IdType', IdTypeController::class);
Route::get('/today-parking-slots', [ParkingController::class, 'index'])->name('parking.index');
Route::get('/departments/{companyId}', [VisitorContrroler::class, 'getDepartment'])->name('visitor.getDepartment');


// logout ke liye hai jab kabhi ap galat dashboard mai chalejao
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('message', 'You have been logged out.');
})->name('logout');


Route::get('/run-migrations-clear-cache', function () {
    // Run the migrations
    Artisan::call('migrate', [
        '--force' => true // Important: force to avoid confirmation in production
    ]);

    // Clear the application cache
    Artisan::call('cache:clear');

    // Clear config cache
    Artisan::call('config:clear');

    // Clear route cache
    Artisan::call('route:clear');

    // Clear view cache
    Artisan::call('view:clear');

    return 'Migrations run and cache cleared successfully!';
});
