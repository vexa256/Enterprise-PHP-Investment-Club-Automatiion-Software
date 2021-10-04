<div class="modal fade"  id="Pay">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Effect payroll transaction for the staff member :
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
                <form action="{{ route('ExecPay') }}" method="POST" class="row">
                    <div class="col-md-6">
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">Payroll Month</label>
                            <select required name="Month" class="form-select  py-5   my-5 form-select-solid" data-control="select2" data-placeholder="Select Month">
                                <option></option>


                                <?php

                                for ($m = 1; $m <= 12; ++$m) {
                                    $a = date('M', mktime(0, 0, 0, $m, 1));

                                    echo '<option value="'.$a.'">'.$a.'</option>';

                                }
                                    ?>



                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">Payroll Year</label>
                            <select required name="Year" class="form-select  py-5   my-5 form-select-solid" data-control="select2" data-placeholder="Select Year">
                                <option></option>


                                <?php


                                for ($nYear = date('Y'); $nYear >= 2000; $nYear--) {
                                        echo '<option value="'.$nYear.'">'.$nYear.'</option>';

                                    }

                                 ?>



                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="EmpID" value="{{$EmpID}}">

                    <input type="hidden" name="PayID" value="{{\Hash::make(uniqid()."PID".date('Y-m-d H:I:S'))}}">

                    <input type="hidden" name="Deduction" value="{{$DeductionsCount}}">

                    <input type="hidden" name="Benefits" value="{{$BenefitsCount}}">

                    <input type="hidden" name="Taxes" value="{{$TaxCount}}">

                    <input type="hidden" name="SalaryPaid" value="{{$NetPay}}">

                     <input type="hidden" name="GrossSalary" value="{{$MonthlySalary}}">

                    <div class="col-md-12">
                        <div class="mb-10">
                            <label class="required form-label">Brief note to recipient</label>
                            <textarea name="Description" class="form-control mt-5 form-control-lg form-control-solid" >

                                <h1>Note to recipient</h1>

                            </textarea>
                        </div>
                    </div>
                    @csrf

            </div>

            <div class="modal-footer">
                <a data-bs-toggle="modal" href="#MgtTaxes" type="button" class="btn btn-info" data-bs-dismiss="modal">Close</a>

                <button  type="submit" class="btn btn-info">Effect Payroll</button>


            </div>
        </form>

        </div>
    </div>
</div>



