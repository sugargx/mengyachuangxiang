@extends("layout.index")

@section("css")
    <style type="text/css">
        li label{
            text-align: right;
            width :15%;
            margin-right: 10%;
        }
        li span{
            text-align: right;
            width:30%;
        }
    </style>
    @endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    系统基本信息
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <label>操作系统</label><span>{{PHP_OS}}</span>
                        </li>
                        <li class="list-group-item">
                            <label>运行环境</label><span>{{$_SERVER['SERVER_SOFTWARE']}}</span>
                        </li>
                        <li class="list-group-item">
                            <label>PHP运行方式</label><span><?php echo php_sapi_name();?></span>
                        </li>
                        <li class="list-group-item">
                            <label>版本</label><span>v-1.0</span>
                        </li>
                        <li class="list-group-item">
                            <label>上传附件限制</label><span><?php echo get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件"; ?></span>
                        </li>
                        <li class="list-group-item">
                            <label>北京时间</label><span><?php echo date('Y年m月d日 H时i分s秒')?></span>
                        </li>
                        <li class="list-group-item">
                            <label>服务器域名/IP</label><span>{{$_SERVER['SERVER_NAME']}} [ {{$_SERVER['SERVER_ADDR']}} ]</span>
                        </li>
                        <li class="list-group-item">
                            <label>Host</label><span>{{$_SERVER['SERVER_ADDR']}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endsection
