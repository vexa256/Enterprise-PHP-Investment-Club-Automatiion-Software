<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FormEngine;
use App\Models\ContractorBeneficiaries;
use App\Models\ContractorBenefits;
use App\Models\Contracts;
use App\Models\Employees;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConBenefitsController extends Controller {

    public function ConBenefits() {

        $Benefits = ContractorBenefits::all();

        $FormEngine = new FormEngine;

        $rem = ['created_at', 'updated_at', 'BID', 'id'];

        $data = [

            "Title"    => "Create contractor/staff benefit categories",
            "Desc"     => "Manage all benefits that will be assigned to contractors and permanent staff",
            "Page"     => "contracts.Ben",
            "Benefits" => $Benefits,
            "Form"     => $FormEngine->Form('contractor_benefits'),
            "rem"      => $rem,

        ];
        return view("scrn", $data);

    }

    public function NewConBen(Request $request) {

        $validated = $this->validate($request, [

            "Benefit"     => "required|unique:contractor_benefits",
            "Description" => "required",
            "Amount"      => "required",
            "BID"         => "required|unique:contract_categories",
        ]);

        ContractorBenefits::create($validated);

        return back()->with('status', 'New contractor benefit category created successfully');
    }

    public function DelConBen($id) {

        ContractorBenefits::find($id)->delete();

        return back()->with('status', 'Selected contractor benefit category deleted successfully');
    }

    public function SelectStaffBen() {

        $Contracts = DB::table('contracts AS C')

            ->select('C.*')

            ->get();

        $data = [

            "Title"     => "Contractor Benefit Assignment",
            "Desc"      => "Manage all benefits that will be assigned to contractors",
            "Page"      => "contracts.SelectStaffBen",
            "Contracts" => $Contracts,

        ];
        return view("scrn", $data);
    }

    public function ConBenSelected(Request $request) {

        return redirect()->route('AssignConBen', ['id' => $request->id]);

    }

    public function AssignConBen($id) {

        $FormEngine = new FormEngine;

        $rem = ['created_at', 'updated_at', 'id', 'BID', 'Photo', 'IDScan', 'EmpID', 'Gender'];

        $C                  = Contracts::find($id);
        $ContractorBenefits = ContractorBenefits::all();

        $Contracts = DB::table('contracts AS C')

            ->where('C.id', '=', $id)

            ->join('contractor_beneficiaries AS B', 'B.EmpID', '=', 'C.EmpID')

            ->join('contractor_benefits AS CB', 'CB.BID', '=', 'B.BID')

            ->select(
                'B.*',
                'C.ContractorName',
                'CB.Benefit',
                'CB.Description',
                'CB.BID'

            )

            ->get();

        $data = [

            "Title"              => "Beneficiaries attached to the contractor " . $C->ContractorName,
            "Desc"               => "Beneficiary settings",
            "Page"               => "contracts.AssignBen",
            "Contracts"          => $Contracts,
            "Staff"              => $C,
            "ContractorBenefits" => $ContractorBenefits,
            "rem"                => $rem,
            "Form"               => $FormEngine->Form('contractor_beneficiaries'),

        ];
        return view("scrn", $data);

    }

    public function CreateNewBen(Request $request) {

        $validated = $this->validate($request, [
            "Name"             => 'required',
            "EmpID"            => 'required',
            "BID"              => 'required',
            "PhoneNumber"      => 'required',
            "Email"            => 'required',
            "Age"              => 'required',
            "Gender"           => 'required',
            "DOB"              => 'required',
            "CurrentAddress"   => 'required',
            "PermanentAddress" => 'required',
            "Relationship"     => 'required',
            "IdType"           => 'required',
            "IdNumber"         => 'required',
            'IDScan'           => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Photo'            => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        ContractorBeneficiaries::create($validated);

        $IDScan = $request->file('IDScan')->store('public');

        $Photo = $request->file('Photo')->store('public');

        $Update = ContractorBeneficiaries::where("EmpID", $request->EmpID)
            ->where('Name', $request->Name)
            ->first();

        $Update->IDScan = Str::replace('public', 'storage', $IDScan);

        $Update->Photo = Str::replace('public', 'storage', $Photo);

        $Update->save();

        return back()->with('status', 'New beneficiary attached to the selected contractor/staff member successfully successfully');
    }

    public function DeleteBenAss($id) {

        $ContractorBeneficiaries = ContractorBeneficiaries::find($id);

        $IDScan = $ContractorBeneficiaries->IDScan;
        $Photo  = $ContractorBeneficiaries->Photo;

        $FinalIDscan = Str::replace('storage', 'app/public', $IDScan);

        $FinalPhoto = Str::replace('storage', 'app/public', $Photo);

        unlink(storage_path($FinalIDscan));

        unlink(storage_path($FinalPhoto));

        $ContractorBeneficiaries->delete();

        return redirect()->back()->with("status", "The selected beneficiary record was deleted successfully");

    }

    public function SelectStaffBenP() {

        $Contracts = DB::table('employees AS C')

            ->select('C.*')

            ->get();

        $data = [

            "Title"     => "Staff member Benefit Assignment",
            "Desc"      => "View all benefits  assigned to selected the selected staff member",
            "Page"      => "bens.SelectStaff",
            "Contracts" => $Contracts,

        ];
        return view("scrn", $data);
    }

    public function ConBenSelected2(Request $request) {

        return redirect()->route('AssignConBen2', ['id' => $request->id]);

    }

    public function AssignConBen2($id) {

        $FormEngine = new FormEngine;

        $rem = ['created_at', 'updated_at', 'id', 'BID', 'Photo', 'IDScan', 'EmpID', 'Gender'];

        $C                  = Employees::find($id);
        $ContractorBenefits = ContractorBenefits::all();

        $Contracts = DB::table('employees AS C')

            ->where('C.id', '=', $id)

            ->join('contractor_beneficiaries AS B', 'B.EmpID', '=', 'C.EmpID')

            ->join('contractor_benefits AS CB', 'CB.BID', '=', 'B.BID')

            ->select(
                'B.*',
                'C.StaffName AS ContractorName',
                'CB.Benefit',
                'CB.Description',
                'CB.BID'

            )

            ->get();

        $data = [

            "Title"              => "Beneficiaries attached to the staff member " . $C->ContractorName,
            "Desc"               => "Beneficiary settings",
            "Page"               => "bens.AssignBen",
            "Contracts"          => $Contracts,
            "Staff"              => $C,
            "ContractorBenefits" => $ContractorBenefits,
            "rem"                => $rem,
            "Form"               => $FormEngine->Form('contractor_beneficiaries'),

        ];
        return view("scrn", $data);

    }

}
