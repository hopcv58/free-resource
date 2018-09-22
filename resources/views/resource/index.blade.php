@extends('layouts.default')

@section('title', 'My resource')

@section('content')
    <div class="row" style="margin-bottom: 20px">
        <div class="col-md-3 no-padding">
            <input type="text" placeholder="Search name" id="search-name" name="search-name" class="form-control" onkeyup="resource.searchEmployByName()">
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3 no-padding" style="text-align: right">
            <a href="{{route('employee.create')}}"><button type="button" class="btn btn-warning">Add</button></a>
        </div>
    </div>
    <div class="row">
        @if(count($employees) > 0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Level</th>
                        <th>Exp</th>
                        <th style="min-width: 100px">Skill</th>
                        <th style="min-width: 100px">Free Begin</th>
                        <th style="min-width: 100px">Free End</th>
                        <th>Price</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody id="result-search">
                    @foreach($employees as $key => $employee)
                        <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->position}}</td>
                            <td>{{$employee->level}}</td>
                            <td>{{$employee->experience['exp_num']}} {{$employee->experience['exp_unit']}}</td>
                            <td>{{$employee->skill}}</td>
                            <td>@if($employee->free_begin){{date('Y-m-d', strtotime($employee->free_begin))}}@else Now @endif</td>
                            <td>@if($employee->free_end){{date('Y-m-d', strtotime($employee->free_end))}}@else Unknown @endif</td>
                            <td>{{number_format($employee->price['price_num'])}}$/{{$employee->price['price_unit']}}</td>
                            <td>
                                @if($status == 0)
                                <a href="{{route('employee.edit', $employee->id)}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                <a><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                @elseif($status == 1)
                                    {{--TODO: Hợp add cả route api update status ở đây, api này update status= 2 => đã thuê--}}
                                    <a href="#">Approve</a>
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

@endsection

@section('script')
    <script src="{{ asset('js/my_jquery.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        @if($employees)
        resource.extend({!! $employees !!});
        @endif
    </script>
@stop