<?php

namespace App\Models\Admin\CoursesModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    use HasFactory;

    protected static $courseContent;

    public static function createOrUpdateCourseContent($request, $id = null)
    {
        if (isset($id))
        {
            self::$courseContent    = CourseContent::find($id);
        } else {
            self::$courseContent    = new CourseContent();
        }

        self::$courseContent->course_id     = $request->course_id;
        self::$courseContent->title         = $request->title;
        self::$courseContent->type          = $request->type;
        self::$courseContent->file_url      = fileUpload($request->file('file'), 'course-management/course-contents', isset($id) ? self::$courseContent->file_url : null);
        self::$courseContent->file_type     = $request->hasFile('file') ? $request->file('file')->getClientMimeType() : (isset($id) ? static::find($id)->file_type : null);
        self::$courseContent->note          = $request->note;
        self::$courseContent->yt_vdo_id     = $request->yt_vdo_id;
        self::$courseContent->status        = $request->status == 'on' ? 1 : 0;
        self::$courseContent->save();
        return self::$courseContent;
    }
}
