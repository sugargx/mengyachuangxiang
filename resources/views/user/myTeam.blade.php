@extends("layout.userIndex")

@section("content")
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{$team->team_name}}</div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                    <tr>
                        <td class="col-md-3">组长</td>
                        <td>
                            {{$team->captain}}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-3">团队成立日期</td>
                        <td>
                            {{date("Y年-m月-d日",$team->time)}}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-3">团队介绍</td>
                        <td>
                            {{$team->introduction}}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-3">团队成员</td>
                        <td>
                            <?php
                                $members = $team->members()->get();
                            ?>
                        @foreach($members as $member)
                                    <p>
                                        {{$member->name}}
                                    </p>
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
@endsection

@section("css")
@endsection