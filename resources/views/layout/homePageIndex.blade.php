<!DOCTYPE html>
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>萌芽创想</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    @yield('css')

    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet"  href="{{asset('/css/colors/green.css')}}" id="colors">
    <link rel="stylesheet" href="{{asset('/css/timeline.css')}}">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css">

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header Container
    ================================================== -->
    <header id="header-container">

        <!-- Header -->
        <div id="header">
            <div class="container">

                <!-- Left Side Content Begin-->
                <div class="left-side">

                    <!-- Logo -->
                    <div id="logo" class="pull-left">
                        <a href="{{url('/')}}"><img  src="{{asset('/images/logo-dark.png')}}" alt=""></a>
                    </div>

                    <!-- Mobile Navigation-->
                    <div class="mmenu-trigger">
                        <button class="hamburger hamburger&#45;&#45;collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
                        </button>
                    </div>


                    <!-- Main Navigation Begin-->
                    <nav id="navigation" class="style-1">
                        <ul id="responsive">

                            <li><a href="{{route('homePageIndex')}}">首页</a></li>

                            <li><a href="{{route('aboutus')}}">关于我们</a></li>

                            <li><a href="{{route('news')}}">新闻资讯</a></li>

                            <li><a href="{{route('membershow')}}">成员展示</a></li>

                            <li><a href="{{route('projectshow')}}">项目展示</a></li>

                            <li><a href="{{route('contact')}}">联系我们</a></li>
                        </ul>
                    </nav>

                    <div class="clearfix"></div>
                    <!-- Main Navigation / End -->

                </div>
                <!-- Left Side Content / End -->

                <!-- Right Side Content / Begin -->
                <div class="right-side">
                    @if(session('id')== '' )
                    <div class="header-widget">
                        <a href="{{url('/login')}}"> 登录</a>
                    </div>
                     @else
                        <div class="header-widget">
                            @php
                            $member = \App\Member::find(session('id'));
                           // echo session('id');
                            @endphp
                            <a href="{{route('logout')}}"> {{$member->name}}，（点此退出）</a>
                        </div>
                    @endif
                </div>
                <!-- Right Side Content / End -->

            </div>
        </div>
        <!-- Header / End -->

    </header>
    <div class="clearfix"></div>
    <!-- Header Container / End -->
    @yield('content')
    <!-- Footer
    ================================================== -->
    <div id="footer" class="dark">
        <!-- Main -->
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6">
                    <img class="footer-logo" src="{{asset('/images/logo.png')}}" alt="">
                    <br><br>
                    <p>萌芽科技为您提供最专业、最满意的服务！给我们一个机会，我们给您一个惊喜！</p>
                </div>

                <div class="col-md-4 col-sm-6 help">


                    <div class="clearfix"></div>
                </div>

                <div class="col-md-3  col-sm-12">
                    <h4>联系我们</h4>
                    <div class="text-widget">
                        地址：<span>山东理工大学西校区大红炉众创空间二层</span> <br>
                        电话：<span>0533-2888520 </span><br>
                        手机：<span>13561669366</span><br>
                        邮箱：<span><span>mail@mengyakeji.com</span></span><br>
                    </div>

                </div>

            </div>

            <!-- Copyright -->
            <div class="row">
                <div class="col-md-12">
                    <div class="copyrights">© 2018 MYCX. All Rights Reserved.</div>
                </div>
            </div>

        </div>

    </div>
    <!-- Footer / End -->

    <!-- Back To Top Button -->
    <div id="backtotop"><a href="#"></a></div>

    <!-- Wrapper / End -->


    <!-- Scripts
    ================================================== -->
    <script type="text/javascript" src="{{asset('/scripts/jquery-2.2.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/mmenu.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/chosen.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/rangeslider.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/counterup.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('/scripts/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/tooltips.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/custom.js')}}"></script>



    <!-- REVOLUTION SLIDER SCRIPT -->
    <script type="text/javascript" src="{{asset('/scripts/themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/themepunch.revolution.min.js')}}"></script>

    <script type="text/javascript">
        var tpj=jQuery;
        var revapi4;
        tpj(document).ready(function() {
            if(tpj("#rev_slider_4_1").revolution == undefined){
                revslider_showDoubleJqueryError("#rev_slider_4_1");
            }else{
                revapi4 = tpj("#rev_slider_4_1").show().revolution({
                    sliderType:"standard",
                    jsFileLocation:"scripts/",
                    sliderLayout:"auto",
                    dottedOverlay:"none",
                    delay:9000,
                    navigation: {
                        keyboardNavigation:"off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation:"off",
                        onHoverStop:"on",
                        touch:{
                            touchenabled:"on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        }
                        ,
                        arrows: {
                            style:"zeus",
                            enable:true,
                            hide_onmobile:true,
                            hide_under:600,
                            hide_onleave:true,
                            hide_delay:200,
                            hide_delay_mobile:1200,
                            tmp:'<div class="tp-title-wrap"></div>',
                            left: {
                                h_align:"left",
                                v_align:"center",
                                h_offset:40,
                                v_offset:0
                            },
                            right: {
                                h_align:"right",
                                v_align:"center",
                                h_offset:40,
                                v_offset:0
                            }
                        }
                        ,
                        bullets: {
                            enable:false,
                            hide_onmobile:true,
                            hide_under:600,
                            style:"hermes",
                            hide_onleave:true,
                            hide_delay:200,
                            hide_delay_mobile:1200,
                            direction:"horizontal",
                            h_align:"center",
                            v_align:"bottom",
                            h_offset:0,
                            v_offset:32,
                            space:5,
                            tmp:''
                        }
                    },
                    viewPort: {
                        enable:true,
                        outof:"pause",
                        visible_area:"80%"
                    },
                    responsiveLevels:[1200,992,768,480],
                    visibilityLevels:[1200,992,768,480],
                    gridwidth:[1180,1024,778,480],
                    gridheight:[640,500,400,300],
                    lazyType:"none",
                    parallax: {
                        type:"mouse",
                        origo:"slidercenter",
                        speed:2000,
                        levels:[2,3,4,5,6,7,12,16,10,25,47,48,49,50,51,55],
                        type:"mouse",
                    },
                    shadow:0,
                    spinner:"off",
                    stopLoop:"off",
                    stopAfterLoops:-1,
                    stopAtSlide:-1,
                    shuffle:"off",
                    autoHeight:"off",
                    hideThumbsOnMobile:"off",
                    hideSliderAtLimit:0,
                    hideCaptionAtLimit:0,
                    hideAllCaptionAtLilmit:0,
                    debugMode:false,
                    fallbacks: {
                        simplifyAll:"off",
                        nextSlideOnWindowFocus:"off",
                        disableFocusListener:false,
                    }
                });
            }
        });	/*ready*/


        //	var img = $('.team_people');
        //	for(var i=0;i<img.length;i++)
        //	{
        //		$(img[i]).mouseover(function(){
        //			console.log(i);
        //		});
        //	}
    </script>


    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS
        (Load Extensions only on Local File Systems !
        The following part can be removed on Server for On Demand Loading) -->
    <script type="text/javascript" src="{{asset('/scripts/extensions/revolution.extension.actions.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/extensions/revolution.extension.migration.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/extensions/revolution.extension.video.min.js')}}"></script>

</body>
</html>