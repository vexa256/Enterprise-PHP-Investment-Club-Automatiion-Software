
<div class="form-group {{ $errors->has('DeptName') ? 'has-error' : '' }}">
    <label for="DeptName" class="col-md-2 control-label">Dept Name</label>
    <div class="col-md-10">
        <input class="form-control" name="DeptName" type="text" id="DeptName" value="{{ old('DeptName', optional($departments)->DeptName) }}" minlength="1" maxlength="255" required="true" placeholder="Enter dept name here...">
        {!! $errors->first('DeptName', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('DeptID') ? 'has-error' : '' }}">
    <label for="DeptID" class="col-md-2 control-label">Dept I D</label>
    <div class="col-md-10">
        <input class="form-control" name="DeptID" type="text" id="DeptID" value="{{ old('DeptID', optional($departments)->DeptID) }}" minlength="1" maxlength="255" required="true" placeholder="Enter dept i d here...">
        {!! $errors->first('DeptID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Desc') ? 'has-error' : '' }}">
    <label for="Desc" class="col-md-2 control-label">Desc</label>
    <div class="col-md-10">
        <textarea class="form-control" name="Desc" cols="50" rows="10" id="Desc" required="true" placeholder="Enter desc here...">{{ old('Desc', optional($departments)->Desc) }}</textarea>
        {!! $errors->first('Desc', '<p class="help-block">:message</p>') !!}
    </div>
</div>

