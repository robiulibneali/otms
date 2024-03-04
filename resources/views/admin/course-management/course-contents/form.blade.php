@extends('admin.master')

@section('title', isset($courseContent) ? 'Edit' : 'Create'.' Course Content')

@section('body')
    <div class="row py-5">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($courseContent) ? 'Edit' : 'Create' }} Course Content</h3>
                    <a href="{{ route('admin.course-contents.index', ['course_id' => $_GET['course_id']]) }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($courseContent) ? route('admin.course-contents.update', $courseContent->id) : route('admin.course-contents.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($courseContent))
                            @method('put')
                        @endif
                        <input type="hidden" name="course_id" class="form-control" value="{{ $_GET['course_id'] }}" />
                        <div class="row mt-2">
                            <label for="" class="col-md-4">Title*</label>
                            <div class="col-md-6">
                                <input type="text" name="title" required class="form-control" placeholder="Course Content Title" value="{{ isset($courseContent) ? $courseContent->title : '' }}" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-4">Content Type</label>
                            <div class="col-md-6 form-group">
                                <select name="type" required id="" class="form-control select2">
                                    <option value="" disabled selected>Select Content Type</option>
                                    <option value="note" {{ isset($courseContent) && $courseContent->type == 'note' ? 'selected' : '' }}>Note</option>
                                    <option value="file" {{ isset($courseContent) && $courseContent->type == 'file' ? 'selected' : '' }}>File</option>
                                    <option value="video" {{ isset($courseContent) && $courseContent->type == 'video' ? 'selected' : '' }}>Video</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-4">File</label>
                            <div class="col-md-6">
                                <input type="file" name="file_url" class="form-control" value="{{ isset($courseContent) ? $courseContent->file_url : '' }}" accept="image"/>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-4">YT Video ID</label>
                            <div class="col-md-6">
                                <input type="text" name="yt_vdo_id" class="form-control" value="{{ isset($courseContent) ? $courseContent->yt_vdo_id : '' }}" />
                            </div>
                        </div>
                        <div class="row mt-2">
                                <label for="" class="col-md-4">Note</label>
                                <div class="col-md-12">
                                    <textarea name="note" class="form-control" id="summernote" cols="30" rows="5">{!! isset($courseContent) ? $courseContent->note : '' !!}</textarea>
                                </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 d-flex">
                                <label for="" class="col-md-3">Course Content Status</label>
                                <div class="col-md-10 ms-3">
                                    <div class="material-switch">
                                        <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($courseContent) && $courseContent->status == 0 ? '' : 'checked' }} />
                                        <label for="someSwitchOptionLight" class="label-light"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success" value="{{ isset($courseContent) ? 'Update' : 'Create' }} Course Content">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
