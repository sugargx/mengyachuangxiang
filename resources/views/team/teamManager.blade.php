@extends("layout.index")
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-tab">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        <li role="tab1" style="width:160px" class="@if($tab==1){{"active"}}@endif">
                            <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">团队管理</a>
                        </li>
                        <li role="tab2" class="@if($tab==2){{"active"}}@endif">
                            <a href="#tab2" style="width:160px;" aria-controls="tab2" role="tab" data-toggle="tab">建立新的团队</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body no-padding tab-content">
                    <div role="tabpanel" class="tab-pane @if($tab==1){{"active"}}@endif" id="tab1" style="padding-top: 100px">
                        <table class="datatable table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>团队名称</th>
                                <th>成立时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teams as $team)
                                <tr>
                                    <td>{{$team->id}}</td>
                                    <td>
                                        <a href="{{url("team")}}/{{$team->id}}">
                                            {{$team->team_name}}
                                        </a>
                                    </td>
                                    <td>{{date("Y年m月d日",$team->time)}}</td>
                                    <td>
                                        <form action="{{url('team')}}/{{$team->id}}" method="post" style="display: inline">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <input type="submit" class="btn btn-xs btn-danger" value="删除" onclick="return confirm('您确定要删除吗？')">
                                        </form>
                                        <a href="{{url("team")}}/{{$team->id}}/edit">
                                            <input type="button" class="btn btn-xs btn-primary" value="修改">
                                        </a>
                                        <a href="{{url("teamAddMember")}}/{{$team->id}}">
                                            <input type="button" class="btn btn-xs btn-info" value="成员管理">
                                        </a>
                                        @if($team->isshow ==0)
                                        <a href="{{url("team_true")}}/{{$team->id}}">
                                            <input type="button" class="btn btn-xs btn-success" value="设为主页推荐团队">
                                        </a>
                                        @endif
                                        @if($team->isshow ==1)
                                            <a href="{{url("team_false")}}/{{$team->id}}">
                                                <input type="button" class="btn btn-xs btn-default" value="取消推荐">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane @if($tab==2){{"active"}}@endif" id="tab2">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <div class="section">
                                    <div class="section-title"><i class="icon fa fa-user" aria-hidden="true"></i>请填您要建立团队的信息</div>
                                    <div class="section-body __indent">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form class="form-horizontal" method="post" action="{{route('team.store')}}" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-md-2 col-sm-12">团队名称</label>
                                                <div class="col-md-8 col-sm-12">
                                                    {{csrf_field()}}
                                                    <input type="text" name="team_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 col-sm-12">图片介绍</label>
                                                <div class="col-md-8 col-sm-12">
                                                    <input type="file" name="team_img" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 col-sm-12">队长</label>
                                                <div class="col-md-8 col-sm-12">
                                                    <select class="form-control select2" name="captain" style="width: 100%">
                                                        @foreach($members as $member)
                                                            <option value="{{$member->name}}">{{$member->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 col-sm-12">团队简介</label>
                                                <div class="col-md-8 col-sm-12">
                                                    <textarea rows="20" name="team_intro" class="form-control"></textarea>
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
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    @endsection