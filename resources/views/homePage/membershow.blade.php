@extends('layout.homePageIndex')

@section('content')
    <!-- Titlebar
        ================================================== -->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>成员介绍</h2><span></span>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{route('homePageIndex')}}">首页</a></li>
                            <li>成员展示</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row">

            <!-- Search -->
            <div class="col-md-12">
                <form action="{{url('membershow')}}" method="post">
                    {{csrf_field()}}
                <div class="main-search-input gray-style margin-top-0 margin-bottom-10">
                    <div class="main-search-input-item">
                        <input type="text" placeholder="姓名" value=""name="name">
                    </div>

                    <div class="main-search-input-item">
                        <select data-placeholder="All Categories" class="chosen-select" name="status">
                            <option value="">状态</option>
                            <option value="1">在职中</option>
                            <option value="0">已毕业</option>
                        </select>
                    </div>
                    @php
                        $jobs = \App\Job::get();
                    @endphp
                    <div class="main-search-input-item">
                        <select data-placeholder="All Categories" class="chosen-select" name="job">
                            <option value="">方向</option>
                            @foreach($jobs as $job)
                            <option value = "{{$job->id}}">{{$job->name}}</option>
                            @endforeach
                        </select>
                    </div>
                        <button class="button">查找</button>
                    </form>
                </div>
            </div>
            <!-- Search Section / End -->

            <div class="row">
                @foreach($members as $member)
                    @php
                    $job =$member->job()->get()[0];
                    @endphp
                <!-- Listing Item -->
                <div class="col-lg-6 col-md-12 people_show">
                    <div class="avatar"><img src="{{url('getImage')}}/{{$member->image}}" alt="" style="margin-left: 20px;"></div>
                    <div class="comment-content"><div class="arrow-comment"></div>
                        <div class="comment-by">{{$member->name}} &nbsp;&nbsp;&nbsp;&nbsp;
                            <strong>
                                   {{$job->name}}
                            </strong>
                        </div>
                        <div>状态：
                            @if($member->isstudent==1)
                                在职中
                            @endif
                            @if($member->isstudent==0)
                                已毕业
                            @endif
                        </div>
                        <p>简要介绍 &nbsp;
                           @if($member->introduction==null)
                            这个人很忙，还没有来得及写个人介绍
                            @endif
                            @if($member->introduction != null)
                            {{$member->introduction}}
                            @endif
                        </p>

                        <div class="review-images mfp-gallery-container">
                            <a href="images/review-image-01.jpg" class="mfp-gallery"><img src="images/review-image-01.jpg" alt="" title="项目图片或其他"></a>
                            <a href="images/review-image-01.jpg" class="mfp-gallery"><img src="images/review-image-01.jpg" alt="" title="项目图片或其他"></a>
                            <a href="images/review-image-01.jpg" class="mfp-gallery"><img src="images/review-image-01.jpg" alt="" title="项目图片或其他"></a>
                        </div>
                        <a href="{{url('memberdetail')}}/{{$member->id}}" class="rate-review"><i class="sl sl-icon-plus"></i>有兴趣查看更多</a>
                    </div>
                </div>
                <!-- Listing Item / End -->
                    @endforeach
            </div>
            <!-- Pagination -->
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Pagination -->

                    <div class="pagination-container margin-top-20 margin-bottom-40">

                                <nav class="pagination">
                                {{$members->links()}}
                                </nav>

                    </div>
                </div>
            </div>
            <!-- Pagination / End -->

        </div>

    </div>
    </div>

@endsection