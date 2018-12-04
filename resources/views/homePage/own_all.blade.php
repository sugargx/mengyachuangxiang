@extends('layout.homePageIndex')
@section('css')
    <link rel="stylesheet" href="{{asset('css/own.css')}}">
@endsection


@section('content')

    <?php
        $members = \App\Member::get();
    ?>
    <div class="container">

        <div class="row head">
            <div class="col-md-12">
                <div class="section-title text-center wow fadeInDown">
                    <h2>个人秀</h2>
                    <p>每个人都有独一无二的完美！</p>
                </div>
            </div>
        </div>
        @foreach($members as $member)
        <div class="row person">
            <div class="col-md-4 col-sm-4 img_change">
                <img src="{{url('getImage')}}/{{$member->image}}" alt="">
            </div>
            <div class="col-md-8 col-sm-8">
                <?php
                    $job = $member->job()->get();

                ?>
                    <a href="{{url("own")}}/{{$member->id}}">
                        <h3>{{$member->name}}|@if(count($job)>0){{$job[0]->name}}@endif</h3>
                    </a>
                    <br>
                <span class="other">
                 团队：
                    @if(count($member->team()->get())>0)
                        <a href="{{url('team_detail')}}/{{$member->team()->get()[0]->id}}">{{$member->team()->get()[0]->team_name}}</a>
                    @endif
            </span>
                <span class="other">
                 工作时间：{{(time()-$member->time)/365/24/60/60}}年
            </span>
                <span class="other">
                <?php
                    $projects = $member->projects()->get();
                    ?>
                    做过的项目：
                    @foreach($projects as $project)
                        <a href="{{url('project_detail')}}/{{$project->id}}" style="margin-right: 50px">{{$project->name}}</a>
                    @endforeach
            </span>

                <ul class="list-inline share">
                    <li class="every"><a href="http://goo.gl/RqhEjP"><i class="fa fa-facebook fa-lg"></i></a></li>
                    <li class="every"><a href="#"><i class="fa fa-twitter fa-lg"></i></a></li>
                    <li class="every"><a href="#"><i class="fa fa-wechat fa-lg"></i></a></li>
                    <li class="every"><a href="#"><i class="fa fa-qq fa-lg"></i></a></li>
                </ul>

            </div>
        </div>
        @endforeach
    </div>
@endsection

