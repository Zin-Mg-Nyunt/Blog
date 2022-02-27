<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index', [
            'blogs'=>Blog::latest()
                        ->filter(request(['search','category','username']))->paginate(6)
                        ->withQueryString()
        ]);
    }
    public function show(Blog $blog)
    {
        return view('blogs.show', [
            "blog"=>$blog,
            "randomBlog"=>Blog::inRandomOrder()->take(3)->get(),
        ]);
    }
    public function subscriptionHandler(Blog $blog)
    {
        if (User::find(auth()->user()->id)->isSubscribed($blog)) {
            $blog->unSubscribe();
        } else {
            $blog->subscribe();
        }
        return back();
    }
    public function create()
    {
        return view('blogs.create');
    }
}
