@extends('admin.master')

@section('title', isset($course) ? 'Edit' : 'Create'.' Course')

@section('body')
    <div class="row py-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($course) ? 'Edit' : 'Create' }} Course</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($course) ? route('admin.courses.update', $course->id) : route('admin.courses.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($course))
                            @method('put')
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-6 mt-2">
                                <label for="" class="col-md-4">Category Name</label>
                                <div class="col-md-12 form-group">
                                    <select name="course_category_id" required id="" class="form-control select2-show-search">
                                        <option value="" disabled selected>Select a Category</option>
                                        @foreach($courseCategories as $courseCategory)
                                            <option value="{{ $courseCategory->id }}" {{ isset($course) && $courseCategory->id == $course->course_category_id ? 'selected' : '' }}>{{ $courseCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="" class="col-md-4">Teacher Name</label>
                                <div class="col-md-12 form-group">
                                    <select name="teacher_id" required class="form-control select2-show-search">
                                        <option value="" disabled selected>Select a Teacher</option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}" {{ isset($course) && $teacher->id == $course->teacher_id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="" class="col-md-4">Title*</label>
                                <div class="col-md-12">
                                    <input type="text" name="title" required class="form-control" placeholder="Course Title" value="{{ isset($course) ? $course->title : '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="col-md-4">Price</label>
                                <div class="col-md-12">
                                    <input type="text" name="price" class="form-control" placeholder="Course Price" value="{{ isset($course) ? $course->price : '' }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="" class="col-md-4">Short Description</label>
                                <div class="col-md-12">
                                    <textarea name="short_description" class="form-control" id="" cols="30" rows="5">{{ isset($course) ? $course->short_description : '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="col-md-4">Total Class</label>
                                <div class="col-md-12">
                                    <input type="text" name="total_class" class="form-control" placeholder="Total Class" value="{{ isset($course) ? $course->total_class : '' }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label for="" class="col-md-4">Long Description</label>
                                <div class="col-md-12">
                                    <textarea name="long_description" class="form-control col-md-12" id="summernote" cols="30" rows="5">{{ isset($course) ? $course->long_description : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="" class="col-md-4">Starting Date</label>
                                <div id="" class="col-md-12">
                                    <input type="text" id="courseDate" name="starting_date" class="form-control" placeholder="MM/DD/YYYY" value="{{ isset($course) ? $course->starting_date : '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="col-md-4">Total Duration</label>
                                <div class="col-md-12">
                                    <input type="text" name="total_duration" class="form-control" placeholder="Total Duration" value="{{ isset($course) ? $course->total_duration : '' }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="" class="col-md-4">Total Hours</label>
                                <div class="col-md-12">
                                    <input type="text" name="total_hours" class="form-control" placeholder="Total Hours" value="{{ isset($course) ? $course->total_hours : '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="col-md-4">Course Image</label>
                                <div class="col-md-12">
                                    <input type="file" name="image" class="form-control" accept="image/*" />
                                    @if(isset($course))
                                        <img src="{{ asset($course->image) }}" alt="" style="height: 80px" />
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12 d-flex">
                                <label for="" class="col-md-2">Course Status</label>
                                <div class="col-md-10 ms-3">
                                    <div class="material-switch">
                                        <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($course) && $course->status == 0 ? '' : 'checked' }} />
                                        <label for="someSwitchOptionLight" class="label-light"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success" value="{{ isset($course) ? 'Update' : 'Create' }} Course">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
