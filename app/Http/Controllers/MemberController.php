<?php

namespace App\Http\Controllers;

use App\Member;
use App\Team;
use App\Job;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //人员管理
    public function memberAuditing(){
        $members = Member::where('status','=','0')->get();
        return view('member.memberAuditing')->with(['members'=>$members]);
    }
    public function memberAuditingOK($id){
        $member = Member::find($id);
        $member->status = 1;
        $member->save();
        return redirect()->back();
    }
    public function memberAuditingNO($id){
        $member = Member::find($id);
        $member->delete();
        return redirect()->back();
    }
    public function index()
    {
        //
        $members = Member::get();
        $teams = Team::get();
        $jobs = Job::get();
        return view('member.memberManager')->with(["members"=>$members,'teams'=>$teams,'jobs'=>$jobs,'tab'=>1]);
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
        //
        $member = new Member();
        $this->validate($request,[
            'user_name'=>'required|unique:member',
            'password'=>'between:5,10|required',
            'team_id'=>'required',
            'name'=>'required',
            'job_id'=>'required'
        ]);
        $member->status = 1;
        $member->image = "images/profile.png";
        $member->user_name = $request->input("user_name");
        $member->password = encrypt($request->input("password"));
        $member->team_id = $request->input("team_id");
        $member->name = $request->input("name");
        $member->job_id = $request->input('job_id');
        $member->save();
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
        $member = Member::find($id);
        return view('member.memberInfo')->with(['member'=>$member]);
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
        $member = Member::find($id);
        $teams = Team::get();
        $jobs = Job::get();
        return view("member.memberEdit")->with(['member'=>$member,'teams'=>$teams,'jobs'=>$jobs]);
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
        $member = Member::find($id);
        $member->team_id = $request->input("team_id");
        $member->name = $request->input("name");
        $member->job_id = $request->input('job');
        $member->phone = $request->input("phone");
        $member->email = $request->input('email');
        $member->age = strtotime($request->input("age"));
        $member->time = strtotime($request->input("time"));
        $member->language = $request->input("language");
        $member->introduction = $request->input("introduction");
        $member->advantage = $request->input("advantage");
        $member->ability = $request->input("ability");

        $member->save();
        return redirect()->back();
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
        $member = Member::find($id);
        if($member)
            $member->delete();

        $members = Member::get();
        $teams = Team::get();
        $jobs = Job::get();
        return view('member.memberManager')->with(["members"=>$members,'teams'=>$teams,"jobs"=>$jobs,'tab'=>2]);
    }
}
