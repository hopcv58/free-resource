{{csrf_field()}}
<div class="form-group">
    <label for="inputEmail3" class="col-sm-12">Add new employee avaiable</label>
</div>
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
        <input type="text" name="name" @if(isset($employee)) value="{{$employee->name}}" @endif class="form-control">
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Position</label>
    <div class="col-sm-10">
        <select name="position" id="position" class="form-control">
            @foreach($postions as $key => $postion)
                <option value="{{$key}}"
                        @if(isset($employee) && $employee->position == $key) selected @endif >{{$postion}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Age</label>
    <div class="col-sm-10">
        <input type="number" name="age" class="form-control" @if(isset($employee)) value="{{$employee->age}}" @endif>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Level</label>
    <div class="col-sm-10">
        <select name="level" class="form-control">
            @foreach($levels as $key => $level)
                <option value="{{$key}}"
                        @if(isset($employee) && $employee->level == $key) selected @endif >{{$level}}</option>
            @endforeach
        </select>
    </div>
</div>
{{--Experience--}}
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Experience</label>
    <div class="col-sm-10">
        <div class="col-md-10" style="padding-left: 0">
            <input type="number" name="exp_num" class="col-md-5 form-control"
                   @if(isset($employee)) value="{{$employee->experience['exp_num']}}" @endif>
        </div>
        <div class="col-md-2 no-padding">
            <select name="exp_unit" class="form-control">
                <option value="month"
                        @if(isset($employee) && $employee->experience['exp_unit'] == "month") selected @endif>Month
                </option>
                <option value="year"
                        @if(isset($employee) && $employee->experience['exp_unit'] == "year") selected @endif>Year
                </option>
            </select>
        </div>
    </div>
</div>
{{--skill--}}
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Skill</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="skill" @if(isset($employee)) value="{{$employee->skill}}" @endif>
    </div>
</div>
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Free from</label>

    @if(isset($employee))
        <div class="col-md-10">
            <div class="col-md-4 no-padding">
                <input type="date" name="free_begin" class="form-control"
                       @if($employee->free_begin) value="{{$employee->free_begin}}" @endif>
            </div>
            <label for="inputEmail3" class="col-md-1 control-label">To</label>
            <div class="col-md-4 no-padding">
                <input type="date" name="free_end" class="form-control"
                       @if($employee->free_end) value="{{$employee->free_end}}" @endif>
            </div>
            <div class="col-md-3">
                <label for="inputEmail3" class="control-label">Fully Free</label>
                <input type="checkbox" name="fully_free"
                                  @if(!$employee->free_begin && !$employee->free_end) checked @endif>
            </div>
        </div>
    @else
        <div class="col-md-10">
            <div class="col-md-4 no-padding">
                <input type="date" name="free_end" class="form-control">
            </div>
            <label for="inputEmail3" class="col-sm-1 control-label">To</label>
            <div class="col-md-4 no-padding">
                <input type="date" name="free_end" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="inputEmail3" class="control-label">Fully Free</label>
                <input type="checkbox" name="fully_free">
            </div>
        </div>
    @endif

</div>
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Free until</label>
    <div class="col-sm-10">
        @if(isset($employee))
        @else
        @endif
    </div>
</div>
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Detail</label>
    <div class="col-sm-10">
        <input type="text" name="detail" class="form-control"
               @if(isset($employee)) value="{{$employee->detail}}" @endif>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Certificate</label>
    <div class="col-sm-10">
        <input type="text" name="certificate" class="form-control"
               @if(isset($employee)) value="{{$employee->certificate}}" @endif>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Price</label>
    <div class="col-sm-10">
        <div class="col-md-10" style="padding-left: 0">
            <input type="number" name="price_num" class="col-md-5 form-control"
                   @if(isset($employee)) value="{{$employee->price['price_num']}}" @endif>
        </div>
        <div class="col-md-2 no-padding">
            <select name="price_unit" class="form-control">
                <option value="hour" @if(isset($employee) && $employee->price['price_unit'] == "hour") selected @endif>
                    Per
                    Hour
                </option>
                <option value="day" @if(isset($employee) && $employee->price['price_unit'] == "day") selected @endif>Per
                    Day
                </option>
                <option value="month"
                        @if(isset($employee) && $employee->price['price_unit'] == "month") selected @endif>Per
                    Month
                </option>
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
        <input type="submit" class="btn btn-info" value="Save">
    </div>
</div>