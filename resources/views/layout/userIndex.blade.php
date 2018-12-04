<!DOCTYPE html>
<html>
<head>
    <title>萌芽科技用户个人中心</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/vendor.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/flat-admin.css")}}">

    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/theme/blue-sky.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/theme/blue.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/theme/red.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/theme/yellow.css")}}">
    <style type="text/css">
        th::after{
            content: "" !important;
        }
    </style>
    @yield("css")
</head>
<body>
<div class="app app-default">
    <?php
        $member = \App\Member::find(session('id'));
    ?>
    <aside class="app-sidebar" id="sidebar">
        <div class="sidebar-header">
            <a class="sidebar-brand" href="#"><span class="highlight">萌芽科技</span>个人中心</a>
            <button type="button" class="sidebar-toggle">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="sidebar-menu">
            <ul class="sidebar-nav">
                <li class="active">
                    <a href="{{route('userIndex')}}">
                        <div class="icon">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                        </div>
                        <div class="title">我的首页</div>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('userEdit')}}">
                        <div class="icon">
                            <i class="fa fa-gear" aria-hidden="true"></i>
                        </div>
                        <div class="title">个人设置</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="{{route('userEdit')}}">个人信息修改</a></li>
                            <li><a href="{{route('passwordEdit')}}">密码修改</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{url('journal')}}">
                        <div class="icon">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                        <div class="title">成长记录</div>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="{{route('blog.create')}}">写博客</a></li>
                                <li><a href="{{route('journal.create')}}">写日志</a></li>
                                <li><a href="{{url('blog')}}">我的博客</a></li>
                                <li><a href="{{url('journal')}}">我的日志</a></li>
                            </ul>
                        </div>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('myProject')}}">
                        <div class="icon">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                        </div>
                        <div class="title">我的项目</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="{{url('myProject')}}">我的项目</a></li>
                            <li><a href="{{url('myProjectfinish')}}">已完成项目</a></li>
                            <li><a href="{{url('myProjectworking')}}">正在进行项目</a></li>
                            <li><a href="{{url('myProjectwaiting')}}">待处理项目</a></li>

                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{route('myTeam')}}">
                        <div class="icon">
                            <i class="fa fa-group" aria-hidden="true"></i>
                        </div>
                        <div class="title">我的团队</div>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('friends')}}">
                        <div class="icon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="title">我的同事们</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidebar-footer">
            <ul class="menu">
                <li>
                    <a href="/" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                    </a>
                </li>
                <li><a href="#"><span class="flag-icon flag-icon-th flag-icon-squared"></span></a></li>
            </ul>
        </div>
    </aside>

    <script type="text/ng-template" id="sidebar-dropdown.tpl.html">
        <div class="dropdown-background">
            <div class="bg"></div>
        </div>
        <div class="dropdown-container">
        </div>
    </script>

    <div class="app-container">

        <nav class="navbar navbar-default" id="navbar">
            <div class="container-fluid">
                <div class="navbar-collapse collapse in">
                    <ul class="nav navbar-nav navbar-mobile">
                        <li>
                            <button type="button" class="sidebar-toggle">
                                <i class="fa fa-bars"></i>
                            </button>
                        </li>
                        <li class="logo">
                            <a class="navbar-brand" href="#"><span class="highlight">Flat v3</span> Admin</a>
                        </li>
                        <li>
                            <button type="button" class="navbar-toggle">
                                <img class="profile-img" src="{{asset('/assets/images/profile.png')}}">
                            </button>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-left">
                        <li class="navbar-brand">
                            <img src="{{asset('/images/logo.png')}}" width="200px">
                        </li>
                        <li class="navbar-title">欢迎您{{$member->name}}</li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown profile">
                            <a href="/html/pages/profile.html" class="dropdown-toggle"  data-toggle="dropdown">
                                <img class="profile-img" src="{{url('getImage')}}/{{$member->image}}">
                                <div class="title">Profile</div>
                            </a>
                            <div class="dropdown-menu">
                                <div class="profile-info">
                                    <h4 class="username">{{$member->name}}您好</h4>
                                </div>
                                <ul class="action">
                                    <li><!------------------------------->
                                        <a href="{{route('userEdit')}}">
                                            信息修改
                                        </a>
                                        <!------------------------------->
                                    </li>
                                    <li>
                                        <a href="{{route('logout')}}">
                                            退出
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--悬浮工具-->
        <div class="btn-floating" id="help-actions">
            <div class="btn-bg"></div>
            <button type="button" class="btn btn-default btn-toggle" data-toggle="toggle" data-target="#help-actions">
                <i class="icon fa fa-plus"></i>
                <span class="help-text">Shortcut</span>
            </button>
            <div class="toggle-content">
                <ul class="actions">
                    <li><a href="#">Website</a></li>
                    <li><a href="#">Documentation</a></li>
                    <li><a href="#">Issues</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>
        </div>

        @yield("content")




        <footer class="app-footer">
            <div class="row">
                <div class="col-xs-12">
                    <div class="footer-copyright">
                        Copyright © 2016 Company Co,Ltd.
                    </div>
                </div>
            </div>
        </footer>


    </div>

</div>

<script type="text/javascript" src="{{asset("/assets/js/vendor.js")}}"></script>
<script type="text/javascript" src="{{asset("/assets/js/app.js")}}"></script>

</body>
</html>