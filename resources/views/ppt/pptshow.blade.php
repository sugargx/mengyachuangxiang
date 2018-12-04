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
                            <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">查看幻灯片</a>
                        </li>
                        <li role="tab2" style="width:160px" class="@if($tab==2){{"active"}}@endif">
                            <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">添加幻灯片</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body no-padding tab-content">
                    <div role="tabpanel" class="tab-pane @if($tab==1){{"active"}}@endif" id="tab1" style="padding-top: 100px">
                        <table class="datatable table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>图片</th>
                                <th>标题</th>
                                <th>描述</th>
                                <th>链接</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ppts as $ppt)
                                <tr>
                                    <td><img src="{{url('getImage')}}/{{$ppt->img}}" alt="" width="100" height="50"></td>
                                    <td>{{$ppt->title}}</td>
                                    <td>
                                        {{$ppt->description}}
                                    </td>
                                    <td>
                                        <a href="{{$ppt->url}}">{{$ppt->url_title}}</a>
                                    </td>
                                    <td>
                                        @if($ppt->show==1)已推荐
                                        @else未推荐
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{url('ppts')}}/{{$ppt->id}}"  method="POST" style="display:inline-block;">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <input type="submit" class="btn btn-xs btn-danger" value="删除" onclick="return confirm('确认要删除吗？')">
                                        </form>
                                        <a href="{{url("ppts")}}/{{$ppt->id}}/edit">
                                            <input type="button" class="btn btn-xs btn-info" value="修改">
                                        </a>
                                        <a href="{{url('recommend')}}/{{$ppt->id}}">
                                            <input type="button" class = "btn btn-xs @if($ppt->show==1)btn-default
@else
                                                    btn-success
@endif" value="@if($ppt->show==1)取消推荐@else设为推荐@endif">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane @if($tab==2){{"active"}}@endif" id="tab2">
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
                                        <form class="form form-horizontal" method="post" action="" enctype="multipart/form-data">
                                            <div class="section">
                                                <div class="section-title"></div>
                                                <div class="section-body">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">选择图片</label>
                                                        <div class="col-md-9">
                                                            <input type="file" name="img" accept="image/gif,image/jpeg,image/png,image/webp" class="form-control" placeholder="简体">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">标题</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="标题" name="title">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">描述</label>
                                                        <div class="col-md-9">
                                                            {{csrf_field()}}
                                                            <input type="text" class="form-control" placeholder="描述" name="description">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">链接地址</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="链接地址" name="url">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">链接名称</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="链接名称" name="url_title">
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

                </div>
            </div>
        </div>
    </div>
@endsection