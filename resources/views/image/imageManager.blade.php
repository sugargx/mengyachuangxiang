@extends('layout.index')
@section('css')
    <style type="text/css">
        .image{
            width: 400px;
            height: 300px;
            position: relative;
            float: left;
            margin: 5px;
            overflow: hidden;
        }
        .image .image-inner{
            width: 100%;
            height: 100%;
            background-color: rgba(39, 174, 96, 0);
            position: absolute;
            text-align: center;
            top: -300px;
            left: -400px;
            transition-duration: 1s;
            transition-property: all;
        }
        .image-innerAfter{
            background-color: rgba(39, 174, 96, 0.75) !important;
            top: 0px !important;
            left: 0px !important;
        }
        .image .image-img{
            width:100%;
            height: 100%;
        }
        .image .image-inner h5{
            color: #2c3e50;
            border-bottom: 1px solid #fff;
        }
        .image .image-inner p{
            color: white;
        }
    </style>
    @endsection

@section('content')

    <?php
        $types = \App\ImageType::get();
    ?>
    <div style="width: 95%;margin: auto">
        <div class="card">

            <div class="card-header"><h3>图片墙照片上传</h3></div>
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
                <form class="form" action="{{url('image')}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        {{csrf_field()}}
                        <label>请选择您要上传的图片</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <label>图片类型</label>
                        <select name="image_type" class="select2">
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->type_name}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>照片描述</label>
                        <textarea class="form-control" name="introduction"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="上传" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        $images = \App\Image::orderBy("id","desc")->get();
    ?>
    <div style="width: 96%;margin: 50px auto">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>所有图片</h3></div>
                <div class="card-body" style="overflow: hidden">
                @foreach($images as $image)
                    <div class="image">
                        <div class="image-inner">
                            <h5>照片墙照片</h5>
                            <p>{{$image->introduction}}</p>
                            <form action="{{url('image')}}/{{$image->id}}" method="post" style="display: inline">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input  type="submit" value="删除" class="btn btn-danger">
                            </form>

                        </div>
                        <img class="img-responsive" src="{{url('getImage')}}/{{$image->path}}" alt="" style="min-width: 194px;">
                    </div>
                @endforeach



                </div>
            </div>
        </div>
    </div>
    <script>
        var items = document.getElementsByClassName('image');
        for(i = 0;i<items.length;i++){
            +function(item){
                var inner = item.getElementsByClassName('image-inner')[0];
                item.onmouseover = function(){
                    inner.classList.add("image-innerAfter");
                };
                item.onmouseout = function(){
                    inner.classList.remove("image-innerAfter");
                };

            }(items[i]);
        }

    </script>
    @endsection