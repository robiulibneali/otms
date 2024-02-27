@extends('admin.master')

@section('title', isset($blog) ? 'Edit' : 'Create'.' Blog')

@section('body')
    <div class="row py-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($blog) ? 'Edit' : 'Create' }} Blog</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($blog) ? route('admin.blogs.update', $blog->id) : route('admin.blogs.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($blog))
                            @method('put')
                        @endif
                        <div class="row mt-2">
                                <label for="" class="col-md-4">Category Name</label>
                                <div class="col-md-8 form-group">
                                    <select name="blog_category_id" required id="" class="form-control select2-show-search">
                                        <option value="" disabled selected>Select a Category</option>
                                        @foreach($blogCategories as $blogCategory)
                                            <option value="{{ $blogCategory->id }}" {{ isset($blog) && $blogCategory->id == $blog->blog_category_id ? 'selected' : '' }}>{{ $blogCategory->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="row mt-2">
                                <label for="" class="col-md-4">Title*</label>
                                <div class="col-md-8">
                                    <input type="text" name="title" required class="form-control" placeholder="Blog Title" value="{{ isset($blog) ? $blog->title : '' }}" />
                                </div>
                        </div>
                        <div class="row mt-4">
                                <label for="" class="col-md-4">Short Description</label>
                                <div class="col-md-8">
                                    <textarea name="short_description" class="form-control" id="" cols="30" rows="5">{{ isset($blog) ? $blog->short_description : '' }}</textarea>
                                </div>
                        </div>
                        <div class="row mt-4">
                                <label for="" class="col-md-4">Long Description</label>
                                <div class="col-md-8">
                                    <textarea name="long_description" class="form-control col-md-12" id="summernote" cols="30" rows="5">{{ isset($blog) ? $blog->long_description : '' }}</textarea>
                                </div>
                        </div>
                            <div class="row mt-4">
                                <label for="" class="col-md-4">Blog Image</label>
                                <div class="col-md-8">
                                    <input type="file" name="image" class="form-control" accept="image/*" />
                                    @if(isset($blog))
                                        <img src="{{ asset($blog->image) }}" alt="" style="height: 80px" />
                                    @endif
                                </div>
                            </div>
                        <div class="row mt-2">
                                <label for="" class="col-md-4">Blog Status</label>
                                <div class="col-md-8">
                                    <div class="material-switch">
                                        <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($blog) && $blog->status == 0 ? '' : 'checked' }} />
                                        <label for="someSwitchOptionLight" class="label-light"></label>
                                    </div>
                                </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success" value="{{ isset($blog) ? 'Update' : 'Create' }} Blog">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
