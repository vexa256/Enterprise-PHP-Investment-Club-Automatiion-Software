<div class="modal fade"  id="New">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Assign a staff member supervisor previllages
                </h5>

                <!--begin::Close-->
                <a href="#MgtTaxes" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </a>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('NewSupervisor') }}" class="row" method="POST">
                    @csrf

                    <div class="mb-3 col-md-6">
                        <label  class="required form-label">Select staff member</label>
                        <select required name="Supervisor" class="form-select form-select-solid" data-control="select2" data-placeholder="Select staff member">
                            <option></option>
                            @isset($Employees)


                                @foreach ($Employees as $data )


                                <option value="{{$data->id}}">{{$data->StaffName}}</option>
                                @endforeach
                            @endisset


                        </select>
                    </div>


                    <div class="mb-3 col-md-6" >
                        <label  class="required form-label">Username/Email</label>
                        <input  required type="email" name="username" class="form-control-sm   form-control  form-control-solid" />
                    </div>

                    <div class="mb-3 col-md-6" >
                        <label  class="required form-label">Password</label>
                        <input required type="password" name="password" class="form-control-sm   form-control  form-control-solid" />
                    </div>


                    <div class="mb-3 col-md-6" >
                        <label  class="required form-label">Confirm Password</label>
                        <input required type="password" name="password_confirmation" class="form-control-sm   form-control  form-control-solid" />
                    </div>


            </div>

            <div class="modal-footer">
                <a href="#" data-bs-dismiss="modal" class="btn btn-info" >Close</a>

                <button type="submit" class="btn btn-danger" >Save Changes</button>

            </form>
            </div>

        </div>
    </div>
</div>
