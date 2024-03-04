@extends('admin.master')

@section('title', 'Manage Courses')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="">Manage Courses</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Category Name</td>
                                <td>Teacher Name</td>
                                <td>Title</td>
                                <td>Description</td>
                                <td>Price</td>
                                <td>Information</td>
                                <td>Image</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $course->courseCategory->name }}</td>
                                    <td>{{ $course->user->name }}</td>
                                    <td><a href="{{ route('admin.course-contents.index', ['course_id' => $course->id]) }}">{{ $course->title }}</a></td>
                                    <td>
                                        <p><b>Short Description:</b> {{ str()->words(strip_tags($course->short_description), 10, '...') }}</p>
                                        <p><b>Long Description:</b> {{ str()->words(strip_tags($course->long_description), 15, '...') }}</p>
                                    </td>
                                    <td>{{ $course->price }}</td>
                                    <td>
                                        <p>Starting Date: {{ $course->starting_date }}</p>
                                        <p>Total Duration: {{ $course->total_duration }}</p>
                                        <p>Total Class: {{ $course->total_class }}</p>
                                        <p>Total Hours: {{ $course->total_hours }}</p>
                                    </td>
                                    <td><img src="{{ asset($course->image) }}" alt="" style="height: 60px" /></td>
                                    <td>{{ $course->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td class="d-flex">
                                       <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-sm btn-secondary ms-1"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('admin.courses.destroy', $course->id) }}" id="deleteItem" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger delete-item ms-1"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
