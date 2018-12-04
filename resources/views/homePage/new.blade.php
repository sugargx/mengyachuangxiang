@extends('layout.homePageIndex')
@section('css')
    <link rel="stylesheet" href="{{asset('/css/new.css')}}">
@endsection
@section('content')
    <!--
    原版固定前端
    ----------------------------->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>新闻动态详情</h2><span></span>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{url('')}}">首页</a></li>
                            <li><a href="{{url('news')}}">新闻资讯</a></li>
                            <li>新闻详情</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row sticky-wrapper">
            <div class="col-lg-12 col-md-12 padding-right-30">

                <!-- Titlebar -->
                <div id="titlebar" class="listing-titlebar">
                    <div class="listing-titlebar-title">
                        {{--<h2>{{$new->title}}<span class="listing-tag">团体活动</span></h2>--}}
                        <div class="star-rating" data-rating="@if($new->comments_num!=null &&$new->comments_num!=0) {{round($new->star/$new->comments_num)}} @else 5 @endif">
                            <div class="rating-counter"><a href="">阅读量：{{$new->num}}次</a></div>
                        </div>
                    </div>
                </div>

                <!-- Overview -->
                <div id="listing-overview" class="listing-section">

                    {!! $new->content !!}

                </div>

                <!-- Share Buttons -->
                <ul class="share-buttons margin-top-40 margin-bottom-0">
                    <li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
                    <li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
                    <li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
                    <!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
                </ul>

                <!-- Reviews -->
                <div id="listing-reviews" class="listing-section">
                    <h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Reviews <span>({{count($comments)}})</span></h3>

                    <div class="clearfix"></div>

                    <!-- Reviews -->
                    <section class="comments listing-reviews">
                        <ul>
                            @foreach($comments as $comment)
                                <li>
                                    {{--没有头像！！--}}
                                    <div class="avatar"><img src="{{url('getImage')}}/{{$comment->image}}" alt="" /></div>
                                    <div class="comment-content"><div class="arrow-comment"></div>
                                        <div class="comment-by">{{$comment->name}}<span class="date">{{date('Y/m/d',$comment->time)}}</span>
                                            <div class="star-rating" data-rating="{{$comment->star}}"></div>
                                        </div>
                                        <p>{{$comment->comment}}</p>

                                        <div class="review-images mfp-gallery-container">
                                        <a href="{{url('getImage')}}/{{$comment->image}}" class="mfp-gallery"><img src="{{url('getImage')}}/{{$comment->image}}" alt=""></a>
                                        </div>
                                        {{--<a href="#" class="rate-review"><i class="sl sl-icon-like"></i> 赞<span>12</span></a>--}}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </section>

                    <!-- Pagination -->
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Pagination -->
                            <div class="pagination-container margin-top-30">
                                <nav class="pagination">

                                    {{$comments->links()}}

                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- Pagination / End -->
                </div>


                <!-- Add Review Box -->
                <div id="add-review" class="add-review-box">

                    <!-- Add Review -->
                    <h3 class="listing-desc-headline margin-bottom-20">添加评论</h3>

                    <span class="leave-rating-title">星星数</span>

                    <!-- Rating / Upload Button -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Leave Rating -->
                            <div class="clearfix"></div>
                            <form action="{{url('new')}}/{{$new->id}}/comment" id="add-comment" class="add-comment" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                            <div class="leave-rating margin-bottom-30">
                                <input type="radio" name="rating" id="rating-1" value="5"/>
                                <label for="rating-1" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-2" value="4"/>
                                <label for="rating-2" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-3" value="3"/>
                                <label for="rating-3" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-4" value="3"/>
                                <label for="rating-4" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-5" value="1"/>
                                <label for="rating-5" class="fa fa-star"></label>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-6">
                            <!-- Uplaod Photos -->
                            <div class="add-review-photos margin-bottom-30">
                            <div class="photoUpload">
                            <span><i class="sl sl-icon-arrow-up-circle"></i>上传图片</span>
                            <input type="file" class="upload" name="images">
                            </div>
                            </div>
                        </div>
                    </div>
                        <!-- Review Comment -->
                        <fieldset>
                            <div class="row">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <label>名字：</label>
                                    <input type="text" value="" name="name">
                                </div>

                                <div class="col-md-6">
                                    <label>邮箱：</label>
                                    <input type="text" value="" name="email">
                                </div>
                            </div>

                            <div>
                                <label>评论：</label>
                                <textarea cols="40" rows="3" name="comment"></textarea>
                            </div>

                        </fieldset>

                        <button class="button">提交</button>
                    </form>
                    <div class="clearfix"></div>
                    </form>

                </div>
                <!-- Add Review Box / End -->

            </div>

        </div>
    </div>

@endsection
