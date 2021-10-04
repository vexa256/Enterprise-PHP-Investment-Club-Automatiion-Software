	<!--begin::Alert-->
<div class="alert alert-danger shadow-lg">
    <!--begin::Icon-->
    <span class="svg-icon svg-icon-2hx svg-icon-primary me-3">

        <i class="fas fa-3x fa-info-circle" aria-hidden="true"></i>

    </span>
    <!--end::Icon-->

    <!--begin::Wrapper-->
    <div class="d-flex flex-column">
        <!--begin::Title-->
        <h4 class="mb-1 text-dark">Fulltime Staff Members</h4>
        <!--end::Title-->
        <!--begin::Content-->
        <span>For more management actions and information , please reffer to the staff management section</span>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Alert--><!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">

          <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
              <thead>
                  <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                      <th>Staff Member</th>
                      <th>Department</th>
                      <th>Designation</th>
                      <th class="bg-danger text-light">Contract validity</th>
                      <th class="bg-dark text-light">Contract Expiry</th>
                      <th>Photo</th>



                  </tr>
              </thead>
              <tbody>
                  @isset($Employees)
                  @foreach ($Employees as $data )
                  <tr>
                      <td>{{$data->StaffName}}</td>
                      <td>{{$data->Department}}</td>
                      <td>{{$data->Designation}}</td>
                      <td class="bg-danger text-light">{{$data->RecordStatus}}</td>
                      <td class="bg-dark text-light">{{ date('j F, Y', strtotime($data->ContractExpiry))}}</td>
                      <td>

                          <a data-fslightbox="lightbox-basic" href="{{ asset($data->StaffPhoto) }}" class="btn btn-sm bg-dark">

                              <i class="fas fa-binoculars" aria-hidden="true"></i>
                          </a>

                   </td>



                  </tr>
                  @endforeach
                  @endisset



              </tbody>
          </table>
      </div>
      <!--end::Card body-->
