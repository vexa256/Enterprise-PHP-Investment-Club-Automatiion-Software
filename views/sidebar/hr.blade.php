
<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-users fs-3" aria-hidden="true"></i>
        </span>
        <span class="menu-title">Staff Management</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

<?php
        MenuItem($link=route('MgtDepts'), $label="Departments");

        MenuItem($link=route('MgtDepts'), $label="Staff Roles");

        MenuItem($link=route('MgtDepts'), $label="Supervisors");

        MenuItem($link=route('MgtEmp'), $label="Staff Database");

        MenuItem($link=route('DocSelectStaff'), $label="Staff Documentation");

        MenuItem($link=route('StaffContracts'), $label="Contract Status");

        MenuItem($link=route("DeptHeads"), $label="Department Heads");

        MenuItem($link=route('NoticeBoard'), $label="Staff Noticeboard");

                /* MenuItem($link=route("DeptHeads"), $label="Non Payroll Benefits");*/




        ?>


    </div>
</div>

<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-money-check-alt fs-3" aria-hidden="true"></i>
        </span>
        <span class="menu-title">Finance Actions</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php
                 MenuItem($link=route('Fsettings'), $label="Finance Settings");

                MenuItem($link=route('PaySelectStaff'), $label="Payroll Settings");

                MenuItem($link=route('SelectPayroll'), $label="Execute Payroll");

/* MenuItem($link="#", $label="Promotions");*/



        ?>


    </div>
</div>



<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-people-carry fs-3" aria-hidden="true"></i>
        </span>
        <span class="menu-title">Leave Management</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php
                 MenuItem($link=route('MgtSupervisors'), $label="Manage Supervisors");

                 MenuItem($link=route('AssignSuper'), $label="Assign Supervisors");

                 MenuItem($link=route('LeaveSettings'),  $label="Leave Settings");

                 MenuItem($link=route('AssignLeave'),  $label="Leave Assignment");

                 MenuItem($link=route('SelectLeaveApply'), $label="Leave Application");

                 MenuItem($link=route('LeaveDashBoard'), $label="HR Leave Dashboard");

                 MenuItem($link=route('ApproveLeaveSupervisor'), $label="Leave  Applications");



        ?>


    </div>
</div>

<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-gift fs-3" aria-hidden="true"></i>
        </span>
        <span class="menu-title">Staff Beneficiaries</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php
                 MenuItem($link=route('ConBenefits'), $label="Benefit Categories");


                 MenuItem($link=route('SelectStaffBenP'),  $label="Staff Beneficiaries");







        ?>


    </div>
</div>


<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-book fs-3" aria-hidden="true"></i>
        </span>
        <span class="menu-title">Contractors / Contracts</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php
            MenuItem($link=route('ContractCategories'), $label="Contract Categories");

            MenuItem($link=route('MgtContracts'),  $label="Manage Contracts");



            MenuItem($link=route('TerminatedCons'), $label="Terminated Contractors");

            MenuItem($link=route('ExpiredCons'), $label="Expired Contractors");

            MenuItem($link=route('DocSelectCon'), $label="Contractor Documentation");

            MenuItem($link=route('ConBenefits'),  $label=" Benefit Categories");

            MenuItem($link=route('SelectStaffBen'), $label="Contractor Beneficiairies");

            /*MenuItem($link=route('LeaveSettings'),  $label="Contractor Payroll Benefits");*/







        ?>


    </div>
</div>


<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-check fs-3" aria-hidden="true"></i>
        </span>
        <span class="menu-title">Staff Appraisal</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php


                MenuItem($link=route('SelectAppraisal'),  $label="Run Appraisal");


                /*MenuItem($link=route('LeaveSettings'),  $label="View Appraisals");*/







        ?>


    </div>
</div>


{{--<div data-kt-menu-trigger="click" class=" d-none menu-item menu-accordion">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-calendar fs-3" aria-hidden="true"></i>
        </span>
        <span class="menu-title">Staff Attendance</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php/*
                 MenuItem($link=route('SelectAttS'), $label="Daily Attendance");
                 /*MenuItem($link=route('LeaveSettings'),  $label="Attendance Report");*/







        ?>


    </div>
</div>
---}}

<div data-kt-menu-trigger="click" class="menu-item menu-accordion d-none">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-users-cog fs-3" aria-hidden="true"></i>
        </span>
        <span class="menu-title">User Settings</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php
                 MenuItem($link=route('MgtSupervisors'), $label="Supervisor Accounts");
                 MenuItem($link=route('LeaveSettings'),  $label="Staff Accounts");
                 MenuItem($link=route('LeaveSettings'),  $label="Admin Accounts");
                 MenuItem($link=route('LeaveSettings'),  $label="HR Accounts");
                 MenuItem($link=route('LeaveSettings'),  $label="Contractor Accounts");







        ?>


    </div>
</div>


