<?php

namespace App\Http\Controllers;

use App\Contribution;
use App\Member;
use App\Message;
use App\News;
use App\PPT;
use App\Project;
use App\Skill;
use App\Team;
use App\Blog;
use App\IP;
use App\New_comment;
use App\New_ip;
use App\Blogcommit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class HomePageController extends Controller
{
    //yxb修改
    public function index(){
        $teams = Team::where('isshow','=','1')->orderBy('time','asc')->get();
        $projects = Project::where('status','=','2')->orderBy('end_time','desc')->get();
        $news = News::where('isshow','=','1')->orderBy('time','desc')->get();
        $ppts = PPT::where('show','=','1')->orderBy('updated_at','desc')->get();
        return view('homePage.index', compact('teams','projects','news','ppts'));

    }
    public function newShow($id){
        $ip = getip();
        $new = News::find($id);
        $date = date_format(now(), 'Y-m-d');
        if(count(New_ip::where('date','=',$date)->get())==0){
            $new_ip = new New_ip();
            $new_ip->ip = $ip;
            $new_ip->new_id = $id;
            $new_ip->date = $date;
            $new_ip->save();
            $new->num++;
            $new->save();
        }
        $comments = New_comment::where('new_id','=',$id)->where('pass','=','1')->orderBy('time','desc')->paginate(6);
        return view('homePage.new')->with(['new'=>$new,'comments'=>$comments]);
    }
    public function news(){
        $news = News::orderBy('time','desc')->paginate(6);
        return view('homePage.news')->with(['news'=>$news]);
    }
    public function new_comment($id,Request $request){
        $this->validate($request,[
            'rating'=>'required|integer|min:0|max:5',
            'name'=>'required',
            'email'=>'required|email',
            'comment'=>'required|min:6|max:160',
        ]);
        $comment = new New_comment();
        if($request->input('rating')==null){
            $comment->star = 5;
        }
        $comment->star = $request->input('rating');
        $comment->name = $request->input('name');
        $comment->email = $request->input('email');
        $img = $request->file('images');
        if($img!=null){
            $comment->image = $img->store('images');
        }
        $comment->comment = $request->input('comment');
        $comment->new_id = $id;
        $comment->time = time();

        $comment->ip = getip();
        $comment->save();
        echo "<script>alert('评论成功！请等待管理员审核！');location.href=\"".url('new').'/'.$id."\";</script>";
    }

    public function contact(){
        return view('homePage.contact');
    }

    public function service(){
        return view('homePage.service');
    }

    public function teams(){
        return view('homePage.teams');
    }
    public function team_detail($id){
        $team = Team::find($id);
        return view('homePage.team_detail')->with(['team'=>$team]);
    }

    public function project_detail($id){
        $project = Project::find($id);
        $cons = Contribution::where('project_id','=',$project->id)->orderBy('time','desc')->get();
        //dd($cons);
        return view('homePage.projectdetail')->with(['project'=>$project,'cons'=>$cons]);
    }

    public function own($id){
        $member = Member::find($id);
        return view('homePage.own')->with(['member'=>$member]);
    }
    public function own_all(){
        return view('homePage.own_all');
    }

    public function contactPost(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'email|required',
            'text'=>'required|max:256:min'
        ]);
        $message = new Message();
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->text = $request->input('text');
        $message->save();
        echo "<script>alert('留言成功！')</script>";
        echo "<script>var t = setTimeout(function(){parent.history.back()},2);</script>";
        return ;
    }
    // yxb 添加
    public function  aboutus(){
        return view('homePage.aboutus');
    }
    public function  membershow(){
        $members = Member::where('status','=','1')->where('rank','=','0')->paginate(4);
        return view('homePage.membershow',compact('members'));
    }
    public  function  teammembershow($id){
        $members = Team::find($id)->members()->orderBy('isshow','desc')->paginate(4);
        return view('homePage.membershow',compact('members'));
    }
    public function  projectshow(){
        $projects = Project::where('status','=','2')->orderBy('end_time','desc')->paginate(3);
        return view('homePage.projectshow')->with(['projects'=>$projects]);
    }
    public function  memberdetail($id){
        $member = Member::find($id);
        $journal = Member::find($id)->journals()->orderBy('time','desc')->get();
        $projects = Member::find($id)->projects()->orderBy('start_time', 'desc')->paginate(2);
        $skills = $member->skills()->get();
        return view('homePage.memberdetail' , compact('member', 'journal', 'projects','skills'));
    }
    public function  member_blog($id){
        $blog = Member::find($id)->blogs()->orderBy('time','desc')->paginate(5);
        $member = Member::find($id);
        $hotblogs = $member->blogs()->orderBy('num','desc')->get()->take(3);
        return view('homePage.member_blog', compact('blog', 'hotblogs', 'member'));
    }
    public function  member_blogdetail($id){
        //获取ip地址

        $cip = getip();
        //获取相应的blog
        $blog = Blog::find($id);
        //检查此博客已经存在的IP
        $IP = $blog->ip()->where('name','=',$cip)->count();
        //打印IP数组
        //dd($IP);
        if($IP ==0) {
            $blog->num = 1 + $blog->num;
            $blog->save();
            $ip = new IP();
            $ip->name = $cip;
            $ip->blog_id = $blog->id;
            $ip->save();
        }
        $member = $blog->member()->get()[0];
        //echo $id;
        $preblog = $member->blogs()->orderBy('id','desc')->where('id','>',$id)->get();
        $nextblog = $member->blogs()->orderBy('id','desc')->where('id','<',$id)->get();
        //dd($nextblog);
        $hotblogs = $member->blogs()->orderBy('num','desc')->get()->take(3);
        //获取当前博客的一级评论并按照时间排序
        $commits = $blog->blogcommits()->where('rank','=','1')->orderBy('time','desc')->get();
        //获取当前博客所有的二级评论并按照时间排序
        $commits2 = $blog->blogcommits()->where('rank','=','2')->orderBy('time','desc')->get();
        //dd($commits);
        return view('homePage.member_blogdetail', compact('blog','member','nextblog','preblog','hotblogs','commits' ,'commits2'));
    }
    public function  lookfor($id,Request $request){
        // 获取该id所有的blogs
        $blogs = Member::find($id)->blogs()->get();
        //取出与关键词相似的博客
        $blog = Blog::where('title','like','%'.$request->input('keywords').'%')->paginate(5);
        $member = Member::find($id);
        $hotblogs = $member->blogs()->orderBy('num','desc')->get()->take(3);
        return view('homePage.member_blog', compact('blog', 'hotblogs', 'member'));
    }

    public function  blogcommit($id,Request $request){
        //dd($request);
        $this->validate($request,[
            'content'=>'required|min:6|max:160',
        ]);
        //建立新的数据表
        $comment = new Blogcommit();
        $comment->content = $request->input('content');
        $comment->blog_id =$id;
        $comment->time =time();
        //dd($request);
        //一级评论还是2级评论
        $comment->rank = $request->input('flag');
        if($comment->rank==2){
            $comment->rank_id = $request->input('ans');
        }
        //评论所属member
        $password = encrypt($request->input('password'));
        //dd($password);
        //dd($request);
        $user_name = $request->input('users');
        $password = $request->input('password'); // 输入的密码并没有加密
        if(count(Member::where('user_name','=',$user_name)->get())<1){
            echo "<script>alert('用户名或密码错误！')</script>";
            session(['name'=>'','rank'=>'', 'id'=>'']);
            echo "<script> window.location.href=\" ".url("member_blogdetail/$id")." \"; </script> ";
        }
        $member  = Member::where('user_name','=',$user_name)->get()[0];
        if($member->status==0) {
            echo "<script>alert('您的账号还未通过审核！')</script>";
            session(['name'=>'','rank'=>'', 'id'=>'']);
            echo "<script> window.location.href=\" ".url("member_blogdetail/$id")." \"; </script> ";
        }
        else {
            session(['id' => $member->id]);
            session(['rank' =>$member->rank]);
            //解密数据库的密码
            if (decrypt($member->password) == $password) {
                $comment->member_id = $member->id;
                $comment->save();

                return redirect("member_blogdetail/$id");
            } else {
                echo "<script> alert('密码输入错误') </script> ";
                session(['name'=>'','rank'=>'', 'id'=>'']);
                echo "<script> window.location.href=\" ".url("member_blogdetail/$id")." \"; </script> ";

            }
        }
    }
    public function memberssearch(Request $request){
        $name = $request->input('name');
        $status = $request->input('status');
        $job = $request->input('job');
        $query = Member::query();
//        dd($request);
        $query->where('status','=','1')->where('rank','=','0');
        if($name!=null){
            $query->where('name','like','%'.$name.'%');
        }
        if($status!=null){
            $query->where('isstudent','=',intval($status));
        }
        if($job!=null){
            $query->where('job_id','=',$job);
        }
        $members = $query->paginate(4);
        return view('homePage.membershow',compact('members'));
    }

    public  function  lookforproject(Request $request){
    //dd($request);
        //获取所需要的项目
    $pro = Project::where('status','=','2');
    //获取前端输入的name
    $name = $request->input('name');
    //获取前端输入的种类
    $kind = $request->input('kind');
    switch ($kind){
        case 0: $kind=null; break;
        case 1: $kind = '小程序'; break;
        case 2: $kind = 'web网页';break;
        case 3: $kind = 'LOGO设计';break;
    }
    if($name ==null && $kind ==null){
        $projects = $pro ;
    }
    else{
        if($name != null && $kind ==null){
            $projects = $pro->where('name','like','%'.$name.'%');
        }
        else if($kind !=null && $name ==null){
            $projects = $pro->where('category','=',$kind);
        }else {
            $projects = $pro->where('category','=',$kind)->where('name','like','%'.$name.'%');
        }
    }
        $projects = $projects->orderBy('end_time','desc')->paginate(3);
        return view('homePage.projectshow',compact('projects'));
    }
}
