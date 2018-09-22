<div class="row">
    <div class="col-md-12">
        @if(count($employs) > 0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Level</th>
                        <th>Exp</th>
                        <th style="min-width: 100px">Free Begin</th>
                        <th style="min-width: 100px">Free End</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="result-search">
                    @foreach($employs as $key => $employee)
                        <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$employee->level}}</td>
                            <td>{{$employee->experience['exp_num']}} {{$employee->experience['exp_unit']}}</td>
                            <td>@if($employee->free_begin){{date('Y-m-d', strtotime($employee->free_begin))}}@else
                                    Unknown @endif</td>
                            <td>@if($employee->free_end){{date('Y-m-d', strtotime($employee->free_end))}}@else
                                    Unknown @endif</td>
                            <td>{{number_format($employee->price['price_num'])}}$/{{$employee->price['price_unit']}}</td>
                            <td>
                                <a class="btn-approve btn btn-success" id="btn_negotiate{{$employee->id}}"
                                   onclick="resource.confirmNegotiate({{$employee->id}}, {{Auth::user()->id}})">Negotiate</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="col-md-12">
                <div class="container">
                    There is no suitable employee with your job requirement!
                </div>
            </div>
        @endif
    </div>

</div>