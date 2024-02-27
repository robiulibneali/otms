<?php

namespace App\Models\Admin\CoursesModule;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected static $course;

    public static function createOrUpdateCourse($request, $id = null)
    {
        if (isset($id))
        {
            self::$course = Course::find($id);
        } else {
            self::$course = new Course();
        }

        self::$course->course_category_id   = $request->course_category_id;
        self::$course->teacher_id           = $request->teacher_id;
        self::$course->title                = $request->title;
        self::$course->short_description    = $request->short_description;
        self::$course->long_description     = $request->long_description;
        self::$course->price                = $request->price;
        self::$course->starting_date        = $request->starting_date;
        self::$course->total_duration       = $request->total_duration;
        self::$course->total_class          = $request->total_class;
        self::$course->total_hours          = $request->total_hours;
        self::$course->image                = fileUpload($request->file('image'), 'course-management/course', isset($id) ? static::find($id)->image : '');
        self::$course->status               = $request->status == 'on' ? 1 : 0;
        self::$course->save();
    }

    public static function deleteCourse($id)
    {
        self::$course = Course::find($id);
        if (file_exists(self::$course->image))
        {
            unlink(self::$course->image);
        }
        self::$course->delete();
    }

    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
