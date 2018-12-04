<?php

namespace App\Http\Controllers;

use App\New_comment;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("news.UEditor");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title'=>'required|max:30',
            'editorValue'=>'required',
            'img'=>'required'
        ]);
        $new = new News();
        $new->title = $request->input('title');
        $new->content = $request->input('editorValue');
        $new->time = time();
        $new->member_id = session('id');
        $img = $request->file('img');
        $new->img = $img->store('images');
        $new->save();
        return redirect()->route('newsList');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $new = News::find($id);
        return view('news.newsShow')->with(['new'=>$new]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $new = News::find($id);
        return view('news.newEdit')->with(['new'=>$new]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $new = News::find($id);
        $new->title = $request->input('title');
        $new->content = $request->input('editorValue');
        $new->time = time();
        $new->member_id = session('id');
        $img = $request->file('img');
        if($img&&$img->isValid())
            $new->img = $img->store('images');
        $new->save();
        return redirect()->route('newsList');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $new = News::find($id);
        $new->delete();
        return redirect()->back();
    }



    public function newsList(){
        $pageRes = News::orderBy('time','desc')->paginate(8);
        return view('news.newsList')->with(['pageRes'=>$pageRes]);
    }

    // yxb
    public function news_true($id){
        $allnews = News::where('isshow','=','1')->get();
        $new = News::find($id);
        if(count($allnews) <4){
            $new->isshow = 1;
            $new->save();
            return redirect('newsList');
        }
        else{
            echo "<script>alert('主页推荐页面允许最多推荐四个');
                window.location.href=\"" .url('newsList')."\"</script>";
        }

    }
    public function news_false($id){
        $new = News::find($id);
        $new->isshow = 0;
        $new->save();
        return redirect('newsList');
    }
    public function newcomment($id){
        $commets = New_comment::where('new_id','=',$id)->get();
        $new = News::find($id);
        return view('news.new_comment')->with(['comments'=>$commets,'new'=>$new]);
    }
    public function commentpass($new_id,$id,$n){
        $comment = New_comment::find($id);
        $new = News::find($new_id);
        if($n==1){
            if($comment->pass!=1){
                $new->star += $comment->star;
                $new->comments_num++;
                $new->save();
            }
            $comment->pass = 1;
            $comment->save();
        }else if($n==-1){
            if($comment->pass==1){
                $new->star -= $comment->star;
                $new->comments_num--;
                $new->save();
            }
            $comment->pass = -1;
            $comment->save();
        }else if($n=="delete"){
            if($comment->pass==1){
                $new->star -= $comment->star;
                $new->comments_num--;
                $new->save();
            }
            $comment->delete();
        }
        return redirect("newcomment/$new_id");
    }
}
