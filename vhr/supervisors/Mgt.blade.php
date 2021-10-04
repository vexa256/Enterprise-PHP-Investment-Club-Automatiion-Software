<div class="card-body pt-3 bg-light table-responsive">
    {{ HeaderBtn($Toggle="New", $Class="btn-danger", $Label="New Supervisor", $Icon="fa-plus")}}

</div><div class="card-body mt-5 shadow-lg pt-5 bg-light table-responsive">
      <div class="row mt-5 ">
          <div class="col-md-12 ">

              <table class="table mytable table-rounded table-bordered  border gy-3 gs-3">
                  <thead>
                      <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                          <th>Supervisor</th>
                          <th>Staff Code</th>
                          <th>Department </th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Designation</th>
                          <th>Date created</th>
                          <th>Actions</th>


                      </tr>
                  </thead>
                  <tbody>
                      @isset($supervisors)
                      @foreach ($supervisors as $data )
                        <tr>
                            <td>{{$data->StaffName}}</td>
                            <td>{{$data->StaffCode}}</td>
                            <td>{{$data->Department}}</td>
                            <td>{{$data->Email}}</td>
                            <td>{{$data->PhoneNumber}}</td>
                            <td>{{$data->Designation}}</td>
                            <td> {{date('d-M-Y', strtotime($data->ct)); }}</td>

<td class="row fs-6">
    <div class="dropdown">
        <button class="btn btn-sm  btn-danger dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Action
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

            <li><a data-route="{{ route('ReverseSuper', ['id'=>$data->SID]) }}" data-msg="You sure you want to reverse this staff member's supervisor previllages? "  class="dropdown-item deleteConfirm" href="#">Reverse Role</a></li>


        </ul>
        </div>



</td>



                        </tr>

                      @endforeach
                      @endisset



                  </tbody>
              </table>
          </div>



      </div>


    </div>
@include('supervisors.New')
