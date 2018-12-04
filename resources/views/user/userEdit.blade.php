@extends("layout.userIndex")
@section("content")
    <?php
        $flag = 0;
        $member = \App\Member::find(session('id'));
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>请填写新的信息</h3></div>
                <div class="card-body" style="padding: 30px 15%">
                    <form class="form form-horizontal" method="post" action="{{route('userEdit')}}" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{$member->id}}">
                        <div class="form-group">
                            <label class="col-md-2">姓名</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="{{$member->name}}" name="name">
                                {{csrf_field()}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">电话号码</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="{{$member->phone}}" name="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">邮箱</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="{{$member->email}}" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">出生日期</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="date" class="form-control" value="{{date('Y-m-d',$member->age)}}" name="age">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">入职时间</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="date" class="form-control" value="{{date('Y-m-d',$member->time)}}" name="time">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">掌握的编程语言</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="{{$member->language}}" name="language">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">个人介绍</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="{{$member->introduction}}" name="introduction">
                            </div>
                        </div>
                        <!----------------->
                        <div class="form-group">
                            <label class="col-md-2">更换头像</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="file"  name = "change_image" class="form-control">
                            </div>
                        </div>
                        <!----------------->
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