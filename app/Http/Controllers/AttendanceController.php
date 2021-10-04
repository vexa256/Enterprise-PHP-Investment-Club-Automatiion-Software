<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AttendaceRecord;
use App\Models\DailyAttendace;
use App\Models\Employees;
use DateTime;
use DB;
use Hash;
use Illuminate\Http\Request;

class AttendanceController extends Controller {

    public function SelectAttS() {

        $AttendaceRecord = AttendaceRecord::all();

        $Employees = Employees::where('RecordStatus', 'Contract Active')->get();

        $data = [

            "Title"           => "Run daily attendace analysis",
            "Desc"            => "Register staff member's daily attendace record",
            "Page"            => "attendace.Select",
            "Employees"       => $Employees,
            "AttendaceRecord" => $AttendaceRecord,

        ];
        return view("scrn", $data);

    }

    public function NewAttendanceRecord(Request $request) {

        $string = date('Y-m-d');
        $date   = \DateTime::createFromFormat("Y-m-d", $string);

        $Month = $date->format("M");
        $Year  = $date->format("Y");

        $Count = AttendaceRecord::whereDate('Record', '=', date('Y-m-d'))->count();

        if ($Count > 0) {
            return back()->with('error_a', 'Todays\'s attendace record has already been created ');
        }

        $AttendaceRecord = new AttendaceRecord;

        $AttendaceRecord->Record = $string;
        $AttendaceRecord->RID    = Hash::make($string . $Month . $Year);
        $AttendaceRecord->Month  = $Month;
        $AttendaceRecord->Year   = $Year;

        $AttendaceRecord->save();

        return back()->with('status', 'Todays\'s attendace record has  been created successfully');

    }

    public function NewAttendace(Request $request) {

        $E = Employees::where("EmpID", $request->EmpID)->first();

        $check = DailyAttendace::where('RID', $request->RID)
            ->where('EmpID', $request->EmpID)
            ->count();

        if ($check > 0) {

            return redirect()->route('AttReport', ['id' => $E->id])->with('status', 'Todays\'s attendace report has  been created successfully for the selected staff member');
        }

        $validated = $this->validate($request, [

            "RID"    => "required",
            "EmpID"  => "required",
            "status" => "required",
            "time"   => "required",

        ]);

        $DailyAttendace = new DailyAttendace;

        $DailyAttendace->RID         = $request->RID;
        $DailyAttendace->EmpID       = $request->EmpID;
        $DailyAttendace->status      = $request->status;
        $DailyAttendace->time        = $request->time;
        $DailyAttendace->Name        = $E->StaffName;
        $DailyAttendace->Designation = $E->Designation;
        $DailyAttendace->Department  = $E->Department;
        $DailyAttendace->save();

        return redirect()->route('AttReport', ['id' => $E->id])->with('status', 'Todays\'s attendace report has  been created successfully for the selected staff member');

    }

    public function AttReport($id) {

        $E = Employees::where("id", $id)->first();

        $Att = DB::table('daily_attendaces AS D')

            ->where("D.EmpID", $E->EmpID)

            ->join('attendace_records AS A', 'A.RID', '=', 'D.RID')

            ->select('D.*', 'A.Record')

            ->get();

        $data = [

            "Title" => "Daily attendace analysis",
            "Desc"  => "Selected staff member's daily attendace record",
            "Page"  => "attendace.Att",
            "Staff" => $E,
            "Att"   => $Att,

        ];
        return view("scrn", $data);

    }

}
