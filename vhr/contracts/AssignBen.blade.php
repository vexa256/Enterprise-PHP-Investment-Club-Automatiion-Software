	<!--begin::Alert-->
<div class="alert alert-primary">
    <!--begin::Icon-->
    <span class="svg-icon float-end svg-icon-2hx svg-icon-primary me-3"><i class="fas fa-3x fa-user" aria-hidden="true"></i></span>
    <!--end::Icon-->

    <!--begin::Wrapper-->
    <div class="d-flex flex-column">
        <!--begin::Title-->
        <h4 class="mb-1 text-dark">{{$Staff->ContractorName}}</h4>
        <!--end::Title-->
        <!--begin::Content-->
        <span>Use this interface to manage beneficiaries  attached to the selected contrator </span>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Alert--><!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="NewBen", $Class="btn-danger", $Label="New Beneficiary", $Icon="fa-plus")}}

          <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
              <thead>
                  <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                      <th>Beneficiary </th>
                      <th>Benefit </th>
                      <th>Phone </th>
                      <th>Email</th>
                      <th>Age</th>
                      <th>Gender</th>
                      <th class="bg-dark text-light"> More</th>
                      <th class="bg-dark text-light"> Delete</th>


                  </tr>
              </thead>
              <tbody>
                  @isset($Contracts)
                  @foreach ($Contracts as $data )
                  <tr>

                      <td>{{$data->Name}}</td>
                      <td>{{$data->Benefit}}</td>
                      <td>{{$data->PhoneNumber}}</td>
                      <td>{{$data->Email}}</td>
                      <td>{{$data->Age}}</td>
                      <td>{{$data->Gender}}</td>





                    <td>  <a data-bs-toggle="modal"  class="btn btn-dark btn-sm " href="#MoreInfor{{$data->id}}"><i class="fas fa-binoculars" aria-hidden="true"></i></a></td>

                    <td>  <a data-route="{{ route('DeleteBenAss', ['id'=>$data->id]) }}" data-msg="You sure you want to delete this beneficiary. This action is not reversible"  class="btn btn-danger btn-sm deleteConfirm" href="#"><i class="fas fa-trash" aria-hidden="true"></i></a></td>





                  </tr>
                  @endforeach
                  @endisset



              </tbody>
          </table>
      </div>
@include('contracts.NewBenef')




@isset($Contracts)
@foreach ($Contracts as $data )
<div class="modal fade"  id="MoreInfor{{$data->id}}">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">More information about the beneficiary

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

                    <th>DOB</th>
                    <th>Address</th>
                    <th>Permanent Address</th>
                    <th>Relationship</th>
                    <th>ID Type</th>
                    <th>ID NO.</th>
                    <th>ID Scan.</th>
                    <th>Photo</th>






                </tr>
            </thead>
            <tbody>

                <tr>
                    <td class="bg-dark text-light">{{ date('j F, Y', strtotime($data->DOB))}}</td>
                    <td>{{$data->CurrentAddress}}</td>
                    <td>{{$data->PermanentAddress}}</td>
                    <td>{{$data->Relationship}}</td>
                    <td>{{$data->IdType}}</td>
                    <td>{{$data->IdNumber}}</td>
                    <td>

                      <a data-fslightbox="lightbox-basic" href="{{ asset($data->IDScan) }}" class="btn btn-sm bg-dark">

                          <i class="fas fa-binoculars" aria-hidden="true"></i>
                      </a>
                    </td>

                    <td>

                      <a data-fslightbox="lightbox-basic" href="{{ asset($data->Photo) }}" class="btn btn-sm bg-dark">

                          <i class="fas fa-binoculars" aria-hidden="true"></i>
                      </a>
                    </td>




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
