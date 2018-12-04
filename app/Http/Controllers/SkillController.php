<?php

namespace App\Http\Controllers;

use App\Member;
use App\Skill;
use App\Team;
use Illuminate\Http\Request;

class SkillController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $skill = new Skill();
        $skill->name = $request->input('skillName');
        $skill->member_id = $request->input('member_id');
        $skill->score = $request->input('skillScore');

        //dd($request->input('wechat'));
        $skill->save();
        //dd($request);
        $member = Skill::find($skill->id)->members()->get()[0];
        if($request != null){
            //$skill->save();
            if($request->input('wechat') !=null){
                $member->wechat = $request->input('wechat');
            }
            if($request->input('web_front') !=null){
                $member->web_front = $request->input('web_front');
            }
            if($request->input('web_later') !=null){
                $member->weblater = $request->input('web_later');
            }
        }
        //dd($members);
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
        $skill = Skill::find($id);
        if($skill)
            $skill->delete();
        return redirect()->back();
    }
    public function memberList(){
        return view('skill.index');
    }
    public function skillList($id){
        $member = Member::find($id);
        $skill = $member->skills()->get();
        return view('skill.skillList')->with(['skills'=>$skill,'id'=>$id]);
    }

}
