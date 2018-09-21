{{csrf_field()}}
<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Name:</label>
    <div class="col-md-6">
        <input type="text" name="name" @if(isset($employee)) value="{{$employee->name}}" @endif>
    </div>
</div>

<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Position:</label>
    <div class="col-md-6">
        <select name="position" id="position">
            @foreach($postions as $key => $postion)
                <option value="dev" @if(isset($employee) && $employee->position == $key) selected @endif >{{$postion}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Age:</label>
    <div class="col-md-6">
        <input type="number" name="age" @if(isset($employee)) value="{{$employee->age}}" @endif>
    </div>
</div>

<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Level:</label>
    <select name="level">
        @foreach($levels as $key => $level)
            <option value="dev" @if(isset($employee) && $employee->level == $key) selected @endif >{{$level}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Experience:</label>
    <div class="col-md-6">
        <input type="number" name="exp_num" class="col-md-5"
               @if(isset($employee)) value="{{$employee->experience['exp_num']}}" @endif>
        <select name="exp_unit">
            <option value="month" @if(isset($employee) && $employee->experience['exp_unit'] == "month") selected @endif>
                Month
            </option>
            <option value="year" @if(isset($employee) && $employee->experience['exp_unit'] == "year") selected @endif>
                Year
            </option>
        </select>
    </div>
</div>

<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Skill:</label>
    <div class="col-md-6">
        <input type="text" name="skill" @if(isset($employee)) value="{{$employee->skill}}" @endif>
    </div>
</div>

<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Free until:</label>
    @if(isset($employee))
        <div class="col-md-6">
            <input type="date" name="free_end" @if($employee->free_end) value="{{$employee->free_end}}" @endif><br>
        </div>
        <label class="col-md-4 control-label">Fully Free:</label>
        <div class="col-md-6">
            <input type="checkbox" name="fully_free" @if(!$employee->free_end) checked @endif>
        </div>
    @else
        <div class="col-md-6">
            <input type="date" name="free_end"><br>
        </div>
        <label class="col-md-4 control-label">Fully Free:</label>
        <div class="col-md-6">
            <input type="checkbox" name="fully_free">
        </div>
    @endif
</div>

<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Detail:</label>
    <div class="col-md-6">
        <input type="text" name="detail" @if(isset($employee)) value="{{$employee->detail}}" @endif>
    </div>
</div>

<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Certificate:</label>
    <div class="col-md-6">
        <input type="text" name="certificate" @if(isset($employee)) value="{{$employee->certificate}}" @endif>
    </div>
</div>

<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Price:</label>
    <div class="col-md-6">
        <input type="number" name="price_num" class="col-md-5"
               @if(isset($employee)) value="{{$employee->price['price_num']}}" @endif>
        <select name="price_unit">
            <option value="hour" @if(isset($employee) && $employee->price['price_unit'] == "hour") selected @endif>Per
                Hour
            </option>
            <option value="day" @if(isset($employee) && $employee->price['price_unit'] == "day") selected @endif>Per
                Day
            </option>
            <option value="month" @if(isset($employee) && $employee->price['price_unit'] == "month") selected @endif>Per
                Month
            </option>
        </select>
    </div>
</div>

<div class="form-group col-xs-12 col-md-12">
    <input type="submit" value="Save">
</div>