<?php

namespace App\Http\Controllers\Admin\BlogModule;

use App\Http\Controllers\Controller;
use App\Models\Admin\BlogModule\Blog;
use App\Models\Admin\BlogModule\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blog-management.blogs.index',[
            'blogs' => Blog::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog-management.blogs.form',[
            'blogCategories' => BlogCategory::where('status', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Blog::createOrUpdateBlog($request);
        return redirect()->route('admin.blogs.index')->with('success', 'Blog Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.blog-management.blogs.form',[
            'blog' => Course::find($id),
            'blogCategories' => BlogCategory::whereStatus(1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Blog::createOrUpdateBlog($request, $id);
        return redirect()->route('admin.blogs.index')->with('success', 'Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::deleteBlog($id);
        return back()->with('success', 'Blog Deleted Successfully');
    }
}
