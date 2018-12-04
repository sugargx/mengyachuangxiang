@extends('layout.userIndex')
@section('content')
    
    <?php
        $member = \App\Member::find(session('id'));
        //$projects = $member->projects()->get();
        $projects = $member->projects()->where('status','=','0')->get();
    ?>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header"></div>
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
                                           <a href="{{url("myProjectlooking")}}/{{$project->id}}">
                                                <input type="button" value="查看" class="btn btn-xs btn-primary">
                                            </a>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>


                    
                </div>
            </div>
        </div>
    </div>
    @endsection