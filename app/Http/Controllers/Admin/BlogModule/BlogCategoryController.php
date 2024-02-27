<?php

namespace App\Http\Controllers\Admin\BlogModule;

use App\Http\Controllers\Controller;
use App\Models\Admin\BlogModule\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blog-management.blog-categories.index',[
            'blogCategories' => BlogCategory::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog-management.blog-categories.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        BlogCategory::createOrUpdateBlogCategory($request);
        return redirect()->route('admin.blog-categories.index')->with('success', 'Blog Category Created Successfully');
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
        return view('admin.blog-management.blog-categories.form',[
            'blogCategory' => BlogCategory::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        BlogCategory::createOrUpdateBlogCategory($request, $id);
        return redirect()->route('admin.blog-categories.index')->with('success', 'Blog Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BlogCategory::deleteBlogCategory($id);
        return back()->with('success', 'Blog Deleted Successfully');
    }
}
