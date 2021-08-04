<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;
use Image;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{
    public function index(){
        $blogs=Blog::paginate(5);
        return view('admins.blogs.index',['blogs'=>$blogs]);

    }

    public function create(){
        
        return view ('admins.blogs.create');
    }

    public function store(Request $req){
        // dd($req->all());
        $validation=$req->validate(
            [
                'title'=>'required',
                'organization_name'=>'required',
                'description'=>'required',
                'date'=>'required'
            ]);

        // if($validation){
        $ext = $req->image->getClientOriginalExtension();
        $name=Str::random(32);
        $fileName=$name.'.'.$ext;
        // dd($fileName);
        $image=Image::make($req->image);
        $image->save(public_path('images/'.$fileName));
            // dd($image);
        $pathName=$image->dirname.'/'.$image->basename;
        // dd($pathName);
        Storage::putFileAs('public/blog_images',$pathName,$fileName);
        $image->destroy();
        unlink($pathName);
        $blog=new Blog(); 
        $blog->title=$req->title;
        $blog->organization_name=$req->organization_name;
        $blog->description=$req->description;
        $blog->date=$req->date;
        $blog->start_time=$req->start_time;
        $blog->end_time=$req->end_time;
        $blog->image=$fileName;
        $blog->save();
        // return redirect('admin/blog');
         return back()->with("success","Thank You For Your Event");
        // }
        // else{
        //     return back()->withErrors($validation);
        // }
    }
    public function delete($id){
        $delete_blog_data=Blog::find($id);
        $delete_blog_data->delete();
        return back()->with("delete","$delete_blog_data->title has been finished");

    }
    public function edit($id){
        $edit_blog_data=Blog::find($id);
        return view('admins.blogs.edit',["edit_blog_data"=>$edit_blog_data]);
    }
    public function update($id,Request $req){
        $blog=Blog::find($id);
        if($req->image){
            $ext = $req->image->getClientOriginalExtension();
            $name=Str::random(32);
            $fileName=$name.'.'.$ext;
            $image=Image::make($req->image);
            $image->save(public_path('images/'.$fileName));
            $pathName=$image->dirname.'/'.$image->basename;
            Storage::putFileAs('public/blog_images',$pathName,$fileName);
            $image->destroy();
            unlink($pathName);
            $blog->image=$fileName;
        }
        $blog->title=$req->title;
        $blog->organization_name=$req->organization_name;
        $blog->description=$req->description;
        $blog->date=$req->date;
        $blog->start_time=$req->start_time;
        $blog->end_time=$req->end_time;
        $blog->update();

        return redirect("admin/blog");
    }
    }

