{{csrf_field()}}
<div class="form-group">
    <label class="col-sm-12">Add new job Available</label>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Position</label>
    <div class="col-sm-10">
        <select name="position" id="position" class="form-control">
            @foreach($postions as $key => $postion)
                <option value="{{$key}}"
                        @if(isset($job) && $job->position == $key) selected @endif >{{$postion}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Level</label>
    <div class="col-sm-10">
        <select name="level" class="form-control">
            @foreach($levels as $key => $level)
                <option value="{{$key}}"
                        @if(isset($job) && $job->level == $key) selected @endif >{{$level}}</option>
            @endforeach
        </select>
    </div>
</div>
{{--Experience--}}
<div class="form-group">
    <label class="col-sm-2 control-label">Experience</label>
    <div class="col-sm-10">
        <div class="col-md-10" style="padding-left: 0">
            <input type="number" name="exp_num" class="col-md-5 form-control"
                   @if(isset($job)) value="{{$job->experience['exp_num']}}" @endif>
        </div>
        <div class="col-md-2 no-padding">
            <select name="exp_unit" class="form-control">
                <option value="month"
                        @if(isset($job) && $job->experience['exp_unit'] == "month") selected @endif>Month
                </option>
                <option value="year"
                        @if(isset($job) && $job->experience['exp_unit'] == "year") selected @endif>Year
                </option>
            </select>
        </div>
    </div>
</div>
{{--skill--}}
<div class="form-group">
    <label class="col-sm-2 control-label">Skill</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="skill" @if(isset($job)) value="{{$job->skill}}" @endif>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Certificate</label>
    <div class="col-sm-10">
        <div class="col-md-3">
            Required <input type="radio" name="certificate" value="1" @if(isset($job) && $job->certificate) checked @endif>
        </div>
        <div class="col-md-3">
            Not required <input type="radio" name="certificate" value="0" @if((isset($job) && !$job->certificate) || !isset($job)) checked @endif>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Start at</label>
    <div class="col-sm-10">
        <div class="col-md-5 no-padding">
            <input type="date" name="time_start" class="form-control"
                   @if(isset($job) && $job->time_start) value="{{$job->time_start}}" @endif>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Detail</label>
    <div class="col-sm-10">
        <input type="text" name="detail" class="form-control"
               @if(isset($job)) value="{{$job->detail}}" @endif>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Quantity</label>
    <div class="col-sm-10">
        <input type="number" name="quantity" class="form-control"
               @if(isset($job)) value="{{$job->quantity}}" @endif>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Price</label>
    <div class="col-sm-10">
        <div class="col-md-10" style="padding-left: 0">
            <input type="number" name="price_num" class="col-md-5 form-control"
                   @if(isset($job)) value="{{$job->price['price_num']}}" @endif>
        </div>
        <div class="col-md-2 no-padding">
            <select name="price_unit" class="form-control">
                <option value="hour" @if(isset($job) && $job->price['price_unit'] == "hour") selected @endif>
                    Per
                    Hour
                </option>
                <option value="day" @if(isset($job) && $job->price['price_unit'] == "day") selected @endif>Per
                    Day
                </option>
                <option value="month"
                        @if(isset($job) && $job->price['price_unit'] == "month") selected @endif>Per
                    Month
                </option>
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
        <input type="submit" class="btn btn-info" value="Save">
    </div>
</div>