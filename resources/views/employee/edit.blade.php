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
            <div class="form-horizontal">
                <form method='POST' action="{{route('employee.update', $employee->id)}}">
                    <input type="hidden" name="_method" value="PUT">
                    @include('employee.form')
                </form>
            </div>
        </div>
    </div>
@stop