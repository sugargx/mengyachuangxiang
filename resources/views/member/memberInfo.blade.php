@extends('layout.index')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">我的信息</div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td class="col-md-3">姓名</td>
                            <td>{{$member->name}}</td>
                        </tr>
                        <tr>
                            <td class="col-md-3">我的职务</td>
                            <td>@if(count($member->job()->get())>0){{$member->job()->get()[0]->name}}@endif</td>
                        </tr>
                        <tr>
                            <td class="col-md-3">我的团队</td>
                            <td>
                                @if(count($member->team()->get())>0)
                                    <a href="{{url('team')}}/{{$member->team()->get()[0]->id}}">{{$member->team()->get()[0]->team_name}}</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3">邮箱</td>
                            <td>{{$member->email}}</td>
                        </tr>
                        <tr>
                            <td class="col-md-3">电话</td>
                            <td>{{$member->phone}}</td>
                        </tr>
                        <tr>
                            <td class="col-md-3">入职时间</td>
                            <td>{{date('Y-m-d',$member->time)}}</td>
                        </tr>
                        <tr>
                            <td class="col-md-3">出生日期</td>
                            <td>{{date('Y-m-d',$member->age)}}</td>
                        </tr>
                        <tr>
                            <td class="col-md-3">掌握的编程语言</td>
                            <td>{{$member->language}}</td>
                        </tr>
                        <tr>
                            <td class="col-md-3">优势</td>
                            <td>{{$member->advantage}}</td>
                        </tr>
                        <?php
                            $skills = $member->skills()->get();
                        ?>
                        @foreach($skills as $skill)
                            <tr>
                                <td class="col-md-3">{{$skill->name}}</td>
                                <td>{{$skill->score}}</td>
                            </tr>
                            @endforeach
                        <tr>
                            <td class="col-md-3">个人说明</td>
                            <td>{{$member->introduction}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    @endsection