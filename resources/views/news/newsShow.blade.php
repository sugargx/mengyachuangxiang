@extends("layout.index")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="flex-direction:column;justify-content: center;align-items:center">
                    <h1 style="margin-bottom: 20px;">{{$new->title}}</h1>
                    <div class="view-meta"><span>发布时间: {{date("Y-m-d H:i:s",$new->time)}}</span></div>
                </div>
                <div class="card-body" style="padding: 30px 16.666666667%">
                    {!! $new->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection