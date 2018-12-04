@extends('layout.userIndex')

@section('css')
    <style type="text/css">
        .timeline img{
            max-width:100%;
        }
    </style>
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
    <?php
            $member = \App\Member::find(session('id'));
            $journals = $member->journals()->orderBy('time','desc')->get();
    ?>
    <script type="text/javascript" charset="utf-8" src="{{asset("/Ueditor/ueditor.config.js")}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset("/Ueditor/ueditor.all.min.js")}}"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="{{asset("/Ueditor/lang/zh-cn/zh-cn.js")}}"></script>
    <div class="card">
        <div class="card-header"><h3>成长记录发布</h3></div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body">
            <form action="{{url('journal')}}" method="post">
                <div class="form-group">
                    {{csrf_field()}}
                </div>
                <div class="form-group">
                    <div id="editor" type="text/plain" style="height: 200px;width: 100%;margin: auto"></div>
                </div>
                <input type="submit" class="btn btn-primary" value="发布" style="margin-top: 20px">
            </form>
        </div>
    </div>
    <div class="container" style="margin-top: 20px">
        <div class="timeline">
            <dl>
                <?php $sum = count($journals);?>
               @for($i = 0;$i<$sum;$i++)
                    <dt class="heading">
                        <div class="title">{{date('Y-m-d',$journals[$i]->time)}}</div>
                    </dt>
                    <dt class="item">
                        <div class="marker"></div>
                        <div class="event">
                            <div class="event-body">
                                {!! $journals[$i]->content !!}
                            </div>
                        </div>
                    </dt>
                        <?php
                            $i++;
                        ?>
                    @if($i<$sum)
                        <dt class="heading">
                            <div class="title">{{date('Y-m-d',$journals[$i]->time)}}</div>
                        </dt>
                        <dt class="item pos-right">
                            <div class="marker"></div>
                            <div class="event">
                                <div class="event-body">
                                    {!! $journals[$i]->content !!}
                                </div>
                            </div>
                        </dt>
                        @endif

                @endfor
            </dl>
        </div>
    </div>

    <script type="text/javascript">

        //实例化编辑器
        //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
        //var ue = UE.getEditor('editor');
        var ue = UE.getEditor('editor',{toolbars: [['fullscreen',//全屏
            'source',//源代码
            'undo',//撤回一步
            'redo',//前进一步
            'bold',//粗体
            'italic',//斜体
            'underline',//下划线
            'fontborder',//字体边框
            'strikethrough',//删除线
            'subscript',//下标
            'superscript',//上标
            'forecolor', //字体颜色
            'fontfamily',//字体
            'fontsize',//字体大小
            'formatmatch',//格式刷
            'touppercase', //字母大写
            'tolowercase', //字母小写
            'link',//超链接
            'unlink',//取消超链接
            'searchreplace',//查询替换
            'selectall'],//全选

            ['indent',//首行缩进
                'justifyleft', //居左对齐
                'justifycenter', //居中对齐
                'justifyright', //居右对齐
                'justifyjustify', //两端对齐
                'blockquote',//引用
                'preview',//预览
                'horizontal',//分割线
                'insertcode',//代码语言
                'paragraph',//段落格式
                'simpleupload',//单个图片上传
                'insertimage',//多个图片上传
                'imagecenter', //居中
                'insertvideo',//视频上传
                'emotion',//表情
                'map',//地图
                'backcolor',//背景色
                'lineheight', //行间距
                'edittip ', //编辑提示
                'customstyle', //自定义标题
                'autotypeset',//自动排版

                'background', //背景
                'template', //模板
                'scrawl', //涂鸦
                'time', //时间
                'date', //日期
                'snapscreen',
                'attachment'
            ]]});
        ue.ready(function() {
            //设置编辑器的内容
            ue.execCommand("inserthtml",'{!! "" !!}') ;
        });
    </script>
        </div>
    </div>
@endsection