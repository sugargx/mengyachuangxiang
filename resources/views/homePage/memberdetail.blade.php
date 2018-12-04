@extends('layout.homePageIndex')

@section('content')
    <!-- Titlebar
        ================================================== -->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>个人详情介绍</h2><span></span>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{route('homePageIndex')}}">首页</a></li>
                            <li><a href="{{route('membershow')}}">成员展示</a></li>
                            <li>成员介绍</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>



    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row sticky-wrapper">

            <!-- Sidebar
            ================================================== -->
            <div class="col-lg-4 col-md-4 margin-top-0">

                <!-- Contact -->
                <div class="boxed-widget margin-top-30 margin-bottom-50">
                    <img src="{{url('getImage')}}/{{$member->image}}">
                    <br>
                    <br>
                    <h3 align="center"><strong>{{$member->name}}&nbsp;&nbsp;</strong><strong>
                            @php
                            $job = $member->job()->get()[0];
                            @endphp
                            {{$job->name}}
                        </strong></h3>

                    <h3>技能值官方评估</h3>
                    <ul class="listing-details-sidebar">

                        <ul class="listing-details-sidebar">
                            @foreach($skills as $skill)
                            <div class="star-rating" data-rating="{{$skill->score}}">
                                <li><i class="sl sl-icon-share"></i> {{$skill->name}}</li>
                            </div>
                            <br>
                            @endforeach
                        </ul>
                        <ul class="listing-details-sidebar social-profiles">
                            <!-- <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> -->
                        </ul>
                        <br>
                        <h3>具体信息（或个人的各种链接等等）</h3>
                        <ul class="listing-details-sidebar">
                            <li><i class="sl sl-icon-diamond"></i>年龄：{{$member->age}}</li>
                            <li><i class="sl sl-icon-magic-wand"></i>入职时间：{{date('Y-m-d',$member->time)}}</li>

                            <li><i class="fa fa-address-book-o"></i> <a href="{{url('member_blog')}}/{{$member->id}}">个人博客：点击进入</a></li>
                            <li><i class="sl sl-icon-plus"></i>优势：{{$member->ability}}</li>

                        </ul>
                        <br>
                        <h3>联系方式</h3>
                        <ul class="listing-details-sidebar">
                            <li><i class="sl sl-icon-phone"></i>联系方式：{{$member->phone}}
                            <li><i class="fa fa-envelope-o"></i><span>{{$member->email}}</span></li>
                        </ul>

                        <ul class="listing-details-sidebar social-profiles">
                            <!-- <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> -->
                        </ul>



                        <!-- Reply to review popup -->
                        <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                            <div class="small-dialog-header">
                                <h3>发送信息</h3>
                            </div>
                            <div class="message-reply margin-top-0">
                                <textarea cols="40" rows="3" placeholder="请输入您的信息"></textarea>
                                <button class="button">发送</button>
                            </div>
                        </div>


                </div>
                <!-- Contact / End-->

            </div>
            <!-- Sidebar / End -->

            <div class="col-lg-8 col-md-8">
                <ul id="myTab" class="nav nav-tabs">
                    <li>
                        <a href="" onmouseover="changeTab1()">个人成长记录轴</a>
                    </li>
                    <li>
                        <a href="" onmouseover="changeTab2()">做过的项目</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">

                    <div class="fade in" id = "timeline">

                        <div class="timeline">
                            @php $flag=1;
                        $num = 0;
                            @endphp

                            @foreach($journal as $journal)
                                <dl>
                                    @if($flag==1)
                                        <dt class="item">
                                    @endif
                                    @if($flag==-1)
                                        <dt class="item pos-right">
                                            @endif
                                            <div class="marker"></div>
                                            <div class="event">
                                                <div class="event-body">
                                                    {!!$journal->content!!}
                                                </div>
                                            </div>
                                        </dt>
                                        @if($num%3==0)
                                            <dt class="heading">
                                                <div class="title">{{date('Y-m-d',$journal->time)}}</div>
                                            </dt>
                                        @endif
                                        @if($num >= 2)
                                            @php
                                                break;
                                            @endphp
                                        @endif
                                </dl>

                                @php
                                    $flag = -$flag;
                                    $num++;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                    <div class="fade" id = "project">

                        <!-- Listing Item -->
                        @foreach($projects as $project)
                            <div class="col-md-12 col-lg-12">
                                <div class="listing-item-container list-layout">
                                    <a href="{{url('project_detail')}}/{{$projects[0]->id}}" class="listing-item">

                                        <!-- Image -->
                                        <div class="listing-item-image">
                                            <img src="{{url('getImage')}}/{{$project->project_img}}" alt="">
                                            <span class="tag">{{$project->category}}（项目分类）</span>
                                        </div>

                                        <!-- Content -->
                                        <div class="listing-item-content">
                                            <div class="listing-item-inner">
                                                <h3>{{$project->name}}</h3>
                                                <span>项目完成时间：{{date('Y-m-d',$project->end_time)}}</span>
                                                <div><span>负责：{{str_limit($member->job->name,4,'')}}</span></div>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            </div>
                    @endforeach
                    <!-- Listing Item / End -->
                        <!-- Pagination -->
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <!-- Pagination -->
                                <div class="pagination-container margin-top-30">
                                    <nav class="pagination">
                                        <ul>
                                            {{$projects->links()}}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br><br>
                        <!-- Pagination / End -->

                    </div>


                </div>
            </div>
            <!-- Content
            ================================================== -->


        </div>
    </div>

    <!-- Listings Container / End -->
    <script>
        var x = document.getElementById("timeline");
        var y = document.getElementById("project");
        x.style.display = 'block';
        y.style.display = 'none';
    function changeTab1(){
        var x = document.getElementById("timeline");
        var y = document.getElementById("project");
        x.style.display = 'block';
        y.style.display = 'none';
        getElementById("myTab").getElementByTagName("li").className="active";
    }
    function changeTab2(){
        var x = document.getElementById("timeline");
        var y = document.getElementById("project");
        y.style.display = 'block';
        x.style.display = 'none';
    }
</script>
@endsection
