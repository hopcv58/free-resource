@extends('layouts.default')

@section('title', 'Admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h4>Avaiable Employs (10)</h4>
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
    <div class="row employ-item">
        <div class="col-md-2 thumbnail">
            <img src="{{asset('bootflat/img/wild_flowers.png')}}" alt="..." class="img-circle">
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-10">
                    <p><label>NickName</label> | <label class="level-title">Level</label> | <lable>Time avaiable:</lable> <label class="time-avaiable">1/2/1019 ~ 1/3/2019</label></p>
                    <label>Experience: </label> <label class="exp-employ">2 years</label> <br/>
                    <label>Skill: </label> <label class="skill-employ">PHP Laravel, .NET, JAVA, C#, ...</label>
                </div>
                <div class="col-md-2" style="text-align: center">
                    Hourly Rate <label class="hourly-rate">12$</label>
                    <button type="button" class="btn btn-warning btn-contact-employ">CONTACT</button>
                </div>
            </div>
        </div>
    </div>
    {{--end item--}}
    {{--start item--}}
    <div class="row employ-item">
        <div class="col-md-2 thumbnail">
            <img src="{{asset('bootflat/img/wild_flowers.png')}}" alt="..." class="img-circle">
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-10">
                    <p><label>NickName</label> | <label class="level-title">Level</label> | <lable>Time avaiable:</lable> <label class="time-avaiable">1/2/1019 ~ 1/3/2019</label></p>
                    <label>Experience: </label> <label class="exp-employ">2 years</label> <br/>
                    <label>Skill: </label> <label class="skill-employ">PHP Laravel, .NET, JAVA, C#, ...</label>
                </div>
                <div class="col-md-2" style="text-align: center">
                    Hourly Rate <label class="hourly-rate-negotiate">Negotiate</label>
                    <button type="button" class="btn btn-warning btn-contact-employ">CONTACT</button>
                </div>
            </div>
        </div>
    </div>
    {{--end item--}}
    {{--start item--}}
    <div class="row employ-item">
        <div class="col-md-2 thumbnail">
            <img src="{{asset('bootflat/img/wild_flowers.png')}}" alt="..." class="img-circle">
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-10">
                    <p><label>NickName</label> | <label class="level-title">Level</label> | <lable>Time avaiable:</lable> <label class="time-avaiable">1/2/1019 ~ 1/3/2019</label></p>
                    <label>Experience: </label> <label class="exp-employ">2 years</label> <br/>
                    <label>Skill: </label> <label class="skill-employ">PHP Laravel, .NET, JAVA, C#, ...</label>
                </div>
                <div class="col-md-2" style="text-align: center">
                    Hourly Rate <label class="hourly-rate-negotiate">Negotiate</label>
                    <button type="button" class="btn btn-warning btn-contact-employ">CONTACT</button>
                </div>
            </div>
        </div>
    </div>
    {{--end item--}}
    {{--start item--}}
    <div class="row employ-item">
        <div class="col-md-2 thumbnail">
            <img src="{{asset('bootflat/img/wild_flowers.png')}}" alt="..." class="img-circle">
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-10">
                    <p><label>NickName</label> | <label class="level-title">Level</label> | <lable>Time avaiable:</lable> <label class="time-avaiable">1/2/1019 ~ 1/3/2019</label></p>
                    <label>Experience: </label> <label class="exp-employ">2 years</label> <br/>
                    <label>Skill: </label> <label class="skill-employ">PHP Laravel, .NET, JAVA, C#, ...</label>
                </div>
                <div class="col-md-2" style="text-align: center">
                    Hourly Rate <label class="hourly-rate">12$</label>
                    <button type="button" class="btn btn-warning btn-contact-employ">CONTACT</button>
                </div>
            </div>
        </div>
    </div>
    {{--end item--}}
    {{--start item--}}
    <div class="row employ-item">
        <div class="col-md-2 thumbnail">
            <img src="{{asset('bootflat/img/wild_flowers.png')}}" alt="..." class="img-circle">
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-10">
                    <p><label>NickName</label> | <label class="level-title">Level</label> | <lable>Time avaiable:</lable> <label class="time-avaiable">1/2/1019 ~ 1/3/2019</label></p>
                    <label>Experience: </label> <label class="exp-employ">2 years</label> <br/>
                    <label>Skill: </label> <label class="skill-employ">PHP Laravel, .NET, JAVA, C#, ...</label>
                </div>
                <div class="col-md-2" style="text-align: center">
                    Hourly Rate <label class="hourly-rate">12$</label>
                    <button type="button" class="btn btn-warning btn-contact-employ">CONTACT</button>
                </div>
            </div>
        </div>
    </div>
    {{--end item--}}
@endsection