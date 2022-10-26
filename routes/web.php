<?php
use App\Http\Livewire\Admin\Leaves;
use App\Http\Livewire\Admin\Profile;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Admin\Holidays;
use App\Http\Livewire\Gm\GmDashboard;
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
use App\Http\Livewire\Manager\ManagerDashboard;
use App\Http\Livewire\Employee\EmployeeDashboard;

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
        Route::get('/leave', Leaves::class)->name('admin-leave');
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
        
        }
    ); Route::group(
        [
        'prefix'=>'manager',
        'middleware'=>'manager',
        'as'=>'manager.'

    ],
        function () {
        Route::get('/dashboard', ManagerDashboard::class)->name('manager-dashboard');
        
        }
    ); Route::group(
        [
        'prefix'=>'general_manager',
        'middleware'=>'general manager',
        'as'=>'gm.'

    ],
        function () {
        Route::get('/dashboard', GmDashboard::class)->name('gm-dashboard');
        
        }
    );
});
