<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PPT;
class PPTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ppts = PPT::get();
        return view('ppt.pptshow')->with(['ppts'=>$ppts,'tab'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'img'=>'image',
           'title'=>'required|max:40',
           'description'=>'required|max:100',
           'url'=>'required|url',
            'url_title'=>'required|max:40'
        ]);
        $ppt = new PPT();
        $ppt->title = $request->input('title');
        $img = $request->file('img');
        $ppt->img = $img->store('images');
        $ppt->description = $request->input('description');
        $ppt->url = $request->input('url');
        $ppt->url_title = $request->input('url_title');
        $ppt->save();
        return redirect()->back();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ppt = PPT::find($id);
        return view('ppt.pptEdit')->with(['ppt'=>$ppt]);
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
        $this->validate($request,[
            'img'=>'image',
            'title'=>'required|max:40',
            'description'=>'required|max:100',
            'url'=>'required|url',
            'url_title'=>'required|max:40'
        ]);
        $ppt = PPT::find($id);
        $ppt->title = $request->input('title');
        $img = $request->file('img');
        $ppt->img = $img->store('images');
        $ppt->description = $request->input('description');
        $ppt->url = $request->input('url');
        $ppt->url_title = $request->input('url_title');
        $ppt->save();
        return redirect('ppts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ppt = PPT::find($id);
        $ppt->delete();
        return redirect('ppts');
    }
    public function recommend (Request $request,$id){
        $ppt = PPT::find($id);
        if($ppt->show){
            $ppt->show = 0;
        }else{
            $ppt->show = 1;
        }
        $ppt->save();
        return redirect('ppts');
    }
}
