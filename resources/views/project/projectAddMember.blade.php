@extends("layout.index")
@section("content")
    <?php
        $thisMembers = $project->members()->get();

    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><label class="label label-info">{{$project->name}}</label>成员</div>
                <div class="card-body">
                    @foreach($thisMembers as $member)
                        <label class="label label-primary">{{$member->name}}</label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card card-tab">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        <li role="tab1" style="width: 170px">
                            <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">添加项目成员</a>
                        </li>
                        <li role="tab2" style="width:160px">
                            <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">删除项目成员</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body no-padding tab-content">
                    <div role="tabpanel" class="tab-pane @if($tab==1){{"active"}}@endif" id="tab1">
                        <div class="row">
                            <div class="section">
                                <div class="section-title">
                                    <label class="label label-info">{{$project->name}}</label>添加项目成员
                                </div>
                                <div class="section-body" style="position:relative;padding-top: 70px">
                                    <form class="form-horizontal" method="post" style="" action="{{url('projectAddMember')}}/{{$project->id}}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="select" id="res">
                                        <table class="datatable table" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>选择</th>
                                                <th>账号</th>
                                                <th>姓名</th>
                                                <th>掌握的语言</th>
                                                <th>能力值</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($members as $member)
                                                @php
                                                    $flag = 0;
                                                @endphp
                                                <tr>
                                                    @foreach($thisMembers as $project_member)
                                                        @if($project_member->name==$member->name)
                                                            @php
                                                                $flag = 1;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                        @if($flag==1)
                                                            <td><input type="checkbox" value="{{$member->id}}" class="xuanze" disabled = "disabled"></td>
                                                        @else
                                                            <td><input type="checkbox" value="{{$member->id}}" class="xuanze"></td>
                                                        @endif
                                                    <td>{{$member->user_name}}</td>
                                                    <td>{{$member->name}}</td>
                                                    <td>{{$member->language}}</td>
                                                    <td>{{$member->ability}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        <div class="form-footer">
                                            <div class="form-group">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <input type="submit" class="btn btn-primary" value="确定添加" onclick="return check()">
                                                    <input type="button" class="btn btn-default" value="取消">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane @if($tab==2){{"active"}}@endif" id="tab2" style="padding-top: 100px">
                        <div class="section">
                            <div class="section-title">点击删除按钮删除</div>
                        </div>
                        <div class="section-body">
                            <table class="table">
                                <tr>
                                    <th>用户名</th>
                                    <th>姓名</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($thisMembers as $member)
                                    <tr>
                                        <td>{{$member->user_name}}</td>
                                        <td>{{$member->name}}</td>
                                        <td>
                                            <a href="{{url("projectDelMember")}}/{{$project->id}}/{{$member->id}}">
                                                <input type="button" class="btn btn-danger btn-xs" value="删除">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script type="text/javascript">
        function check() {
            var sum = 0;
            var str = "";
            var checkBox = document.getElementsByClassName('xuanze');
            for(var i = 0;i<checkBox.length;i++) {

                if(checkBox[i].checked){
                    if(sum!=0){
                        str += ",";
                    }
                    str += checkBox[i].value;
                    sum ++;
                }
            }
            document.getElementById('res').value = str;
            return true;
        }
    </script>
@endsection