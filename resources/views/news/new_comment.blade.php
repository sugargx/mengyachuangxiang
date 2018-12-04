@extends("layout.index")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="flex-direction:column;justify-content: center;align-items:left">
                    <h3>所评论新闻：{{$new->tile}}</h3>
                </div>
                    <table class="datatable table table-striped primary dataTable no-footer" cellspacing="0"
                           width="100%" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"
                           style="width: 100%;">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                style="width: 100px;">姓名
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Position: activate to sort column ascending" style="width: 800px;">内容
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Office: activate to sort column ascending" style="width: 90px;">邮箱
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Start date: activate to sort column ascending" style="width: 66px;">时间
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Office: activate to sort column ascending" style="width: 90px;">状态
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Salary: activate to sort column ascending" style="width: 190px;">操作
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$comment->name}}</td>
                                <td>{{$comment->comment}}</td>
                                <td>{{$comment->email}}</td>
                                <td>{{date('Y/m/d',$comment->time)}}</td>
                                <td>@if($comment->pass==1)通过@elseif($comment->pass==0)待审核@elseif($comment->pass==-1)未通过@endif</td>
                                <td><a href="{{url('commentpass')}}/{{$new->id}}/{{$comment->id}}/1">
                                        <input type="button" class="btn btn-xs btn-success" value="通过">
                                    </a><a href="{{url('commentpass')}}/{{$new->id}}/{{$comment->id}}/-1">
                                        <input type="button" class="btn btn-xs btn-info" value="不通过">
                                    </a>
                                    <a href="{{url('commentpass')}}/{{$new->id}}/{{$comment->id}}/delete">
                                        <input type="button" class="btn btn-xs btn-danger" value="删除">
                                    </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection