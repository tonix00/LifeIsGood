<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Auth;


class AdminsController extends Controller
{
	public function getList()
    {
        $blogs = Blog::all();
        return view('admins.list')->with('blogs',$blogs);
    }

    public function getLoginPage()
    {
    	//make sure, a user is not login
    	Auth::logout();

    	// view login page
    	return view('admins.login');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/admin/login');
    }

    public function checkLogin(Request $request)
    {

    	$this->validate($request, [
    		'user_id'=>'required',
    		'password' =>'required'
    	]);

    	$userData =  array(
    		'id' => (int)$request->user_id,
    		'password'=>$request->password 
    	);

    	if(Auth::attempt($userData)){
    		return redirect('/admin');
    	}else{
    		return back()->with('error','Wrong login details.');
    	}
    }

    public function getPost()
    {
    	return view('admins.post');
    }

    public function addPost(Request $request)
    {
        // validate user's input
        $this->validate($request,[
            'select_file' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'title'=>'required',
            'content' =>'required'
        ]);

        $image =$request->file('select_file');
        $eye_catch_image = $this->uploadImages($image);

        $blog = new Blog();
        $blog->eye_catch_image = $eye_catch_image;
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->save();

        return redirect('/admin')->with('success','New article is added.');
    }

    public function viewEditablePost($id)
    {
        $blog = Blog::where('id', $id)->first();
        return view('admins.editable',compact('blog', 'id'));
    }

    public function editPost(Request $request, $id)
    {
        // initial
        $eye_catch_image = "";

        // validate user's input
        $this->validate($request,[
            'title'=>'required',
            'content' =>'required'
        ]);

        $image = $request->file('select_file');
        if($image){
            $eye_catch_image = $this->uploadImages($image);
        }

        $blog = new Blog();
        $blog = $blog->find($id);
        if($eye_catch_image){
           $blog->eye_catch_image = $eye_catch_image;  
        }
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->save();
        return redirect('/admin')->with('success','Record successfully modified.');
    }

    private function uploadImages($image)
    {
         // save user's input
        $path = "images/upload";
        $image_dir = public_path($path);
        $new_name = rand() . '.'.$image->getClientOriginalExtension();
        $imageUpload = $image->move($image_dir,$new_name);
        return "/".$path."/".$new_name;
    }
}
