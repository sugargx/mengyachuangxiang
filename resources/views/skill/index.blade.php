@extends('layout.index')

@section('content')
    <?php
        $members = \App\Member::get();
    ?>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">人员列表</div>
                <div class="card-body">
                    <table class="datatable table">
                        <thead>
                        <tr>
                            <th>编号</th>
                            <th>账号</th>
                            <th>姓名</th>
                            <th>团队</th>
                            <th>删除</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            <tr>
                                <td>{{$member->id}}</td>
                                <td>{{$member->user_name}}</td>
                                <td>
                                    <a href="{{url('member')}}/{{$member->id}}">{{$member->name}}</a>
                                </td>
                                <td>
                                    @if(count($member->team()->get())>0)
                                        {{$member->team()->get()[0]->team_name}}
                                    @else
                                        无分组
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url("skillList")}}/{{$member->id}}">
                                        <input type="button" class="btn btn-xs btn-success" value="能力评估">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection