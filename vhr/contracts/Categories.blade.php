	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="NewCategory", $Class="btn-danger", $Label="New Category", $Icon="fa-plus")}}

          <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
              <thead>
                  <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                      <th>Category Name</th>
                      <th>Description</th>
                      <th class="">Delete</th>

                  </tr>
              </thead>
              <tbody>
                  @isset($Categories)
                  @foreach ($Categories as $data )
                  <tr>
                      <td>{{$data->CategoryName}}</td>
                      <td><a href="#ViewDesc{{$data->id}}" data-bs-toggle="modal" class="btn btn-sm btn-dark shadow-lg">
                          <i class="fas  fa-binoculars " aria-hidden="true"></i></a>
                       </td>

                       <td><a data-route="{{ route('DeleteCat', ['id'=>$data->id]) }}" data-msg="You sure you want to delete this contract category. This action is not reversible"  class="btn btn-sm btn-danger deleteConfirm" >
                        <i class="fas fa-trash " aria-hidden="true"></i></a>
                     </td>



                  </tr>
                  @endforeach
                  @endisset



              </tbody>
          </table>
      </div>
      <!--end::Card body-->


@include('contracts.NewCategory')
@include('contracts.ViewDesc')
