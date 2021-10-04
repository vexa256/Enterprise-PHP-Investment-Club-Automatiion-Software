<!--begin::Card body-->
<div class="card-body pt-3 bg-light table-responsive">
   <form action="{{ route('NewAttendanceRecord') }}" method="POST">
       @csrf

       <button type="submit" class="btn mx-1 float-end btn-sm mb-2 btn-danger" ><i class="fas me-1 fa-plus " aria-hidden="true"></i>New attendace record</button>
   </form>
</div>
<div class="card-body shadow-lg pt-3 bg-light table-responsive">
    <div class="row">
        <div class="col-md-12">
            <form class="row" action="{{ route('NewAttendace') }}" method="POST">
                @csrf
                <div class="mb-3 col-md-3  py-5   my-5">
                    <label id="label" for="" class="px-5   my-5 required form-label">Select Attendace Record</label>
                    <select required name="RID" class="form-select  py-5   my-5 form-select-solid" data-control="select2"
                        data-placeholder="Select an option">
                        <option></option>
                        @isset($AttendaceRecord)

                        @foreach ($AttendaceRecord as $data)
            <option value="{{$data->RID}}">{{date("F j, Y", strtotime($data->Record))}}</option>
                        @endforeach
                        @endisset

                    </select>




                </div>

                <div class="mb-3 col-md-3  py-5   my-5">
                    <label id="label" for="" class="px-5   my-5 required form-label">Select Staff Member</label>
                    <select required name="EmpID" class="form-select  py-5   my-5 form-select-solid" data-control="select2"
                        data-placeholder="Select an option">
                        <option></option>
                        @isset($Employees)

                        @foreach ($Employees as $data)
                        <option value="{{$data->EmpID}}">{{$data->StaffName}}</option>
                        @endforeach
                        @endisset

                    </select>




                </div>


                <div class="mb-3 col-md-3  py-5   my-5">
                    <label id="label" for="" class="px-5   my-5 required form-label">Attendance Status</label>
                    <select required name="status" class="form-select  py-5   my-5 form-select-solid" data-control="select2"
                        data-placeholder="Select an option">
                        <option></option>

                        <option value="Present">Present</option>
                        <option value="Absent">Absent</option>
                        <option value="On leave">On leave</option>
                        <option value="Sick">Sick</option>
                    </select>

                </div>

                <div class="mb-3 col-md-3  py-5   my-5">
                    <label id="label" for="" class="px-5   my-5 required form-label">Time Keeping</label>
                    <select required name="time" class="form-select  py-5   my-5 form-select-solid" data-control="select2"
                        data-placeholder="Select an option">
                        <option></option>

                        <option value="Prompt">Prompt</option>
                        <option value="Late">Delayed</option>
                        <option value="Authorized delay">Authorized delay</option>

                    </select>

                </div>
                <div class="float-end my-3">
                    <button class="btn btn-danger btn-sm shadow-lg" type="submit">
                       Next
                    </button>
                </div>
            </form>


        </div>



    </div>


</div>
