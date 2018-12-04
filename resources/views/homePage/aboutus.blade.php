<!-- yxb添加 --!>

@extends('layout.homePageIndex')
@section('content')
    <!-- Titlebar
        ================================================== -->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>关于我们</h2><span></span>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="index.html">首页</a></li>
                            <li>关于我们</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>

    <!-- Content
    ================================================== -->
    <!-- Service Begin-->
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <img src="images/about1.jpg">
            </div>
            <div class="col-md-6 col-sm-12 about">
                <div class="about">
                    <h2>服务</h2>
                    <span>哈哈哈哈</span>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <img src="images/about1.jpg">
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="about">
                    <h2>服务</h2>
                    <span>哈哈哈哈</span>
                </div>
            </div>
        </div>
        <br>
        <br>

        <!--
  #count
  ========================== -->

        <section id="count">
            <div class="container">
                <div class="row">
                    <div class="counter-section clearfix">

                        <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.5s">
                            <div class="fact-item text-center">
                                <div class="fact-icon">
                                    <i class="im im-icon-Trophy"></i>
                                </div>
                                <span data-to="120">120</span>
                                <p>项目数量</p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.8s">
                            <div class="fact-item text-center">
                                <div class="fact-icon">
                                    <i class="im im-icon-Trophy"></i>
                                </div>
                                <span data-to="120">120</span>
                                <p>客户满意</p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-delay="1.1s">
                            <div class="fact-item text-center last">
                                <div class="fact-icon">
                                    <i class="im im-icon-Trophy"></i>
                                </div>
                                <span data-to="2500">2500</span>
                                <p>成立时间/天</p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-delay="1.3s">
                            <div class="fact-item text-center last">
                                <div class="fact-icon">
                                    <i class="im im-icon-Trophy"></i>
                                </div>
                                <span data-to="40">40</span>
                                <p>奖项成就</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--
        End #count
        ========================== -->
        <br>
        <br>
    </div>
@endsection