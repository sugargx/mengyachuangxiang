<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Journal;

class JournalController extends Controller
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
        return $this->journalList($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blog.journalPublish');
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
            'editorValue' => 'required',
        ]);
        $journal = new Journal();
        $journal->content = $request->input('editorValue');
        $journal->time = time();
        $journal->member_id = session('id');
        $journal->save();
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
        //
        $journal = Journal::where('id',$id)->get()[0];
        if($journal->member_id==session('id'))
        {
            return view('blog.journalEdit')->with(['journal'=>$journal]);
        }
        else
        {
            echo "<script>alert('对不起，您没有该权限！');location.href = \"".url('journalList')."/".session('id')."\";</script>";
        }
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
            'editorValue' => 'required',
        ]);
        $id = $request->input('id');
        $journal = Journal::where('id',$id)->get()[0];
        if($journal->member_id==session('id'))
        {
            $journal->content = $request->input('editorValue');
            $journal->save();
            echo "<script>alert('更新成功！');location.href = \"".url('journal')."/"."\";</script>";
        }
        else
        {
            echo "<script>alert('对不起，您没有该权限！');location.href = \"".url('journal')."/"."\";</script>";
        }
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
        $journal = Journal::where('id',$id)->get()[0];
        if($journal->member_id==session('id'))
        {
            $journal->delete();
            echo "<script>alert('删除成功！');location.href = \"".url('journal')."/"."\";</script>";
        }
        else
        {
            echo "<script>alert('对不起，您没有该权限！');location.href = \"".url('journalList')."/"."\";</script>";
        }
    }
    function journalList($id){
        $member = \App\Member::find($id);
        $journals = $member->journals()->orderBy('time','desc')->get();
        return view('blog.journalList')->with(['member'=>$member,'journals'=>$journals,'id'=>$id]);
    }
}
