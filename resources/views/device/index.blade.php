@extends('layouts.default')

@section('title', 'Admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h4>Available Employs ({{count($devices)}})</h4>
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
    @if(count($devices) > 0)
        @foreach($devices as $item)
            <div class="row employ-item">
                @if($item->image)
                    <div class="col-md-2 thumbnail">
                        <img src="{{asset('upload/img_product/' . $item->image[0])}}">
                    </div>
                @else
                    <div class="col-md-2 thumbnail">
                        <p class="img-avatar"
                           style="background-color: {{$colorAvt[array_rand($colorAvt)]}}">{{substr($item->name,0,3)}}</p>
                    </div>
                @endif
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-10">
                            <p><label class="position-employ">{{$item->name}}</label> |
                                <lable>Time Available:</lable> <label class="time-Available">{{$item->free_begin}} ~ {{$item->free_end}}</label></p>
                            <label>Brand: </label> <label class="exp-employ">{{$item->branch}}</label> <br/>
                            <label>Version: </label> <label class="skill-employ">{{$item->version}}</label>
                            <p >
                                <a onclick="resource.showChatBox({{$item->company_id}})" class="link-contact">Chat</a> |
                                <a class="link-contact">Skype</a> |
                                <span id="box-link-expan-detail-{{$item->id}}">
                                    <a class="link-expan-detail" id="link-expan-detail-{{$item->id}}" data-toggle="collapse" data-target="#more-detail-employee-{{$item->id}}" onclick="resource.showDetail({{$item->id}})">View more detail...</a>
                                </span>

                            </p>
                            <div class="row collapse" id="more-detail-employee-{{$item->id}}">
                                <div class="col-md-12">
                                    <label>Detail: </label> <label class="skill-employ">{{$item->detail}}</label><br/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2" style="text-align: center">
                            @if($item->price != '')
                                <label class="hourly-rate">{{number_format($item->price['price_num'])}}$</label> <br/>
                                <lable class="unit-price">/{{$item->price['price_unit']}}</lable>
                            @else <br/><label class="hourly-rate-negotiate">Negotiate</label>
                            @endif
                                <button type="button" class="btn btn-warning btn-contact-employ"
                                        onclick="resource.confirmHired({{$item->id}})">NEGOTIATE
                                </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No data</p>
    @endif
    {{--end item--}}
    {{--start chat box--}}
    <div class="row chat-box">
        <p class="title-chat">Contact with representative <label class="close-chat" onclick="resource.hideChatBox()">Close</label></p>
        <div class="col-md-12" style="height: 250px">
            <label>{{Auth::user()->name}}</label>
            <p class="content-chat-defaut">
                Hi you, Can I help you? Please type your question
            </p>
        </div>

        <hr>
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Input text here...">
            </div>
        </div>
    </div>
    {{--end chat box--}}
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
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <input type="hidden" name="status" value="2" class="form-control">
                            <input type="hidden" name="id" id="id-employess-hired" class="form-control">
                            <input type="hidden" name="company_id" class="form-control" value={{Auth::user()->id}}>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="col-sm-12" style="padding:  0 20px 20px 20px">Do you want to negotiate with this device?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="confirm-hired-btn">Yes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    {{--end modal confirm hired--}}

@endsection
@section('script')
    <script src="{{ asset('js/my_jquery.js') }}" type="text/javascript"></script>
    {{--<script type="text/javascript">--}}
        {{--@if($employs)--}}
        {{--resource.extend({!! $employs !!});--}}
        {{--@endif--}}
    {{--</script>--}}
@stop