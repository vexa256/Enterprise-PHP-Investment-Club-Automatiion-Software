<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employees;
use App\Models\Leaves;
use App\Models\Supervisors;
use App\Models\SupervisorsAssign;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Http\Request;

class HrController extends Controller {

    public function __construct() {

        $Count = Leaves::whereDate('EndDate', '<', date('Y-m-d'))
            ->where('ValidityStatus', 'ongoing')
            ->count();

        if ($Count > 0) {

            $check = Leaves::whereDate('EndDate', '<', date('Y-m-d'))
                ->where('ValidityStatus', 'ongoing')
                ->get();

            foreach ($check as $data) {

                $Leaves = Leaves::find($data->id);

                $Leaves->ValidityStatus = "Leave Expired";

                $Leaves->save();

            }

        }
    }

    public function MgtSupervisors() {

        $supervisors = DB::table('employees AS E')

            ->join('supervisors AS S', 'S.EmpID', '=', 'E.EmpID')

            ->select('S.*', 'E.*', 'S.id AS SID', 'E.created_at AS ct')

            ->get();

        $Employees = Employees::where("RecordStatus", "Contract Active")->get();

        $data = [

            "Title"       => "Manage supervisor accounts",
            "Desc"        => "Select staff members to assign supervisor roles",
            "Page"        => "supervisors.Mgt",
            "supervisors" => $supervisors,
            "Employees"   => $Employees,
        ];
        return view("scrn", $data);

    }

    public function NewSupervisor(Request $request) {

        $validated = $this->validate($request, [

            "Supervisor" => "required",
            "username"   => "required|unique:supervisors",
            "password"   => "confirmed",

        ]);

        $E = Employees::find($request->Supervisor);

        $Supervisors = new Supervisors;

        $count = User::where('EmpID', $E->EmpID)
            ->orWhere('email', $request->username)
            ->orWhere('name', $E->StaffName)
            ->count();

        if ($count > 0) {
            return back()->with('error_a', 'The selected staff member is already assigned an account. Delete the existing user account and try again');
        }

        $Supervisors->Supervisor = $E->StaffName;
        $Supervisors->EmpID      = $E->EmpID;
        $Supervisors->password   = Hash::make($request->password);
        $Supervisors->username   = $request->username;

        $User = new User;

        $User->email    = $request->username;
        $User->name     = $E->StaffName;
        $User->password = Hash::make($request->password);
        $User->EmpID    = $E->EmpID;
        $User->role     = 'supervisor';

        $User->save();
        $Supervisors->save();

        return back()->with('status', 'New supervisor account created successfully');

    }

    public function ReverseSuper($id) {

        $Supervisors = Supervisors::find($id);

        $User = User::where('EmpID', $Supervisors->EmpID)->delete();

        $Supervisors->delete();

        return back()->with('status', 'Supervisor account reversed successfully');

    }

    public function AssignSuper() {

        $Employees = Employees::where("RecordStatus", "Contract Active")->get();

        $data = [

            "Title"     => "Select staff member to assign a supervisor",
            "Desc"      => "A staff member can only have one supervisor",
            "Page"      => "supervisors.SelectStaff",
            "Employees" => $Employees,
        ];
        return view("scrn", $data);

    }

    public function SelectSuper(Request $request) {

        return redirect()->route('Assign', ['id' => $request->id]);

    }

    public function Assign($id) {

        $E = Employees::find($id);

        $Assign = DB::table('employees AS E')

            ->where("E.EmpID", "!=", $E->EmpID)

            ->join('supervisors AS S', 'S.EmpID', '=', 'E.EmpID')

            ->select('S.*', 'E.*', 'S.id AS SID', 'E.created_at AS ct')

            ->get();

        $supervisors = SupervisorsAssign::where('StaffMemberEmpID', $E->EmpID)->get();

        $data = [

            "Title"       => "Manage supervisor assignment for the selected staff member",
            "Desc"        => "The selected staff member is " . $E->StaffName,
            "Page"        => "supervisors.Assign",
            "supervisors" => $supervisors,
            "Employees"   => $E,
            "Assign"      => $Assign,
        ];
        return view("scrn", $data);

    }

    public function AssignNewSuper(Request $request) {

        $validated = $this->validate($request, [

            "StaffMemberDepartment"  => "required",
            "StaffMemberEmpID"       => "required|unique:supervisors_assigns",
            "StaffMemberDesignation" => "required",
            "StaffMemberCode"        => "required",
            "Supervisor"             => "required",
            "StaffMember"            => "required|unique:supervisors_assigns",

        ]);

        $S = DB::table('employees AS E')

            ->join('supervisors AS S', 'S.EmpID', '=', 'E.EmpID')

            ->where("S.id", "=", $request->Supervisor)

            ->select('S.*', 'E.*')

            ->first();

        $SupervisorsAssign = new SupervisorsAssign;

        $SupervisorsAssign->StaffMemberDepartment  = $request->StaffMemberDepartment;
        $SupervisorsAssign->StaffMemberEmpID       = $request->StaffMemberEmpID;
        $SupervisorsAssign->StaffMemberDesignation = $request->StaffMemberDesignation;
        $SupervisorsAssign->StaffMemberCode        = $request->StaffMemberCode;
        $SupervisorsAssign->StaffMember            = $request->StaffMember;

        $SupervisorsAssign->SupervisorEmpID       = $S->EmpID;
        $SupervisorsAssign->Supervisor            = $S->StaffName;
        $SupervisorsAssign->SupervisorDepartment  = $S->Department;
        $SupervisorsAssign->SupervisorDesignation = $S->Designation;
        $SupervisorsAssign->AssignID              = Hash::make(Carbon::now() . $S->EmpID);
        $SupervisorsAssign->save();

        return redirect()->route('Assign', ['id' => $request->id])->with('status', 'Staff member has been assigned the selected supervisor successfully');
    }

    public function ReverseAssign($id) {

        SupervisorsAssign::find($id)->delete();

        return redirect()->back()->with('status', 'Staff member supervisor assignment has been reversed successfully');

    }

    public function ApproveLeaveSupervisor() {

        //$E = Employees::find($id);

        $Apps = DB::table('employees AS E')

            ->join('assign_leaves AS A', 'A.EmpID', '=', 'E.EmpID')

            ->join('leave_types AS L', 'L.LID', '=', 'A.LID')

            ->join('Leaves AS LL', 'LL.EmpID', '=', 'A.EmpID')

            ->where('LL.ApprovalStatus', 'pending')

            ->select('A.*', 'E.*', 'L.*', 'A.id AS AID', 'LL.*', 'LL.id AS LLID')

            ->get();

        $Approved = DB::table('employees AS E')

            ->join('assign_leaves AS A', 'A.EmpID', '=', 'E.EmpID')

            ->join('leave_types AS L', 'L.LID', '=', 'A.LID')

            ->join('Leaves AS LL', 'LL.EmpID', '=', 'A.EmpID')

            ->where('LL.ApprovalStatus', 'approved')

            ->select('A.*', 'E.*', 'L.*', 'A.id AS AID', 'LL.*', 'LL.id AS LLID')

            ->get();

        $Declined = DB::table('employees AS E')

            ->join('assign_leaves AS A', 'A.EmpID', '=', 'E.EmpID')

            ->join('leave_types AS L', 'L.LID', '=', 'A.LID')

            ->join('Leaves AS LL', 'LL.EmpID', '=', 'A.EmpID')

            ->where('LL.ApprovalStatus', 'declined')

            ->select('A.*', 'E.*', 'L.*', 'A.id AS AID', 'LL.*', 'LL.id AS LLID')

            ->get();

        $LeaveTypes = DB::table('employees AS E')

            ->join('assign_leaves AS A', 'A.EmpID', '=', 'E.EmpID')

            ->join('leave_types AS L', 'L.LID', '=', 'A.LID')

            ->select('A.*', 'E.*', 'L.*', 'A.id AS AID')

            ->get();

        $data = [

            "Title"      => "Leave application interface",
            "Desc"       => "Leave applications attached to  ",
            "Page"       => "leave.Approve",
            "LeaveTypes" => $LeaveTypes,
            "Apps"       => $Apps,
            "Approved"   => $Approved,
            "Declined"   => $Declined,

        ];
        return view("scrn", $data);
    }

}
