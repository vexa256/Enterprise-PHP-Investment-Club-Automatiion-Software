<div class="modal fade" id="Approved">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Approved leave applications' history
                </h5>

                <!--begin::Close-->
                <a href="#" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </a>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <div class="card-body pt-3 bg-light shadow-lg table-responsive">



                      <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
                          <thead>
                              <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                                  <th>Staff Name</th>
                                  <th>Asigned Leave</th>
                                  <th>Entitled Days</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Spent Days</th>
                                  <th>Unused Days</th>
                                  <th>Approval Status</th>
                                  <th>Leave Validity</th>
                                  <th>Actions</th>



                              </tr>
                          </thead>
                          <tbody>
                              @isset($Approved)
                              @foreach ($Approved as $data )
                              <tr>

                                  <td>{{$data->StaffName}}</td>
                                  <td>{{$data->LeaveType}}</td>
                                  <td>{{$data->Days}}</td>
                                  <td>{{$data->StartDate}}</td>
                                  <td>{{$data->EndDate}}</td>
                                  <td>{{$data->SpentDays}}</td>
                                  <td>{{$data->UnusedDays}}</td>
                                  <td>{{$data->ApprovalStatus}}</td>
                                  <td>{{$data->ValidityStatus}}</td>
                                  <td class="row fs-6">
                                    <div class="dropdown">
                                        <button class="btn btn-sm  btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                       Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a  data-bs-dismiss="modal" data-bs-toggle="modal"  class="dropdown-item " href="#AppLetter{{$data->LLID}}">Application Letter</a></li>




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

            <div class="modal-footer">
                <a href="#MgtTaxes" id="StartMgt" data-bs-dismiss="modal" data-bs-toggle="modal" type="button"
                    class="btn btn-info">Close</a>


            </div>

        </div>
    </div>
</div>
