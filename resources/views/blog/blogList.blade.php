@extends('layout.userIndex')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">我的博客</div>
                <div class="card-body">
                    <table class="datatable table">
                        <thead>
                        <th>日期</th>
                        <th>标题</th>
                        <th>作者</th>
                        <th>操作</th>
                        </thead>
                        <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{date("Y-m-d H:i:s","$blog->time")}}</td>
                                <td>
                                    <a href="{{url('blog')}}/{{$blog->id}}">
                                        {{$blog->title}}
                                    </a>
                                </td>
                                <td>{{$member->name}}</td>
                                <td>
                                    @if($id==session('id'))

                                        <a href="{{url('blog')}}/{{$blog->id}}/edit" class="btn btn-success btn-default btn-xs" role="button">修改</a>
                                        <form action="{{url('blog')}}\{{$blog->id}}" method="post" style="display: inline">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <input type="submit" class="btn btn-danger btn-xs" role="button" onclick="return confirm('您确定要删除吗？')" value="删除">
                                        </form>
                                    @else
                                        <a href="{{url('blogShow')}}/{{$blog->id}}" class="btn btn-primary btn-xs" role="button">查看</a>
                                    @endif
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