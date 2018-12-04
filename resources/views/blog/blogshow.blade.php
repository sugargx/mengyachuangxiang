@extends("layout.userIndex")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="flex-direction:column;justify-content: center;align-items:center">
                    <h1 style="margin-bottom: 20px;">{{$blog->title}}</h1>
                    <div class="view-meta">
                        <span>发布时间: {{date("Y-m-d H:i:s",$blog->time)}}</span>
                        @if(count($blog->member()->get())>0)
                            <span>作者: {{$blog->member()->get()[0]->name}}</span>
                            @endif
                    </div>
                </div>
                <div class="card-body" style="padding: 30px 16.666666667%">
                    {!! $blog->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection