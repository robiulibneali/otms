<?php

namespace App\Models\Admin\CoursesModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;

    protected static $courseCategory;

    public static function createOrUpdateCourseCategory($request, $id = null)
    {
        if (isset($id))
        {
            self::$courseCategory = CourseCategory::find($id);
        } else {
            self::$courseCategory           = new CourseCategory();
        }

//        self::$courseCategory->course_category_id   = isset($request->course_category_id) ?? 0;
//        self::$courseCategory->course_category_id   = isset($request->course_category_id) ? $request->course_category_id : 0;
        self::$courseCategory->course_category_id   = $request->course_category_id;
        self::$courseCategory->name                 = $request->name;
        self::$courseCategory->image                = fileUpload($request->file('image'), 'course-management/course-category', isset($id) ? static::find($id)->image : '' );
        self::$courseCategory->status               = $request->status == 'on' ? 1 : 0;
        self::$courseCategory->save();
    }

    public static function deleteCourseCategory($id)
    {
        self::$courseCategory = CourseCategory::find($id);
        if (file_exists(self::$courseCategory->image))
        {
            unlink(self::$courseCategory->image);
        }
        self::$courseCategory->delete();
    }

    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class);
    }
    public function courseCategories()
    {
        return $this->hasMany(CourseCategory::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
