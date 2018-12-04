@extends('layout.index')
@section('css')
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <table class="datatable table">
                        <thead>
                        <tr>
                            <th>技能名称</th>
                            <th>星级评分</th>
                            <th>删除</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($skills as $skill)
                            <tr>
                                <td>{{$skill->name}}</td>
                                <td><div class="star-rating" data-rating="{{$skill->score}}"
                                            </div>
                                </td>
                                <td>
                                    <form action="{{url('skill')}}/{{$skill->id}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <input type="submit" value="删除" class="btn btn-xs btn-danger">
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
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card" style="overflow: hidden">
                <div class="card-header"></div>
                <div class="card-body">
                    <form action="{{url('skill')}}" method="post">
                        <div class="form-group">
                            <label class="col-md-3 control-label">技能名称</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="skillName">
                                <input type="hidden" value="{{$id}}" name="member_id">
                                {{csrf_field()}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">技能估分</label>
                            <div class="col-md-9">
                               <select class="select2"  name="web_later">
                                   <option >请选择对应的星级</option>
                                   <option value="1">1星级</option>
                                   <option value="2">2星级</option>
                                   <option value="3">3星级</option>
                                   <option value="4">4星级</option>
                                   <option value="5">5星级</option>
                               </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="添加" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('/scripts/jquery-2.2.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/scripts/custom.js')}}"></script>

@endsection