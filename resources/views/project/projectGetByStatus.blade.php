@extends('layout.index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                    @if($status==0)
                        待处理项目
                    @elseif($status==1)
                        正在进行项目
                    @elseif($status==2)
                        已完成项目
                    @endif
                    </h3>
                </div>
                <div class="card-body">
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
                                    <a href="{{url('projectDel')}}/{{$project->id}}">
                                        <input type="button" value="删除" class="btn btn-xs btn-danger" onclick="return confirm('您确定要删除吗？')">
                                    </a>
                                    <a href="{{url('projectEdit')}}/{{$project->id}}">
                                        <input type="button" value="修改" class="btn btn-xs btn-primary">
                                    </a>
                                    <a href="{{url('projectAddMember')}}/{{$project->id}}">
                                    <input type="button" value="人员调整" class="btn btn-xs btn-primary">
                                    </a>
                                    <a href="{{url('projectEdit/start')}}/{{$project->id}}">
                                        <input type="button" value="开始处理" class="btn btn-xs btn-primary">
                                    </a>
                                    <a href="{{url('projectEdit/finish')}}/{{$project->id}}">
                                        <input type="button" value="已完成" class="btn btn-xs btn-primary">
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