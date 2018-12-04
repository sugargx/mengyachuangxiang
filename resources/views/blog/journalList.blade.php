@extends('layout.userIndex')

@section('css')
    <style type="text/css">
        .timeline img{
            max-width:100%;
        }
    </style>
@endsection
@section("content")
    <div class="container" style="margin-top: 20px">
        <div class="timeline">
            <dl>
                <?php $sum = count($journals);?>
                @for($i = 0;$i<$sum;$i++)
                    <dt class="heading">
                        <div class="title">{{date('Y-m-d',$journals[$i]->time)}}</div>
                    </dt>
                    <dt class="item">
                        <div class="marker"></div>
                        <div class="event">
                            @if(session('id')==$id)
                                <a href="{{url('journalDel')}}/{{$journals[$i]->id}}"><i class="fa fa-close close" style="margin: 15px;"></i></a>

                                <a href="{{url('journal')}}/{{$journals[$i]->id}}/edit"><i class="fa fa-edit" style="float: right; margin-top: 15px;"></i></a>
                            @endif
                                <div class="event-body">
                                {!! $journals[$i]->content !!}
                            </div>
                        </div>
                    </dt>
                    <?php
                        $i++;
                    ?>
                    @if($i<$sum)
                        <dt class="heading">
                            <div class="title">{{date('Y-m-d',$journals[$i]->time)}}</div>
                        </dt>
                        <dt class="item pos-right">
                            <div class="marker"></div>
                            <div class="event">
                                @if(session('id')==$id)
                                    <a href="{{url('journalDel')}}/{{$journals[$i]->id}}"><i class="fa fa-close close" style="margin: 15px;"></i></a>
                                    <a href="{{url('journal')}}/{{$journals[$i]->id}}/edit"><i class="fa fa-edit" style="float: right; margin-top: 15px;"></i></a>
                                @endif
                                <div class="event-body">
                                    {!! $journals[$i]->content !!}
                                </div>
                            </div>
                        </dt>
                    @endif
                @endfor
            </dl>
        </div>
    </div>
@endsection