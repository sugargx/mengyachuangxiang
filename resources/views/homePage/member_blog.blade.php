@extends('layout.homePageIndex')

@section('content')
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>博客</h2><span>个人记录</span>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{route('homePageIndex')}}">首页</a></li>
                            <li>关于我们</li>
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
                <div class="col-lg-9 col-md-8 padding-right-30">

                   @foreach($blog as $key)
                    <!-- Blog Post -->
                    <div class="blog-post">


                        <!-- Content -->
                        <div class="post-content">
                            <h3><a href="{{url('member_blogdetail')}}/{{$key->id}}">{{$key->title}}</a></h3>

                            <ul class="post-meta">
                                <li>{{date('Y-m-d',$key->time)}}</li>
                                <!--<li><a href="#">博客分类</a></li> -->
                                <li>阅读量：{{$key->num}}</li>
                                <li><a href="#">评论数：5</a></li>
                            </ul>

                            <p>{{str_limit( strip_tags($key->content), 100, '...')}}</p>
                            <p></p>
                            <a href="{{url('member_blogdetail')}}/{{$key->id}}" class="read-more">阅读<i class="fa fa-angle-right"></i></a>
                        </div>

                    </div>
                    <!-- Blog Post / End -->
                    @endforeach

                    <!-- Pagination -->
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Pagination -->
                            <div class="pagination-container margin-bottom-40">
                                <nav class="pagination">
                                    <ul>
                                        {{--<li><a href="#" class="current-page">1</a></li>--}}
                                        {{--<li><a href="#">2</a></li>--}}
                                        {{--<li><a href="#">3</a></li>--}}
                                        {{--<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
                                        --}}
                                        {{$blog->links()}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination / End -->

                </div>

                <!-- Blog Posts / End -->


                <!-- Widgets -->
                <div class="col-lg-3 col-md-4">
                    <div class="sidebar right">

                        <!-- Widget -->
                        <div class="widget">
                            <h3 class="margin-top-0 margin-bottom-25">查找</h3>
                            <div class="search-blog-input">
                                <form action="{{url('lookfor')}}/{{$member->id}}" method="post" >
                                    {{csrf_field()}}
                                <div class="input"><input class="search-field" type="text" placeholder="博客关键词" name="keywords" value=""/>
                                <input type="submit" name= "提交"value="提交" >
                                </form>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- Widget / End -->
                        <br>

                       <!-- <div class="widget">
                            <h3>
                                文章分类
                            </h3>
                            <div class="widget-text">
                                <h4><i class="fa fa-edit"></i>&nbsp;&nbsp;<a href="#">随笔</a></h4>
                                <h4><i class="fa fa-edit"></i>&nbsp;&nbsp;<a href="#">PHP学习笔记</a></h4>
                                <h4><i class="fa fa-edit"></i>&nbsp;&nbsp;<a href="#">框架</a></h4>
                            </div>

                        </div>
                        -->

                        <!-- Widget -->
                        <div class="widget margin-top-40">

                            <h3>热门文章</h3>
                            <ul class="widget-tabs">
                            @php
                                $num = 1;
                            @endphp
                            @foreach($hotblogs as $key)
                                <!-- Post #1 -->
                                    <li>
                                        <div class="widget-content">
                                            {{--<div class="widget-thumb">--}}
                                                {{--<a href="#"><img src="{{asset('/images/blog-widget-03.jpg')}}" alt=""></a>--}}
                                            {{--</div>--}}
                                            <div class="widget-text">
                                                <h5><a href="{{url('member_blogdetail')}}/{{$key->id}}">{{$key->title}}</a></h5>
                                                <span style="width: 150%">{{date('Y-m-d',$key->time)}}</span>
                                                <span>阅读量：{{$key->num}}</span>
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