@extends('layout.index')

@section('content')

    <?php
        $jobs = \App\Job::get();
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>添加职务</h3></div>
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{url("jobManager")}}" method="post">
                        <div class="form-group">
                            <label>职务名称</label>
                            {{csrf_field()}}
                            <input type="text" class="form-control" name="job_name">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="确定添加" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>已有职务</h3></div>
                <div class="card-body">
                    <table class="table datatable">
                        <thead>
                        <tr>
                            <th>编号</th>
                            <th>职务名称</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{$job->id}}</td>
                                <td>{{$job->name}}</td>
                                <td>
                                    <a href="{{url('jobDel')}}/{{$job->id}}">
                                        <input type="button" class="btn btn-danger" value="删除">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection