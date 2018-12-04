@extends('layout.homePageIndex')
@section('css')
    <link rel="stylesheet" href="{{asset('/css/teams.css')}}">
    @endsection


@section('content')

    <?php
        $teams = \App\Team::get();
    ?>
<section id="teams">
    <div class="container">
        <div class="row">
            <div class="section-title text-center wow fadeInUp">
                <h2>萌芽创想团队 TEAMS</h2>
                <p>人在一起叫聚会，心在一起叫团队！</p>
            </div>
        </div>

        @foreach($teams as $team)
            <div class="row">
                <div class="col-md-6 col-sm-12 wow fadeInRight team">
                    <a href="{{url('team_detail')}}/{{$team->id}}"><img src="{{url('getImage')}}/{{$team->team_img}}" width="400px" height="300px" class="team_img"></a>
                </div>
                <div class="col-md-6 fadeinright team_introduce">
                    <a href="{{url('team_detail')}}/{{$team->id}}"><h3>{{$team->team_name}}</h3></a>
                    <p>{{$team->introduction}}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>

@endsection