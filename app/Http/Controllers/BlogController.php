<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use App\Member;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = session('id');
        return $this->blogList($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blog.blogPublish');
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
        $this->validate($request, [
            'title' => 'required',
            'editorValue' => 'required',
        ]);
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->content = $request->input('editorValue');
        $blog->time = time();
        $blog->member_id = session('id');
        $blog->save();
        $id = session('id');
        return $this->blogList($id);
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
        $blog = Blog::find($id);
        return view('blog.blogshow')->with(['blog'=>$blog]);
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
        $blog = Blog::find($id);
        return view('blog.blogreflesh')->with(['blog'=>$blog]);
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
        $this->validate($request, [
            'title' => 'required',
            'editorValue' => 'required',
        ]);
        $id = $request->input('id');
        $blog_id = Blog::find($id);
        if(session('id')==$blog_id->member_id)
        {
            $blog_id->title = $request->input('title');
            $blog_id->content = $request->input('editorValue');
            $blog_id->member_id = session('id');
            $blog_id->save();
        }
        $id = session('id');
        return $this->blogList($id);
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
        $blog_id = Blog::find($id);
        if(session('id')==$blog_id->member_id)
        {
            $blog_id->delete();
        }
        return redirect()->back();
    }
    public function blogPublish(){

    }
    public function blogPublishPost(Request $request){

    }

    public function blogList($id)
    {
        $member = Member::find($id);
        $blogs = $member->blogs()->get();
        return view('blog.blogList')->with(['id' => $id, 'blogs' => $blogs, 'member' => $member]);
    }

}
