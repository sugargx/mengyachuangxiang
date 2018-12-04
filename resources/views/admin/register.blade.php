<!DOCTYPE html>
<html>
<head>
  <title>账号注册</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/vendor.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/flat-admin.css')}}">

  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/theme/blue-sky.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/theme/blue.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/theme/red.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/theme/yellow.css')}}">

</head>
<body>
  <div class="app app-default">

<div class="app-container app-login">
  <div class="flex-center">
    <div class="app-header"></div>
    <div class="app-body">
      <div class="loader-container text-center">
          <div class="icon">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
              </div>
            </div>
          <div class="title">Logging in...</div>
      </div>
      <div class="app-block">
        <div class="app-right-section">
          <div class="app-brand"><span class="highlight">萌芽科技</span> Admin</div>
          <div class="app-info">
            
            <ul class="list">
              <li>
                <div class="icon">
                  <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                </div>
                <div class="title"><b>专业</b></div>
              </li>
              <li>
                <div class="icon">
                  <i class="fa fa-cubes" aria-hidden="true"></i>
                </div>
                <div class="title"><b>专注</b></div>
              </li>
              <li>
                <div class="icon">
                  <i class="fa fa-usd" aria-hidden="true"></i>
                </div>
                <div class="title"><b>品牌</b></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="app-form">
          <div class="form-suggestion">
            Create an account for free.
          </div>
          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form action="{{url('register')}}" method="POST">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                  <i class="fa fa-paper-plane" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="姓名" aria-describedby="basic-addon1" name="name">
                {{csrf_field()}}
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">
                  <i class="fa fa-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="用户名" aria-describedby="basic-addon2" name="user_name">
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">
                  <i class="fa fa-key" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="密码" aria-describedby="basic-addon3" name="password">
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon4">
                  <i class="fa fa-check" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="再次输入密码" aria-describedby="basic-addon4" name="password_confirmation">
              </div>
              <div class="text-center">
                  <input type="submit" class="btn btn-success btn-submit" value="注册">
              </div>
          </form>
          <div class="form-line">
            <div class="title">OR</div>
          </div>
          <div class="form-footer">
            <div class="text-center">
              <a href="{{route('login')}}">
                <input type="button" class="btn btn-success" value="已有账号快去登录吧">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="app-footer">
    </div>
  </div>
</div>

  </div>
  

  <script type="text/javascript" src="{{asset('/assets/js/app.js')}}"></script>

</body>
</html>