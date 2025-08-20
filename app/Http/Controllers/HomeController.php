<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $plans = \App\Models\Plan::with('plan_features')->get();
        return view('home', compact('plans'));
    }

    public function blogs()
    {
        $blogs = \App\Models\Blog::paginate(8);
        return view('web.blogs.index', compact('blogs'));
    }

    public function blog(\App\Models\Blog $blog)
    {
        return view('web.blogs.show', compact('blog'));
    }
}
