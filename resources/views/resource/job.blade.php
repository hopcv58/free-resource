@extends('layouts.default')

@section('title', 'My resource')

@section('content')
    <div class="row" style="margin-bottom: 20px">
        <div class="col-md-3 no-padding">
            <input type="text" placeholder="Search title" id="search-name" name="search-name" class="form-control" onkeyup="resource.searchEmployByTitle()">
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3 no-padding" style="text-align: right">
            <a href="{{route('employee.create')}}"><button type="button" class="btn btn-warning">Add Employee</button></a>
            <a href="{{route('job.create')}}"><button type="button" class="btn btn-warning">Add Job</button></a>
        </div>
    </div>
    <div class="row">
        @if(count($jobs) > 0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Position</th>
                        <th>Level</th>
                        <th>Exp</th>
                        <th style="min-width: 100px">Job Start</th>
                        <th style="min-width: 100px">Job End</th>
                        <th>Price</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody id="result-search">
                    @foreach($jobs as $key => $job)
                        <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$job->title}}</td>
                            <td>{{$job->position}}</td>
                            <td>{{$job->level}}</td>
                            <td>{{$job->experience['exp_num']}} {{$job->experience['exp_unit']}}</td>
                            <td>@if($job->time_start){{date('Y-m-d', strtotime($job->time_start))}}@else Unknown @endif</td>
                            <td>@if($job->time_end){{date('Y-m-d', strtotime($job->time_end))}}@else Unknown @endif</td>
                            <td>{{number_format($job->price['price_num'])}}$/{{$job->price['price_unit']}}</td>
                            <td>
                                @if(Request::route()->getName() == 'resource.job')
                                    <a href="{{route('job.edit', $job->id)}}"><span
                                                class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                    <a><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                    <a href="#" onclick="resource.rendHintModal({{$job->id}})"><span class="glyphicon glyphicon-expand" aria-hidden="true"></span></a>
                                @else
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        @else
            <p>No data</p>
        @endif
    </div>
    {{--modal confirm hired--}}
    <div id="hint-modal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="top:200px;">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body" id="hint-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{--end modal confirm hired--}}
@endsection

@section('script')
    <script src="{{ asset('js/my_jquery.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        @if($jobs)
        resource.extend({!! $jobs !!});
        @endif
    </script>
@stop