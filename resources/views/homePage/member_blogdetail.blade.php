@extends('layout.homePageIndex')
@section('content')
    <!-- Titlebar
================================================== -->
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>博客详情</h2><span></span>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{route('homePageIndex')}}">首页</a></li>
                            <li><a href="#">成员展示</a></li>
                            <li>个人博客</li>
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
                        <img class="post-img" src="images/blog-post-02.jpg" alt="">


                        <!-- Content -->
                        <div class="post-content">

                            <h3>{{$blog->title}}</h3>

                            <ul class="post-meta">
                                <li>{{date('Y-m-d', $blog->time)}}</li>
                                <li>阅读量：{{$blog->num}}</li>
                                <li><a href="#">评论数：5</a></li>
                            </ul>
                            <p></p>
                            <div class="post-quote">
                                <span class="icon"></span>
                                <blockquote>
                                    版权声明：本文为博主原创文章，未经博主允许不得转载
                                </blockquote>
                            </div>
                            {!! $blog->content !!}
                            <div class="clearfix"></div>

                        </div>
                    </div>
                    <!-- Blog Post / End -->


                    <!-- Post Navigation -->
                    <ul id="posts-nav" class="margin-top-0 margin-bottom-45">
                        <li class="next-post">

                            @if(count($nextblog) >0)
                                @php

                                $key = $nextblog[0];
                                        @endphp
                            <a href="{{url("member_blogdetail/$key->id")}}"><span>下一篇</span>
                                {{$key->title}}</a>
                            @endif
                        </li>
                        <li class="prev-post">
                            @if(count($preblog) >0)
                                @php
                                    $a = count($preblog);
                                        $key = $preblog[$a-1];
                                @endphp
                            <a href="{{url("member_blogdetail/$key->id")}}"><span>上一篇</span>
                                {{$key->title}}</a>
                            @endif
                        </li>
                    </ul>
                    @foreach($commits as $commit)
                        @php
                        $people = $commit->member()->get()[0];
                        @endphp
                    <!-- Reviews -->
                    <section class="comments">
                        <h4 class="headline margin-bottom-35">评论<span class="comments-amount"></span></h4>

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{--赋初值为0--}}
                        @php $ans = 0;@endphp

                        <ul>
                            <li>
                                <div class="avatar"><img src="{{url('getImage')}}/{{$people->image}}" alt="" /></div>
                                <div class="comment-content"><div class="arrow-comment"></div>
                                    <div class="comment-by">{{$people->name}}<span class="date">日期：{{date('Y-m-d', $commit->time)}} </span>
                                        <a href="#1" class="reply" onclick="document.getElementById('flag').value = 2;document.getElementById('ans').value = {{$commit->id}};"><i class="fa fa-reply"></i> 回复</a>
                                        <div id="light_weixin" class="white_content">
                                            <img src="{{url('getImage')}}/{{$people->image}}">
                                        </div>
                                    </div>
                                    <p>评论内容 </p>
                                    <p style="">{!!$commit->content!!}</p>
                                </div>

                                <ul>
                                    @foreach($commits2 as $key)
                                        @if($key->rank_id == $commit->id)
                                            @php
                                                $person = $key->member()->get()[0];
                                            @endphp
                                    <li>
                                        <div class="avatar"><img src="{{url('getImage')}}/{{$person->image}}" alt="" /></div>
                                        <div class="comment-content"><div class="arrow-comment"></div>
                                            <div class="comment-by">{{$person->name}}<span class="date">{{date('Y-m-d', $key->time)}}</span>
                                            </div>
                                            <p>{!! $key->content !!}</p>
                                        </div>
                                    </li>
                                        @endif
                                        @endforeach
                                </ul>

                            </li>

                        </ul>
                    </section>
                    @endforeach
                    <div class="clearfix"></div>


                    <!-- Add Comment -->
                    <div id="add-review" class="add-review-box">
                        <a href="1" id="1"></a>
                        <!-- Add Review -->
                        <h3 class="listing-desc-headline margin-bottom-35">评论</h3>
                        <!-- Review Comment -->
                        <form id="add-comment" class="add-comment" action="{{url("blogcommit/$blog->id")}}">
                            <input type="hidden" value="1" name="flag" id="flag">
                            <input type="hidden" value="1" name="ans" id="ans">
                            <fieldset>

                                <div>
                                    <label>评论：</label>
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <textarea cols="40" rows="3" name="content"></textarea>
                                </div>
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    &times;
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">
                                                    您还未登录，请先登录您的账号
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                账号 <input type="text" name="users">
                                                密码 <input type="password" name="password">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                                                </button>
                                                <input type="submit" class="btn btn-primary" value=" 登录">
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal -->
                                </div>

                            </fieldset>
                            {{--@php echo session('id'); @endphp--}}
                            <input @if(session('id') !='' ) type="submit" class="button" @else type = "button" class="button"  data-toggle="modal" data-target="#myModal"@endif style="width: 50px !important;" value="提交"></input>
                            <div class="clearfix"></div>
                        </form>

                    </div>
                    <!-- Add Review Box / End -->

                </div>
                <!-- Content / End -->
                <!-- Widgets -->
                <div class="col-lg-3 col-md-4">
                    <div class="sidebar right">
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
    <script language="JavaScript">
        function reply() {
        }
    </script>





@endsection