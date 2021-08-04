<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index(){
        $blogs=Blog::paginate(5);
        return view('users.blog',compact('blogs'));
    }

    

}
