@extends('layout.homePageIndex')

@section('css')
    <link rel="stylesheet" href="{{asset('/css/contact.css')}}">
    @endsection

@section('content')

<section id="contact">
    <div class="container">
        <div class="row">

            <div class="section-title text-center wow fadeInDown">
                <h2>联系我们</h2>
                <p>想让我们帮您做什么呢？萌芽科技在等您！</p>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-6 col-sm-12 wow fadeInLeft">
                <div class="contact-form clearfix">
                    <form action="{{route('contactPost')}}" method="post">
                        <div class="input-field">
                            <input type="text" class="form-control" name="name" placeholder="姓名" required="">
                            {{csrf_field()}}
                        </div>
                        <div class="input-field">
                            <input type="text" class="form-control" name="email" placeholder="邮箱" required="">
                        </div>
                        <div class="input-field message">
                            <textarea name="text" class="form-control" placeholder="内容" required=""></textarea>
                        </div>
                        <input type="submit" class="btn btn-blue pull-right" value="发送消息" id="msg-submit">
                    </form>
                </div>
            </div>

            <div class="col-md-6 col-sm-12 wow fadeInRight">
                <div class="contact-details">
                   <h2>联系方式</h2>
                </div>
                <div class="contact-details">
                    <p>地址：山东省淄博市张店区新村西路266号（山东理工大学西校区东门大红炉众创空间二层）</p>
                    <p>电话：0533-2888520</p>
                    <p>手机：13561669366（同微信）</p>
                    <p>邮箱：mail@mengyakeji.com</p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection