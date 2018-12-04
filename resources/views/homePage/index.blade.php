@extends('layout.homePageIndex')
@section('css')
    <link href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap-grid.css" rel="stylesheet">
@endsection
@section('content')
<div id="wrapper">



    <!-- Slider
    ================================================== -->

    <!-- Revolution Slider -->
    <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">

        <!-- 5.0.7 auto mode -->
        <div id="rev_slider_4_1" class="rev_slider home fullwidthabanner" style="display:none;" data-version="5.0.7">
            <ul>
                @php $i = 1;@endphp
                @foreach($ppts as $ppt)
                <!-- Slide  -->
                <li data-index="rs-{{$i}}" data-transition="fade" data-slotamount="default"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="1000"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="800" data-fsslotamount="7" data-saveperformance="off">

                    <!-- Background -->
                    <img src="{{url('getImage')}}/{{$ppt->img}}" alt="{{$ppt->title}}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina data-kenburns="on" data-duration="12000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0">

                    <!-- Caption-->
                    <div class="tp-caption centered custom-caption-2 tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0"
                         id="slide-2-layer-2"
                         data-x="['center','center','center','center']" data-hoffset="['0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['0']"
                         data-width="['640','640', 640','420','320']"
                         data-height="auto"
                         data-whitespace="nowrap"
                         data-transform_idle="o:1;"
                         data-transform_in="y:0;opacity:0;s:1000;e:Power2.easeOutExpo;s:400;e:Power2.easeOutExpo"
                         data-transform_out=""
                         data-mask_in="x:0px;y:[20%];s:inherit;e:inherit;"
                         data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                         data-start="1000"
                         data-responsive_offset="on" style="max-width: 1000px;">

                        <!-- Caption Content -->
                        <div class="R_title margin-bottom-15"
                             id="slide-2-layer-1"
                             data-x="['left','center','center','center']"
                             data-hoffset="['0','0','40','0']"
                             data-y="['middle','middle','middle','middle']"
                             data-voffset="['-40','-40','-20','-80']"
                             data-fontsize="['42','36', '32','36','22']"
                             data-lineheight="['70','60','60','45','35']"
                             data-width="['640','640', 640','420','320']"
                             data-height="none" data-whitespace="normal"
                             data-transform_idle="o:1;"
                             data-transform_in="y:-50px;sX:2;sY:2;opacity:0;s:1000;e:Power4.easeOut;"
                             data-transform_out="opacity:0;s:300;"
                             data-start="600"
                             data-splitin="none"
                             data-splitout="none"
                             data-basealign="slide"
                             data-responsive_offset="off"
                             data-responsive="off"
                             style="z-index: 6; color: #fff; letter-spacing: 0px; font-weight: 600; ">{{$ppt->title}}</div>

                        <div class="caption-text">{{$ppt->description}}</div>
                        <a href="{{$ppt->url}}" class="button medium">{{$ppt->url_title}}</a>
                    </div>

                </li>
                <!-- Slide  -->
                @php $i++; @endphp
                @endforeach
            </ul>
            <div class="tp-static-layers"></div>

        </div>
    </div>
    <!-- Revolution Slider / End -->


    <!-- Content
    ================================================== -->
    <!-- Service Begin-->
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="headline centered margin-top-80">
                    服务项目
                    <span class="margin-top-25">萌芽科技为您提供最专业、最满意的服务给我们一个机会，我们给您一个惊喜！</span>
                </h3>
            </div>
        </div>

        <div class="row icons-container">
            <!-- Stage -->
            <div class="col-md-4">
                <div class="icon-box-2 with-line">
                    <i class="im im-icon-Monitor"></i>
                    <h3>平面设计 (VI/UI/LOGO)</h3>
                    <p>专业设计师，十年设计经验，提供名片、海报、宣传画册、手绘、企业形象、网站、交互界面、LOGO等设计。同时提供商标注册、宣传资料代理印刷服务。</p>
                </div>
            </div>

            <!-- Stage -->
            <div class="col-md-4">
                <div class="icon-box-2 with-line">
                    <i class="im im-icon-Tablet"></i>
                    <h3>网站建设 (PC端/移动端/自适应)</h3>
                    <p>国际化前沿设计，增强用户浏览体验；先进的代码书写标准及规范；基于诗一般的Laravel开发框架，PHP+PostgreSql组合，确保高速、稳定、安全。</p>
                </div>
            </div>

            <!-- Stage -->
            <div class="col-md-4">
                <div class="icon-box-2">
                    <i class="im im-icon-Laptop-Phone"></i>
                    <h3>电商平台建设 (PC端/移动端)</h3>
                    <p>100%原创编写，根据客户需求量身定制，功能简洁易用，响应高速稳定。便捷的微信消息通知、短信通知，支持微信、支付宝、网银支付等接口。</p>
                </div>
            </div>
        </div>

        <div class="row icons-container">
            <!-- Stage -->
            <div class="col-md-4">
                <div class="icon-box-2 with-line">
                    <i class="im im-icon-Add-UserStar"></i>
                    <h3>微信公众号开发 (微商城等)</h3>
                    <p>基于微信公众号、企业号的深度定制开发，微商城、查询系统、O2O系统、预约平台、报名系统、微信投票、微信抽奖等系统，灵活定制开发！</p>
                </div>
            </div>

            <!-- Stage -->
            <div class="col-md-4">
                <div class="icon-box-2 with-line">
                    <i class="im im-icon-Network"></i>
                    <h3>微信小程序开发 (定制开发)</h3>
                    <p>小程序是一个不需要下载安装就可使用的应用，它实现了应用触手可及的梦想，用户扫一扫或者搜一下即可打开应用。我们保持与最新技术同步，提供小程序定制开发。</p>
                </div>
            </div>

            <!-- Stage -->
            <div class="col-md-4">
                <div class="icon-box-2">
                    <i class="im im-icon-Edit"></i>
                    <h3>线上线下商业活动策划、组织</h3>
                    <p>依托青春派活动平台，为各单位提供线上活动报名、组织、缴费、统计、直播等服务</p>
                </div>
            </div>
        </div>


    </div>
    <!-- Service / End -->

    <!-- Teams Begin -->
    <section class="fullwidth border-top margin-top-70 padding-top-75 padding-bottom-75" data-background-color="#fff">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-45">
                        团队展示
                        <span class="margin-top-25">人在一起叫聚会，心在一起叫团队！</span>
                    </h3>
                </div>
            </div>

            <div class="row">
                <!-- Team Item -->
                @foreach($teams as $team)
                <div class="col-md-4">
                    <div class="blog-compact-item">
                        <img src="{{url('getImage')}}/{{$team->team_img}}" alt="">
                        <div class="blog-compact-item-content">
                            <ul class="blog-post-tags">
                            </ul>
                            <h3>{{$team->team_name}}</h3>
                            <p>{{str_limit($team->introduction,20,'...')}}</p>
                            <div class="team">
                                @php
                                    $members = $team->members()->where('isshow','=','1')->get();
                                    $ans = 1;
                                @endphp
                                @foreach($members as $member)
                                <a href="{{url("memberdetail/$member->id")}}"><img src="{{url('getImage')}}/{{$member->image}}" class="team_people"></a>
                                @php
                                    $ans++;
                                    if($ans==5)
                                    break;
                                @endphp
                                @endforeach
                                    <a href="{{url("teammembershow/$team->id")}}"><img src="{{asset('/images/more1.png')}}" class="team_people pull-right"></a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
                <!-- Item / End -->



            </div>

        </div>
    </section>
    <!-- Recent Blog Posts / End -->

    <!--Project Begin-->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline centered margin-top-75">
                    项目展示
                    <span class="margin-top-25">萌芽科技为您提供最专业、最满意的服务给我们一个机会，我们给您一个惊喜！</span>
                </h3>
            </div>

        </div>
    </div>

    <!-- Categories Carousel -->
    <div class="fullwidth-carousel-container margin-top-25">
        <div class="fullwidth-slick-carousel category-carousel">

            <!-- Item -->
            <div class="fw-carousel-item">
                <!--第一个隐藏-->

                @if(count($projects)>0)
                <div class="fw-carousel-item">
                    <a href="{{url('project_detail')}}/{{$projects[0]->id}}" class="category-box" data-background-image="{{url('getImage')}}/{{$projects[0]->project_img}}">
                        <div class="category-box-content">
                            <h3>{{$projects[0]->name}}</h3>
                        </div>
                        <span class="category-box-btn">查看详情</span>
                    </a>
                </div>
                @endif
            </div>
            @for($i=1; $i<count($projects); $i++)
            <!-- Item -->
            <div class="fw-carousel-item">
                <div class="category-box-container">
                    <a href="{{url('project_detail')}}/{{$projects[$i]->id}}" class="category-box" data-background-image="{{url('getImage')}}/{{$projects[$i]->project_img}}">
                        <div class="category-box-content">
                            <h3>{{$projects[$i]->name}} </h3>
                        </div>
                        <span class="category-box-btn">查看详情</span>
                    </a>
                </div>
            </div>
            @endfor
        </div>

        <div class="col-md-12 centered-content">
            <a href="{{url('projectshow')}}" class="button border margin-top-10">查看更多</a>
        </div>

    </div>
    <!-- Categories Carousel / End -->
    <!-- Project End-->


    <!-- News Section -->
    <section class="fullwidth margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">

        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-45">
                        最新动态
                        <span class="margin-top-25">关注最新动态，伴萌芽成长！</span>
                    </h3>
                </div>

                <div class="col-md-12">
                    <div class="simple-slick-carousel dots-nav">
                        @php $i = 0; @endphp
                        @foreach($news as $new)
                        <!-- News Item -->
                        <div class="carousel-item">
                            <a href="{{url('new')}}/{{$new->id}}" class="listing-item-container">
                                <div class="listing-item">
                                    <img src="{{url('getImage')}}/{{$new->img}}" alt="">
                                    $php $i++;@endphp
                                    @if($i==1)
                                    <div class="listing-badge now-open">Lastest</div>
                                    @else
                                    <div class="listing-item-details">
                                    <ul>
                                        <li>{{date('Y/m/d',$new->time)}}</li>
                                    </ul>
                                    </div>
                                    @endif
                                    <div class="listing-item-content">
                                        <h3>{{$new->title}}</h3>
                                        <!-- <span>964 School Street, New York</span> -->
                                    </div>
                                    <span class="like-icon"></span>
                                </div>

                            </a>
                        </div>
                        @endforeach
                        <!-- News Item / End -->

                     

                    </div>

                </div>

                <div class="col-md-12 centered-content">
                    <a href="{{url('news')}}" class="button border margin-top-10">查看更多</a>
                </div>

            </div>

    </section>
@endsection