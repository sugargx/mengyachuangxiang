@extends("layout.index")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">请填写新的信息</div>
                <div class="card-body">
                    <form class="form form-horizontal" method="post" action="{{url("member/".$member->id)}}">
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <?php
                                $flag = 0;
                            ?>
                            <label class="col-md-2">团队</label>
                            <div class="col-md-8 col-sm-12">
                                <select class="select2" name="team_id">
                                    @foreach($teams as $team)
                                        @if($member->team_id!=-1&&$team->team_name==$member->team()->get()[0]->team_name)
                                            <option selected="selected" value="{{$team->id}}">{{$team->team_name}}</option>
                                            <?php $flag = 1;?>
                                        @else
                                            <option value="{{$team->id}}">{{$team->team_name}}</option>
                                        @endif
                                    @endforeach
                                    @if($flag == 0)
                                            <option selected="selected" value="-1">未分组</option>
                                        @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">姓名</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="{{$member->name}}" name="name">
                                {{csrf_field()}}

                            </div>
                        </div>
                        <div class="form-group">
                            <?php
                            $flag = 0;
                            ?>
                            <label class="col-md-2">职务</label>
                            <div class="col-md-8 col-sm-12">
                                <select class="select2" name="job">
                                    @foreach($jobs as $job)
                                        @if(count($member->job()->get())>0)
                                            @if($job->name==$member->job()->get()[0]->name)
                                                <option selected="selected" value="{{$job->id}}">{{$job->name}}</option>
                                                <?php $flag = 1;?>
                                            @endif
                                        @else
                                            <option value="{{$job->id}}">{{$job->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">电话号码</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="{{$member->phone}}" name="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">邮箱</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="{{$member->email}}" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">出生日期</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="date" class="form-control" value="{{date("Y-m-d",$member->age)}}" name="age">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">入职时间</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="date" class="form-control" value="{{date('Y-m-d',$member->time)}}" name="time">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">掌握的编程语言</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="{{$member->language}}" name="language">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">个人介绍</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="{{$member->introduction}}" name="introduction">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">个人优势</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="{{$member->advantage}}" name="advantage">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">能力值</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="{{$member->ability}}" name="ability">
                            </div>
                        </div>
                        <div class="form-footer">
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <input type="submit" class="btn btn-primary" value="确定修改">
                                    <input type="button" class="btn btn-default" value="取消">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection