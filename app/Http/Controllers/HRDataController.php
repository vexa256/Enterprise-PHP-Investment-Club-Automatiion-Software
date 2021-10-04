<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssignLeave;
use App\Models\Employees;
use App\Models\Leaves;
use App\Models\LeaveTypes;
use App\Models\Notices;
use DateTime;
use DB;
use Illuminate\Http\Request;

class HRDataController extends Controller {

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

    public function LeaveSettings() {

        $Leave = LeaveTypes::all();
        $data  = [

            "Title" => "Manage all staff leave categories",
            "Desc"  => "Leave settings management interface",
            "Page"  => "leave.settings",
            "Leave" => $Leave,
        ];
        return view("scrn", $data);

    }

    public function NewLeave(Request $request) {

        $validated = $this->validate($request, [

            "Description" => "required",
            "LID"         => "required",
            "LeaveType"   => "required",
            "Days"        => "required",
        ]);

        LeaveTypes::create($validated);

        return back()->with('status', 'New leave category created successfully');
    }

    public function DeleteLeaveCat($id) {

        LeaveTypes::find($id)->delete();

        return back()->with('status', 'Leave category created successfully');
    }

    public function AssignLeave() {

        $Employees = Employees::where("RecordStatus", "Contract Active")->get();

        $data = [

            "Title"     => "Select staff member to assign leave rights",
            "Desc"      => "Leave assignment interface",
            "Page"      => "leave.SelectStaff",
            "Employees" => $Employees,
        ];
        return view("scrn", $data);

    }

    public function LeaveSelected(Request $request) {

        return redirect()->route('LeaveAssignment', ['id' => $request->id]);
    }

    public function LeaveAssignment($id) {

        $E = Employees::find($id);

        $Employees = DB::table('employees AS E')
            ->where('E.id', $id)

            ->join('assign_leaves AS A', 'A.EmpID', '=', 'E.EmpID')

            ->join('leave_types AS L', 'L.LID', '=', 'A.LID')

            ->select('A.*', 'E.*', 'L.*', 'A.id AS AID')

            ->get();

        $LeaveTypes = LeaveTypes::all();

        $data = [

            "Title"      => "Manage staff leave assignment ",
            "Desc"       => "The selected staff member is " . $E->StaffName,
            "Page"       => "leave.Assign",
            "Employees"  => $Employees,
            "StaffName"  => $E->StaffName,
            "EmpID"      => $E->EmpID,
            "LeaveTypes" => $LeaveTypes,
        ];
        return view("scrn", $data);
    }

    public function AcceptAssign(Request $request) {

        $validated = $this->validate($request, [

            "LID"   => "required",
            "EmpID" => "required",

        ]);

        $E = Employees::where("EmpID", $request->EmpID)->first();
        $L = LeaveTypes::where("LID", $request->LID)->first();

        $AssignLeave              = new AssignLeave;
        $AssignLeave->EmpID       = $E->EmpID;
        $AssignLeave->LID         = $L->LID;
        $AssignLeave->Dayentitled = $L->Days;

        $AssignLeave->save();

        return back()->with('status', 'Leave rights assignment executed successfully');

    }

    public function RevokeLeaveRight($id) {
        AssignLeave::find($id)->delete();

        return back()->with('status', 'Selected staff member leave rights revoked  successfully');
    }

    public function SelectLeaveApply() {

        $Employees = Employees::where("RecordStatus", "Contract Active")->get();

        $data = [

            "Title"     => "Select staff member to attach the leave application to ",
            "Desc"      => "Leave application",
            "Page"      => "leave.SelectStaff2",
            "Employees" => $Employees,
        ];
        return view("scrn", $data);

    }

    public function LeaveIdSelected(Request $request) {

        return redirect()->route('ApplyForLeave', ['id' => $request->id]);
    }

    public function ApplyForLeave($id) {

        $E = Employees::find($id);

        $Apps = DB::table('employees AS E')
            ->where('E.id', $id)

            ->join('assign_leaves AS A', 'A.EmpID', '=', 'E.EmpID')

            ->join('leave_types AS L', 'L.LID', '=', 'A.LID')

            ->join('Leaves AS LL', 'LL.EmpID', '=', 'A.EmpID')

            ->select('A.*', 'E.*', 'L.*', 'A.id AS AID', 'LL.*', 'LL.id AS LLID')

            ->get();

        $LeaveTypes = DB::table('employees AS E')
            ->where('E.id', $id)

            ->join('assign_leaves AS A', 'A.EmpID', '=', 'E.EmpID')

            ->join('leave_types AS L', 'L.LID', '=', 'A.LID')

            ->select('A.*', 'E.*', 'L.*', 'A.id AS AID')

            ->get();

        $data = [

            "Title"      => "Leave application interface",
            "Desc"       => "Leave applications attached to",
            "Page"       => "leave.Apply",
            "LeaveTypes" => $LeaveTypes,
            "Apps"       => $Apps,
            "StaffName"  => $E->StaffName,
            "EmpID"      => $E->EmpID,

        ];
        return view("scrn", $data);
    }

    public function NewApp(Request $request) {

        $SpentDays = 0;

        $validated = $this->validate($request, [
            'TheDateToday' => 'required|date',
            'StartDate'    => 'required|date|after_or_equal:TheDateToday',
            'EndDate'      => 'required|date|after_or_equal:StartDate',
            'EndDate'      => 'required|date|after:TheDateToday',
            "LID"          => "required",
            "AppLetter"    => "required",
            "EmpID"        => "required",
        ]);

        $LeaveType = LeaveTypes::where('LID', $request->LID)->first();

        $StartDate    = $request->StartDate;
        $EndDate      = $request->EndDate;
        $datetime1    = new DateTime($StartDate);
        $datetime2    = new DateTime($EndDate);
        $interval     = $datetime1->diff($datetime2);
        $ConsumedDays = $interval->format('%a');

        $CheckDays = AssignLeave::where('LID', $request->LID)->first();

        if ($ConsumedDays > $CheckDays->Dayentitled) {

            return redirect()->back()->with('error_a', 'Leave application not submitted, You have applied for more leave days than the days you available for this leave category');

        }

        $count = Leaves::where('EmpID', $request->EmpID)
            ->where("LID", $request->LID)
            ->count();

        $count2 = DB::table('leaves')
            ->where('EmpID', $request->EmpID)
            ->where("LID", $request->LID)
            ->where("ApprovalStatus", "pending")

            ->count();

        $count3 = DB::table('leaves')
            ->where('EmpID', $request->EmpID)
            ->where("LID", $request->LID)
            ->where("ValidityStatus", "ongoing")
            ->count();

        if ($count2 > 0 || $count3 > 0) {
            return redirect()->back()->with('error_a', 'Leave application not submitted, You have an ongoing leave action');
        }

        $AssignLeave = AssignLeave::where("LID", $request->LID)->first();

        if ($count > 0) {

            $OldDays = Leaves::where('EmpID', $request->EmpID)
                ->where("LID", $request->LID)
                ->sum('SpentDays');

            $SpentDays = $ConsumedDays + $OldDays;

        } else {
            $SpentDays = $ConsumedDays;
        }

        // dd($AssignLeave->Dayentitled);
        $UnusedDays = $AssignLeave->Dayentitled - $SpentDays;

        $Apps = new Leaves;

        $Apps->LID            = $request->LID;
        $Apps->EmpID          = $request->EmpID;
        $Apps->AppLetter      = $request->AppLetter;
        $Apps->StartDate      = $request->StartDate;
        $Apps->EndDate        = $request->EndDate;
        $Apps->AssignedDays   = $AssignLeave->Dayentitled;
        $Apps->SpentDays      = $SpentDays;
        $Apps->UnusedDays     = $UnusedDays;
        $Apps->ApprovalStatus = "pending";
        $Apps->ValidityStatus = "pending";
        $Apps->save();

        return redirect()->back()->with('status', 'Leave application sent to your assigned supervisor for review  successfully, You will be notified  when feedback is detected');
    }

    public function ApproveLeave($id) {

        $leaves = leaves::find($id);

        $leaves->ApprovalStatus = "approved";
        $leaves->ValidityStatus = "ongoing";
        $leaves->save();

        $AssignLeave = AssignLeave::where("LID", $leaves->LID)->first();

        $AssignLeave->Dayentitled = $leaves->UnusedDays;

        $AssignLeave->save();

        return redirect()->back()->with('status', 'Leave application was approved successfully. Staff member has been notified via email');
    }

    public function DeclineLeave($id) {

        $leaves = leaves::find($id);

        $leaves->ApprovalStatus = "declined";
        $leaves->ValidityStatus = "not valid";
        $leaves->SpentDays      = 0;
        $leaves->UnusedDays     = 0;
        $leaves->save();

        return redirect()->back()->with('status', 'Leave application was declined successfully. Staff member has been notified via email');

    }

    public function TerminateLeave($id) {

        $count2 = Leaves::where("id", $id)
            ->where("ApprovalStatus", "approved")
            ->orWhere("ApprovalStatus", "declined")
            ->orWhere("ValidityStatus", "ongoing")
            ->orWhere("ValidityStatus", "ended")
            ->count();

        if ($count2 > 0) {

            return redirect()->back()->with('error_a', 'Leave application not revoked, The selected leave application is either ongoing or ended. Declined leave request also can not be recalled');
        }

        $leaves = leaves::find($id)->delete();

        return redirect()->back()->with('status', 'Leave application was deleted successfully.');

    }

    public function LeaveDashBoard() {

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
            "Page"       => "leave.Dash",
            "LeaveTypes" => $LeaveTypes,
            "Apps"       => $Apps,
            "Approved"   => $Approved,
            "Declined"   => $Declined,

        ];
        return view("scrn", $data);
    }

    public function NoticeBoard() {

        $Notices = Notices::all();

        $data = [

            "Title"   => "General staff members notice board",
            "Desc"    => "Intergrated MIS notice board",
            "Page"    => "notice.Notice",
            "Notices" => $Notices,
        ];
        return view("scrn", $data);

    }

    public function NewNotice(Request $request) {

        $validated = $this->validate($request, [

            "Name"    => "required",
            "Subject" => "required",
            "Notice"  => "required",

        ]);

        Notices::create($validated);

        return back()->with('status', 'New notice sent to all staff member successfully. Staff members have also been notified via email');

    }

}
