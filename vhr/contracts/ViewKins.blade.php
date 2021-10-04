	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="NewKinsV", $Class="btn-danger", $Label="New Next of Kin", $Icon="fa-plus")}}
        <a href="{{ route('MgtContracts')}}" type="button" class="btn mx-1 float-end btn-sm mb-2 btn-danger" ><i class="fas me-1 fa-arrow-left" aria-hidden="true"></i>Back</a>

          <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
              <thead>
                  <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                      <th>Contractor</th>
                      <th>Next of Kin</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>ID NO.</th>
                      <th>DOB</th>

                      <th class="bg-dark text-light"> Actions</th>



                  </tr>
              </thead>
              <tbody>
                  @isset($Kins)
                  @foreach ($Kins as $data )
                  <tr>
                      <td>{{$data->EmployeeName}}</td>
                      <td>{{$data->Name}}</td>
                      <td>{{$data->Email}}</td>
                      <td>{{$data->Gender}}</td>
                      <td>{{$data->IdNo}}</td>
                      <td>{{date('d-M-Y', strtotime($data->DOB))}}</td>


                      <td>

                              <div class="dropdown">
                                  <button class="btn btn-sm  btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                  Actions
                                  </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">


                                    <li><a data-bs-toggle="modal"   class="dropdown-item " href="#MoreInfor{{$data->id}}">View more info</a></li>


                                    <li><a data-route="{{ route('DelKin', ['id'=>$data->id]) }}" data-msg="You sure you want to delete this next of kin record. This action is not reversible"  class="dropdown-item deleteConfirm" href="#">Delete</a></li>






                                  </ul>
                                </div>



                      </td>

                  </tr>
                  @endforeach
                  @endisset



              </tbody>
          </table>
      </div>
      <!--end::Card body-->






@isset($Kins)
@foreach ($Kins as $data )
<div class="modal fade"  id="MoreInfor{{$data->id}}">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">More information about the next of kin

                    <span class="text-danger font-bold">

                        {{$data->Name}}
                    </span>
                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">

        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                      <th>Contractor</th>
                      <th>Next of Kin</th>
                      <th>Relationship</th>
                      <th>PhoneNumber</th>
                      <th>Current Address</th>
                      <th>Permanent Address</th>






                </tr>
            </thead>
            <tbody>

                <tr>
                      <td>{{$data->EmployeeName}}</td>
                      <td>{{$data->Name}}</td>
                      <td>{{$data->Relationship}}</td>
                      <td>{{$data->PhoneNumber}}</td>
                      <td>{{$data->CurrentAddress}}</td>
                      <td>{{$data->PermanentAddress}}</td>





                </tr>




            </tbody>
        </table>
    </div>
    <!--end::Card body-->

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>


            </div>

        </div>
    </div>
</div>

@endforeach
@endisset




<div class="modal fade"  id="NewKinsV">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Create a new next of kin  Record attached to the

                    to the contractor <span class="text-danger">{{$ContractorName}}</span>

                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('NewConKin') }}" class="row" method="POST" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="EmpID" value="{{$EmpID}}">

                    <input type="hidden" name="EmployeeName" value="{{$ContractorName}}">

                    <div class="row">
                        <div class="mb-3 mt-3 col-md-4" >
                            <label class="required form-label">Gender</label>
                            <select name="Gender" style="height: 15px !important" required class="form-select form-control-sm  form-control" data-control="select2" data-placeholder="Select an option">
                                <option></option>
                               <option value="Male">Male</option>
                               <option value="Female">Female</option>


                            </select>

                        </div>
                        @foreach($Form2 as $data)

                        @if ($data['type'] == 'string')

                        <div class="col-md-4 mb-3 mt-3 x_{{$data['name']}}">
                            <div class="mb-3">
                                <label class="required form-label">{{ucfirst(FromCamelCase($data['name']))}}</label>
                                <input required type="text" name="{{$data['name']}}" class="form-control " placeholder="" />
                            </div>
                        </div>

                        @elseif ($data['type'] == 'date' || $data['type'] == 'datetime')

                        <div class="col-md-4 mb-3 mt-3 x_{{$data['name']}}">
                            <div class="mb-3">
                                <label class="required form-label">{{ucfirst(FromCamelCase($data['name']))}}</label>
                                <input type="text" name="{{$data['name']}}" class="form-control DateArea" />
                            </div>
                        </div>

                        @endif

                        @endforeach

                    </div>

                    <div class="row">
                        @foreach($Form2 as $data)

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







            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-dark" >Save Changes</button>

            </form>
            </div>

        </div>
    </div>
</div>
