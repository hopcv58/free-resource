@extends('layouts.default')

@section('title', 'My resource')

@section('content')
    <div class="row form-add-employee">
        <div class="box ui-draggable ui-droppable">
            <div class="box-content" style="display: block;">
                <div class="form-horizontal">
                    <form method='POST' action="{{route('job.update', $job->id)}}">
                        <input type="hidden" name="_method" value="PUT">
                        @include('job.form')
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
