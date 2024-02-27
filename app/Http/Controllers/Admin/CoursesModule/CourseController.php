<?php

namespace App\Http\Controllers\Admin\CoursesModule;

use App\Http\Controllers\Controller;
use App\Models\Admin\CoursesModule\Course;
use App\Models\Admin\CoursesModule\CourseCategory;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.course-management.courses.index',[
            'courses' => Course::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course-management.courses.form',[
            'courseCategories' => CourseCategory::where('status', 1)->get(),
            'teachers' => User::where('role', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Course::createOrUpdateCourse($request);
        return redirect()->route('admin.courses.index')->with('success', 'Course Created Successfully');
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
        return view('admin.course-management.courses.form',[
            'course'           => Course::find($id),
            'courseCategories' => CourseCategory::whereStatus(1)->get(),
            'teachers'         => User::where('role', 1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Course::createOrUpdateCourse($request, $id);
        return redirect()->route('admin.courses.index')->with('success', 'Course Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Course::deleteCourse($id);
        return back()->with('success', 'Courses Deleted Successfully');
    }
}
