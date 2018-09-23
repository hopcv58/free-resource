@extends('layouts.default')

@section('title', 'My resource')

@section('content')
    <div class="alert alert-success" id="success-alert" style="display:none;">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>Success! </strong>
        Employee saved successfully
    </div>
    <div class="row form-add-employee">
        <div class="box ui-draggable ui-droppable">
            <div class="box-content" style="display: block;">
                <div class="form-horizontal">
                    <form method='POST' action="{{route('device.update', $device->id)}}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @include('device.form')
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
