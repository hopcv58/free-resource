@extends('layouts.default')

@section('title', 'Admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h4>Available Jobs ({{count($jobs)}})</h4>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <select class="form-control">
                <option value="1">Experience </option>
                <option value="2">Rate</option>
                <option value="3">Level</option>
            </select>
        </div>
    </div>
    {{--start item--}}
    @if(count($jobs) > 0)
        @foreach($jobs as $item)
            <div class="row employ-item">
                <div class="col-md-2 thumbnail">
                    <p class="img-avatar" style="background-color: {{$colorAvt[array_rand($colorAvt)]}}">{{substr($item->position,0,3)}}</p>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-10">
                            <h4>{{$item->title}}</h4>
                            <p><label class="position-employ">{{$item->position}}</label> | <label class="level-title">{{$item->level}}</label> | <lable>Time need:</lable> <label class="time-Available">{{$item->time_start}} ~ {{$item->time_end}}</label></p>
                            <label>Experience: </label> <label class="exp-employ">{{$item->experience['exp_num']}} {{$item->experience['exp_unit']}}</label> <br/>
                            <label>Skill: </label> <label class="skill-employ">{{$item->skill}}</label><br>
                            <label>Quantity: </label> <label class="skill-employ">{{$item->quantity}}</label>
                        </div>
                        <div class="col-md-2" style="text-align: center">
                            @if($item->price != '')
                                <label class="hourly-rate">{{number_format($item->price['price_num'])}}$</label> <br/>
                                <lable class="unit-price">/{{$item->price['price_unit']}}</lable>
                            @else <br/><label class="hourly-rate-negotiate">Negotiate</label>
                            @endif
                            <button type="button" class="btn btn-warning btn-contact-employ">SUGGEST</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No data</p>
    @endif
    {{--end item--}}

@endsection