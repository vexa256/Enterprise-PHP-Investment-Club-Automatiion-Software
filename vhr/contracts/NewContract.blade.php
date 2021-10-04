<div class="modal fade"  id="NewContract">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Create a new contractor record


                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('NewContractor') }}" class="row" method="POST" enctype= multipart/form-data>

                    @csrf


                    <div class="row">



                        <div class=" mb-3 mt-3  col-md-3" >
                            <label   class="required form-label">Contract Category</label>
                            <select name="CategoryName" style="height: 15px !important" required class="form-select form-control-sm form-control" data-control="select2" data-placeholder="Select an option">
                                <option></option>
                               @isset($Categories)

                               @foreach ($Categories    as  $data )

                               <option value="{{$data->CategoryName}}">{{$data->CategoryName}}</option>

                               @endforeach
                               @endisset
                            </select>

                        </div>
                        <div class="mb-3 mt-3 col-md-3" >
                            <label class="required form-label">Gender</label>
                            <select name="Gender" style="height: 15px !important" required class="form-select form-control-sm  form-control" data-control="select2" data-placeholder="Select an option">
                                <option></option>
                               <option value="Male">Male</option>
                               <option value="Female">Female</option>


                            </select>

                        </div>

                        <div class="mb-3 mt-3 col-md-3" >
                            <label class="required form-label">Department</label>
                            <select name="Department" style="height: 15px !important" required class="form-select form-control-sm  form-control" data-control="select2" data-placeholder="Select an option">
                                <option></option>
                                @isset($Departments)

                                @foreach ($Departments    as  $data )

                                <option value="{{$data->DeptName}}">{{$data->DeptName}}</option>

                                @endforeach
                                @endisset


                            </select>

                        </div>
                        <div class="mb-3 mt-3 col-md-3" >
                            <label id="label" for="exampleFormControlInput1" class="required form-label">Staff Photo</label>
                            <input type="file" name="StaffPhoto" class="form-control-sm form-control  form-control-solid" />
                        </div>

                        <div class="mb-3 mt-3 col-md-3" >
                            <label id="label" for="exampleFormControlInput1" class="required form-label">National ID Scan </label>
                            <input type="file" name="IDScan" class="form-control form-control-sm form-control-solid" />
                        </div>
                        @foreach($Form as $data)

                        @if ($data['type'] == 'string')

                        <div class="col-md-3 mb-3 mt-3 x_{{$data['name']}}">
                            <div class="mb-3">
                                <label class="required form-label">{{ucfirst(FromCamelCase($data['name']))}}</label>
                                <input required type="text" name="{{$data['name']}}" class="form-control " placeholder="" />
                            </div>
                        </div>

                        @elseif ($data['type'] == 'integer')

                        <div class="col-md-3 mb-3 mt-3 x_{{$data['name']}}">
                            <div class="mb-3">
                                <label class="required form-label">{{ucfirst(FromCamelCase($data['name']))}}</label>
                                <input required type="text" name="{{$data['name']}}" class="form-control IntOnlyNow" />
                            </div>
                        </div>



                        @elseif ($data['type'] == 'date' || $data['type'] == 'datetime')

                        <div class="col-md-3 mb-3 mt-3 x_{{$data['name']}}">
                            <div class="mb-3">
                                <label class="required form-label">{{ucfirst(FromCamelCase($data['name']))}}</label>
                                <input required type="text" name="{{$data['name']}}" class="form-control DateArea" />
                            </div>
                        </div>

                        @endif

                        @endforeach

                    </div>

                    <div class="row">
                        @foreach($Form as $data)

                        @if ($data['type'] == 'text')

                        <div class="col-md-12 mb-3 mt-3 x_{{$data['name']}}">
                            <div class="mb-3  x_insert" data-name="{{$data['name']}}">
                                <label class="required form-label">{{ucfirst(FromCamelCase($data['name']))}}</label>
                                <textarea name="{{$data['name']}}" class="form-control"></textarea>
                            </div>
                        </div>

                        @endif



                        @endforeach

                    </div>



                    {!! Form::hidden($name="EmpID", $value=\Hash::make(uniqid()."AFC".date('Y-m-d H:I:S')), [$options=null]) !!}



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-dark" >Save Changes</button>

            </form>
            </div>

        </div>
    </div>
</div>
