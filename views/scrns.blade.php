@include('header.header')
@include('body.body')

<div class="row">

@foreach ($Form  as $key=>$value)

<div class="col-md-4">


    <div class="mb-10 col-md-4">
        <label for="exampleFormControlInput1" class="required form-label">
            {{FromCamelCase($value)}}
        </label>
        <input type="text" name="{{$value}}" class="form-control form-control-solid" />
    </div>

    <td></td>

</div>

@endforeach

</div>

        @include('scroll.scrolltop')
        @include('scripts.scripts')
