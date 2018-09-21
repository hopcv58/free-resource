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
                        @if($employee->position == $key) {{$postion}} @endif
                    @endforeach
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Age:</label>
                <div class="col-md-6">
                    {{$employee->age}}
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Level:</label>
                <div class="col-md-6">
                    @foreach($levels as $key => $level)
                        @if($employee->level == $key) {{$level}} @endif
                    @endforeach
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Experience:</label>
                <div class="col-md-6">
                    {{$employee->experience['exp_num'] . " " . $employee->experience['exp_unit']}}
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Skill:</label>
                <div class="col-md-6">
                    {{$employee->skill}}
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Free until:</label>
                <div class="col-md-6">
                    @if(isset($employee->free_end))
                        {{$employee->free_end}}
                    @else
                        Completely Free.
                    @endif
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Detail:</label>
                <div class="col-md-6">
                    {{$employee->detail}}
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Certificate:</label>
                <div class="col-md-6">
                    @if(isset($employee->certificate))
                        {{$employee->certificate}}
                    @else
                        No certificate.
                    @endif
                </div>
            </div>

            <div class="form-group col-xs-6 col-md-6">
                <label class="col-md-4 control-label">Price:</label>
                <div class="col-md-6">
                    {{$employee->price['price_num'] . " per " . $employee->price['price_unit']}}
                </div>
            </div>

            <div class="form-group col-xs-12 col-md-12">
                <a href="{{route('employee.index')}}">Back to list employee</a>
            </div>
        </div>
    </div>
@stop
