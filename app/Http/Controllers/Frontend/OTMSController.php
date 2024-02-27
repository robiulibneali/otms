<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\BlogModule\Blog;
use App\Models\Admin\BlogModule\BlogCategory;
use App\Models\Admin\CoursesModule\Course;
use App\Models\Admin\CoursesModule\CourseCategory;
use App\Models\User;
use Illuminate\Http\Request;

class OTMSController extends Controller
{
    protected $courseCategories = [], $course, $courses = [], $blogCategories = [], $blogs = [], $teachers = [];

    public function home()
    {
        return view('front.home.index', [
            'courseCategories'  => CourseCategory::where('status', 1)->has('courses')->latest()->get(),
            'blogCategories'    => BlogCategory::where('status', 1)->get(),
            'courses'           => Course::where('status', 1)->latest()->take(6)->get(),
            'blogs'             => Blog::where('status', 1)->latest()->take(3)->get(),
            'teachers'          => User::where('role', 1)->get(),
        ]);
    }

    public function blogCategory($categoryId)
    {
        return view('front.blog-module.index', [
            'category' => BlogCategory::select(['id', 'title'])->find($categoryId),
            'blogs' => Blog::where([
                'blog_category_id' => $categoryId,
                'status'           => 1,
            ])->get(),
        ]);
    }

    public function blogDetails($blogId)
    {
        return view('front.blog-module.details', [
            'blog' => Blog::find($blogId),
        ]);
    }

    public function courseCategory($categoryId)
    {
        return view('front.course-module.index', [
            'category'  => CourseCategory::select(['id', 'name'])->find($categoryId),
            'courses'   => Course::where([
                'course_category_id'    => $categoryId,
                'status'                => 1,
            ])->get(),
        ]);
    }

    public function coursesDetails($courseId)
    {
        $this->course  = Course::find($courseId);
        $this->courses = Course::where('course_category_id', $this->course->course_category_id)->where('id', '!=', $courseId)->take(3)->latest()->get();
        return view('front.course-module.details', [
            'course'            => $this->course,
            'relatedCourses'    => $this->courses,
            'isCourseInCart'    => checkIfCourseIsInCart($courseId),
        ]);
    }

    public function about()
    {
        return view('front.about.index');
    }
    public function contact()
    {
        return view('front.contact.index');
    }
    public function faq()
    {
        return view('front.faq.index');
    }
}
