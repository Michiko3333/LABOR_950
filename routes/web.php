<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\EgovController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Ledger\ListController;
use App\Http\Controllers\Ledger\SampleController;
use App\Http\Controllers\Ledger\FirstWageCertificatesEmploymentInsuredAtSixtyController;
use App\Http\Controllers\Ledger\HealthAndPensionInsuredBonusPaymentNotificationController;
use App\Http\Controllers\Ledger\HealthInsurancePensionInsuredQualificationLossController;
use App\Http\Controllers\Ledger\WageCertificatesEmploymentInsuredAtSixtyController;
use App\Http\Controllers\Ledger\EmploymentInsuredQualificationGetController;
use App\Http\Controllers\Ledger\EmploymentInsuredTransferNotificationController;
use App\Http\Controllers\Ledger\HealthInsuranceWelfarePensionInsuranceBasicMonthlyRemunerationCalculationNotificationForInsuredPersonsController;
use App\Http\Controllers\Ledger\HealthInsuranceWelfarePensionInsuranceEligibilityAcquisitionNotificationController;
use App\Http\Controllers\Ledger\HealthInsuranceEmployeePensionInsuranceMonthlyRemunerationChangeNotificationController;
use App\Http\Controllers\Ledger\FirstParentalLeaveBenefitsForEmploymentInsuranceController;
use App\Http\Controllers\Ledger\EmploymentInsuredLeaveStartAmountMonthlyCertificateController;
use App\Http\Controllers\Ledger\ContinuousEmploymentBenefitsForOlderWorkersController;
use App\Http\Controllers\Ledger\HealthInsuranceEmployeePensionInsuranceBonusNonPaymentReportElectronicApplicationController;
use App\Http\Controllers\Ledger\EmploymentInsuranceChildcareLeaveApplicationController;
use App\Http\Controllers\Ledger\EmploymentInsuranceSeniorContinuationAllowanceController;
use App\Http\Controllers\Ledger\EmploymentInsuredStatusAcquisitionNotIssuedSeparationFormController;
use App\Http\Controllers\Ledger\EmploymentInsuredQualificationLossController;
use App\Http\Controllers\Ledger\CaregiverLeaveBenefitApplicationController;
use App\Http\Controllers\Ledger\HealthInsuranceDependentChangeController;
use App\Http\Controllers\Ledger\MaternityLeaveApplicationOrChangeEndNoticeController;
use App\Http\Controllers\CompanyDepartmentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\LaborCompanyController;
use App\Http\Controllers\ManagerialPositionController;
use App\Http\Controllers\Contract\EmployeeContractController;
use App\Http\Controllers\EgovIssuesController;
use App\Http\Controllers\FinalExamAfterLogoutController;
use App\Http\Controllers\EgovTestController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\FinalExamController;
use App\Http\Controllers\ShiftCalendarController;
use App\Http\Controllers\WagesEmployeeController;
use App\Http\Controllers\AttendanceEmployeeController;
use App\Http\Controllers\PickUpController;
use App\Http\Controllers\QualificationsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use Symfony\Component\HttpFoundation\BinaryFileResponse;

use App\Models\CurrentUser;
use App\Models\Employee;

use App\Http\Middleware\CheckQueryParameters;
use App\Http\Middleware\EmployeeIconFile;

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
Route::middleware([CheckQueryParameters::class])->group(function () {
    Route::middleware([EmployeeIconFile::class])->group(function () {
        Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
        Route::post('/login', [LoginController::class, 'login'])->name('auth.login_post');
    });
});

/** ログイン必須ページ */
Route::group(['middleware' => 'auth'], function () {
    // EgovAPI
    Route::get('/auth/redirect', [EgovController::class, 'getAuthCode'])->name('egov.get_auth_code');

    Route::get('/photo/{path}', function (Request $request, $path) {
        $user = CurrentUser::info();
        $role_id = $user->role_id;
        $path = "photo/{$path}";
        if ($role_id === 999) {
            $filePath = Storage::path($path);
            if ($filePath && Storage::exists($path)) {
                return new BinaryFileResponse($filePath);
            } else {
                return new BinaryFileResponse(public_path('/img/image.png'));
            }
        } else {
            $pathParts = explode('/', $path);
            $requestCompanyId = (int)$pathParts[1] ?? null;

            if ($role_id === 500) {
                $user = CurrentUser::info();
                $employee_id = $user->id;
                $employee = Employee::where('id', $employee_id)->where('delete_flg', 0)->first();
                $branch = $employee->branch()->first();
                $company = $branch->company()->first();
                $company_id = $company->id;
                $clients = CurrentUser::clients()->with('company')->get();
                $clientCompanyIds = $clients->pluck('company.id')->toArray();
                array_push($clientCompanyIds, $company_id);

                if (in_array($requestCompanyId, $clientCompanyIds)) {
                    $filePath = Storage::path($path);
                    if (Storage::exists($path)) {
                        return new BinaryFileResponse($filePath);
                    } else {
                        return new BinaryFileResponse(public_path('/img/image.png'));
                    }
                } else {
                    return abort(403);
                }
            } else {
                $currentCompany = CurrentUser::currentCompany();
                $company_id = $currentCompany->id;
                $employee_id = $user->id;

                if ($company_id === $requestCompanyId) {
                    $filePath = Storage::path($path);
                    if (Storage::exists($path)) {
                        return new BinaryFileResponse($filePath);
                    }
                    return abort(403);
                } else {
                    return abort(403);
                }
            }
        }
    })->where('path', '.*');

    Route::get('/pick_up', [PickUpController::class, 'index'])->name('pickup.pickup');
  
    // 帳票
    Route::get('/ledger', [ListController::class, 'index'])->name('ledger.index');
    Route::get('/ledger/issues', [EgovIssuesController::class, 'index'])->name('ledger.issues');

    Route::middleware([CheckQueryParameters::class])->group(function () {

        Route::match(['get', 'post'], '/', [HomeController::class, 'index'])->name('home.index');

        Route::match(['get', 'post'], '/', [HomeController::class, 'index'])->name('home.index');

        Route::get('/select', [HomeController::class, 'select'])->name('home.select');
        Route::post('/select', [HomeController::class, 'select_post'])->name('home.select_post');

        Route::get('/logout', [LogoutController::class, 'index'])->name('auth.logout');
        Route::post('/logout', [LogoutController::class, 'logout'])->name('auth.logout_post');
        Route::get('/about_us', [AboutController::class, 'index'])->name('about_us');
        Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
        Route::get('/calendar/shift', [ShiftCalendarController::class, 'index'])->name('calendar.shift');
        Route::get('/calendar/shift/download', [ShiftCalendarController::class, 'download'])->name('calendar.shift_download');
        Route::get('/pick_up/setting', [PickUpController::class, 'setting'])->name('pickup.setting');
        Route::post('/pick_up/setting/pick_up_setting', [PickUpController::class, 'pick_up_setting'])->name('pickup.pick_up_setting');
        Route::post('/pick_up/setting/get_officers', [PickUpController::class, 'get_officers'])->name('pickup.get_officers');

        // EgovAPI 検証試験データ取得用
        if (config('egov.test') == true) {
            Route::get('/admin/egovtest', [EgovTestController::class, 'index'])->name('egovtest.index');
            Route::post('/admin/egovtest/dl', [EgovTestController::class, 'download'])->name('egovtest.download');
        }

        // Admin
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/admin/company', [AdminController::class, 'company_list'])->name('admin.company');
        Route::get('/admin/company/create', [AdminController::class, 'company_create'])->name('admin.company_create');
        Route::post('/admin/company/create', [AdminController::class, 'company_create_post'])->name('admin.company_create_post');
        Route::get('/admin/company/list', [AdminController::class, 'company_list_api'])->name('admin.company_list_api');
        Route::get('/admin/company/create/edit/{id}', [AdminController::class, 'company_update'])->name('admin.company_update');
        Route::post('/admin/company/create/edit/{id}', [AdminController::class, 'company_update_post'])->name('admin.company_update_post');
        Route::get('/admin/company/download/{company_id}/{document_type}', [AdminController::class, 'downloadFile'])->name('admin.downloadFile');

        // User
        Route::get('/admin/company/edit/{id}', [AdminController::class, 'company_update'])->name('admin.company_update');
        Route::post('/admin/company/edit/{id}', [AdminController::class, 'company_update_post'])->name('admin.company_update_post');
        Route::get('/admin/company/department/{id}', [AdminController::class, 'company_department_update'])->name('admin.company_department_update');
        Route::post('/admin/company/department/{id}', [AdminController::class, 'company_department_update_post'])->name('admin.company_department_update_post');

        Route::get('/admin/labor', [AdminController::class, 'labor_list'])->name('admin.labor');
        Route::get('/admin/labor/create', [AdminController::class, 'labor_create'])->name('admin.labor_create');
        Route::post('/admin/labor/create', [AdminController::class, 'labor_create_post'])->name('admin.labor_create_post');
        Route::get('/admin/labor/edit/{id}', [AdminController::class, 'labor_update'])->name('admin.labor_update');
        Route::post('/admin/labor/edit/{id}', [AdminController::class, 'labor_update_post'])->name('admin.labor_update_post');
        Route::get('/admin/labor/client/{id}', [AdminController::class, 'client'])->name('admin.client');

        Route::get('/admin/employee/create', [AdminController::class, 'employee_create'])->name('admin.employee_create');
        Route::post('/admin/employee/create', [AdminController::class, 'employee_create_post'])->name('admin.employee_create_post');
        Route::get('/admin/employee/edit/{id}', [AdminController::class, 'employee_update'])->name('admin.employee_update');
        Route::post('/admin/employee/edit/{id}', [AdminController::class, 'employee_update_post'])->name('admin.employee_update_post');
        Route::post('/admin/api/department/list', [AdminController::class, 'get_departments'])->name('admin.get_departments');
        Route::post('/admin/api/position/list', [AdminController::class, 'get_position'])->name('admin.get_position');
        Route::post('/admin/api/industry_type/list', [AdminController::class, 'get_industry_type'])->name('admin.get_industry_type');
        Route::post('/admin/api/qualifications/list', [AdminController::class, 'get_qualifications'])->name('admin.get_qualifications');

        // Ledger
        Route::post('/ledger/api/auth', [EgovController::class, 'auth'])->name('egov.auth');
        Route::post('/ledger/api/disconnect', [EgovController::class, 'disconnect'])->name('egov.disconnect');
        Route::get('/ledger/egov', [EgovController::class, 'index'])->name('ledger.egov');
        Route::get('/get-egov-account', [EgovController::class, 'getEgovAccount'])->name('get-egov-account');
        Route::get('/ledger/issues/detail/{id}', [EgovIssuesController::class, 'detail'])->name('ledger.detail');
        Route::post('/ledger/issues/detail/notice/{id}', [EgovIssuesController::class, 'getNotice'])->name('ledger.detail_notice');
        Route::post('/ledger/issues/detail/official/{id}', [EgovIssuesController::class, 'getOfficial'])->name('ledger.detail_official');

        Route::get('/ledger/sample', [SampleController::class, 'index'])->name('ledger.sample');
        Route::get('/ledger/4950008680045000', [FirstWageCertificatesEmploymentInsuredAtSixtyController::class, 'index'])->name('ledger.4950008680045000');
        Route::post('/ledger/4950008680045000', [FirstWageCertificatesEmploymentInsuredAtSixtyController::class, 'post'])->name('ledger.4950008680045000_post');
        Route::get('/ledger/4950013520991000', [OldHealthAndPensionInsuredBonusPaymentNotificationController::class, 'index'])->name('ledger.4950013520991000');
        Route::post('/ledger/4950013520991000', [OldHealthAndPensionInsuredBonusPaymentNotificationController::class, 'post'])->name('ledger.4950013520991000_post');
        Route::get('/ledger/4950013520714000', [HealthInsurancePensionInsuredQualificationLossController::class, 'index'])->name('ledger.4950013520714000');
        Route::post('/ledger/4950013520714000', [HealthInsurancePensionInsuredQualificationLossController::class, 'post'])->name('ledger.4950013520714000_post');
        Route::get('/ledger/4950008680044000', [WageCertificatesEmploymentInsuredAtSixtyController::class, 'index'])->name('ledger.4950008680044000');
        Route::post('/ledger/4950008680044000', [WageCertificatesEmploymentInsuredAtSixtyController::class, 'post'])->name('ledger.4950008680044000_post');
        Route::get('/ledger/4950008680040000', [EmploymentInsuredTransferNotificationController::class, 'index'])->name('ledger.4950008680040000');
        Route::post('/ledger/4950008680040000', [EmploymentInsuredTransferNotificationController::class, 'post'])->name('ledger.4950008680040000_post');
        Route::get('/ledger/4950013520989000', [OldHealthInsuranceWelfarePensionInsuranceBasicMonthlyRemunerationCalculationNotificationForInsuredPersonsController::class, 'index'])->name('ledger.4950013520989000');
        Route::post('/ledger/4950013520989000', [OldHealthInsuranceWelfarePensionInsuranceBasicMonthlyRemunerationCalculationNotificationForInsuredPersonsController::class, 'post'])->name('ledger.4950013520989000_post');
        Route::get('/ledger/4950013520711000', [OldHealthInsuranceWelfarePensionInsuranceEligibilityAcquisitionNotificationController::class, 'index'])->name('ledger.4950013520711000');
        Route::post('/ledger/4950013520711000', [OldHealthInsuranceWelfarePensionInsuranceEligibilityAcquisitionNotificationController::class, 'post'])->name('ledger.4950013520711000_post');
        Route::get('/ledger/4950013520990000', [OldHealthInsuranceEmployeePensionInsuranceMonthlyRemunerationChangeNotificationController::class, 'index'])->name('ledger.4950013520990000');
        Route::post('/ledger/4950013520990000', [OldHealthInsuranceEmployeePensionInsuranceMonthlyRemunerationChangeNotificationController::class, 'post'])->name('ledger.4950013520990000_post');
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
        Route::get('/ledger/4950013520996000', [OldHealthInsuranceDependentChangeController::class, 'index'])->name('ledger.4950013520996000');
        Route::post('/ledger/4950013520996000', [OldHealthInsuranceDependentChangeController::class, 'post'])->name('ledger.4950013520996000_post');
        // 2024/12/02新様式帳票
        Route::get('/ledger/4950013521025000', [HealthInsuranceEmployeePensionInsuranceMonthlyRemunerationChangeNotificationController::class, 'index'])->name('ledger.4950013521025000');
        Route::post('/ledger/4950013521025000', [HealthInsuranceEmployeePensionInsuranceMonthlyRemunerationChangeNotificationController::class, 'post'])->name('ledger.4950013521025000_post');
        Route::get('/ledger/4950013521024000', [HealthInsuranceWelfarePensionInsuranceBasicMonthlyRemunerationCalculationNotificationForInsuredPersonsController::class, 'index'])->name('ledger.4950013521024000');
        Route::post('/ledger/4950013521024000', [HealthInsuranceWelfarePensionInsuranceBasicMonthlyRemunerationCalculationNotificationForInsuredPersonsController::class, 'post'])->name('ledger.4950013521024000_post');
        Route::get('/ledger/4950013521026000', [HealthAndPensionInsuredBonusPaymentNotificationController::class, 'index'])->name('ledger.4950013521026000');
        Route::post('/ledger/4950013521026000', [HealthAndPensionInsuredBonusPaymentNotificationController::class, 'post'])->name('ledger.4950013521026000_post');

        Route::get('/ledger/4950013521019000', [HealthInsuranceWelfarePensionInsuranceEligibilityAcquisitionNotificationController::class, 'index'])->name('ledger.4950013521019000');
        Route::post('/ledger/4950013521019000', [HealthInsuranceWelfarePensionInsuranceEligibilityAcquisitionNotificationController::class, 'post'])->name('ledger.4950013521019000_post');
        Route::get('/ledger/4950013521021000', [HealthInsuranceDependentChangeController::class, 'index'])->name('ledger.4950013521021000');
        Route::post('/ledger/4950013521021000', [HealthInsuranceDependentChangeController::class, 'post'])->name('ledger.4950013521021000_post');
        Route::get('/ledger/4950013521030000', [MaternityLeaveApplicationOrChangeEndNoticeController::class, 'index'])->name('ledger.4950013521030000');
        Route::post('/ledger/4950013521030000', [MaternityLeaveApplicationOrChangeEndNoticeController::class, 'post'])->name('ledger.4950013521030000_post');


        // 顧客画面
        Route::get('/company/department', [CompanyDepartmentController::class, 'current_company_department_update'])->name('current_company_department_update');

        Route::get('/company', [CompanyController::class, 'company_edit'])->name('company_edit');
        Route::post('/company', [CompanyController::class, 'company_edit_post'])->name('company_edit_post');

        Route::get('/company/branch', [BranchController::class, 'branch'])->name('branch');
        Route::post('/company/branch', [BranchController::class, 'branch_post'])->name('branch_post');

        Route::get('/company/qualifications', [QualificationsController::class, 'qualifications'])->name('qualifications');

        Route::get('/labor/company', [LaborCompanyController::class, 'labor_company_update'])->name('labor_company_update');
        Route::post('/labor/company', [LaborCompanyController::class, 'labor_company_update_post'])->name('labor_company_update_post');

        Route::get('/employee', [EmployeeController::class, 'employee_list'])->name('employee');
        Route::get('/employee/edit/{id}', [EmployeeController::class, 'employee_update'])->name('employee_update');
        Route::post('/employee/edit/{id}', [EmployeeController::class, 'employee_update_post'])->name('employee_update_post');

        Route::get('/company/managerial_position', [ManagerialPositionController::class, 'managerial_position'])->name('managerial_position');
        Route::post('/company/managerial_position', [ManagerialPositionController::class, 'managerial_position_post'])->name('managerial_position_post');

        Route::get('/employee/contract', [EmployeeContractController::class, 'index'])->name('contract.index');
        Route::post('/employee/contract/check', [EmployeeContractController::class, 'check'])->name('contract.check');
        Route::post('/employee/contract/download', [EmployeeContractController::class, 'downlaod'])->name('contract.download');

        Route::get('/employee/permission/{id}', [PermissionController::class, 'employee_permission'])->name('employee_permission');
        Route::post('/employee/permission/{id}', [PermissionController::class, 'employee_permission_post'])->name('employee_permission_post');
        Route::get('/admin/labor/permission/{id}', [PermissionController::class, 'labor_permission'])->name('labor_permission');
        Route::post('/admin/labor/permission/{id}', [PermissionController::class, 'labor_permission_post'])->name('labor_permission_post');

        Route::get('/company/download/{document_type}', [CompanyController::class, 'downloadFile'])->name('company.downloadFile');
        Route::post('/company/api/industry_type/list', [CompanyController::class, 'get_industry_type'])->name('company.get_industry_type');

        Route::get('/employee/allowance', [EmployeeController::class, 'allowance_list'])->name('allowance');
        Route::get('/employee/wages', [WagesEmployeeController::class, 'wages'])->name('wages.index');
        Route::get('/employee/wages/ledger', [WagesEmployeeController::class, 'index'])->name('wages-ledger.index');
        Route::post('/employee/wages/ledger/edit', [WagesEmployeeController::class, 'select'])->name('wages-ledger.edit');
        Route::get('/employee/wages/ledger/edit', function () {
            return redirect()->route('wages-ledger.index');
        });
        Route::post('/employee/wages/list/edit', [WagesEmployeeController::class, 'wage_post'])->name('wages.post');
        Route::get('/employee/wages/list/filter-load', [WagesEmployeeController::class, 'wage_filter_load'])->name('wages.filter.load');
        Route::post('/employee/wages/list/filter-save', [WagesEmployeeController::class, 'wage_filter_save'])->name('wages.filter.save');
        Route::post('/employee/wages/list/filter-remove', [WagesEmployeeController::class, 'wage_filter_remove'])->name('wages.filter.remove');
        Route::get('/employee/wages/list/filter-showlist', [WagesEmployeeController::class, 'wage_filter_showlist'])->name('wages.filter.showlist');
        Route::get('/employee/closure_information', [EmployeeController::class, 'closure_information_list'])->name('closure_information');

        Route::get('/employee/wages/list/insurance-get', [WagesEmployeeController::class, 'wage_insurance_get'])->name('wages.insurance.get');
        Route::post('/employee/wages/list/insurance-save', [WagesEmployeeController::class, 'wage_insurance_save'])->name('wages.insurance.save');

        Route::get('/employee/attendances', [AttendanceEmployeeController::class, 'attendances'])->name('attendances.index');
        Route::post('/employee/attendances/list/edit', [AttendanceEmployeeController::class, 'attendance_post'])->name('attendances.post');
        Route::get('/employee/attendances/list/filter-load', [AttendanceEmployeeController::class, 'attendance_filter_load'])->name('attendances.filter.load');
        Route::post('/employee/attendances/list/filter-save', [AttendanceEmployeeController::class, 'attendance_filter_save'])->name('attendances.filter.save');
        Route::post('/employee/attendances/list/filter-remove', [AttendanceEmployeeController::class, 'attendance_filter_remove'])->name('attendances.filter.remove');
        Route::get('/employee/attendances/list/filter-showlist', [AttendanceEmployeeController::class, 'attendance_filter_showlist'])->name('attendances.filter.showlist');



        //最終試験用
        Route::get('/finalexam/getauth', [FinalExamController::class, 'get_auth'])->name('finalexam.get_auth');
    });

    Route::get('/employee/wages/list', [WagesEmployeeController::class, 'wages_list'])->name('wages.list');
    Route::get('/employee/attendances/list', [AttendanceEmployeeController::class, 'attendance_list'])->name('attendances.list');
});
