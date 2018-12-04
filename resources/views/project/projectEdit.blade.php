@extends('layout.index')
@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header"><i class="icon fa fa-user" aria-hidden="true"></i>请重新填写要修改的信息</div>
            <div class="card-body __indent" style="padding: 0 16.66667%;">
                <form class="form form-horizontal" method="post" action="{{url('project')}}/{{$project->id}}" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                    <div class="section">
                        <div class="section-title"></div>
                        <div class="section-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">项目名称</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="项目名称" name="name" value="{{$project->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">合作方</label>
                                <div class="col-md-9">
                                    {{csrf_field()}}
                                    <input type="text" class="form-control" placeholder="合作方" name="partner" value="{{$project->partner}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">开始时间</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" placeholder="开始时间" name="start_time" value="{{date("Y-m-d",$project->start_time)}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">截止时间</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" placeholder="截止时间" name="end_time" value="{{date("Y-m-d",$project->end_time)}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">项目分类</label>
                                <div class="col-md-9">
                                    <select class="select2" name="category">
                                        <option value="小程序"@if($project->category=="小程序") selected = "selected"@endif>小程序</option>
                                        <option value="web网页"@if($project->category=="web网页") selected = "selected" @endif>web网页</option>
                                        <option value="LOGO设计"@if($project->category=="LOGO设计") selected = "selected" @endif>LOGO设计</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">项目介绍</label>
                                <div class="col-md-9">
                                    <textarea rows="20" cols="50" class="form-control" name="introduction">{{$project->introduction}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">图片介绍</label>
                                <div class="col-md-9">
                                    <input type="file" name="project_img" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">图片介绍</label>
                                <div class="col-md-9">
                                    <img src="{{url('getImage')}}/{{$project->project_img}}" class="col-md-3" style="margin-bottom: 20px">
                                </div>
                            </div>
                            <div class="form-footer">
                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <input type="submit" class="btn btn-primary" value="修改项目">
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

@endsection

