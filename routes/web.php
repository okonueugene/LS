<?php

use App\Http\Livewire\Admin\Profile;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Admin\Holidays;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Companies;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Employees;
use App\Http\Livewire\Admin\ApplyLeave;
use App\Http\Livewire\Admin\LeaveTypes;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Admin\Departments;
use App\Http\Livewire\Admin\ManageLeave;
use App\Http\Livewire\Admin\ApprovedLeave;
use App\Http\Livewire\Admin\RejectedLeave;
use App\Http\Livewire\Manager\ManagerProfile;
use App\Http\Livewire\Manager\ManagerHolidays;
use App\Http\Livewire\Employee\EmployeeHoliday;
use App\Http\Livewire\Employee\EmployeeProfile;
use App\Http\Livewire\GeneralManager\GmProfile;
use App\Http\Livewire\Manager\ManagerDashboard;
use App\Http\Livewire\Manager\ManagerEmployees;
use App\Http\Livewire\GeneralManager\GmHolidays;
use App\Http\Livewire\Manager\ManagerApplyLeave;
use App\Http\Livewire\Manager\ManagerLeaveTypes;
use App\Http\Livewire\Employee\EmployeeDashboard;
use App\Http\Livewire\GeneralManager\GmDashboard;
use App\Http\Livewire\GeneralManager\GmEmployees;
use App\Http\Livewire\Manager\ManagerDepartments;
use App\Http\Livewire\Manager\ManagerManageLeave;
use App\Http\Livewire\Employee\EmployeeApplyLeave;
use App\Http\Livewire\GeneralManager\GmApplyLeave;
use App\Http\Livewire\GeneralManager\GmDepartment;
use App\Http\Livewire\GeneralManager\GmLeaveTypes;
use App\Http\Livewire\GeneralManager\GmManageLeave;
use App\Http\Livewire\Manager\ManagerApprovedLeave;
use App\Http\Livewire\Manager\ManagerRejectedLeave;
use App\Http\Livewire\Employee\EmployeeApprovedLeave;
use App\Http\Livewire\Employee\EmployeeRejectedLeave;
use App\Http\Livewire\GeneralManager\GmApprovedLeave;
use App\Http\Livewire\GeneralManager\GmRejectedLeave;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=> 'auth'], function () {
    Route::group(
        [
        'prefix'=>'admin',
        'middleware'=>'admin',
        'as'=>'admin.'
    ],
        function () {
            Route::get('/dashboard', Dashboard::class)->name('admin-dashboard');
            Route::get('/companies', Companies::class)->name('admin-company');
            Route::get('/holidays', Holidays::class)->name('admin-holidays');
            Route::get('/depatments', Departments::class)->name('admin-departments');
            Route::get('/leave-types', LeaveTypes::class)->name('admin-leavetypes');
            Route::get('/employees', Employees::class)->name('admin-employees');
            Route::get('/profile', Profile::class)->name('admin-profile');
            Route::get('/manage-leave', ManageLeave::class)->name('admin-manage-leave');
            Route::get('/apply-leave', ApplyLeave::class)->name('admin-apply-leave');
            Route::get('/approved-leave', ApprovedLeave::class)->name('admin-approved-leave');
            Route::get('/rejected-leave', RejectedLeave::class)->name('admin-rejected-leave');
        }
    );
    Route::group(
        [
        'prefix'=>'employee',
        'middleware'=>'employee',
        'as'=>'employee.'

    ],
        function () {
            Route::get('/dashboard', EmployeeDashboard::class)->name('employee-dashboard');
            Route::get('/holidays', EmployeeHoliday::class)->name('employee-holidays');
            Route::get('/profile', EmployeeProfile::class)->name('employee-profile');
            Route::get('/apply-leave', EmployeeApplyLeave::class)->name('employee-apply-leave');
            Route::get('/approved-leave', EmployeeApprovedLeave::class)->name('employee-approved-leave');
            Route::get('/rejected-leave', EmployeeRejectedLeave::class)->name('employee-rejected-leave');
        }
    );
    Route::group(
        [
        'prefix'=>'manager',
        'middleware'=>'manager',
        'as'=>'manager.'

    ],
        function () {
            Route::get('/dashboard', ManagerDashboard::class)->name('manager-dashboard');
            Route::get('/holidays', ManagerHolidays::class)->name('manager-holidays');
            Route::get('/departments', ManagerDepartments::class)->name('manager-departments');
            Route::get('/leave-types', ManagerLeaveTypes::class)->name('manager-leave-types');
            Route::get('/employees', ManagerEmployees::class)->name('manager-employees');
            Route::get('/profile', ManagerProfile::class)->name('manager-profile');
            Route::get('/manage-leaves', ManagerManageLeave::class)->name('manager-manage-leave');
            Route::get('/apply-leave', ManagerApplyLeave::class)->name('manager-apply-leave');
            Route::get('/approved-leave', ManagerApprovedLeave::class)->name('manager-approved-leave');
            Route::get('/rejected-leave', ManagerRejectedLeave::class)->name('manager-rejected-leave');
        }
    );
    Route::group(
        [
        'prefix'=>'general',
        'middleware'=>'general manager',
        'as'=>'gm.'

    ],
        function () {
            Route::get('/dashboard', GmDashboard::class)->name('gm-dashboard');
            Route::get('/holidays', GmHolidays::class)->name('gm-holidays');
            Route::get('/departments', GmDepartment::class)->name('gm-departments');
            Route::get('/leave-types', GmLeaveTypes::class)->name('gm-leave-types');
            Route::get('/apply-leaves', GmApplyLeave::class)->name('gm-apply-leaves');
            Route::get('/approved-leave', GmApprovedLeave::class)->name('gm-approved-leave');
            Route::get('/rejected-leave', GmRejectedLeave::class)->name('gm-rejected-leave');
            Route::get('/manage-leave', GmManageLeave::class)->name('gm-manage-leave');
            Route::get('/employees', GmEmployees::class)->name('gm-employees');
            Route::get('/profile', GmProfile::class)->name('gm-profile');
        }
    );
});
