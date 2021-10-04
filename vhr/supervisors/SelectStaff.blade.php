<!--begin::Card body-->
<div class="card-body pt-3 bg-light table-responsive">
</div>
<div class="card-body shadow-lg pt-3 bg-light table-responsive">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('SelectSuper') }}" method="POST">
                @csrf
                <div class="mb-3 col-md-12">
                    <label  class="required  my-5 py-5 form-label">Select staff member (Supervisor Assignment)</label>
                    <select required name="id" class="form-select  my-5 py-5 form-select-solid" data-control="select2" data-placeholder="Select staff member">
                        <option></option>
                        @isset($Employees)


                            @foreach ($Employees as $data )


                            <option value="{{$data->id}}">{{$data->StaffName}}</option>
                            @endforeach
                        @endisset


                    </select>
                </div>
                <div class="float-end my-5 py-5">
                    <button class="btn btn-danger btn-sm shadow-lg" type="submit">
                        Next
                    </button>
                </div>
            </form>


        </div>

    </div>


</div>
