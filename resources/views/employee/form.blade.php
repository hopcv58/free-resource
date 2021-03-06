{{csrf_field()}}
<div class="form-group">
    <label class="col-sm-12">{{$titleForm}}</label>
</div>
<div class="form-group input-required">
    <label class="col-sm-2 control-label">Name</label>
    <div class="col-sm-9">
        <input type="text" name="name" @if(isset($employee)) value="{{$employee->name}}" @endif class="form-control">
    </div>
    <div class="col-md-9 col-md-offset-2 required-alert">This field is required.</div>
    <span class="text-danger star-required">*</span>
</div>

<div class="form-group input-required">
    <label class="col-sm-2 control-label">Position</label>
    <div class="col-sm-9">
        <select name="position" id="position" class="form-control">
            @foreach($postions as $key => $postion)
                <optgroup label="{{$postion}}">
                    @foreach($technicals[$key] as $technical)
                        <option value="{{$technical}}"
                                @if(isset($employee) && $employee->position == $technical) selected @endif >{{$technical}}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>
    </div>
    <div class="col-md-9 col-md-offset-2 required-alert">This field is required.</div>
    <span class="text-danger star-required">*</span>
</div>
<div class="form-group input-required">
    <label class="col-sm-2 control-label">Age</label>
    <div class="col-sm-9">
        <input type="number" name="age" class="form-control" @if(isset($employee)) value="{{$employee->age}}" @endif>
    </div>
    <div class="col-md-9 col-md-offset-2 required-alert">This field is required.</div>
    <span class="text-danger star-required">*</span>
</div>

<div class="form-group input-required">
    <label class="col-sm-2 control-label">Level</label>
    <div class="col-sm-9">
        <select name="level" class="form-control">
            @foreach($levels as $key => $level)
                <option value="{{$key}}"
                        @if(isset($employee) && $employee->level == $key) selected @endif >{{$level}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-9 col-md-offset-2 required-alert">This field is required.</div>
    <span class="text-danger star-required">*</span>
</div>
{{--Experience--}}
<div class="form-group input-required">
    <label class="col-sm-2 control-label">Experience</label>
    <div class="col-sm-9">
        <div class="col-md-9" style="padding-left: 0">
            <input type="number" name="exp_num" class="col-md-5 form-control"
                   @if(isset($employee)) value="{{$employee->experience['exp_num']}}" @endif>
        </div>
        <div class="col-md-3 no-padding">
            <select name="exp_unit" class="form-control">
                <option value="year"
                        @if(isset($employee) && $employee->experience['exp_unit'] == "year") selected @endif>Year
                </option>
                <option value="month"
                        @if(isset($employee) && $employee->experience['exp_unit'] == "month") selected @endif>Month
                </option>
            </select>
        </div>
    </div>
    <div class="col-md-9 col-md-offset-2 required-alert">This field is required.</div>
    <span class="text-danger star-required">*</span>
</div>
{{--skill--}}
<div class="form-group input-required">
    <label class="col-sm-2 control-label">Skill</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="skill" @if(isset($employee)) value="{{$employee->skill}}" @endif>
    </div>
    <div class="col-md-9 col-md-offset-2 required-alert">This field is required.</div>
    <span class="text-danger star-required">*</span>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Free from</label>
    @if(isset($employee))
        <div class="col-md-9">
            <div class="col-md-4 no-padding">
                <input type="date" name="free_begin" class="form-control"
                       @if($employee->free_begin) value="{{$employee->free_begin}}" @endif>
            </div>
            <label class="col-md-1 control-label">To</label>
            <div class="col-md-4 no-padding">
                <input type="date" name="free_end" class="form-control"
                       @if($employee->free_end) value="{{$employee->free_end}}" @endif>
            </div>
            <div class="col-md-3">
                <label class="control-label">Fully Free</label>
                <input type="checkbox" name="fully_free"
                                  @if(!$employee->free_begin && !$employee->free_end) checked @endif>
            </div>
        </div>
    @else
        <div class="col-md-9">
            <div class="col-md-4 no-padding">
                <input type="date" name="free_begin" class="form-control">
            </div>
            <label class="col-sm-1 control-label">To</label>
            <div class="col-md-4 no-padding">
                <input type="date" name="free_end" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label">Fully Free</label>
                <input type="checkbox" name="fully_free">
            </div>
        </div>
    @endif
    <div class="col-md-9 col-md-offset-2 required-alert">This field is required.</div>
    <span class="text-danger star-required">*</span>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Certificate</label>
    <div class="col-sm-9">
        <input type="text" name="certificate" class="form-control"
               @if(isset($employee)) value="{{$employee->certificate}}" @endif>
    </div>
    <div class="col-md-9 col-md-offset-2 required-alert">This field is required.</div>
    <span class="text-danger star-required">*</span>
</div>

<div class="form-group input-required">
    <label class="col-sm-2 control-label">Price</label>
    <div class="col-sm-9">
        <div class="col-md-9" style="padding-left: 0">
            <input type="number" name="price_num" class="col-md-5 form-control"
                   @if(isset($employee)) value="{{$employee->price['price_num']}}" @endif>
        </div>
        <div class="col-md-3 no-padding">
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
    <div class="col-md-9 col-md-offset-2 required-alert">This field is required.</div>
    <span class="text-danger star-required">*</span>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Public</label>
    <div class="col-sm-9">
        <input type="checkbox" name="is_public"
               @if(!isset($employee) || $employee->status != 0) checked @endif>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
        <input type="submit" class="btn btn-info" value="Save">
        <button type="button" class="btn btn-primary" onclick="history.back(1);">Cancel</button>
    </div>
</div>