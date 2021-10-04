<div class="modal fade"  id="NewBen">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Create a new  benefit category


                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('NewConBen') }}" class="row" method="POST" enctype= multipart/form-data>

                    @csrf


                    <div class="row">
                        @foreach($Form as $data)

                        @if ($data['type'] == 'string')

                        <div class="col-md-6 mb-3 mt-3 x_{{$data['name']}}">
                            <div class="mb-3">
                                <label class="required form-label">{{ucfirst(FromCamelCase($data['name']))}}</label>
                                <input required type="text" name="{{$data['name']}}" class="form-control " placeholder="e.g Health Insurance" />
                            </div>
                        </div>

                        @elseif ($data['type'] == 'integer')

                        <div class="col-md-6 mb-3 mt-3 x_{{$data['name']}}">
                            <div class="mb-3">
                                <label class="required form-label">{{ucfirst(FromCamelCase($data['name']))}} (UGX)</label>
                                <input required type="text" name="{{$data['name']}}" class="form-control IntOnlyNow" />
                            </div>
                        </div>

                        @elseif ($data['type'] == 'date' || $data['type'] == 'datetime')

                        <div class="col-md-6 mb-3 mt-3 x_{{$data['name']}}">
                            <div class="mb-3">
                                <label class="required form-label">{{ucfirst(FromCamelCase($data['name']))}}</label>
                                <input type="text" name="{{$data['name']}}" class="form-control DateArea" />
                            </div>
                        </div>

                        @endif

                        @endforeach

                    </div>

                    <div class="row">
                        @foreach($Form as $data)

                        @if ($data['type'] == 'text')

                        <div class="col-md-12 mb-3 mt-3 x_{{$data['name']}}">
                            <div class="mb-3  x_insert" data-name="{{$data['name']}}">
                                <label class="required form-label">{{ucfirst(FromCamelCase($data['name']))}} /Applicable Terms</label>
                                <textarea name="{{$data['name']}}" class="form-control"></textarea>
                            </div>
                        </div>

                        @endif

                        @endforeach

                    </div>



                    {!! Form::hidden($name="BID", $value=\Hash::make(uniqid()."AFC".date('Y-m-d H:I:S')), [$options=null]) !!}



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-dark" >Save Changes</button>

            </form>
            </div>

        </div>
    </div>
</div>
