<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\recordStudent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\BlogPost;
use App\Models\Comment;

class studentController extends Controller
{

    public function welcome()
    {

        $User = Auth()->user();
        dd($User);
        return view('welcome', compact('User'));
    }

    public function index()
    {

        $title = "Create Student";
        $url = url('/student/form');
        $data = compact('url', 'title');
        return view('.student.form')->with($data);
    }


    public function store(StorePostRequest $request)
    {

        $Students = new Student();
        $Students->fname = $request['fname'];
        $Students->lname = $request['lname'];
        $Students->email = $request['email'];
        $Students->phone = $request['phone'];
        $Students->address = $request['address'];
        $Students->dob = $request['dob'];

        $randomName = Str::random(10);
        $imageName = time() . '_' . $randomName . '.' . $request->file('image')->getClientOriginalExtension();

        Storage::disk()->put("/uploads/" . $imageName, $request->file('image')->getContent());
        $Students->image = $imageName;
        $Students->save();
        return redirect('student/view');
    }

    public function view(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $Students = Student::where('fname', 'LIKE', "%$search%")->orwhere('lname', 'LIKE', "%$search%")->paginate(5);
        } else {

            $Students = Student::orderBy('id', 'DESC')->paginate(4);
        }

        $data = compact('Students', 'search');

        return view('student.view')->with($data);
    }

    public function delete($id)
    {

        Student::find($id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {

        $Students = Student::find($id);


        if (is_null($Students)) {
            return redirect('Students');
        } else {

            $title = "Update Student";
            $url = url('student/update/') . "/" . $id;
            $data = compact('Students', 'url', 'title');
            return view('student.form')->with(["Students" => $Students, "url" => $url, "title" => $title]);
        }
    }

    public function update($id, Request $request)
    {

        $Students = Student::find($id);

        $Students->fname = $request['fname'];
        $Students->lname = $request['lname'];
        $Students->email = $request['email'];
        $Students->phone = $request['phone'];
        $Students->address = $request['address'];
        $Students->dob = $request['dob'];
        $Students->image = $request['image'];
        $Students->save();

        return redirect(route('student.view'));
    }

    public function details($id)
    {

        $Students = Student::find($id);


        return view('student.details')->with(compact('Students'));
    }

    public function about()
    {

        return view('student.about');
    }

    public function course()
    {

        return view('student.course');
    }

    // Blog uploading blog


    public function addBlog(Request $request)
    {

        return view('student.addblog');

        $addblog = new BlogPost();
        $addblog->title = $request['title'];

        dd($addblog);
    }
    

    public function Blog_post(Request $request)
    {

        $search_blog = $request['search_blog'] ?? "";
        if (!$search_blog == "") {

            $blogPosts = BlogPost::where('title', 'LIKE', "%$search_blog%")->paginate(5);
        } else {            

            $blogPosts = BlogPost::orderBy('id', 'DESC')->paginate(5);
        }

        $data = compact('blogPosts', 'search_blog');
        return view('welcome')->with($data);
    }


    // blog comments


    public function comments(Request $request, $slug)
    {


        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $posts = BlogPost::where('slug', $slug)->firstOrFail();

        $comment = new Comment();
        $comment->blog_post_id = $posts->id;
        $comment->comment = $request->get('content');
        $user = auth()->user();
        $user->comments()->save($comment);
        return redirect()->back();
    }

    public function showComment($slug)
    {

        $post = BlogPost::where('slug', $slug)->firstOrFail();
        $commets = $post->getCommentsWithReplies();
//        dd($commets);
        return view('student.blogshow', compact('post', 'commets'));
    }

    //for students attedance

    public function stor_attendance(Request $request)
    {

        $attedances = new recordStudent();
        $attedances->name = $request['name'];
        $attedances->date = $request['date'];
        $attedances->status = $request['status'];
        $attedances->remark = $request['remark'];
        $attedances->save();
        return redirect(route('attendance'));
    }

    public function attendance()
    {

        $attedances = recordStudent::all();
        $Students = Student::all();
        //  dd($attedances);
        $data = compact('attedances', 'Students');
        return view('student.attendance')->with($data);
    }
}
