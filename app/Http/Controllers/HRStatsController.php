<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Benefits;
use App\Models\Deductions;
use App\Models\Departments;
use App\Models\DeptHeads;
use App\Models\Employees;
use App\Models\Leaves;
use App\Models\LeaveTypes;
use App\Models\Tax;
use App\Models\User;

class HRStatsController extends Controller {

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

    public function Stats() {

        $Leave       = LeaveTypes::all();
        $Pending     = Leaves::where("ApprovalStatus", "pending")->count();
        $Approved    = Leaves::where("ApprovalStatus", "approved")->count();
        $Declined    = Leaves::where("ApprovalStatus", "declined")->count();
        $RegS        = Employees::count();
        $ActiveCs    = Employees::where("RecordStatus", "Contract Active")->count();
        $Ended       = Employees::where("RecordStatus", "Contract Ended")->count();
        $Departments = Departments::count();
        $DeptHeads   = DeptHeads::count();
        $User        = User::count();
        $Benefits    = Benefits::count();
        $Deductions  = Deductions::count();
        $Tax         = Tax::count();
        $data        = [

            "Title"       => "HR Stats Dashboard",
            "Desc"        => "Brief HR statistics",
            "Page"        => "stats.stats",
            "Pending"     => $Pending,
            "Approved"    => $Approved,
            "Declined"    => $Declined,
            "RegS"        => $RegS,
            "ActiveCs"    => $ActiveCs,
            "Ended"       => $Ended,
            "Departments" => $Departments,
            "DeptHeads"   => $DeptHeads,
            "User"        => $User,
            "Benefits"    => $Benefits,
            "Deductions"  => $Deductions,
            "Tax"         => $Tax,

        ];
        return view("scrn", $data);

    }
}
