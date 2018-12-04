@extends('layout.homePageIndex')
@section('content')
    <!-- Titlebar
        ================================================== -->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>项目展示</h2><span></span>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{url('/')}}">首页</a></li>
                            <li>项目展示</li>
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
                <form action="{{url('lookforproject')}}" method="get" >

                <div class="main-search-input gray-style margin-top-0 margin-bottom-10">

                    <div class="main-search-input-item">
                        <input type="text" placeholder="项目名称" value="" name="name">
                    </div>

                    <div class="main-search-input-item">
                        <select data-placeholder="All Categories" class="chosen-select"  name="kind">
                            <option  value="0">类型</option>
                            <option  value="1">小程序</option>
                            <option  value="2">web网页</option>
                            <option  value="3">LOGO设计</option>
                        </select>
                    </div>
                    <button class="button">查找</button>
                </div>
                </form>
            </div>

            <!-- Search Section / End -->
            <br><br><br><br><br>
            <div class="row">
                <!-- Listing Item -->
                @foreach($projects as $project)

                <div class="col-lg-4 col-md-6">
                    <a href="{{url('project_detail')}}/{{$project->id}}" class="listing-item-container compact">
                        <div class="listing-item">
                            <?php
                            if($project->project_img == null)
                                $path = asset('/img/programe.jpg');
                            else
                                $path = url('getImage') ."/". $project->project_img;
                            ?>
                            <img src="{{$path}}">
                            <div class="listing-item-details">
                                <ul>
                                    <li>日期：{{date('Y/m/d',$project->end_time)}}</li>
                                </ul>
                            </div>
                            <div class="listing-item-content">
                                <h3>项目名字：{{str_limit($project->name,14,'...')}}</h3>
                                <span>简介:{{str_limit($project->introduce,20,'...')}}</span>
                            </div>
                        </div>
                    </a>
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
                            {{$projects->links()}}
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Pagination / End -->
        </div>
    </div>
    </div>

@endsection