
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

                 MenuItem($link=route('MgtEmp'), $label="Staff Database");

                 MenuItem($link=route('DocSelectStaff'), $label="Staff Documentation");

                 MenuItem($link=route('ExpContracts'), $label="Expired Staff Contracts");

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

                 MenuItem($link=route('LeaveSettings'),  $label="Leave Settings");

                 MenuItem($link=route('AssignLeave'),  $label="Leave Assignment");

                 MenuItem($link=route('SelectLeaveApply'), $label="Leave Application");

                 MenuItem($link=route('LeaveDashBoard'), $label="Leave Dashboard");



        ?>


    </div>
</div>


