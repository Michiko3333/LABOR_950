<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\EgovController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\KgiController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdministrativeController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RegulationController;
use App\Http\Controllers\DepartmentInforController;
use App\Http\Controllers\Ledger\ListController;
use App\Http\Controllers\Ledger\SampleController;
use App\Http\Controllers\ledger\FirstWageCertificatesEmploymentInsuredAtSixtyController;
use App\Http\Controllers\Ledger\HealthAndPensionInsuredBonusPaymentNotificationController;
use App\Http\Controllers\Ledger\HealthInsurancePensionInsuredQualificationLossController;
use App\Http\Controllers\ledger\WageCertificatesEmploymentInsuredAtSixtyController;
use App\Http\Controllers\Ledger\EmploymentInsuredQualificationGetController;
use App\Http\Controllers\Ledger\EmploymentInsuredTransferNotificationController;
use App\Http\Controllers\Ledger\HealthInsuranceWelfarePensionInsuranceBasicMonthlyRemunerationCalculationNotificationForInsuredPersonsController;
use App\Http\Controllers\ledger\HealthInsuranceWelfarePensionInsuranceEligibilityAcquisitionNotificationController;
use App\Http\Controllers\Ledger\HealthInsuranceEmployeePensionInsuranceMonthlyRemunerationChangeNotificationController;
use App\Http\Controllers\ledger\FirstParentalLeaveBenefitsForEmploymentInsuranceController;
use App\Http\Controllers\Ledger\EmploymentInsuredLeaveStartAmountMonthlyCertificateController;
use App\Http\Controllers\ledger\ContinuousEmploymentBenefitsForOlderWorkersController;
use App\Http\Controllers\ledger\HealthInsuranceEmployeePensionInsuranceBonusNonPaymentReportElectronicApplicationController;
use App\Http\Controllers\Ledger\EmploymentInsuranceChildcareLeaveApplicationController;
use App\Http\Controllers\ledger\EmploymentInsuranceSeniorContinuationAllowanceController;
use App\Http\Controllers\Ledger\EmploymentInsuredStatusAcquisitionNotIssuedSeparationFormController;
use App\Http\Controllers\Ledger\EmploymentInsuredQualificationLossController;
use App\Http\Controllers\Ledger\CaregiverLeaveBenefitApplicationController;
use App\Http\Controllers\Ledger\HealthInsuranceDependentChangeController;
use App\Http\Controllers\CompanyDepartmentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\LaborCompanyController;
use App\Http\Controllers\ManagerialPositionController;

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

/** ヘルスチェック */
Route::group(['prefix' => 'healthcheck'], function () {
    Route::get('/', function () {
        return response()->json([]);
    });
});


/** 未ログイン */

Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login_post');
Route::post('/toast', [Controller::class, 'resetToast'])->name('toast.reset');


/** ログイン必須ページ */
Route::group(['middleware' => 'auth'], function () {
    Route::match(['get', 'post'], '/', [HomeController::class, 'index'])->name('home.index');

    Route::get('/select', [HomeController::class, 'select'])->name('home.select');
    Route::post('/select', [HomeController::class, 'select_post'])->name('home.select_post');

    Route::get('/logout', [LogoutController::class, 'index'])->name('auth.logout');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('auth.logout_post');
    Route::get('/resident_voice', [ResidentController::class, 'index'])->name('resident_voice');
    Route::get('/department_contact', [DepartmentController::class, 'index'])->name('department_contact');
    Route::get('/kgi_information', [KgiController::class, 'index'])->name('kgi_information');
    Route::get('/business_request', [BusinessController::class, 'index'])->name('business_request');
    Route::get('/alert', [AlertController::class, 'index'])->name('alert');
    Route::get('/about_us', [AboutController::class, 'index'])->name('about_us');
    Route::get('/employee_information', [EmployeeController::class, 'index'])->name('information');
    Route::get('/administrative_procedure', [AdministrativeController::class, 'index'])->name('administrative');
    Route::get('/regulation_related', [RegulationController::class, 'index'])->name('regulation_related');
    Route::get('/department_information', [DepartmentInforController::class, 'index'])->name('department_information');
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');

    // 帳票
    Route::get('/ledger', [ListController::class, 'index'])->name('ledger.index');

    // EgovAPI
    Route::get('/auth/redirect', [EgovController::class, 'getAuthCode'])->name('egov.get_auth_code');

    // Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/company', [AdminController::class, 'company_list'])->name('admin.company');
    Route::get('/admin/company/create', [AdminController::class, 'company_create'])->name('admin.company_create');
    Route::post('/admin/company/create', [AdminController::class, 'company_create_post'])->name('admin.company_create_post');
    Route::get('/admin/company/list', [AdminController::class, 'company_list_api'])->name('admin.company_list_api');
    Route::get('/admin/company/edit/{id}', [AdminController::class, 'company_update'])->name('admin.company_update');
    Route::post('/admin/company/edit/{id}', [AdminController::class, 'company_update_post'])->name('admin.company_update_post');
    Route::get('/admin/company/department/{id}', [AdminController::class, 'company_department_update'])->name('admin.company_department_update');
    Route::post('/admin/company/department/{id}', [AdminController::class, 'company_department_update_post'])->name('admin.company_department_update_post');

    Route::get('/admin/labor', [AdminController::class, 'labor_list'])->name('admin.labor');
    Route::get('/admin/labor/create', [AdminController::class, 'labor_create'])->name('admin.labor_create');
    Route::post('/admin/labor/create', [AdminController::class, 'labor_create_post'])->name('admin.labor_create_post');
    Route::get('/admin/labor/edit/{id}', [AdminController::class, 'labor_update'])->name('admin.labor_update');
    Route::post('/admin/labor/edit/{id}', [AdminController::class, 'labor_update_post'])->name('admin.labor_update_post');

    ///Route::get('/admin/employee', [AdminController::class, 'employee_list'])->name('admin.employee');
    Route::get('/admin/employee/create', [AdminController::class, 'employee_create'])->name('admin.employee_create');
    Route::post('/admin/employee/create', [AdminController::class, 'employee_create_post'])->name('admin.employee_create_post');
    Route::get('/admin/employee/edit/{id}', [AdminController::class, 'employee_update'])->name('admin.employee_update');
    Route::post('/admin/employee/edit/{id}', [AdminController::class, 'employee_update_post'])->name('admin.employee_update_post');
    Route::post('/admin/api/department/list', [AdminController::class, 'get_departments'])->name('admin.get_departments');

    // Ledger
    Route::post('/ledger/api/auth', [EgovController::class, 'auth'])->name('egov.auth');
    Route::post('/ledger/api/disconnect', [EgovController::class, 'disconnect'])->name('egov.disconnect');
    Route::get('/ledger/egov', [EgovController::class, 'index'])->name('ledger.egov');
    Route::get('/ledger/sample', [SampleController::class, 'index'])->name('ledger.sample');
    Route::get('/ledger/4950008680045000', [FirstWageCertificatesEmploymentInsuredAtSixtyController::class, 'index'])->name('ledger.4950008680045000');
    Route::post('/ledger/4950008680045000', [FirstWageCertificatesEmploymentInsuredAtSixtyController::class, 'post'])->name('ledger.4950008680045000_post');
    Route::get('/ledger/4950013520733000', [HealthAndPensionInsuredBonusPaymentNotificationController::class, 'index'])->name('ledger.4950013520733000');
    Route::post('/ledger/4950013520733000', [HealthAndPensionInsuredBonusPaymentNotificationController::class, 'post'])->name('ledger.4950013520733000_post');
    Route::get('/ledger/4950013520714000', [HealthInsurancePensionInsuredQualificationLossController::class, 'index'])->name('ledger.4950013520714000');
    Route::post('/ledger/4950013520714000', [HealthInsurancePensionInsuredQualificationLossController::class, 'post'])->name('ledger.4950013520714000_post');
    Route::get('/ledger/4950008680044000', [WageCertificatesEmploymentInsuredAtSixtyController::class, 'index'])->name('ledger.4950008680044000');
    Route::post('/ledger/4950008680044000', [WageCertificatesEmploymentInsuredAtSixtyController::class, 'post'])->name('ledger.4950008680044000_post');
    Route::get('/ledger/4950008680040000', [EmploymentInsuredTransferNotificationController::class, 'index'])->name('ledger.4950008680040000');
    Route::post('/ledger/4950008680040000', [EmploymentInsuredTransferNotificationController::class, 'post'])->name('ledger.4950008680040000_post');
    Route::get('/ledger/4950013520989000', [HealthInsuranceWelfarePensionInsuranceBasicMonthlyRemunerationCalculationNotificationForInsuredPersonsController::class, 'index'])->name('ledger.4950013520989000');
    Route::post('/ledger/4950013520989000', [HealthInsuranceWelfarePensionInsuranceBasicMonthlyRemunerationCalculationNotificationForInsuredPersonsController::class, 'post'])->name('ledger.4950013520989000_post');
    Route::get('/ledger/4950013520711000', [HealthInsuranceWelfarePensionInsuranceEligibilityAcquisitionNotificationController::class, 'index'])->name('ledger.4950013520711000');
    Route::post('/ledger/4950013520711000', [HealthInsuranceWelfarePensionInsuranceEligibilityAcquisitionNotificationController::class, 'post'])->name('ledger.4950013520711000_post');
    Route::get('/ledger/4950013520990000', [HealthInsuranceEmployeePensionInsuranceMonthlyRemunerationChangeNotificationController::class, 'index'])->name('ledger.4950013520990000');
    Route::post('/ledger/4950013520990000', [HealthInsuranceEmployeePensionInsuranceMonthlyRemunerationChangeNotificationController::class, 'post'])->name('ledger.4950013520990000_post');
    Route::get('/ledger/4950008680182000', [FirstParentalLeaveBenefitsForEmploymentInsuranceController::class, 'index'])->name('ledger.4950008680182000');
    Route::post('/ledger/4950008680182000', [FirstParentalLeaveBenefitsForEmploymentInsuranceController::class, 'post'])->name('ledger.4950008680182000_post');
    Route::get('/ledger/4950008680048000', [EmploymentInsuredLeaveStartAmountMonthlyCertificateController::class, 'index'])->name('ledger.4950008680048000');
    Route::post('/ledger/4950008680048000', [EmploymentInsuredLeaveStartAmountMonthlyCertificateController::class, 'post'])->name('ledger.4950008680048000_post');
    Route::get('/ledger/4950008680047000', [ContinuousEmploymentBenefitsForOlderWorkersController::class, 'index'])->name('ledger.4950008680047000');
    Route::post('/ledger/4950008680047000', [ContinuousEmploymentBenefitsForOlderWorkersController::class, 'post'])->name('ledger.4950008680047000_post');
    Route::get('/ledger/4950013520873000', [HealthInsuranceEmployeePensionInsuranceBonusNonPaymentReportElectronicApplicationController::class, 'index'])->name('ledger.4950013520873000');
    Route::post('/ledger/4950013520873000', [HealthInsuranceEmployeePensionInsuranceBonusNonPaymentReportElectronicApplicationController::class, 'post'])->name('ledger.4950013520873000_post');
    Route::get('/ledger/4950008680050000', [EmploymentInsuranceChildcareLeaveApplicationController::class, 'index'])->name('ledger.4950008680050000');
    Route::post('/ledger/4950008680050000', [EmploymentInsuranceChildcareLeaveApplicationController::class, 'post'])->name('ledger.4950008680050000_post');
    Route::get('/ledger/4950008680046000', [EmploymentInsuranceSeniorContinuationAllowanceController::class, 'index'])->name('ledger.4950008680046000');
    Route::post('/ledger/4950008680046000', [EmploymentInsuranceSeniorContinuationAllowanceController::class, 'post'])->name('ledger.4950008680046000_post');
    Route::get('/ledger/4950008680034000', [EmploymentInsuredStatusAcquisitionNotIssuedSeparationFormController::class, 'index'])->name('ledger.4950008680034000');
    Route::post('/ledger/4950008680034000', [EmploymentInsuredStatusAcquisitionNotIssuedSeparationFormController::class, 'post'])->name('ledger.4950008680034000_post');
    Route::get('/ledger/4950008680035000', [EmploymentInsuredQualificationLossController::class, 'index'])->name('ledger.4950008680035000');
    Route::post('/ledger/4950008680035000', [EmploymentInsuredQualificationLossController::class, 'post'])->name('ledger.4950008680035000_post');
    Route::get('/ledger/4950008680051000', [CaregiverLeaveBenefitApplicationController::class, 'index'])->name('ledger.4950008680051000');
    Route::post('/ledger/4950008680051000', [CaregiverLeaveBenefitApplicationController::class, 'post'])->name('ledger.4950008680051000_post');
    Route::get('/ledger/4950008680033000', [EmploymentInsuredQualificationGetController::class, 'index'])->name('ledger.4950008680033000');
    Route::post('/ledger/4950008680033000', [EmploymentInsuredQualificationGetController::class, 'post'])->name('ledger.4950008680033000_post');
    Route::get('/ledger/4950013520996000', [HealthInsuranceDependentChangeController::class, 'index'])->name('ledger.4950013520996000');
    Route::post('/ledger/4950013520996000', [HealthInsuranceDependentChangeController::class, 'post'])->name('ledger.4950013520996000_post');

    // 顧客画面
    Route::get('/company/department', [CompanyDepartmentController::class, 'current_company_department_update'])->name('current_company_department_update');
    Route::post('/company/department', [CompanyDepartmentController::class, 'current_company_department_update_post'])->name('current_company_department_update_post');

    Route::get('/company', [CompanyController::class, 'company_edit'])->name('company_edit');
    Route::post('/company', [CompanyController::class, 'company_edit_post'])->name('company_edit_post');

    Route::get('/company/branch', [BranchController::class, 'branch'])->name('branch');
    Route::post('/company/branch', [BranchController::class, 'branch_post'])->name('branch_post');

    Route::get('/labor/company', [LaborCompanyController::class, 'labor_company_update'])->name('labor_company_update');
    Route::post('/labor/company', [LaborCompanyController::class, 'labor_company_update_post'])->name('labor_company_update_post');

    Route::get('/managerial_position', [ManagerialPositionController::class, 'managerial_position'])->name('managerial_position');
    Route::post('/managerial_position', [ManagerialPositionController::class, 'managerial_position_post'])->name('managerial_position_post');
});
