<div class="row">

    <div class="card">
        <div class="card-body  px-5 mx-5 py-5 my-5">
            <div class="row">
                @foreach($Form as $data)

                @if ($data['type'] == 'string')

                <div class="col-md-4 mb-3 mt-3 x_{{$data['name']}}">
                    <div class="mb-3">
                        <label class="required form-label">{{ucfirst(FromCamelCase($data['name']))}}</label>
                        <input type="text" name="{{$data['name']}}" class="form-control " />
                    </div>
                </div>

                @elseif ($data['type'] == 'date' || $data['type'] == 'datetime')

                <div class="col-md-4 mb-3 mt-3 x_{{$data['name']}}">
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
                        <label class="required form-label">{{ucfirst(FromCamelCase($data['name']))}}</label>
                        <textarea name="{{$data['name']}}" class="form-control"></textarea>
                    </div>
                </div>

                @endif

                @endforeach

            </div>


        </div>
    </div>
</div>

</div>
