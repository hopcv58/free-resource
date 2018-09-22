@extends('layouts.master')

@section('content')
    <div class="box ui-draggable ui-droppable">
        <div class="box-header">
            <div class="box-name ui-draggable-handle">
                <i class="fa fa-edit"></i>
                <span>Add New Campaign</span>
            </div>
            <div class="box-icons"></div>
            <div class="no-move"></div>
        </div>
        <div class="box-content" style="display: block;">
            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Name:</label>
                <div class="col-md-6">
                    {{$device->name}}
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Branch:</label>
                <div class="col-md-6">
                    @foreach($branches as $key => $branch)
                        @if($device->$branch == $key) {{$branch}} @endif
                    @endforeach
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">OS Version:</label>
                <div class="col-md-6">
                    {{$device->version}}
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Detail:</label>
                <div class="col-md-6">
                    {{$device->detail}}
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Price:</label>
                <div class="col-md-6">
                    {{$device->price['price_num'] . " per " . $device->price['price_unit']}}
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Free until:</label>
                <div class="col-md-6">
                    @if(isset($device->free_end))
                        {{$device->free_end}}
                    @else
                        Completely Free.
                    @endif
                </div>
            </div>

            @if($device->image)
                <div class="form-group col-xs-12">
                    <label class="col-sm-12 control-label">Image</label>
                    <div class="col-sm-12">
                        @foreach($device->image as $image)
                            <img src="{{asset("upload/img_product/$image")}}" class="thumbnail" width="200px">
                        @endforeach
                    </div>
                </div>
            @else
                <div class="form-group col-xs-6 col-md-6">
                    <label class="col-md-4 control-label">Image:</label>
                    <div class="col-md-6">
                        No image uploaded
                    </div>
                </div>
            @endif

            <div class="form-group col-xs-12 col-md-12">
                <a href="{{route('employee.index')}}">Back to list employee</a>
            </div>
        </div>
    </div>
@stop
