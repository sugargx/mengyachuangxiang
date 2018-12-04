@extends('layout.index')

@section('content')
    <?php
        $messages = \App\Message::get();
    ?>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body" style="overflow: hidden">
                    @if(count($messages)>0)
                        @foreach($messages as $message)
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card" style="min-height: 300px;overflow: hidden;margin-top: 20px">
                                    <div class="card-header">{{$message->name}}
                                        <a href="{{url('leaveMessageDel')}}/{{$message->id}}" style="display: block;float: right;margin-left: 80%">
                                            <div class="fa fa-close close"></div>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <p>邮箱：{{$message->email}}</p>
                                        <p>{{$message->text}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                </div>
            </div>
        </div>
    </div>
    @endsection