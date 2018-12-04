<?php

namespace App\Http\Controllers;

use App\Project;
use App\Member;
use App\Member_project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($flag = 1)
    {
        $projects = Project::get();
        if($flag==2)
            return view('project.projectManager')->with(['projects'=>$projects,'tab'=>2]);
        else if($flag==1)
            return view('project.projectManager')->with(['projects'=>$projects,'tab'=>1]);
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
            'name'=>'required',
            'partner'=>'required'
        ]);
        $project = new Project();
        $project->name = $request->input('name');
        $project->partner = $request->input('partner');
        $project->start_time = strtotime($request->input('start_time'));
        $project->end_time = strtotime($request->input('end_time'));
        $project->category = $request->input('category');
        $project->introduction = $request->input('introduction');
        $project->save();
        return $this->index(2);
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
        $project = Project::find($id);
        return view('project.projectEdit')->with(['project'=>$project]);
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
        $img = $request->file('project_img');
        $project = Project::find($id);
        $project->name = $request->input('name');
        if($img!=null){
            $project->project_img = $img->store('images');
        }
        $project->partner = $request->input('partner');
        $project->start_time = strtotime($request->input('start_time'));
        $project->end_time = strtotime($request->input('end_time'));
        $project->introduction = $request->input('introduction');
        $project->category = $request->input('category');
        $project->save();
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
        $project = Project::find($id);
        if($project)
            $project->delete();
        return $this->index(1);
    }
    public function projectEditStatus($cmd,$id){
        $project = Project::find($id);
        if($cmd=='start'){
            $project->status = 1;
        }else if($cmd=='finish'){
            $project->status = 2;
        }
        $project->save();
        return redirect()->back();
    }
    public function projectGetByStatus($status){
        $projects = Project::where('status',"=",$status)->get();
        return view('project.projectGetByStatus')->with(['projects'=>$projects,'status'=>$status]);
    }
    public function projectAddMember($id){
        $members = Member::get();
        $project = Project::find($id);
        return view('project.projectAddMember',['members'=>$members,'project'=>$project,'tab'=>1]);
    }
    public function projectAddMemberPost(Request $request,$id){
        $addArray = explode(',',$request->input('select'));
        $member = Member_project::where('project_id',$id)->get();
        //防止重复添加成员
        for($i = 0;$i<count($addArray);$i++) {
            $flag = 0;
            foreach ($member as $v) {
                if ($v->member_id == $addArray[$i]) {
                    $flag = 1;
                    break;
                }
            }
            if ($flag == 1) {
                break;
            }
            $member_project = new Member_project();
            $member_project->member_id = $addArray[$i];
            $member_project->project_id = $id;
            $member_project->save();
        }
        $members = Member::get();
        $project = Project::find($id);
        return view('project.projectAddMember',['members'=>$members,'project'=>$project,'tab'=>1]);
    }
    public function projectDelMember($project_id,$member_id){
        $member_project = Member_project::where('project_id',"=",$project_id)->where('member_id','=',$member_id)->get()[0];
        $member_project->delete();
        $members = Member::get();
        $project = Project::find($project_id);
        return view('project.projectAddMember',['members'=>$members,'project'=>$project,'tab'=>2]);
    }
}
