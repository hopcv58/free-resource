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
                    <form method='POST' action="{{route('employee.store')}}" id="employee-form">
                        @include('employee.form')
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function () {
            $("#employee-form").on('submit', function () {
                var allowSubmit = true;
                $('.input-required').each(function () {
                    if ($(this).find('input').val() == '') {
                        allowSubmit = false
                        $(this).addClass('text-danger');
                    }
                });
                return (allowSubmit);
            });
            @if (isset($success))
            $("#success-alert").show();
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            });
            @endif
        })
    </script>
@endsection
