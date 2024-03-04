<?php

namespace App\Http\Controllers\Admin\CoursesModule;

use App\Http\Controllers\Controller;
use App\Models\Admin\CoursesModule\Course;
use App\Models\Admin\CoursesModule\CourseContent;
use Illuminate\Http\Request;

class CourseContentController extends Controller
{
    protected $course, $courses = [], $courseContent, $courseContents = [] ;

    public function index(Request $request)
    {
        $this->courseContents = CourseContent::where([
            'status'    => 1,
            'course_id' => $request->course_id,
        ])->latest()->get();
        return view('admin.course-management.course-contents.index', [
            'courseContents' => $this->courseContents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course-management.course-contents.form',[
            'course' => Course::where('status', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->courseContent = CourseContent::createOrUpdateCourseContent($request);
        return redirect()->route('admin.course-contents.index', ['course_id' => $this->courseContent->course_id])->with('success', 'Course Content Created Successfully');
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
        $this->courseContent    = CourseContent::find($id);
        $_GET['course_id']      = $this->courseContent->course_id;
        return view('admin.course-management.course-contents.form',[
            'courseContent'    => $this->courseContent,
            'courses'          => Course::whereStatus(1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->courseContent = CourseContent::createOrUpdateCourseContent($request, $id);
        return redirect()->route('admin.course-contents.index', ['course_id' => $this->courseContent->course_id])->with('success', 'Course Content Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CourseContent::deleteCourseContent($id);
        return back()->with('success', 'Course Content Deleted Successfully');
    }
}
