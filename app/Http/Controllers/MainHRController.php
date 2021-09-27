<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Benefits;
use App\Models\BenefitsAssign;
use App\Models\BenefitsLog;
use App\Models\DeductionAssign;
use App\Models\Deductions;
use App\Models\DeductionsLog;
use App\Models\Departments;
use App\Models\DeptHeads;
use App\Models\Employees;
use App\Models\Kins;
use App\Models\Payroll;
use App\Models\SatffDocs;
use App\Models\Tax;
use App\Models\TaxAssign;
use App\Models\TaxesLog;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class MainHRController extends Controller {

    public function getTableColumns($table, $dif) {

        $d = new Collection;

        $data = DB::getSchemaBuilder()->getColumnListing($table);

        return array_values(array_diff($data, $dif));
    }

    public function MgtDepts() {

        $Departments = Departments::all();

        $data = [

            "Title"       => "Organization Department Settings",
            "Desc"        => "Manage all your departments",
            "Page"        => "Departments.MgtDepts",
            "Departments" => $Departments,
        ];
        return view("scrn", $data);
    }

    public function NewDept(Request $request) {

        $validated = $this->validate($request, [
            "DeptName" => "required",
            "DeptID"   => "required",
            "Desc"     => "required",
        ]);

        Departments::create($validated);

        return back()->with('status', 'New department created successfully');
    }

    public function UpdateDept(Request $request) {

        $rules = [
            'DeptName' => 'required|string|min:1|max:255',

            'Desc'     => 'required',
        ];

        $id = $request->id;

        $data = $request->validate($rules);

        $departments = Departments::findOrFail($id);

        $departments->update($data);

        return redirect()->back()
            ->with('status', 'The selected department was successfully updated.');
    }

    public function DeleteDept($id) {

        $departments = Departments::findOrFail($id);

        $departments->delete();

        return redirect()->back()
            ->with('status', 'The selected department was successfully delted.');

    }

    public function MgtEmp() {

        $Employees   = Employees::where("RecordStatus", "Contract Active")->get();
        $Departments = Departments::all();

        $Form = $this->getTableColumns("employees", [
            'created_at',
            'updated_at',
            'JoiningDate',
            'IDScan',
            'PromotionStatus',
            'RecordStatus',
            'id',
            'Department',
            'EmpID',
            'DOB',
            'StaffPhoto',
        ]);
        $FormKins = $this->getTableColumns("kins", [

            'created_at',
            'id',
            'updated_at',
            'EmpID',
            'EmployeeName',

        ]);

        $data = [

            "Title"       => "Organization Employee Database",
            "Desc"        => "Employee infomation management interface | Only current staff members are  shown",
            "Page"        => "Emp.MgtEmp",
            "Employees"   => $Employees,
            "Form"        => $Form,
            "Departments" => $Departments,
            "FormKins"    => $FormKins,
        ];
        return view("scrn", $data);

    }

    public function NewEmp(Request $request) {

        $validated = $this->validate($request, [
            "StaffName"        => 'required|unique:employees',
            "PhoneNumber"      => 'required|unique:employees',
            "Email"            => 'required|unique:employees',
            "LocalAddress"     => "required",
            "PermanentAddress" => "required",
            "NIN"              => 'required|unique:employees',
            "Nationality"      => "required",
            "Designation"      => "required",
            "DOB"              => "required",
            "Department"       => "required",
            "JoiningDate"      => "required",
            "MonthlySalary"    => "required",
            "BankName"         => "required",
            "BankBranch"       => "required",
            "AccountName"      => 'required|unique:employees',
            "AccountNumber"    => 'required|unique:employees',
            "TIN"              => 'required|unique:employees',
            "BankCode"         => "required",
            "StaffCode"        => "required",
            "EmpID"            => 'required|unique:employees',
            'IDScan'           => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'StaffPhoto'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $Employees = Employees::create($validated);

        $IDScan = $request->file('IDScan')->store('public');

        $StaffPhoto = $request->file('StaffPhoto')->store('public');

        $Update = Employees::where("EmpID", $request->EmpID)->first();

        $Update->IDScan = Str::replace('public', 'storage', $IDScan);

        $Update->StaffPhoto = Str::replace('public', 'storage', $StaffPhoto);

        $Update->save();

        return redirect()->back()->with("status", "New staff record created successfully");

    }

    public function EmpLeft($id) {

        $Employees = Employees::find($id);

        $Employees->RecordStatus = "Contract Ended";

        $Employees->save();

        return redirect()->back()->with("status", "The contract of the selected staff member has been terminated successfully");

    }

    public function DelEmp($id) {

        $Employees = Employees::find($id);

        $IDScan     = $Employees->IDScan;
        $StaffPhoto = $Employees->StaffPhoto;

        $FinalIDscan = Str::replace('storage', 'app/public', $IDScan);

        $FinalStaffPhoto = Str::replace('storage', 'app/public', $StaffPhoto);

        unlink(storage_path($FinalIDscan));

        unlink(storage_path($FinalStaffPhoto));

        $Employees->delete();

        return redirect()->back()->with("status", "The selected staff record was deleted successfully");
    }

    public function NewKin(Request $request) {
        $validated = $this->validate($request, [

            "EmployeeName"     => "required",
            "EmpID"            => "required",
            "Name"             => "required",
            "Relationship"     => 'required',
            "PhoneNumber"      => "required|unique:kins",
            "CurrentAddress"   => "required",
            "PermanentAddress" => "required",
            "Email"            => "required|unique:kins",

        ]);

        $Kins = Kins::create($validated);

        return redirect()->back()->with("status", "Next of kin attached to the  selected staff member successfully");

    }

    public function ViewKins($id) {

        $Employees = Employees::find($id);
        $a         = $Employees->EmpID;

        $Kins = Kins::where("EmpID", $a)->get();

        $data = [

            "Title" => "Showing all next of kin records",
            "Desc"  => "Attached to the staff member" . " " . $Employees->StaffName,
            "Page"  => "Emp.ViewKins",
            "Kins"  => $Kins,

        ];
        return view("scrn", $data);

    }

    public function UpdateKins(Request $request) {
        $validated = $this->validate($request, [

            "EmployeeName"     => "required",
            "EmpID"            => "required",
            "Name"             => "required",
            "Relationship"     => 'required',
            "PhoneNumber"      => "required",
            "CurrentAddress"   => "required",
            "PermanentAddress" => "required",
            "Email"            => "required",

        ]);

        Kins::where("id", $request->id)
            ->update($validated);

        return redirect()->back()->with("status", "The selected next of kin record was updated  successfully");

    }

    public function DelKin($id) {

        Kins::find($id)->delete();

        return redirect()->back()->with("status", "The selected next of kin record was deleted  successfully");
    }

    public function DeptHeads() {

        $DeptHeads = DeptHeads::where("status", "active")->get();

        $Departments = Departments::all();

        $ReportsTo = Employees::where("RecordStatus", "Contract Active")->select("Designation", "StaffName")->get();

        $Form = $this->getTableColumns("dept_heads", [
            'EmpID',
            'status',
            'updated_at',
            'created_at',
            'id',

        ]);
        $data = [

            "Title"       => "Assign Department Heads",
            "Desc"        => "Use this interface to manage department heads",
            "Page"        => "Departments.DeptHeads",
            "Form"        => $Form,
            "Employees"   => $DeptHeads,
            "Departments" => $Departments,
            "ReportsTo"   => $ReportsTo,

        ];
        return view("scrn", $data);

    }

    public function NewDeptHead(Request $request) {

        $validated = $this->validate($request, [

            "EmployeeName"   => "required",
            "Department"     => "required|unique:dept_heads",
            "ReportsTo"      => "required",
            "JobDescription" => 'required',

        ]);

        DeptHeads::create($validated);

        $Update = DeptHeads::where("EmployeeName", $request->EmployeeName)->first();

        $Emp = Employees::where("StaffName", $request->EmployeeName)->first();

        $Update->EmpID = $Emp->EmpID;

        $Update->save();

        return redirect()->back()->with("status", "New head of department created   successfully");

    }

    public function ReverseDept($id) {

        $DeptHeads = DeptHeads::find($id);
        $DeptHeads->delete();

        return redirect()->back()->with("status", "New head of department role reversed   successfully");

    }

    public function ExpContracts() {
        $Employees   = Employees::where("RecordStatus", "Contract Ended")->get();
        $Departments = Departments::all();

        $Form = $this->getTableColumns("employees", [
            'created_at',
            'updated_at',
            'JoiningDate',
            'IDScan',
            'PromotionStatus',
            'RecordStatus',
            'id',
            'Department',
            'EmpID',
            'DOB',
            'StaffPhoto',
        ]);
        $FormKins = $this->getTableColumns("kins", [

            'created_at',
            'id',
            'updated_at',
            'EmpID',
            'EmployeeName',

        ]);

        $data = [

            "Title"       => "Expired employee contracts",
            "Desc"        => "Manage expired employee contracts",
            "Page"        => "Emp.ExpiredContracts",
            "Employees"   => $Employees,
            "Form"        => $Form,
            "Departments" => $Departments,
            "FormKins"    => $FormKins,
        ];
        return view("scrn", $data);
    }

    public function ActCont($id) {

        $Employees = Employees::find($id);

        $Employees->RecordStatus = "Contract Active";

        $Employees->save();

        return redirect()->back()->with("status", "The contract of the selected staff member has been re-activated successfully");

    }

    public function Fsettings() {

        $Deductions = Deductions::all();
        $Benefits   = Benefits::all();
        $Taxes      = Tax::all();

        $DForm = $this->getTableColumns("deductions", [

            'created_at',
            'id',
            'updated_at',
            'DID',
            'Description',

        ]);

        $BForm = $this->getTableColumns("benefits", [

            'created_at',
            'id',
            'updated_at',
            'BID',
            'Description',

        ]);

        $TForm = $this->getTableColumns("taxes", [

            'created_at',
            'id',
            'updated_at',
            'TID',
            'Description',

        ]);

        $data = [

            "Title"      => "Payroll Finance Settings",
            "Desc"       => "Manage all payroll benefits , deductions and taxes",
            "Page"       => "finance.Settings",
            "Deductions" => $Deductions,
            "Benefits"   => $Benefits,
            "DForm"      => $DForm,
            "BForm"      => $BForm,
            "TForm"      => $TForm,
            "Taxes"      => $Taxes,

        ];
        return view("scrn", $data);
    }

    public function Newbenefit(Request $request) {

        $validated = $this->validate($request, [

            "Description" => "required",
            "BID"         => "required|unique:benefits",
            "Amount"      => "required",
            "Benefit"     => 'required|unique:benefits',

        ]);

        Benefits::create($validated);

        return redirect()->back()->with("status", "New benefit created successfully");
    }

    public function DeleteBenefit($id) {

        Benefits::find($id)->delete();

        return redirect()->back()->with("status", "Benefit deleted successfully");

    }

    public function DeleteDeduction($id) {

        Deductions::find($id)->delete();

        return redirect()->back()->with("status", "Deduction deleted successfully");

    }

    public function UpdateBenefit(Request $request) {

        $validated = $this->validate($request, [

            "Description" => "required",
            "Amount"      => "required",
            "Benefit"     => 'required',
            "id"          => 'required',

        ]);

        Benefits::where("id", $request->id)
            ->update($validated);

        return redirect()->back()->with("status", "The selected benefit category has been updated successfully");
    }

    public function UpdateDeduction(Request $request) {

        $validated = $this->validate($request, [

            "Description" => "required",
            "Amount"      => "required",
            "Deduction"   => 'required',
            "id"          => 'required',

        ]);

        Deductions::where("id", $request->id)
            ->update($validated);

        return redirect()->back()->with("status", "The selected deduction category has been updated successfully");
    }

    public function NewDeduction(Request $request) {

        $validated = $this->validate($request, [

            "Description" => "required",
            "DID"         => "required|unique:deductions",
            "Amount"      => "required",
            "Deduction"   => 'required|unique:deductions',

        ]);

        Deductions::create($validated);

        return redirect()->back()->with("status", "New deduction created successfully");
    }

    public function NewTax(Request $request) {

        if ($request->Percentage > 100) {

            return redirect()->back()->with("taxerror", "Tax percentage value can not be greater than 100%. Please try again ");
        }
        $validated = $this->validate($request, [

            "Description" => "required",
            "TID"         => "required|unique:taxes",
            "Percentage"  => "required",
            "Tax"         => 'required|unique:taxes',

        ]);

        Tax::create($validated);

        return redirect()->back()->with("taxadded", "New tax category created successfully");
    }

    public function UpdateTax(Request $request) {

        $validated = $this->validate($request, [

            "Description" => "required",
            "Percentage"  => "required",
            "Tax"         => 'required',
            "id"          => 'required',

        ]);

        Tax::where("id", $request->id)
            ->update($validated);

        return redirect()->back()->with("taxadded", "The selected tax category has been updated successfully");
    }

    public function DeleteTax($id) {

        Tax::find($id)->delete();

        return redirect()->back()->with("taxadded", "Tax category deleted successfully");

    }

    public function DocSelectStaff() {

        $Docs = Employees::where("RecordStatus", "Contract Active")->get();
        $data = [

            "Title" => "Select staff member whose documentation is required",
            "Desc"  => "Only staff members with active contracts are shown",
            "Page"  => "docs.SelectStaff",
            "Docs"  => $Docs,
        ];
        return view("scrn", $data);
    }

    public function DocSelected(Request $request) {

        return redirect()->route('MgtDocs', ['id' => $request->id]);
    }

    public function MgtDocs($id) {

        $s = Employees::find($id);

        $SatffDocs = SatffDocs::where("EmpID", $s->EmpID)->get();

        $StaffName = $s->StaffName;

        $EmpID = $s->EmpID;

        $id = $s->id;

        $Docs = DB::table('employees AS E')
            ->where('E.id', $id)
            ->join('satff_docs AS S', 'S.EmpID', '=', 'E.EmpID')
            ->select('S.*', 'E.*', 'S.id AS SID')
            ->get();

        $count = DB::table('employees AS E')
            ->where('E.id', $id)
            ->join('satff_docs AS S', 'S.EmpID', '=', 'E.EmpID')
            ->select('S.*', 'E.*', 'S.id AS SID')
            ->count();

        $data = [

            "Title"     => "Manage external documents attached to selected staff member",
            "Desc"      => "The selected staff member is " . $s->StaffName,
            "Page"      => "docs.MgtDocs",
            "Docs"      => $Docs,
            "StaffName" => $StaffName,
            "EmpID"     => $EmpID,
            "count"     => $count,
            "id"        => $id,
        ];
        return view("scrn", $data);
    }

    public function NewDoc(Request $request) {

        $validated = $this->validate($request, [

            "DocumentName" => "required",
            "DocID"        => 'required',
            "Description"  => 'required',
            "EmpID"        => 'required',

        ]);

        $PDF = $request->DocURL->extension();

        if ($PDF == "PDF" || $PDF == "pdf" || $PDF === "pdf" || $PDF === "PDF") {
            SatffDocs::create($validated);

            $DocURL = $request->file('DocURL')->store('public');

            $Update = SatffDocs::where("DocID", $request->DocID)->first();

            $Update->DocURL = Str::replace('public', 'storage', $DocURL);

            $Update->save();

            return redirect()->back()->with("status", "New external document attached to selected staff member  successfully");

        }

        return redirect()->back()->with("error_a", "Document attachment process failed, Only PDF files are supported, Please try again");

    }

    public function DeleteDoc($id) {

        $a = SatffDocs::find($id);

        $DocURL = Str::replace('storage', 'app/public', $a->DocURL);

        unlink(storage_path($DocURL));

        $a->delete();

        return redirect()->back()->with("status", "Selected external document has been deleted  successfully");
    }

    public function PaySelectStaff() {

        $Employees = Employees::where("RecordStatus", "Contract Active")->get();

        /*  $Deductions = DB::table('deductions AS D')
        ->where('E.id', $id)
        ->join('satff_docs AS S', 'S.EmpID', '=', 'E.EmpID')
        ->select('S.*', 'E.*', 'S.id AS SID')
        ->get(); */

        $data = [

            "Title"     => "Payroll settings for staff members",
            "Desc"      => "Only staff members with active contracts are shown",
            "Page"      => "payroll.SelectStaff",
            "Employees" => $Employees,
        ];
        return view("scrn", $data);

    }

    public function PayStaffSelected(Request $request) {

        return redirect()->route('PayrollSettings', ['id' => $request->id]);
    }

    public function ReturnTax($id) {

        $data = DB::table('employees AS E')
            ->where('E.id', $id)
            ->join('tax_assigns AS TA', 'TA.EmpID', '=', 'E.EmpID')
            ->join('taxes AS T', 'T.TID', '=', 'TA.TID')
            ->select('T.*', 'TA.*', 'E.*', 'TA.id AS TID')
            ->get();

        return $data;
    }

    public function ReturnDeductions($id) {
        $data = DB::table('employees AS E')
            ->where('E.id', $id)
            ->join('deduction_assigns AS DA', 'DA.EmpID', '=', 'E.EmpID')
            ->join('deductions AS D', 'D.DID', '=', 'DA.DID')
            ->select('D.*', 'DA.*', 'E.*', 'DA.id AS DID')
            ->get();

        return $data;
    }

    public function ReturnBenefits($id) {
        $data = DB::table('employees AS E')
            ->where('E.id', $id)
            ->join('benefits_assigns AS BA', 'BA.EmpID', '=', 'E.EmpID')
            ->join('benefits AS B', 'B.BID', '=', 'BA.BID')
            ->select('B.*', 'BA.*', 'E.*', 'BA.id AS BID')
            ->get();

        return $data;
    }

    public function PayrollSettings($id) {

        $E = Employees::find($id);

        $DeductionsCount = DB::table('employees AS E')
            ->where('E.id', $id)
            ->join('deduction_assigns AS DA', 'DA.EmpID', '=', 'E.EmpID')
            ->join('deductions AS D', 'D.DID', '=', 'DA.DID')
            ->select('D.Amount')
            ->sum('D.Amount');

        $BenefitsCount = DB::table('employees AS E')
            ->where('E.id', $id)
            ->join('benefits_assigns AS BA', 'BA.EmpID', '=', 'E.EmpID')
            ->join('benefits AS B', 'B.BID', '=', 'BA.BID')
            ->select('B.Amount')
            ->sum('B.Amount');

        $TaxCount = DB::table('employees AS E')
            ->where('E.id', $id)
            ->join('tax_assigns AS TA', 'TA.EmpID', '=', 'E.EmpID')
            ->join('taxes AS T', 'T.TID', '=', 'TA.TID')
            ->select('T.Percentage')
            ->sum('T.Percentage');

        $Taxes = Tax::all();

        $Deductions = Deductions::all();

        $Benefits = Benefits::all();

        $a_decimal = $TaxCount / 100;

        $a_amount = $E->MonthlySalary;

        $Taxable_amount = $a_decimal * $a_amount;

        $a_NetPay = $E->MonthlySalary - $DeductionsCount;

        $b_NetPay = $a_NetPay - $Taxable_amount;

        $NetPay = $b_NetPay + $BenefitsCount;

        $data = [

            "Title"              => "Payroll settings for the staff member " . $E->StaffName,
            "Desc"               => "Fine tune the payroll settings for this staff member",
            "Page"               => "payroll.Settings",
            "StaffName"          => $E->StaffName,
            "DeductionsCount"    => $DeductionsCount,
            "BenefitsCount"      => $BenefitsCount,
            "TaxCount"           => $TaxCount,
            "MonthlySalary"      => $E->MonthlySalary,
            "EmpID"              => $E->EmpID,
            "Taxes"              => $Taxes,
            "AssignedTaxes"      => $this->ReturnTax($id),
            "AssignedDeductions" => $this->ReturnDeductions($id),
            "BenefitsAssign"     => $this->ReturnBenefits($id),
            "Deductions"         => $Deductions,
            "Benefits"           => $Benefits,
            "NetPay"             => $NetPay,

        ];
        return view("scrn", $data);

    }

    public function AssignTax(Request $request) {

        $validated = $this->validate($request, [

            "TID"   => "required",
            "EmpID" => 'required',

        ]);

        $count = TaxAssign::where("TID", $request->TID)
            ->where("EmpID", $request->EmpID)
            ->count();

        if ($count > 0) {
            return redirect()->back()->with("error_a", "The selected tax category has already been assigned to this staff member. Select another tax category");
        }

        TaxAssign::create($validated);

        return redirect()->back()->with("status", "The selected tax category has been assigned to this staff member successfully");

    }

    public function DeleteTaxAssign($id) {

        TaxAssign::find($id)->delete();

        return redirect()->back()->with("status", "The selected tax  assignment has been removed from this staff member's payroll successfully");
    }

    public function AssignDeduction(Request $request) {

        $validated = $this->validate($request, [

            "DID"   => "required",
            "EmpID" => 'required',

        ]);

        $count = DeductionAssign::where("DID", $request->DID)
            ->where("EmpID", $request->EmpID)
            ->count();

        if ($count > 0) {
            return redirect()->back()->with("error_a", "The selected deductions category has already been assigned to this staff member. Select another deductions category");
        }

        DeductionAssign::create($validated);

        return redirect()->back()->with("status", "The selected deductions category has been assigned to this staff member successfully");

    }

    public function DeleteDeductionAssign($id) {

        DeductionAssign::find($id)->delete();

        return redirect()->back()->with("status", "The selected deductions  assignment has been removed from this staff member's payroll successfully");
    }

    public function AssignBenefit(Request $request) {

        $validated = $this->validate($request, [

            "BID"   => "required",
            "EmpID" => 'required',

        ]);

        $count = BenefitsAssign::where("BID", $request->BID)
            ->where("EmpID", $request->EmpID)
            ->count();

        if ($count > 0) {
            return redirect()->back()->with("error_a", "The selected benefits category has already been assigned to this staff member. Select another benefits category");
        }

        BenefitsAssign::create($validated);

        return redirect()->back()->with("status", "The selected benefits category has been assigned to this staff member successfully");

    }

    public function DeleteBenefitsAssign($id) {

        BenefitsAssign::find($id)->delete();

        return redirect()->back()->with("status", "The selected benefits  assignment has been removed from this staff member's payroll successfully");
    }

    public function AcceptSelect(Request $request) {

        return redirect()->route('Payroll', ['id' => $request->id]);

    }

    public function LogData($EmpID, $PayID) {

        $TaxesLog      = new TaxesLog;
        $BenefitsLog   = new BenefitsLog;
        $DeductionsLog = new DeductionsLog;

        $Tax = DB::table('employees AS E')
            ->where('E.EmpID', $EmpID)
            ->join('tax_assigns AS TA', 'TA.EmpID', '=', 'E.EmpID')
            ->join('taxes AS T', 'T.TID', '=', 'TA.TID')
            ->select('T.*', 'TA.*', 'E.*')
            ->get();

        $Benefits = DB::table('employees AS E')
            ->where('E.EmpID', $EmpID)
            ->join('benefits_assigns AS BA', 'BA.EmpID', '=', 'E.EmpID')
            ->join('benefits AS B', 'B.BID', '=', 'BA.BID')
            ->select('B.*', 'BA.*', 'E.*')
            ->get();

        $Deductions = DB::table('employees AS E')
            ->where('E.EmpID', $EmpID)
            ->join('deduction_assigns AS DA', 'DA.EmpID', '=', 'E.EmpID')
            ->join('deductions AS D', 'D.DID', '=', 'DA.DID')
            ->select('D.*', 'DA.*', 'E.*')
            ->get();

        foreach ($Tax as $data) {
            $TaxesLog->TID         = $data->TID;
            $TaxesLog->Tax         = $data->Tax;
            $TaxesLog->Description = $data->Description;
            $TaxesLog->Percentage  = $data->Percentage;
            $TaxesLog->PayID       = $PayID;
            $TaxesLog->save();
        }

        foreach ($Benefits as $data) {
            $BenefitsLog->BID         = $data->BID;
            $BenefitsLog->Benefit     = $data->Benefit;
            $BenefitsLog->Description = $data->Description;
            $BenefitsLog->Amount      = $data->Amount;
            $BenefitsLog->PayID       = $PayID;
            $BenefitsLog->save();
        }

        foreach ($Deductions as $data) {
            $DeductionsLog->DID         = $data->DID;
            $DeductionsLog->Deduction   = $data->Deduction;
            $DeductionsLog->Description = $data->Description;
            $DeductionsLog->Amount      = $data->Amount;
            $DeductionsLog->PayID       = $PayID;
            $DeductionsLog->save();
        }

        return true;

    }

    public function ExecPay(Request $request) {

        $count = Payroll::where('Month', $request->Month)
            ->where('Year', $request->Year)
            ->where('EmpID', $request->EmpID)
            ->count();

        if ($count > 0) {
            return redirect()->back()->with("error_a", "New payroll transaction not executed. The selected month has already been paid out");
        }

        $validated = $this->validate($request, [
            "Month"       => "required",
            "Year"        => "required",
            "EmpID"       => "required",
            "PayID"       => "required",
            "Deduction"   => "required",
            "Benefits"    => "required",
            "Taxes"       => "required",
            "SalaryPaid"  => "required",
            "GrossSalary" => "required",
            "Description" => "required",
        ]);

        Payroll::create($validated);

        $this->LogData($request->EmpID, $request->PayID);

        return redirect()->back()->with("status", "New payroll transaction recorded successfully");

    }

    public function ReturnPayRoll($EmpID) {

        $data = DB::table('employees AS E')

            ->where('E.EmpID', $EmpID)

            ->join('payrolls AS P', 'P.EmpID', '=', 'E.EmpID')

            ->select('P.*', 'E.*', 'P.id AS PPID', 'P.Deduction AS D',

                'P.created_at AS CT')->get();

        return $data;

    }

    public function ReturnBenLogs($EmpID) {

        $data = DB::table('employees AS E')
            ->where('E.EmpID', $EmpID)
            ->join('payrolls AS P', 'P.EmpID', '=', 'E.EmpID')
            ->join('benefits_logs AS B', 'B.PayID', '=', 'P.PayID')
            ->select('P.*', 'E.*', 'P.id AS PPID', 'B.*',

                'P.Deduction AS D',
                'B.Amount AS BAmount',
                'B.created_at AS ct',
            )
            ->get();

        return $data;
    }

    public function ReturnTaxLogs($EmpID) {

        $data = DB::table('employees AS E')
            ->where('E.EmpID', $EmpID)
            ->join('payrolls AS P', 'P.EmpID', '=', 'E.EmpID')
            ->join('taxes_logs AS T', 'T.PayID', '=', 'P.PayID')

            ->select('P.*', 'E.*', 'P.id AS PPID', 'T.*',

                'P.Deduction AS D',
                'T.created_at AS ct',
            )
            ->get();

        return $data;
    }

    public function ReturnDedLogs($EmpID) {

        $data = DB::table('employees AS E')
            ->where('E.EmpID', $EmpID)
            ->join('payrolls AS P', 'P.EmpID', '=', 'E.EmpID')
            ->join('deductions_logs AS D', 'D.PayID', '=', 'P.PayID')
            ->select('P.*', 'E.*', 'P.id AS PPID', 'D.*',

                'P.Deduction AS D',
                'D.Deduction AS Ded',
                'D.created_at AS ct',
            )
            ->get();

        return $data;
    }

    public function ReversePayroll($id) {
        $a     = Payroll::find($id);
        $PayID = $a->PayID;

        TaxesLog::where("PID", $PayID)->delete();
        BenefitsLog::where("PID", $PayID)->delete();
        DeductionsLog::where("PID", $PayID)->delete();

        $a->delete();

        return redirect()->back()->with("status", "New payroll transaction reversed successfully");

    }

    public function Payroll($id) {

        $E = Employees::find($id);

        $DeductionsCount = DB::table('employees AS E')
            ->where('E.id', $id)
            ->join('deduction_assigns AS DA', 'DA.EmpID', '=', 'E.EmpID')
            ->join('deductions AS D', 'D.DID', '=', 'DA.DID')
            ->select('D.Amount')
            ->sum('D.Amount');

        $BenefitsCount = DB::table('employees AS E')
            ->where('E.id', $id)
            ->join('benefits_assigns AS BA', 'BA.EmpID', '=', 'E.EmpID')
            ->join('benefits AS B', 'B.BID', '=', 'BA.BID')
            ->select('B.Amount')
            ->sum('B.Amount');

        $TaxCount = DB::table('employees AS E')
            ->where('E.id', $id)
            ->join('tax_assigns AS TA', 'TA.EmpID', '=', 'E.EmpID')
            ->join('taxes AS T', 'T.TID', '=', 'TA.TID')
            ->select('T.Percentage')
            ->sum('T.Percentage');

        $Taxes = Tax::all();

        $Deductions = Deductions::all();

        $Benefits = Benefits::all();

        $a_decimal = $TaxCount / 100;

        $a_amount = $E->MonthlySalary;

        $Taxable_amount = $a_decimal * $a_amount;

        $a_NetPay = $E->MonthlySalary - $DeductionsCount;

        $b_NetPay = $a_NetPay - $Taxable_amount;

        $NetPay = $b_NetPay + $BenefitsCount;

        $Payroll = $this->ReturnPayRoll($E->EmpID);

        $data = [

            "Title"              => "Payroll management  interface for " . $E->StaffName,
            "Desc"               => "Reffer to the staff database for more information about this staff member",
            "Page"               => "payroll.Payroll",
            "StaffName"          => $E->StaffName,
            "DeductionsCount"    => $DeductionsCount,
            "BenefitsCount"      => $BenefitsCount,
            "TaxCount"           => $TaxCount,
            "MonthlySalary"      => $E->MonthlySalary,
            "EmpID"              => $E->EmpID,
            "Taxes"              => $Taxes,
            "AssignedTaxes"      => $this->ReturnTax($id),
            "AssignedDeductions" => $this->ReturnDeductions($id),
            "BenefitsAssign"     => $this->ReturnBenefits($id),
            "ReturnBenLogs"      => $this->ReturnBenLogs($E->EmpID),
            "ReturnTaxLogs"      => $this->ReturnTaxLogs($E->EmpID),
            "ReturnDedLogs"      => $this->ReturnDedLogs($E->EmpID),
            "Deductions"         => $Deductions,
            "Benefits"           => $Benefits,
            "NetPay"             => $NetPay,
            "Payroll"            => $Payroll,

        ];
        return view("scrn", $data);

    }

    public function SelectPayroll() {

        $Employees = Employees::where("RecordStatus", "Contract Active")->get();

        $data = [

            "Title"     => "Select staff member for  payroll execution",
            "Desc"      => "Only staff members with active contracts are shown",
            "Page"      => "payroll.Execute",
            "Employees" => $Employees,
        ];
        return view("scrn", $data);
    }

}
