<div class="text-inverse-dark fs-6 bg-dark py-5 pb-5 ps-4 mb-5">
    <span class="p3-3 me-3"> Hello , {{$StaffName}}, Use this interface to apply for leave
  </div><!--begin::Card body--><!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="NewApp", $Class="btn-danger", $Label="Apply for Leave", $Icon="fa-plus")}}


          <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
              <thead>
                  <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                      <th>Asigned Leave</th>
                      <th>Entitled Days</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Spent Days</th>
                      <th>Unused Days</th>
                      <th>Approval Status</th>
                      <th>Leave Validity</th>
                      <th>Cancel Request</th>


                  </tr>
              </thead>
              <tbody>
                  @isset($Apps)
                  @foreach ($Apps as $data )
                  <tr>

                      <td>{{$data->LeaveType}}</td>
                      <td>{{$data->Days}}</td>
                      <td>{{$data->StartDate}}</td>
                      <td>{{$data->EndDate}}</td>
                      <td>{{$data->SpentDays}}</td>
                      <td>{{$data->UnusedDays}}</td>
                      <td>{{$data->ApprovalStatus}}</td>
                      <td>{{$data->ValidityStatus}}</td>

                      <td>
                        <a  data-msg="You want to terminate  this leave request" data-route="{{ route('TerminateLeave', ['id'=>$data->LLID]) }}" data-bs-toggle="modal" href="#ViewLeaveDesc{{$data->id}}" class="btn btn-sm deleteConfirm btn-dark">
                                 <i class="fas fa-trash" aria-hidden="true"></i>
                             </a>
                         </td>






                 </td>



                  </tr>
                  @endforeach
                  @endisset



              </tbody>
          </table>
      </div>
@include('leave.NewApp')

