<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Contribution;
use App\Journal;
use App\Member;
use App\Member_project;
use App\News;
use App\Project;
use Illuminate\Http\Request;
use App\Team;

class UserController extends Controller
{
    //
    public function userIndex(){
        return view('user.index');
    }


    //个人设置
    public function userEdit(){
        return view('user.userEdit');
    }
    public function userEditPost(Request $request){
        $member = Member::find($request->input('id'));
        $member->name = $request->input('name');
        $member->phone = $request->input('phone');
        $member->email = $request->input('email');
        $member->age = strtotime($request->input('age'));
        $member->time = strtotime($request->input('time'));
        $member->language = $request->input('language');
        $member->introduction = $request->input('introduction');
        //获取图片名
        /***************************/
        $image = $request->file('change_image');
        //将图片名字存入表中、把图片储存到asserts文件夹下面
        if($image !=null)
        {
            $member->image = $image->store('images');
        }
        /***********************/
        $member->save();
        return redirect('userIndex');
    }
    public function passwordEdit(){
        return view('user.passwordEdit');
    }

    public function passwordEditPost(Request $request){
        //dd($request);
        $this->validate($request, [
            'oldPassword' => 'required',
            'password' => 'required|max:10|min:5|confirmed',
            'password_confirmation' => 'required',
        ]);
        $member = Member::find(session('id'));

        if(decrypt($member->password)==$request->input('oldPassword')){
            $password =encrypt( $request->input('password'));
            $member->password = $password;
            $member->save();
            return redirect()->route('login');
        }else{
            echo "原密码错误";
        }
    }
    //我的项目
    public function myProject(){
        return view('user.myProject');
    }
    public function myProjectfinish(){
        return view('user.myFinishProject');
    }
    public function myProjectwaiting(){
        return view('user.myWaitingProject');
    }
    public function myProjectworking(){
        return view('user.myWorkingProject');
    }
    public function myProjectlooking($id){
        $project = Project::find($id);
        return view('user.myLookingProject')->with(['project'=>$project]);
    }
    public  function myProjectlookingPost(Request $request,$id){
        if(count(Contribution::where('member_id','=',session('id'))->where('project_id','=',$id)->get())>0){
            $con = Contribution::where('member_id','=',session('id'))->where('project_id','=',$id)->get()[0];
        }
        else{
            $con = new Contribution();
        }
        $con->member_id = session('id');
        $con->project_id = $id;
        $con->introduction = $request->input('introduction');
        $con->time = time();
        $con->save();
        return redirect()->back();
    }
    //我的团队
    public function myTeam()
    {
        $id  = session('id');
        if(count(Member::find($id)->team()->get())==0)
        {
            return redirect('userIndex');
        }
        else
        {
            $team = Member::find($id)->team()->get()[0];
            return view("user.myTeam")->with(['team'=>$team]);
        }
    }

    //我的好友
    public function friends(){
        return view('user.friends');
    }

}
