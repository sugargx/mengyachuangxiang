@extends("layout.index")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    团队信息修改<label class="label-primary label">当组长为：{{$team->captain}}</label>
                </div>
                <div class="card-body">

                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('team')}}/{{$team->id}}">
                        {{method_field("PUT")}}
                        <div class="form-group">
                            <label class="col-md-2 col-sm-12">团队名称</label>
                            <div class="col-md-8 col-sm-12">
                                {{csrf_field()}}
                                <input type="text" name="team_name" class="form-control" value="{{$team->team_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 col-sm-12">图片介绍</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="file" name="team_img" class="form-control">
                            </div>

                        </div>
                        <div class="form-group">

                            <label class="col-md-2 col-sm-12">组长</label>
                            <div class="col-md-8 col-sm-12">
                                <select class="select2 form-control" name="captain">
                                    <option value="{{$team->captain}}">{{$team->captain}}</option>
                                    @foreach($members as $member)
                                        <option value="{{$member->name}}">{{$member->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 col-sm-12">团队简介</label>
                            <div class="col-md-8 col-sm-12">
                                <textarea rows="20" name="team_intro" class="form-control">{{$team->introduction}}</textarea>
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