{{csrf_field()}}
<div class="form-group">
    <label class="col-sm-12">{{$titleForm}}</label>
</div>
<div class="form-group input-required">
    <label class="col-sm-2 control-label">Name</label>
    <div class="col-sm-9">
        <input type="text" name="name" @if(isset($device)) value="{{$device->name}}" @endif class="form-control">
    </div>
    <div class="col-md-9 col-md-offset-2 required-alert">This field is required.</div>
    <span class="text-danger star-required">*</span>
</div>

<div class="form-group input-required">
    <label class="col-sm-2 control-label">Branch</label>
    <div class="col-sm-9">
        <select name="branch" id="branch" class="form-control">
            @foreach($branches as $key => $branch)
                <option value="{{$key}}"
                        @if(isset($device) && $device->branch == $key) selected @endif >{{$branch}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-9 col-md-offset-2 required-alert">This field is required.</div>
    <span class="text-danger star-required">*</span>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Free until</label>
    <div class="col-sm-9">
        @if(isset($device))
            <div class="col-md-5 no-padding">
                <input type="date" name="free_end" class="form-control"
                       @if($device->free_end) value="{{$device->free_end}}" @endif>
            </div>
            <div class="col-md-5">
                Fully Free <input type="checkbox" name="fully_free" @if(!$device->free_end) checked @endif>
            </div>
        @else
            <div class="col-md-5 no-padding">
                <input type="date" name="free_end" class="form-control">
            </div>
            <div class="col-md-5">
                Fully Free <input type="checkbox" name="fully_free">
            </div>
        @endif
    </div>
</div>
<div class="form-group input-required">
    <label class="col-sm-2 control-label">OS Version</label>
    <div class="col-sm-9">
        <input type="text" name="version" class="form-control" @if(isset($device)) value="{{$device->version}}" @endif>
    </div>
    <div class="col-md-9 col-md-offset-2 required-alert">This field is required.</div>
    <span class="text-danger star-required">*</span>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Detail</label>
    <div class="col-sm-9">
        <input type="text" name="detail" class="form-control" @if(isset($device)) value="{{$device->detail}}" @endif>
    </div>
</div>
<div class="form-group input-required">
    <label class="col-sm-2 control-label">Price</label>
    <div class="col-sm-9">
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
    <div class="col-md-9 col-md-offset-2 required-alert">This field is required.</div>
    <span class="text-danger star-required">*</span>
</div>
<div class="form-group input-required">
    <label class="col-sm-2 control-label">Image</label>
    <div class="col-sm-9">
        @if(isset($device) && $device->image)
            @foreach($device->image as $image)
                <img src="{{asset("upload/img_product/$image")}}" class="thumbnail" width="200px" alt="">
            @endforeach
                <br>
            <input type="file" name="image[]" multiple value="{{old('img')}}">
        @else
            <input type="file" name="image[]" multiple value="{{old('img')}}">
        @endif
    </div>
    <div class="col-md-9 col-md-offset-2 required-alert">This field is required.</div>
    <span class="text-danger star-required">*</span>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-9">
        <input type="submit" class="btn btn-info" value="Save">
        <button type="button" class="btn btn-primary" onclick="history.back(1);">Cancel</button>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("form").on('submit', function () {
            var allowSubmit = true;
            $('.input-required').each(function () {
                if ($(this).find('input').val() == '') {
                    allowSubmit = false
                    $(this).addClass('text-danger');
                }
            });

            return allowSubmit;
        });
        @if (isset($success))
        $("#success-alert").show();
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
            $("#success-alert").slideUp(500);
        });
        @endif
    })
</script>