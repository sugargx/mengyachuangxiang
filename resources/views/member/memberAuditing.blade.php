@extends('layout.index')

@section('content')
    <div class = "row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>新用户审核</h3></div>
                <div class="card-body">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>编号</th>
                                <th>账号</th>
                                <th>姓名</th>
                                <th>审核</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <td>{{$member->id}}</td>
                                    <td>{{$member->user_name}}</td>
                                    <td>{{$member->name}}</td>
                                    <td>
                                        <a href="{{url('memberAuditing')}}/{{$member->id}}">
                                            <input type="button" value="通过" class="btn btn-success btn-xs" onclick="return confirm('您确定审核通过吗？')">
                                        </a>
                                        <a href="{{url('memberAuditingNO')}}/{{$member->id}}">
                                            <input type="button" value="不通过" class="btn btn-danger btn-xs" onclick="return confirm('您确定驳回审核吗？')">
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