<?php

namespace App\Models\Admin\BlogModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected static $blogCategory;

    public static function createOrUpdateBlogCategory($request, $id = null)
    {
        if (isset($id))
        {
            self::$blogCategory = BlogCategory::find($id);
        } else {
            self::$blogCategory = new BlogCategory();
        }

        self::$blogCategory->title              = $request->title;
        self::$blogCategory->image              = fileUpload($request->file('image'), 'blog-management/blog', isset($id) ? static::find($id)->image : '');
        self::$blogCategory->status             = $request->status == 'on' ? 1 : 0;
        self::$blogCategory->save();
    }

    public static function deleteBlogCategory($id)
    {
        self::$blogCategory = BlogCategory::find($id);
        if (file_exists(self::$blogCategory->image))
        {
            unlink(self::$blogCategory->image);
        }
        self::$blogCategory->delete();
    }
}
