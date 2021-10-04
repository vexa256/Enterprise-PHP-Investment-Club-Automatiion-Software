<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FormEngine;
use App\Models\ContractCategories;
use App\Models\ContractorKins;
use App\Models\Contracts;
use App\Models\Departments;
use App\Models\Employees;
use App\Models\SatffDocs;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MainContractsController extends Controller {

    public function __construct() {

        $Count = Contracts::whereDate('ContractExpiry', '<', date('Y-m-d'))
            ->where('RecordStatus', 'Contract Active')
            ->count();

        if ($Count > 0) {

            $check = Contracts::whereDate('ContractExpiry', '<', date('Y-m-d'))
                ->where('RecordStatus', 'Contract Active')
                ->get();

            foreach ($check as $data) {

                $Leaves = Contracts::find($data->id);

                $Leaves->RecordStatus = "Contract Expired";

                $Leaves->save();

            }

        }

        $Check = Employees::whereDate('ContractExpiry', '<', date('Y-m-d'))
            ->where('RecordStatus', 'Contract Active')
            ->count();

        if ($Check > 0) {

            $check = Employees::whereDate('ContractExpiry', '<', date('Y-m-d'))
                ->where('RecordStatus', 'Contract Active')
                ->get();

            foreach ($check as $data) {

                $Leaves = Employees::find($data->id);

                $Leaves->RecordStatus = "Contract Expired";

                $Leaves->save();

            }

        }
    }

    public function ContractCategories() {

        $FormEngine = new FormEngine;

        $Categories = ContractCategories::all();

        $rem = ['created_at', 'updated_at', 'status', 'CID'];

        $data = [

            "Title"      => "Manage supported contract categories",
            "Desc"       => "Set which contract categories will be attached to contractors",
            "Page"       => "contracts.Categories",
            "Categories" => $Categories,
            "rem"        => $rem,
            "Form"       => $FormEngine->Form('contract_categories'),

        ];
        return view("scrn", $data);
    }

    public function NewCat(Request $request) {

        $validated = $this->validate($request, [

            "CategoryName" => "required|unique:contract_categories",
            "Description"  => "required",
            "CID"          => "required|unique:contract_categories",
        ]);

        ContractCategories::create($validated);

        return back()->with('status', 'New contract category created successfully');
    }

    public function DeleteCat($id) {

        ContractCategories::find($id)->delete();

        return back()->with('status', 'Contract category deleted successfully');
    }

    public function MgtContracts() {

        $FormEngine = new FormEngine;

        $Categories = ContractCategories::all();

        $rem = [
            'id',
            'created_at',
            'updated_at',
            'RecordStatus',
            'CID',
            'Gender',
            'PromotionStatus',
            'Description',
            'IDScan',
            'EmpID',
            'CategoryName',
            'StaffPhoto',
        ];

        $rem2 = [
            'id',
            'created_at',
            'EmployeeName',
            'updated_at',
            'EmpID',
            'Gender',
            'Department',

        ];

        $Contracts = DB::table('contracts AS C')

            ->join('contract_categories AS CC', 'CC.CID', '=', 'C.CID')

            ->select('C.*', 'CC.Description')

            ->get();

        $Departments = Departments::all();

        $data = [

            "Title"       => "Manage all contracts issued",
            "Desc"        => "View contractors and their contract details",
            "Page"        => "contracts.Mgt",
            "Contracts"   => $Contracts,
            "Categories"  => $Categories,
            "Departments" => $Departments,
            "rem"         => $rem,
            "rem2"        => $rem2,
            "Form"        => $FormEngine->Form('contracts'),
            "Form2"       => $FormEngine->Form('contractor_kins'),

        ];
        return view("scrn", $data);

    }

    public function NewContractor(Request $request) {

        $validated = $this->validate($request, [

            "PhoneNumber"            => 'required|unique:contracts',
            "Email"                  => 'required|unique:contracts',
            "LocalAddress"           => "required",
            "PermanentAddress"       => "required",
            "Gender"                 => "required",
            "Expertise"              => "required",
            "OtherContractorDetails" => "required",
            "ContractorName"         => "required",
            "NIN"                    => 'required|unique:contracts',
            "Nationality"            => "required",
            "Designation"            => "required",
            "CategoryName"           => "required",
            "DOB"                    => "required",
            "Department"             => "required",
            "JoiningDate"            => "required",
            "ContractExpiry"         => "required",
            "MonthlySalary"          => "required",
            "BankName"               => "required",
            "BankBranch"             => "required",
            "AccountName"            => 'required|unique:contracts',
            "AccountNumber"          => 'required|unique:contracts',
            "TIN"                    => 'required|unique:contracts',
            "BankCode"               => "required",
            "StaffCode"              => "required",
            "EmpID"                  => 'required|unique:contracts',
            'IDScan'                 => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'StaffPhoto'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $Contracts = Contracts::create($validated);

        $C = ContractCategories::where('CategoryName', $request->CategoryName)->first();

        $U = Contracts::where("EmpID", $request->EmpID)->first();

        $IDScan = $request->file('IDScan')->store('public');

        $StaffPhoto = $request->file('StaffPhoto')->store('public');

        $U->IDScan = Str::replace('public', 'storage', $IDScan);

        $U->StaffPhoto = Str::replace('public', 'storage', $StaffPhoto);

        $U->Description = $C->Description;

        $U->CID = $C->CID;

        $U->save();

        return back()->with('status', 'New contractor created  successfully');

    }

    public function NewConKin(Request $request) {

        $validated = $this->validate($request, [

            "Email"            => 'required|unique:contractor_kins',
            "PhoneNumber"      => 'required|unique:contractor_kins',
            "IdNo"             => 'required|unique:contractor_kins',
            "EmployeeName"     => 'required',
            "EmpID"            => 'required',
            "Name"             => 'required',
            "Relationship"     => 'required',
            "Nationality"      => 'required',
            "Gender"           => 'required',
            "DOB"              => 'required',
            "PhoneNumber"      => 'required',
            "CurrentAddress"   => 'required',
            "PermanentAddress" => 'required',

        ]);

        ContractorKins::create($validated);

        return back()->with('status', 'Next of kin attached to selected contractor successfully');

    }

    public function ViewKins($id) {

        $C = Contracts::find($id)->EmpID;
        $N = Contracts::find($id)->ContractorName;

        $Kins = ContractorKins::where("EmpID", $C)->get();

        $FormEngine = new FormEngine;

        $rem = [
            'id',
            'created_at',
            'EmployeeName',
            'updated_at',
            'EmpID',
            'Gender',

        ];

        $data = [

            "Title"          => "Contractor next of kins management interface",
            "Desc"           => "Manage next of kins attached to the contractor " . $N,
            "Page"           => "contracts.ViewKins",
            "Kins"           => $Kins,
            "rem"            => $rem,
            "ContractorName" => $N,
            "EmpID"          => $C,
            "Form2"          => $FormEngine->Form('contractor_kins'),

        ];
        return view("scrn", $data);

    }

    public function DelCon($id) {

        $Contracts = Contracts::find($id);

        $IDScan     = $Contracts->IDScan;
        $StaffPhoto = $Contracts->StaffPhoto;

        $FinalIDscan = Str::replace('storage', 'app/public', $IDScan);

        $FinalStaffPhoto = Str::replace('storage', 'app/public', $StaffPhoto);

        unlink(storage_path($FinalIDscan));

        unlink(storage_path($FinalStaffPhoto));

        $Contracts->delete();

        return back()->with('status', 'Contractor record deleted successfully');
    }

    public function TerminateCon($id) {

        $a = Contracts::find($id);

        $a->RecordStatus = "Contract Terminated";

        $a->save();

        return back()->with('status', 'Contractor\'s contract has been terminated successfully');
    }

    public function TerminatedCons() {

        $FormEngine = new FormEngine;

        $Categories = ContractCategories::all();

        $rem = [
            'id',
            'created_at',
            'updated_at',
            'RecordStatus',
            'CID',
            'Gender',
            'PromotionStatus',
            'Description',
            'IDScan',
            'EmpID',
            'CategoryName',
            'StaffPhoto',
        ];

        $rem2 = [
            'id',
            'created_at',
            'EmployeeName',
            'updated_at',
            'EmpID',
            'Gender',

        ];

        $Contracts = DB::table('contracts AS C')

            ->join('contract_categories AS CC', 'CC.CID', '=', 'C.CID')

            ->where('C.RecordStatus', '=', 'Contract Terminated')

            ->select('C.*', 'CC.Description')

            ->get();

        $data = [

            "Title"      => "Manage all  terminated contracts ",
            "Desc"       => "View all contracts that were terminated",
            "Page"       => "contracts.Terminated",
            "Contracts"  => $Contracts,
            "Categories" => $Categories,
            "rem"        => $rem,
            "rem2"       => $rem2,
            "Form"       => $FormEngine->Form('contracts'),
            "Form2"      => $FormEngine->Form('contractor_kins'),

        ];
        return view("scrn", $data);
    }

    public function RenCon($id) {

        $a = Contracts::find($id);

        $a->RecordStatus = "Contract Active";

        $a->save();

        return back()->with('status', 'The selected contract has been renewed successfully');
    }

    public function ExpiredCons() {
        $FormEngine = new FormEngine;

        $Categories = ContractCategories::all();

        $rem = [
            'id',
            'created_at',
            'updated_at',
            'RecordStatus',
            'CID',
            'Gender',
            'PromotionStatus',
            'Description',
            'IDScan',
            'EmpID',
            'CategoryName',
            'StaffPhoto',
        ];

        $rem2 = [
            'id',
            'created_at',
            'EmployeeName',
            'updated_at',
            'EmpID',
            'Gender',

        ];

        $Contracts = DB::table('contracts AS C')

            ->join('contract_categories AS CC', 'CC.CID', '=', 'C.CID')

            ->where('C.RecordStatus', '=', 'Contract Expired')

            ->select('C.*', 'CC.Description')

            ->get();

        $data = [

            "Title"      => "Manage all  expired contracts ",
            "Desc"       => "View all contracts that have expired",
            "Page"       => "contracts.Expired",
            "Contracts"  => $Contracts,
            "Categories" => $Categories,
            "rem"        => $rem,
            "rem2"       => $rem2,
            "Form"       => $FormEngine->Form('contracts'),
            "Form2"      => $FormEngine->Form('contractor_kins'),

        ];
        return view("scrn", $data);
    }

    public function StaffContracts() {

        $Employees = Employees::all();

        $Departments = Departments::all();

        $data = [

            "Title"       => "Manage fulltime staff contracts",
            "Desc"        => "View the contract validity status of all fulltime staff members",
            "Page"        => "contracts.Staff",
            "Employees"   => $Employees,
            "Departments" => $Departments,

        ];
        return view("scrn", $data);

    }

    public function DocSelectCon() {

        $Docs = DB::table('contracts')->where("RecordStatus", "Contract Active")->get();

        $data = [

            "Title" => "Select contractor whose documentation is required",
            "Desc"  => "Only active contracts are shown",
            "Page"  => "contracts.DocsSelectStaff",
            "Docs"  => $Docs,
        ];
        return view("scrn", $data);
    }

    public function ConDocSelected(Request $request) {

        return redirect()->route('ConMgtDocs', ['id' => $request->id]);
    }

    public function ConMgtDocs($id) {

        $s = Contracts::find($id);

        $SatffDocs = SatffDocs::where("EmpID", $s->EmpID)->get();

        $ContractorName = $s->ContractorName;

        $EmpID = $s->EmpID;

        $id = $s->id;

        $Docs = DB::table('contracts AS E')
            ->where('E.id', $id)
            ->join('satff_docs AS S', 'S.EmpID', '=', 'E.EmpID')
            ->select('S.*', 'E.*', 'S.id AS SID')
            ->get();

        $count = DB::table('contracts AS E')
            ->where('E.id', $id)
            ->join('satff_docs AS S', 'S.EmpID', '=', 'E.EmpID')
            ->select('S.*', 'E.*', 'S.id AS SID')
            ->count();

        $data = [

            "Title"     => "External documents attached to selected contractor",
            "Desc"      => "The selected contractor is " . $s->ContractorName,
            "Page"      => "contracts.MgtDocs",
            "Docs"      => $Docs,
            "Contract2" => "true",
            "StaffName" => $ContractorName,
            "EmpID"     => $EmpID,
            "count"     => $count,
            "id"        => $id,
        ];
        return view("scrn", $data);
    }

}
