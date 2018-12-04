<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Member;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($flag=1)
    {
        //
        $teams = Team::get();
        $members = Member::get();
        if($flag==1)
            return view("team.teamManager")->with(['members'=>$members,'teams'=>$teams,'tab'=>1]);
        else if($flag==2)
            return view("team.teamManager")->with(['members'=>$members,'teams'=>$teams,'tab'=>2]);
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
        $this->validate($request,[
            'team_name'=>'required',
            'captain'=>'required',
            'team_img'=>'required'
        ]);
        $team = new Team();
        $team->team_name = $request->input("team_name");
        $team->captain = $request->input("captain");
        $team->introduction = $request->input("team_intro");
        $team->time = time();
        $image = $request->file('team_img');
        if($image!=null)
            $team->team_img = $image->store('team');
        $team->save();
        return $this->index(1);
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
        $team = Team::find($id);
        return view("team.teamDisplay")->with(['team'=>$team]);
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
        $members = Member::get();
        $team = Team::find($id);
        return view('team.teamEdit')->with(['team'=>$team,'members'=>$members]);
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
        $team = Team::find($id);
       //xiugai duizhang
        $member = Member::where("name",'=',$request->input("captain"))->get();
        if($member = null){
            $member->team_id = $id;
            $member->save();
        }

        $image = $request->file('team_img');
        if($image!=null)
            $team->team_img = $image->store('team');
        $team->team_name = $request->input("team_name");
        $team->captain = $request->input("captain");
        $team->introduction = $request->input('team_intro');
        $team->save();
        return redirect('team');
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
        $team = Team::find($id);
        $members = $team->members()->get();
        foreach ($members as $member){
            $member->team_id = -1;
            $member->save();
        }
        $team->delete();
        return $this->index(1);
    }
    //团队管理
    public function teamAddMember($id){
        $team = Team::find($id);
        $members = Member::get();
        return view('team.teamAddMember')->with(['team'=>$team,'members'=>$members]);
    }
    public function teamDelMember($id){
        $member = Member::find($id);
        $member->team_id = "-1";
        $member->save();
        return redirect()->back();
    }
    public function teamAddMemberPost(Request $request,$id){
        $res = $request->input("select");
        $resArray = explode(",",$res);
        for($i = 0;$i<count($resArray);$i++){
            $member = Member::find($resArray[$i]);
            $member->team_id = $id;
            $member->save();
        }
        return redirect()->back();
    }
    // yxb
    public function team_true($id){
        $allteams = Team::where('isshow','=','1')->get();
        $team = Team::find($id);
        if(count($allteams) <3){
            $team->isshow = 1;
            $team->save();
            return redirect('team');
        }
        else{
            echo "<script>alert('主页推荐页面允许最多推荐三个');
                window.location.href=\"" .url('team')."\"</script>";
        }

    }
    public function team_false($id){
        $team = Team::find($id);
        $team->isshow = 0;
        $team->save();
        return redirect('team');
    }

    public function member_true($id , $team_id){
        $team = Team::find($team_id);
        $allmembers =$team->members()->where('isshow','=','1')->get();
        $member = Member::find($id);
        if(count($allmembers) <4){
            $member->isshow = 1;
            $member->save();
            return redirect("teamAddMember/$member->team_id");
        }
        else{
            echo "<script>alert('主页推荐页面允许最多推荐四个');
                window.location.href=\"" .url("teamAddMember/$member->team_id")."\"</script>";
        }

    }
    public function member_false($id,  $team_id){
        $member = Member::find($id);
        $team = Team::find($team_id);
        $member->isshow = 0;
        $member->save();
        return redirect("teamAddMember/$member->team_id/");
    }
}
