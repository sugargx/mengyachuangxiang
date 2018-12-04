@extends('layout.homePageIndex')

@section('content')
    <section id="pricing">
        <div id="titlebar" class="gradient">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <h2>新闻资讯</h2><span></span>

                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="{{url('/')}}">首页</a></li>
                                <li>新闻资讯</li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- Sorting - Filtering Section -->
                    <div class="row margin-bottom-25 margin-top-30">

                        <div class="col-md-6">
                        </div>

                        {{--<div class="col-md-6">--}}
                            {{--<div class="fullwidth-filters">--}}
                                {{--<!-- Sort by -->--}}
                                {{--<div class="sort-by">--}}
                                    {{--<div class="sort-by-select">--}}
                                        {{--<select data-placeholder="Default order" class="chosen-select-no-single">--}}
                                            {{--<option><a href="#">团队大事记</a> </option>--}}
                                            {{--<option><a href="#">团队活动</a></option>--}}
                                            {{--<option>标签分类</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- Sort by / End -->--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    </div>
                    <!-- Sorting - Filtering Section / End -->

                    <!-- Listing Item -->
                    @foreach($news as $new)
                    <div class="col-lg-12 col-md-12">
                        <div class="listing-item-container list-layout">
                            <a href="{{url('new')}}/{{$new->id}}" class="listing-item">

                                <!-- Image -->
                                <div class="listing-item-image">
                                    <img src="{{url('getImage')}}/{{$new->img}}" alt="">
                                    {{--<span class="tag">团体活动</span>--}}
                                </div>

                                <!-- Content -->
                                <div class="listing-item-content">
                                    {{--<div class="listing-badge now-open">lastest</div>--}}

                                    <div class="listing-item-inner">
                                        <h3>{{$new->id}}</h3>
                                        <span>{{str_limit(strip_tags($new->content),30,'...')}}</span>
                                        <div class="star-rating" data-rating = "@if($new->comments_num!=null &&$new->comments_num!=0) {{round($new->star/$new->comments_num)}} @else 5 @endif">
                                            <div class="rating-counter">阅读量：{{$new->num}}次</div>
                                        </div>
                                    </div>
                                    <div class="listing-item-details">{{date('Y/m/d',$new->time)}}</div>
                                    {{--<span class="like-icon"></span>--}}
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    <!-- Listing Item / End -->

                    <!-- Pagination -->
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Pagination -->
                            <div class="pagination-container margin-top-20 margin-bottom-40">
                                <nav class="pagination">
                                    {{$news->links()}}
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination / End -->
                </div>
            </div>
        </div>
</section>
@endsection
