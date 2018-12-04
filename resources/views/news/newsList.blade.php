@extends("layout.index")
@section('css')
    <style type="text/css">
        .pagination{
            margin-bottom: 10px;
            margin-left: 50%;
        }
        .thumbnail{
            width: 300px;
        }
        .thumbnail img{
            width: 100%;
            height: 100% !important;
        }
        .thumbnail img:hover{
            transform: scale(1.2);
            transition: all 0.8s linear;
        }
        .show{
            display: block;
            height: 194px;
            overflow: hidden;
        }
        .title{
            height: 30px;
            overflow: hidden;
        }
        .news{
            float: left;
        }
    </style>
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>动态列表</h3></div>
                <div class="card-body" style="padding: 0 10%; display: flex;justify-content: space-around; flex-wrap: wrap;">
                    <div class="col-md-12 ">
                    <?php
                        $i = 0;
                        $flag = 0;
                    ?>
                    @foreach($pageRes as $new)
                        @if($i%4==0)
                            <?php
                                $flag = 0;
                            ?>
                        @endif
                        <div class="news">
                            <div class="thumbnail">
                                <a href="{{url('news')}}/{{$new->id}}" class="show">
                                <img src="{{url('getImage')}}/{{$new->img}}" class="img-responsive">
                                </a>
                                <div class="caption">
                                    <a href="{{url('newShow')}}/{{$new->id}}" style="color: black"><h5 class="title">{{$new->title}}</h5></a>
                                    <p class="description" style="display: none">
                                       <?php
                                            echo mb_substr(strip_tags($new->content),0,20,'utf-8');
                                        ?>
                                    </p>
                                    <div>

                                        @if($new->isshow==0)

                                            <a href="{{url("news_true")}}/{{$new->id}}" class="btn  btn-warning btn-xs" role="button">设为推荐</a>

                                        @endif
                                         @if($new->isshow==1)

                                                <a href="{{url("news_false")}}/{{$new->id}}" class="btn btn-default btn-xs" role="button">取消推荐</a>

                                        @endif
                                        <a href="{{url("news")}}/{{$new->id}}/edit" class="btn btn-success btn-default btn-xs" role="button">修改</a>
                                        <a href="{{url("newcomment")}}/{{$new->id}}" class="btn btn-success btn-default btn-xs" role="button">评论管理</a>
                                        <form action="{{url('news')}}/{{$new->id}}" method="post" style="display: inline">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <input type="submit" class="btn btn-danger btn-xs" role="button" onclick="return confirm('您确定要删除吗？')" value="删除"></input>
                                        </form>
                                        </div>
                                </div>
                            </div>
                        </div>
                            @if(($i+1)%4==0)
                                <?php
                                $flag = 1;
                                ?>
                            @endif
                        <?php
                                $i++;
                            ?>
                        @endforeach
                        @if($flag==0)
                            @endif
                    </div>
                        {{$pageRes->render()}}

                </div>
            </div>
        </div>
    </div>
    @endsection