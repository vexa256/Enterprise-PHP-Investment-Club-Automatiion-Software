	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        <button type="button" class="btn float-end btn-sm shadow-lg mb-2 btn-danger" data-bs-toggle="modal" data-bs-target="#NewLeave">
          <i class="fas me-1 fa-binoculars " aria-hidden="true"></i>New Leave Category</button>
        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Leave Category</th>
                    <th>Applicable Days</th>
                    <th>Description</th>
                    <th>Delete</th>





                </tr>
            </thead>
            <tbody>
                @isset($Leave)
                @foreach ($Leave as $data )
                <tr>
                    <td>{{$data->LeaveType}}</td>
                    <td>{{$data->Days}}</td>
                    <td>
                   <a data-bs-toggle="modal" href="#Leave{{$data->id}}" class="btn btn-sm btn-dark">
                            <i class="fas fa-binoculars" aria-hidden="true"></i>
                        </a>
                    </td>

                    <td>
                    <a data-msg="You want to delete this leave category, This action is not reversible!!" data-route="{{ route('DeleteLeaveCat', ['id'=>$data->id]) }}" data-bs-toggle="modal" href="#DeptDesc{{$data->id}}" class="btn btn-sm btn-danger deleteConfirm">
                        <i class="fas fa-trash" aria-hidden="true"></i>
                    </a>
                </td>





                </tr>
                @endforeach
                @endisset



            </tbody>
        </table>
    </div>

@include('leave.New')
@include('leave.ViewDesc')
