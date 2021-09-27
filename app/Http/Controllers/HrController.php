<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employees;
use App\Models\Supervisors;
use App\Models\User;
use DB;
use Hash;
use Illuminate\Http\Request;

class HrController extends Controller {

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

            "Supervisor" => "required|unique:supervisors",
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

        return back()->with('status', 'Supervisor account deleted successfully');

    }

}
