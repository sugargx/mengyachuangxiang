@extends('layout.index')
@section('css')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header"><h3>添加照片分类</h3></div>
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
                    <form class="form" action="{{url('imageType')}}" method="post">
                        <div class="form-group">
                            <label>照片类别</label>
                            {{csrf_field()}}
                            <input type="text" name="type_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="添加" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        $types = \App\ImageType::get();
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    所有分类
                </div>
                <div class="card-body">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>编号</th>
                                <th>图片类型</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($types as $type)
                                <tr>
                                    <td>{{$type->id}}</td>
                                    <td>{{$type->type_name}}</td>
                                    <td>
                                        <form action="{{url('imageType')}}/{{$type->id}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <input type="submit" value="删除" class="btn btn-danger btn-xs">
                                        </form>
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