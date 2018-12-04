@extends('layout.homePageIndex')

@section('css')
    <link rel="stylesheet" href="{{asset('/css/team_detail.css')}}">
@endsection

@section('content')
    <section id="teams">

        <?php
            $members = $team->members()->get();
            $captainName = $team->captain;
            if(count(\App\Member::where('name','=',$captainName)->get())>0){
                $captain = \App\Member::where('name','=',$captainName)->get()[0];
                $projects = $captain->projects()->get();
            }else{
                $projects = null;
            }

        ?>
        <div class="container">
            <div class="row">
                <div class="section-title text-center wow fadeInUp">
                    <h2>萌芽创想团队 TEAMS</h2>
                    <p>人在一起叫聚会，心在一起叫团队！</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12 wow fadeInRight team">
                    <a href="#"><img src="{{url('getImage')}}/{{$team->team_img}}" width="400px" height="300px" class="team_img"></a>
                </div>
                <div class="col-md-6 wow fadeinright team_introduce">
                    <h3>{{$team->team_name}}</h3>
                    <h4>成立时间：{{date('Y/m/d',$team->time)}}</h4>
                    <p>{{$team->introduction}}</p>
                </div>
            </div>

            <div class="row" style="margin-top: 30px">
                <div class="section-title text-center wow fadeInUp" >
                    <h2>团队的成员</h2>
                </div>
            </div>

            <div class="row peoples">

                @foreach($members as $member)
                    <div class="col-md-4 col-sm-4 wow fadeInUp people">
                        <div class="img_change">
                            <img src="{{url('getImage')}}/{{$member->image}}" width="200px" height="200px">
                        </div>
                        <a href="{{url('own')}}/{{$member->id}}"> <h3>
                                {{$member->name}}   @if(count($member->job()->get())>0) {{$member->job()->get()[0]->name}}@endif
                            </h3>
                        </a>
                    </div>
                    @endforeach
            </div>

            <div class="row" style="margin-top: 60px">
                <div class="section-title text-center wow fadeInUp" >
                    <h2>团队做过的项目</h2>
                </div>
            </div>
            @if($projects)
            @foreach($projects as $project)
                <div class="row">
                    <div class="col-md-6 col-sm-12 wow fadeInUp">
                        <div class="programe_img">
                            <div class="image">
                                <div class="image-inner">
                                    <h5>{{$project->name}}</h5>
                                    <p>{{$project->introduction}}<p>
                                        <a href="{{url('project_detail')}}/{{$project->id}}" title="查看详细" class="magnific-popup btn btn-primary">查看详细</a>
                                    </p>
                                </div>
                                <?php
                                if($project->project_img=="")
                                    $path = asset('/img/programe.jpg');
                                else
                                    $path = url('getImage') ."/". $project->project_img;
                                ?>
                                <img class="image-img" src="{{$path}}" alt="" >
                            </div>
                        </div>
                    </div>

                    <div class="p_introduce col-md-6 col-sm-12 wow fadeInUp">
                        <a href="{{url('project_detail')}}/{{$project->id}}"> <h3 class="programe_name">{{$project->name}}</h3></a>
                        <span>项目开始时间：{{date('Y/m/d',$project->start_time)}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;项目结束时间：{{date('Y/m/d',$project->end_time)}}</span>
                        <p>
                            {{$project->introduction}}
                        </p>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </section>
    <script >
        var items = document.getElementsByClassName('image');
        for(i = 0;i<items.length;i++){
            +function(item){
                var inner = item.getElementsByClassName('image-inner')[0];
                item.onmouseover = function(){
                    inner.classList.add("image-innerAfter");
                };
                item.onmouseout = function(){
                    inner.classList.remove("image-innerAfter");
                };

            }(items[i]);
        }

    </script>
@endsection