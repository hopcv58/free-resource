@extends('layouts.default')

@section('title', 'My resource')

@section('content')
    <div class="row form-add-employee">
        <div class="box ui-draggable ui-droppable">
            <div class="box-content" style="display: block;">
                <div class="form-horizontal">
                    <form method='POST' action="{{route('job.store')}}">
                        @include('job.form')
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
