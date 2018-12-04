@extends("layout.userIndex")
@section("content")
    <?php
        $flag = 0;
        $member = \App\Member::find(session('id'));
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>密码修改</h3></div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body" style="padding: 30px 15%;">
                    <form class="form form-horizontal" method="post" action="{{route('passwordEdit')}}">
                        <input type="hidden" name="id" value="{{$member->id}}">
                        <div class="form-group">
                            <label class="col-md-2">请输入原密码</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="" name="oldPassword">
                                {{csrf_field()}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">请输入新的密码</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">请再次输入</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-footer">
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <input type="submit" class="btn btn-primary" value="确定修改">
                                    <input type="button" class="btn btn-default" value="取消">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection