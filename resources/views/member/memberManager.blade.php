@extends("layout.index")

@section("css")

    @endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-tab">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        <li role="tab1" class="@if($tab==1){{"active"}}@endif">
                            <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">添加新成员</a>
                        </li>
                        <li role="tab2" style="width:160px" class="@if($tab==2){{"active"}}@endif">
                            <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">查看成员信息</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body no-padding tab-content">
                    <div role="tabpanel" class="tab-pane @if($tab==1){{"active"}}@endif" id="tab1">
                        <div class="row">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="col-md-8 col-sm-12">
                                <div class="section">
                                    <div class="section-title"><i class="icon fa fa-user" aria-hidden="true"></i>请填写信息</div>
                                    <div class="section-body __indent">
                                        <form class="form form-horizontal" method="post" action="">

                                            <div class="section">
                                                <div class="section-title"></div>
                                                <div class="section-body">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">姓名</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="姓名" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">账号</label>
                                                        <div class="col-md-9">
                                                            {{csrf_field()}}
                                                            <input type="text" class="form-control" placeholder="账号" name="user_name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">密码</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="密码" name="password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">小组</label>
                                                        <div class="col-md-9">
                                                            <select class="select2" name="team_id">
                                                                @foreach($teams as $team)
                                                                    <option value="{{$team->id}}">{{$team->team_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">职务</label>
                                                        <div class="col-md-9">
                                                            <select class="select2" name="job_id">
                                                                @foreach($jobs as $job)
                                                                    <option value="{{$job->id}}">{{$job->name}}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-footer">
                                                        <div class="form-group">
                                                            <div class="col-md-9 col-md-offset-3">
                                                                <input type="submit" class="btn btn-primary" value="添加">
                                                                <input type="button" class="btn btn-default" value="取消">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane @if($tab==2){{"active"}}@endif" id="tab2" style="padding-top: 100px">
                        <table class="datatable table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>账号</th>
                                    <th>姓名</th>
                                    <th>团队</th>
                                    <th>删除</th>
                                    <th>修改</th>
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
                                            <form action="{{url('member')}}/{{$member->id}}"  method="POST">
                                                {{method_field('DELETE')}}
                                                {{csrf_field()}}
                                                <input type="submit" class="btn btn-xs btn-danger" value="删除" onclick="return confirm('确认要删除吗？')">
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{url("member")}}/{{$member->id}}/edit">
                                                <input type="button" class="btn btn-xs btn-success" value="修改">
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
    </div>
    @endsection