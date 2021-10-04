<div class="modal fade"  id="ViewBen">
    <div class="modal-dialog modal-dialog-scrollable  modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Benefits Transaction Log for all payroll records attached to the employee
                    <span class="text-danger font-weight-bold">
                        {{$StaffName}}
                    </span>
                    <br>

                </h5>

                <!--begin::Close-->
                <a type="button" class="btn btn-info" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </a>
                <!--end::Close-->
            </div>

            <div class="modal-body ">
                <table class="table mytable table-dark table-rounded table-bordered  border gy-3 gs-3">
                    <thead>
                        <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                            <th class="text-light">Payroll Month</th>
                            <th class="text-light">Payroll Year</th>
                            <th class="text-light">Gross Salary</th>
                            <th class="text-light">Net Salary</th>
                            <th class="text-light">Benefit Category</th>
                            <th class="text-light">Benefit Amount</th>
                            <th class="text-light">Date Effected</th>



                        </tr>
                    </thead>
                    <tbody>
                        @isset($ReturnBenLogs)
                        @foreach ($ReturnBenLogs as $data )
                            <tr>
                                <td>{{$data->Month}}</td>
                                <td>{{$data->Year}}</td>
                                <td>{{number_format($data->GrossSalary)}} UGX</td>
                                <td>{{number_format($data->SalaryPaid)}} UGX</td>
                                <td>{{$data->Benefit}}</td>
                                <td>{{number_format($data->BAmount)}} UGX</td>
                                <td>{{date('d-M-Y', strtotime($data->ct));
                                }}</td>

                        </tr>
                        @endforeach
                        @endisset



                    </tbody>
                </table>

            </div>

            <div class="modal-footer">
                <a data-bs-toggle="modal" href="#MgtTaxes" type="button" class="btn btn-info" data-bs-dismiss="modal">Close</a>


            </div>

        </div>
    </div>
</div>
