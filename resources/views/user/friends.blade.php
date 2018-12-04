@extends('layout.userIndex')

@section('content')
    <?php
    $members = \App\Member::get();
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">我的同事们</div>
                <div class="card-body">
                    <table class="table datatable">
                        <thead>
                        <tr>
                            <th>姓名</th>
                            <th>团队</th>
                            <th>职务</th>
                            <th>个人空间</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            <tr>
                                <td>{{$member->name}}</td>
                                <td>@if($member->team_id==-1)无分组@else{{$member->team()->get()[0]->team_name}}@endif</td>
                                <td>@if(count($member->job()->get())>0){{$member->job()->get()[0]->name}}@endif</td>
                                <td>
                                    <a href="{{url('blogList')}}/{{$member->id}}" class="btn btn-primary btn-xs" role="button">
                                        博客
                                    </a>
                                    <a href="{{url('journalList')}}/{{$member->id}}" class="btn btn-primary btn-xs" role="button">
                                        日志
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
