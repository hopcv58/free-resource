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
                <label class="col-md-4 control-label">Position:</label>
                <div class="col-md-6">
                    @foreach($postions as $key => $postion)
                        @if($job->position == $key) {{$postion}} @endif
                    @endforeach
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Level:</label>
                <div class="col-md-6">
                    @foreach($levels as $key => $level)
                        @if($job->level == $key) {{$level}} @endif
                    @endforeach
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Experience:</label>
                <div class="col-md-6">
                    {{$job->experience['exp_num'] . " " . $job->experience['exp_unit']}}
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Skill:</label>
                <div class="col-md-6">
                    {{$job->skill}}
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Job start at:</label>
                <div class="col-md-6">
                    {{$job->time_start}}
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Detail:</label>
                <div class="col-md-6">
                    {{$job->detail}}
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Certificate:</label>
                <div class="col-md-6">
                    @if($job->certificate)
                        Required
                    @else
                        Not required.
                    @endif
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Quantity:</label>
                <div class="col-md-6">
                    {{$job->quantity}}
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Price:</label>
                <div class="col-md-6">
                    {{$job->price['price_num'] . " per " . $job->price['price_unit']}}
                </div>
            </div>

            <div class="form-group col-xs-12 col-md-12">
                <a href="{{route('job.index')}}">Back to list job</a>
            </div>
        </div>
    </div>
@stop
