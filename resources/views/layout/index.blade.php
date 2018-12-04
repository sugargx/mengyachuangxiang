<!DOCTYPE html>
<html>
<head>
  <title>萌芽科技后台管理系统</title>
  
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
    <a class="sidebar-brand" href="#"><span class="highlight">萌芽科技</span>后台管理</a>
    <button type="button" class="sidebar-toggle">
      <i class="fa fa-times"></i>
    </button>
  </div>
  <div class="sidebar-menu">
    <ul class="sidebar-nav">
      <li class="active">
        <a href="{{route("index")}}">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">控制台首页</div>
        </a>
      </li>
      <li class="dropdown">
        <a href="{{route("member.index")}}">
          <div class="icon">
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
          <div class="title">人员管理</div>
        </a>
        <div class="dropdown-menu">
          <ul>
            <li><a href="{{route('member.index')}}">人员管理</a></li>
            <li><a href="{{route('memberAuditing')}}">新用户审核</a></li>
            <li><a href="{{route('jobManager')}}">职务管理</a></li>
            <li><a href="{{route('memberList')}}">能力评估</a></li>
          </ul>
        </div>
      </li>
      <li class="dropdown">
        <a href="{{route("team.index")}}">
          <div class="icon">
            <i class="fa fa-group" aria-hidden="true"></i>
          </div>
          <div class="title">团队管理</div>
        </a>
      </li>
      <li class="dropdown">
        <a href="{{route('project.index')}}">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">项目管理</div>
        </a>
        <div class="dropdown-menu">
          <ul>
            <li><a href="{{url('project')}}">全部项目</a></li>
            <li><a href="{{url('projectGetByStatus/2')}}">已完成项目</a></li>
            <li><a href="{{url('projectGetByStatus/1')}}">正在进行项目</a></li>
            <li><a href="{{url('projectGetByStatus/0')}}">待处理项目</a></li>
          </ul>
        </div>
      </li>
      <li class="dropdown">
        <a href="{{route('newsList')}}">
          <div class="icon">
            <i class="fa fa-file-o" aria-hidden="true"></i>
          </div>
          <div class="title">首页管理</div>
        </a>
        <div class="dropdown-menu">
          <ul>
            <li>
              <a href="{{route('ppts.index')}}">首页幻灯片管理</a>
              <a href="{{route('news.create')}}">发布最新动态</a>
              <a href="{{route('newsList')}}">全部文章</a>
              <a href="{{route('image.index')}}">照片管理</a>
              <a href="{{route('imageType.index')}}">照片类别管理</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="dropdown">
        <a href="{{route('leaveMessage')}}">
          <div class="icon">
            <i class="fa fa-comments" aria-hidden="true"></i>
          </div>
          <div class="title">客户留言</div>
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
        <li class="navbar-title">萌芽科技成员管理系统</li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown profile">
          <a href="/html/pages/profile.html" class="dropdown-toggle"  data-toggle="dropdown">
            <img class="profile-img" src="{{url('getImage')}}/{{$member->image}}">
            <div class="title">Profile</div>
          </a>
          <div class="dropdown-menu">
            <div class="profile-info">
              <h4 class="username">管理员您好</h4>
            </div>
            <ul class="action">
              <li>
                <a href="{{route('informationReflesh')}}">
                  信息修改
                </a>
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