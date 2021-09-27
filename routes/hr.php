<?php

use App\Http\Controllers\HrController;
use App\Http\Controllers\HRDataController;
use App\Http\Controllers\HRStatsController;
use App\Http\Controllers\MainHRController;
use App\Http\Controllers\Test;
use Illuminate\Support\Facades\Route;

Route::get('ReverseSuper/{id}', [HrController::class, 'ReverseSuper'])->name('ReverseSuper')->middleware("auth");

Route::post('NewSupervisor', [HrController::class, 'NewSupervisor'])->name('NewSupervisor')->middleware("auth");

Route::get('MgtSupervisors', [HrController::class, 'MgtSupervisors'])->name('MgtSupervisors')->middleware("auth");

Route::get('Test', [Test::class, 'Test'])->middleware("auth");

Route::get('dashboard', [HRStatsController::class, 'Stats'])->middleware("auth");

Route::get('/', [HRStatsController::class, 'Stats'])->middleware("auth");

Route::get('Stats', [HRStatsController::class, 'Stats'])->name('Stats')->middleware("auth");

Route::post('NewNotice', [HRDataController::class, 'NewNotice'])->name('NewNotice')->middleware("auth");

Route::get('NoticeBoard', [HRDataController::class, 'NoticeBoard'])->name('NoticeBoard')->middleware("auth");

Route::get('LeaveDashBoard', [HRDataController::class, 'LeaveDashBoard'])->name('LeaveDashBoard')->middleware("auth");

Route::get('ApproveLeave/{id}', [HRDataController::class, 'ApproveLeave'])->name('ApproveLeave')->middleware("auth");

Route::get('DeclineLeave/{id}', [HRDataController::class, 'DeclineLeave'])->name('DeclineLeave')->middleware("auth");

Route::get('TerminateLeave/{id}', [HRDataController::class, 'TerminateLeave'])->name('TerminateLeave')->middleware("auth");

Route::get('TerminateLeave/{id}', [HRDataController::class, 'TerminateLeave'])->name('TerminateLeave')->middleware("auth");

Route::get('ApplyForLeave/{id}', [HRDataController::class, 'ApplyForLeave'])->name('ApplyForLeave')->middleware("auth");

Route::post('NewApp', [HRDataController::class, 'NewApp'])->name('NewApp')->middleware("auth");

Route::post('LeaveIdSelected', [HRDataController::class, 'LeaveIdSelected'])->name('LeaveIdSelected')->middleware("auth");

Route::get('SelectLeaveApply', [HRDataController::class, 'SelectLeaveApply'])->name('SelectLeaveApply')->middleware("auth");

Route::get('RevokeLeaveRight/{id}', [HRDataController::class, 'RevokeLeaveRight'])->name('RevokeLeaveRight')->middleware("auth");

Route::post('AcceptAssign', [HRDataController::class, 'AcceptAssign'])->name('AcceptAssign')->middleware("auth");

Route::get('LeaveAssignment/{id}', [HRDataController::class, 'LeaveAssignment'])->name('LeaveAssignment')->middleware("auth");

Route::post('LeaveSelected', [HRDataController::class, 'LeaveSelected'])->name('LeaveSelected')->middleware("auth");

Route::get('AssignLeave', [HRDataController::class, 'AssignLeave'])->name('AssignLeave')->middleware("auth");

Route::get('DeleteLeaveCat/{id}', [HRDataController::class, 'DeleteLeaveCat'])->name('DeleteLeaveCat')->middleware("auth");

Route::get('DeleteLeaveCat/{id}', [HRDataController::class, 'DeleteLeaveCat'])->name('DeleteLeaveCat')->middleware("auth");

Route::post('NewLeave', [HRDataController::class, 'NewLeave'])->name('NewLeave')->middleware("auth");

Route::get('LeaveSettings', [HRDataController::class, 'LeaveSettings'])->name('LeaveSettings')->middleware("auth");

Route::get('LeaveSettings', [HRDataController::class, 'LeaveSettings'])->name('LeaveSettings')->middleware("auth");

Route::get('ReversePayroll/{id}', [MainHRController::class, 'ReversePayroll'])->name('ReversePayroll')->middleware("auth");

Route::get('Payroll/{id}', [MainHRController::class, 'Payroll'])->name('Payroll')->middleware("auth");

Route::post('ExecPay', [MainHRController::class, 'ExecPay'])->name('ExecPay')->middleware("auth");

Route::post('AcceptSelect', [MainHRController::class, 'AcceptSelect'])->name('AcceptSelect')->middleware("auth");

Route::get('SelectPayroll', [MainHRController::class, 'SelectPayroll'])->name('SelectPayroll')->middleware("auth");

Route::post('AssignBenefit', [MainHRController::class, 'AssignBenefit'])->name('AssignBenefit')->middleware("auth");

Route::post('AssignDeduction', [MainHRController::class, 'AssignDeduction'])->name('AssignDeduction')->middleware("auth");

Route::get('DeleteBenefitsAssign/{id}', [MainHRController::class, 'DeleteBenefitsAssign'])->name('DeleteBenefitsAssign')->middleware("auth");

Route::get('DeleteDeductionAssign/{id}', [MainHRController::class, 'DeleteDeductionAssign'])->name('DeleteDeductionAssign')->middleware("auth");

Route::get('DeleteTaxAssign/{id}', [MainHRController::class, 'DeleteTaxAssign'])->name('DeleteTaxAssign')->middleware("auth");

Route::post('AssignTax', [MainHRController::class, 'AssignTax'])->name('AssignTax')->middleware("auth");

Route::post('PayStaffSelected', [MainHRController::class, 'PayStaffSelected'])->name('PayStaffSelected')->middleware("auth");

Route::get('PayrollSettings/{id}', [MainHRController::class, 'PayrollSettings'])->name('PayrollSettings')->middleware("auth");

Route::get('PaySelectStaff', [MainHRController::class, 'PaySelectStaff'])->name('PaySelectStaff')->middleware("auth");

Route::get('DeleteDoc/{id}', [MainHRController::class, 'DeleteDoc'])->name('DeleteDoc')->middleware("auth");

Route::post('NewDoc', [MainHRController::class, 'NewDoc'])->name('NewDoc')->middleware("auth");

Route::get('MgtDocs/{id}', [MainHRController::class, 'MgtDocs'])->name('MgtDocs')->middleware("auth");

Route::post('DocSelected', [MainHRController::class, 'DocSelected'])->name('DocSelected')->middleware("auth");

Route::get('DocSelectStaff', [MainHRController::class, 'DocSelectStaff'])->name('DocSelectStaff')->middleware("auth");

Route::post('NewTax', [MainHRController::class, 'NewTax'])->name('NewTax')->middleware("auth");

Route::post('UpdateTax', [MainHRController::class, 'UpdateTax'])->name('UpdateTax')->middleware("auth");

Route::get('DeleteTax/{id}', [MainHRController::class, 'DeleteTax'])->name('DeleteTax')->middleware("auth");

Route::post('NewDeduction', [MainHRController::class, 'NewDeduction'])->name('NewDeduction')->middleware("auth");

Route::post('UpdateBenefit', [MainHRController::class, 'UpdateBenefit'])->name('UpdateBenefit')->middleware("auth");

Route::post('UpdateDeduction', [MainHRController::class, 'UpdateDeduction'])->name('UpdateDeduction')->middleware("auth");

Route::get('DeleteDeduction/{id}', [MainHRController::class, 'DeleteDeduction'])->name('DeleteDeduction')->middleware("auth");

Route::get('DeleteBenefit/{id}', [MainHRController::class, 'DeleteBenefit'])->name('DeleteBenefit')->middleware("auth");

Route::post('Newbenefit', [MainHRController::class, 'Newbenefit'])->name('Newbenefit')->middleware("auth");

Route::get('Fsettings', [MainHRController::class, 'Fsettings'])->name('Fsettings')->middleware("auth");

Route::get('ActCont/{id}', [MainHRController::class, 'ActCont'])->name('ActCont')->middleware("auth");

Route::get('ExpContracts', [MainHRController::class, 'ExpContracts'])->name('ExpContracts')->middleware("auth");

Route::get('ReverseDept/{id}', [MainHRController::class, 'ReverseDept'])->name('ReverseDept')->middleware("auth");

Route::post('NewDeptHead', [MainHRController::class, 'NewDeptHead'])->name('NewDeptHead')->middleware("auth");

Route::get('DeptHeads', [MainHRController::class, 'DeptHeads'])->name('DeptHeads')->middleware("auth");

Route::get('DelKin/{id}', [MainHRController::class, 'DelKin'])->name('DelKin')->middleware("auth");

Route::post('UpdateKins', [MainHRController::class, 'UpdateKins'])->name('UpdateKins')->middleware("auth");

Route::get('/MgtDepts', [MainHRController::class, 'MgtDepts'])->name('MgtDepts')->middleware("auth");
Route::post('/NewDept', [MainHRController::class, 'NewDept'])->name('NewDept')->middleware("auth");

Route::post('/UpdateDept', [MainHRController::class, 'UpdateDept'])->name('UpdateDept')->middleware("auth");

Route::get('/DeleteDept/{id}', [MainHRController::class, 'DeleteDept'])->name('DeleteDept')->middleware("auth");

Route::get('/MgtEmp', [MainHRController::class, 'MgtEmp'])->name('MgtEmp')->middleware("auth");

Route::post('/NewEmp', [MainHRController::class, 'NewEmp'])->name('NewEmp')->middleware("auth");

Route::get('/EmpLeft/{id}', [MainHRController::class, 'EmpLeft'])->name('EmpLeft')->middleware("auth");

Route::get('/DelEmp/{id}', [MainHRController::class, 'DelEmp'])->name('DelEmp')->middleware("auth");

Route::post('NewKin', [MainHRController::class, 'NewKin'])->name('NewKin')->middleware("auth");

Route::get('ViewKins/{id}', [MainHRController::class, 'ViewKins'])->name('ViewKins')->middleware("auth");
