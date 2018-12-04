@extends('layout.homePageIndex')
@section('css')
    <link href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap-grid.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Titlebar
        ================================================== -->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>项目详情展示</h2><span></span>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{url('/')}}">首页</a></li>
                            <li><a href="{{url('projectshow')}}">项目展示</a></li>
                            <li>项目详情展示</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>

    <!-- Content
    ================================================== -->
    <div class="container">

        <!-- Blog Posts -->
        <div class="blog-page">
            <div class="row">


                <!-- Post Content -->
                <div class="col-lg-9 col-md-8 padding-right-30">


                    <!-- Blog Post -->
                    <div class="blog-post single-post">

                        <!-- Img -->
                        <img class="post-img" src="{{url('getImages')}}/{{$project->project_img}}" alt="">


                        <!-- Content -->
                        <div class="post-content">

                            <h3>{{$project->name}}</h3>

                            <ul class="post-meta">
                                <li>{{date('Y/m/d',$project->end_time)}}</li>
                                <li><a href="#">项目分类</a></li>
                            </ul>


                            <div class="post-quote">
                                <span class="icon"></span>
                                <blockquote>
                                    介绍项目
                                </blockquote>
                            </div>

                            <p style="text-indent: 2em;">{{$project->introduction}}</p>

                            <div class="clearfix"></div>

                        </div>
                    </div>
                    <!-- Blog Post / End -->


                    <!-- Reviews -->
                    <section class="comments">
                        <h4 class="headline margin-bottom-35">做项目的人的评论感想<span class="comments-amount"></span></h4>

                        <ul>
                            @foreach($cons as $con)
                            <li>

                               <?php
                                    $member = $con->member;
                                   // dd($con);
                                if($member->image=="")
                                    $path = asset('/img/programe.jpg');
                                else
                                    $path = url('getImage') ."/". $member->image;
                                ?>
                                <div class="avatar"><img src="{{$path}}" alt="" /></div>
                                <div class="comment-content"><div class="arrow-comment"></div>
                                    <div class="comment-by">{{$member->name}}<span class="date">{{date('Y/m/d',$con->time)}}</span>
                                    </div>
                                    <p>{{$con->introduction}}</p>
                                </div>
                            </li>
                                @endforeach
                        </ul>

                    </section>
                    <div class="clearfix"></div>
                    <br>
                    <br>

                </div>
                <!-- Content / End -->



                <!-- Widgets -->
                <div class="col-lg-3 col-md-4">
                    <div class="sidebar right">



                        <div class="widget">
                            <h3>
                                项目分类
                            </h3>
                            <div class="widget-text">
                                <h4><i class="fa fa-wechat"></i>&nbsp;&nbsp;<a href="{{url('lookforproject')}}?kind=1">小程序</a></h4>
                                <h4><i class="fa fa-desktop"></i>&nbsp;&nbsp;<a href="{{url('lookforproject')}}?kind=2">web网页</a></h4>
                                <h4><i class="fa fa-edit"></i>&nbsp;&nbsp;<a href="{{url('lookforproject')}}?kind=3">LOGO设计</a></h4>
                            </div>

                        </div>


                        <!-- Widget -->
                        <div class="widget margin-top-40">

                            <h3>典例项目</h3>
                            <ul class="widget-tabs">
                            @php $projects = \App\Project::orderBy('end_time','desc')->limit(3)->get();
                            @endphp
                                <!-- Post #1 -->
                                @foreach($projects as $proj)
                                <li>
                                    <div class="widget-content">
                                        <div class="widget-thumb">
                                            <?php
                                            if($proj->project_img == null)
                                                $path = asset('/img/programe.jpg');
                                            else
                                                $path = url('getImage') ."/". $proj->project_img;
                                            ?>
                                            <a href="{{url('project_detail')}}/{{$proj->id}}"><img src="{{$path}}" alt=""></a>
                                        </div>

                                        <div class="widget-text">
                                            <h5><a href="{{url('project_detail')}}/{{$proj->id}}">{{$proj->name}}</a></h5>
                                            <span>{{date('Y/m/d',$proj->end_time)}}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </li>
                                @endforeach


                            </ul>

                        </div>
                        <!-- Widget / End-->

                        <!-- Share Buttons -->
                        <ul class="share-buttons margin-top-40 margin-bottom-0">
                            <li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
                            <li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
                            <li><a class="gplus-share" href="#"><i class="fa fa-github"></i> Share</a></li>
                        </ul>


                        <div class="clearfix"></div>
                        <div class="margin-bottom-40"></div>
                    </div>
                </div>
            </div>
            <!-- Sidebar / End -->


        </div>
    </div>

@endsection