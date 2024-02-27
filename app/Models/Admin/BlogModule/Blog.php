<?php

namespace App\Models\Admin\BlogModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected static $blog;

    public static function createOrUpdateBlog($request, $id = null)
    {
        if (isset($id))
        {
            self::$blog = Blog::find($id);
        } else {
            self::$blog = new Blog();
        }

        self::$blog->blog_category_id     = $request->blog_category_id;
        self::$blog->title                = $request->title;
        self::$blog->short_description    = $request->short_description;
        self::$blog->long_description     = $request->long_description;
        self::$blog->image                = fileUpload($request->file('image'), 'blog-management/blog', isset($id) ? static::find($id)->image : '');
        self::$blog->status               = $request->status == 'on' ? 1 : 0;
        self::$blog->save();
    }

    public static function deleteBlog($id)
    {
        self::$blog = Blog::find($id);
        if (file_exists(self::$blog->image))
        {
            unlink(self::$blog->image);
        }
        self::$blog->delete();
    }

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function blogCategories()
    {
        return $this->hasMany(BlogCategory::class);
    }
}
