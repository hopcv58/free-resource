{{csrf_field()}}
<div class="form-group">
    <label class="col-sm-12">{{$titleForm}}</label>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
        <input type="text" name="title" class="form-control"
               @if(isset($job)) value="{{$job->title}}" @endif>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Position</label>
    <div class="col-sm-10">
        <select name="position" id="position" class="form-control">
            @foreach($postions as $key => $postion)
                <optgroup label="{{$postion}}">
                    @foreach($technicals[$key] as $technical)
                        <option value="{{$technical}}"
                                @if(isset($job) && $job->position == $technical) selected @endif >{{$technical}}</option>
                    @endforeach
                </optgroup>
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
    <label class="col-sm-2 control-label">Start from</label>
    @if(isset($job))
        <div class="col-md-10">
            <div class="col-md-5 no-padding">
                <input type="date" name="time_start" class="form-control"
                       @if($job->time_start) value="{{$job->time_start}}" @endif>
            </div>
            <label class="col-md-2 control-label">To</label>
            <div class="col-md-5 no-padding">
                <input type="date" name="time_end" class="form-control"
                       @if($job->time_end) value="{{$job->time_end}}" @endif>
            </div>
        </div>
    @else
        <div class="col-md-10">
            <div class="col-md-4 no-padding">
                <input type="date" name="time_end" class="form-control">
            </div>
            <label class="col-sm-1 control-label">To</label>
            <div class="col-md-4 no-padding">
                <input type="date" name="time_end" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label">Fully Free</label>
                <input type="checkbox" name="fully_free">
            </div>
        </div>
    @endif
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