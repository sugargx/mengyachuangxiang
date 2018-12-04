@extends("layout.index")

@section("css")

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-tab">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        <li role="tab1" class = "active">
                            <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">修改幻灯片</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body no-padding tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab2">
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
                                                            <input type="file" name="img" accept="image/gif,image/jpeg,image/png,image/webp" class="form-control" value="{{url('getImage')}}/{{$ppt->img}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">标题</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="标题" name="title" value="{{$ppt->title}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">描述</label>
                                                        <div class="col-md-9">
                                                            {{csrf_field()}}
                                                            <input type="text" class="form-control" placeholder="描述" name="description" value=" {{$ppt->description}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">链接地址</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="链接地址" name="url" value="{{$ppt->url}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">链接名称</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="链接名称" name="url_title" value="{{$ppt->url_title}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-footer">
                                                        <div class="form-group">
                                                            <div class="col-md-9 col-md-offset-3">
                                                                <input type="submit" class="btn btn-primary" value="修改">
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