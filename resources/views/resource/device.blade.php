@extends('layouts.default')

@section('title', 'My resource')

@section('content')
    <div class="row" style="margin-bottom: 20px">
        <div class="col-md-3 no-padding">
            <input type="text" placeholder="Search name" id="search-name" name="search-name" class="form-control" onkeyup="resource.searchDeviceByName()">
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-6 no-padding" style="text-align: right">
            <a href="{{route('employee.create')}}"><button type="button" class="btn btn-warning">Add Employee</button></a>
            <a href="{{route('device.create')}}"><button type="button" class="btn btn-warning">Add Device</button></a>
            <a href="{{route('job.create')}}"><button type="button" class="btn btn-warning">Add Job</button></a>
        </div>
    </div>
    <div class="row">
        @if(count($devices) > 0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Version</th>
                        <th>Detail</th>
                        <th style="min-width: 100px">Free Begin</th>
                        <th style="min-width: 100px">Free End</th>
                        <th>Price</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody id="result-search">
                    @foreach($devices as $key => $device)
                        <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$device->name}}</td>
                            <td>{{$device->branch}}</td>
                            <td>{{$device->version}}</td>
                            <td>{{$device->detail}}</td>
                            <td>@if($device->free_begin){{date('Y-m-d', strtotime($device->free_begin))}}@else Unknown @endif</td>
                            <td>@if($device->free_end){{date('Y-m-d', strtotime($device->free_end))}}@else Unknown @endif</td>
                            <td>{{number_format($device->price['price_num'])}}$/{{$device->price['price_unit']}}</td>
                            <td>
                                @if(($status == 0) && Request::route()->getName() == 'resource.device')
                                    <a href="{{route('device.edit', $device->id)}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                    <a><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                @elseif($status == 1)
                                    <a class="btn-approve" onclick="resource.callTriggerApproveHireDevice({{$device->id}})">Approve</a>
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
        {{--modal confirm hired--}}
        <div id="confirmHired" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <form method='POST' action="{{route('home.device.updateStatus')}}" id="form-confirm-hire">
                        <input type="hidden" name="_method" value="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <input type="hidden" name="status" value="2"class="form-control">
                                <input type="hidden" name="id" id="id-device-hired" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="col-sm-12" style="padding:  0 20px 20px 20px">Approve for negotiating with this device?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Yes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        {{--end modal confirm hired--}}
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/my_jquery.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        @if($devices)
        resource.extend({!! $devices !!});
        @endif
    </script>
@stop