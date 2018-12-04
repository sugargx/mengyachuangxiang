@extends("layout.index")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$team->team_name}}</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>组长</td>
                            <td>
                                {{$team->captain}}
                            </td>
                        </tr>

                        <tr>
                            <td>团队介绍</td>
                            <td>
                                {{$team->introduction}}
                            </td>
                        </tr>

                        <tr>
                            <td>团队成员</td>
                            <td>
                                <?php
                                    $members = $team->members()->get();
                                ?>
                                @if(count($members)>0)
                                    @foreach($members as $member)
                                            <a href="{{url('member')}}/{{$member->id}}">
                                                {{$member->name}}
                                            </a>
                                        @endforeach
                                    @endif
                            </td>
                        </tr>

                        <tr>
                            <td>团队成立日期</td>
                            <td>
                                {{date("Y年-m月-d日",$team->time)}}
                            </td>
                        </tr>



                        <tr>
                            <td>图片介绍</td>
                            <td>
                                <img src="{{url('getImage')}}/{{$team->team_img}}">
                            </td>
                        </tr>
                    </table>



                </div>
            </div>
        </div>
    </div>
    @endsection

@section("css")
@endsection