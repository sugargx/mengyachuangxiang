@extends("layout.index")

@section("css")

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-tab">
                <div class="card-header">
                    <ul class="nav nav-tabs">

                        <li role="tab1" style="width:160px" class="@if($tab==1){{"active"}}@endif">
                            <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">查看全部项目</a>
                        </li>
                        <li role="tab2" style="width: 180px" class="@if($tab==2){{"active"}}@endif">
                            <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">创建新的项目</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body no-padding tab-content">

                    <div role="tabpanel" class="tab-pane @if($tab==1){{"active"}}@endif" id="tab1" style="padding-top: 100px">
                        <table class="datatable table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>项目名称</th>
                                <th>合作方</th>
                                <th>开始时间</th>
                                <th>截止时间</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{$project->id}}</td>
                                        <td>{{$project->name}}</td>
                                        <td>{{$project->partner}}</td>
                                        <td>{{date('Y年m月d日',$project->start_time)}}</td>
                                        <td>{{date('Y年m月d日',$project->end_time)}}</td>
                                        <td>
                                            @if($project->status==0)
                                                待处理
                                            @elseif($project->status==1)
                                                正在进行
                                            @elseif($project->status==2)
                                                已完成
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{url('project')}}/{{$project->id}}" style="display: inline" method="post">
                                                {{method_field('DELETE')}}
                                                {{csrf_field()}}
                                                <input type="submit" value="删除" class="btn btn-xs btn-danger" onclick="return confirm('您确定要删除吗？')">
                                            </form>
                                            <a href="{{url('project')}}/{{$project->id}}/edit">
                                                <input type="button" value="修改" class="btn btn-xs btn-primary">
                                            </a>
                                            <a href="{{url('projectAddMember')}}/{{$project->id}}">
                                                <input type="button" value="人员调整" class="btn btn-xs btn-primary">
                                            </a>
                                            @if($project->status==0)
                                            <a href="{{url('projectEdit/start')}}/{{$project->id}}">
                                                <input type="button" value="开始处理" class="btn btn-xs btn-primary">
                                            </a>
                                            @endif
                                            @if($project->status==1)
                                            <a href="{{url('projectEdit/finish')}}/{{$project->id}}">
                                                <input type="button" value="已完成" class="btn btn-xs btn-primary">
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
                                    <div class="section-title"><i class="icon fa fa-user" aria-hidden="true"></i>请填写信息</div>
                                    <div class="section-body __indent">
                                        <form class="form form-horizontal" method="post" action="{{url('project')}}">

                                            <div class="section">
                                                <div class="section-title"></div>
                                                <div class="section-body">
                                                    @if (count($errors) > 0)
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">项目名称</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="项目名称" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">合作方</label>
                                                        <div class="col-md-9">
                                                            {{csrf_field()}}
                                                            <input type="text" class="form-control" placeholder="合作方" name="partner">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">开始时间</label>
                                                        <div class="col-md-9">
                                                            <input type="date" class="form-control" placeholder="开始时间" name="start_time">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">截止时间</label>
                                                        <div class="col-md-9">
                                                            <input type="date" class="form-control" placeholder="截止时间" name="end_time">
                                                        </div>
                                                    </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">项目分类</label>
                                                            <div class="col-md-9">
                                                                <select class="select2" name="category">
                                                                    <option value="小程序">小程序</option>
                                                                    <option value="web网页">web网页</option>
                                                                    <option value="LOGO设计">LOGO设计</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                        <label class="col-md-3 control-label">项目介绍</label>
                                                        <div class="col-md-9">
                                                            <textarea rows="20" cols="50" class="form-control" name="introduction"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-footer">
                                                        <div class="form-group">
                                                            <div class="col-md-9 col-md-offset-3">
                                                                <input type="submit" class="btn btn-primary" value="创建项目">
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
                </div>
            </div>
        </div>
    </div>
@endsection