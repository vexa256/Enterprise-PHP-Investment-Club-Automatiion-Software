@isset($Departments)
    @foreach ($Departments as  $data)
    <div class="modal fade"  id="UpdateDept{{$data->id}}">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update the department labeled
                        <span class="text-danger font-weight-bold">
                            {{$data->DeptName}}
                        </span>
                    </h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <form action="{{ route('UpdateDept') }}" class="row" method="POST">
                 @csrf

                        <div class="mb-10 col-md-12">
                            <label for="exampleFormControlInput1" class="required form-label">Department Name</label>
                            <input value="{{$data->DeptName}}" type="text" name="DeptName" class="form-control form-control-solid" placeholder="Example input"/>
                        </div>

                        <div class="mb-10 col-md-12">
                            <label for="exampleFormControlInput1" class="required form-label">Brief description</label>
                            <textarea name="Desc">
                                {!! $data->Desc!!}
                            </textarea>
                        </div>

                        <input type="hidden" name="id" value="{{$data->id}}">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn sahdow-lg btn-dark">Save changes</button>

                </div>
            </form>
            </div>
        </div>
    </div>

    @endforeach
@endisset
