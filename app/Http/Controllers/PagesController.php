<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class PagesController extends Controller
{
    private $perPage = 2;

    public function index()
    {
        $blogs = Blog::take($this->perPage)->get();
    	return view('home')->with('blogs',$blogs);;
    }

    public function getArchive()
    {
        
        $totalPage = 0;
        $blogs = Blog::paginate($this->perPage);

        $totalPage = $blogs->total()/$this->perPage;
        if(is_float($totalPage)){
            $totalPage=(int)$totalPage+1;
        }

    	return view('archive',['blogs' => $blogs,'totalPage'=>$totalPage]);
    }

    public function getDetail($id)
    {
        $blog = Blog::where('id', $id)->first();
    	return view('detail',compact('blog', 'id'));
    }

}
