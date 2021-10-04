<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FormEngine;
use App\Models\Appraisals;
use App\Models\Contracts;
use App\Models\Employees;
use DateTime;
use Illuminate\Http\Request;

class AppraisalController extends Controller {

    public function SelectAppraisal() {

        $Contracts = Contracts::all();

        $Staff = Employees::all();

        $data = [

            "Title"     => "Run performance appraisal",
            "Desc"      => "Employee performance appraisal",
            "Page"      => "apps.Select",
            "Contracts" => $Contracts,
            "Staff"     => $Staff,

        ];
        return view("scrn", $data);

    }

    public function EmpSelect(Request $request) {

        return redirect()->route('EmpApp', ['id' => $request->id]);
    }

    public function EmpApp($id) {

        $FormEngine = new FormEngine;

        $rem = [
            'id',
            'created_at',
            'AID',
            'updated_at',
            'EmpID',
            'Year',
            'Month',
            'Department',
            'Designation',

        ];

        $string = date('Y-m-d');
        $date   = \DateTime::createFromFormat("Y-m-d", $string);

        $Month = $date->format("M");
        $Year  = $date->format("Y");

        $E = Employees::find($id);

        $Appraisals = Appraisals::where('EmpID', $E->EmpID)->get();

        $data = [

            "Title"      => "Run performance appraisal",
            "Desc"       => "Select appraisal category or function",
            "Page"       => "apps.Emp",
            "Appraisals" => $Appraisals,
            "Staff"      => $E,
            "Month"      => $Month,
            "Year"       => $Year,
            "rem"        => $rem,
            "Form"       => $FormEngine->Form('appraisals'),

        ];
        return view("scrn", $data);

    }

    public function RunApp(Request $request) {

        $validated = $this->validate($request, [

            "EmpID"           => "required",
            "Name"            => "required",
            "Department"      => "required",
            "Designation"     => "required",
            "AID"             => "required",
            "Month"           => "required",
            "Year"            => "required",
            "Title"           => "required",
            "Score"           => "required",
            "KpiAnalysis"     => "required",
            "Recommendations" => "required",

        ]);

        Appraisals::create($validated);

        return back()->with('status', 'New appraisal report  created successfully');
    }

    public function DelAppr($id) {

        Appraisals::find($id)->delete();

        return back()->with('status', 'Appraisal report  deleted successfully');
    }

    public function ConSelect(Request $request) {

        return redirect()->route('ConApp', ['id' => $request->id]);
    }

    public function ConApp($id) {

        $FormEngine = new FormEngine;

        $rem = [
            'id',
            'created_at',
            'AID',
            'updated_at',
            'EmpID',
            'Year',
            'Month',
            'Department',
            'Designation',

        ];

        $string = date('Y-m-d');
        $date   = \DateTime::createFromFormat("Y-m-d", $string);

        $Month = $date->format("M");
        $Year  = $date->format("Y");

        $E = Contracts::find($id);

        $Appraisals = Appraisals::where('EmpID', $E->EmpID)->get();

        $data = [

            "Title"      => "Run performance appraisal",
            "Desc"       => "Select appraisal category or function",
            "Page"       => "apps.Emp",
            "Appraisals" => $Appraisals,
            "Staff"      => $E,
            "Month"      => $Month,
            "Year"       => $Year,
            "rem"        => $rem,
            "Form"       => $FormEngine->Form('appraisals'),

        ];
        return view("scrn", $data);

    }
}
