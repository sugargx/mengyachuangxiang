@extends('layout.homePageIndex')


@section('css')
    <link rel="stylesheet" href="{{asset('/css/project_detail.css')}}">
@endsection

@section('content')

<div class="container">
    <div class="row detail">
        <div class="col-md-6 col-sm-12 wow fadeInUp">
            <div class="programe_img">
                <div class="image">
                    <div class="image-inner">
                        <h5>{{$project->name}}</h5>
                        <p>
                            {{$project->introduction}}
                            <a href="" title="查看详细" class="magnific-popup btn btn-primary">查看详细</a>
                        </p>
                    </div>
                    <?php
                    if($project->project_img=="")
                        $path = asset('/img/programe.jpg');
                    else
                        $path = url('getImage') ."/". $project->project_img;
                    ?>
                    <img class="image-img" src="{{$path}}" alt="">
                </div>
            </div>
        </div>

        <div class="p_introduce col-md-6 col-sm-12 wow fadeInUp">
            <h3 class="programe_name">{{$project->name}}</h3>
            <span>项目开始时间：{{date('Y/m/d',$project->start_time)}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;项目结束时间：{{date('Y/m/d',$project->end_time)}}</span>
            <p>
                {{$project->introduction}}
            </p>
            <?php
                $members = $project->members()->get();
            ?>
            @foreach($members as $member)
                <?php
                    $text = \App\Contribution::where('member_id','=',$member->id)->where('project_id','=',$project->id)->get();
                ?>
                <span class="connect_team">项目负责人：<a href="{{url('own')}}/{{$member->id}}">{{$member->name}}</a></span>
                <span>@if(count($text)>0){{$text[0]->introduction}}@endif</span>
                @endforeach
        </div>
    </div>
</div>
@endsection