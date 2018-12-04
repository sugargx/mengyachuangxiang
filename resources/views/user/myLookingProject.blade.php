@extends('layout.userindex')
@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header"><i class="icon fa fa-user" aria-hidden="true"></i>项目详情信息</div>
            <div class="card-body __indent">
                <form class="form form-horizontal" method="post" action="">

                    <div class="section">
                        <div class="section-body">

                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="col-md-3">项目名称</td>
                                    <td>
                                        {{$project->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">合作伙伴</td>
                                    <td>
                                        {{$project->partner}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">开始时间</td>
                                    <td>
                                        {{date("Y-m-d",$project->start_time)}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">截止时间</td>
                                    <td>
                                        {{date("Y-m-d",$project->end_time)}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">项目介绍</td>
                                    <td>
                                        {{$project->introduction}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">我的贡献</td>
                                    <td>
                                        <?php
                                            $con = \App\Contribution::where('member_id','=',session('id'))->where('project_id','=',$project->id)->get();
                                        ?>
                                        @if(count($con)>0){{$con[0]->introduction}}@endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>编辑我的贡献</label>
                                    {{csrf_field()}}
                                    <textarea name="introduction" class="form-control"></textarea>
                                </div>
                                <input type="submit" value="完成" class="btn btn-success">
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

