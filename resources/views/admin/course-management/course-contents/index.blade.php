@extends('admin.master')

@section('title', 'Manage Course Contents')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="">Manage Course Contents</h3>
                    <a href="{{ route('admin.course-contents.create', ['course_id' => $_GET['course_id']]) }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-plus-circle"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Course Title</td>
                                <td>Title</td>
                                <td>File Type</td>
                                <td>File Info</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($courseContents as $courseContent)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $courseContent->course_id }}</td>
                                        <td>{{ $courseContent->title }}</td>
                                        <td>{{ $courseContent->file_type ?? 'External Url' }}</td>
                                        <td>
                                            @if($courseContent->type == 'file')
                                                <p><b>File:</b> {{ $courseContent->file_url }}</p>
                                            @elseif($courseContent->type == 'note')
                                                <p><b>Note:</b> {!! str()->words(strip_tags($courseContent->note), 10, '...') !!}</p>
                                            @elseif($courseContent->type == 'video')
                                                <p>
                                                    <b>YT Vidoe:</b>
                                                    <iframe width="250" height="150" src="https://www.youtube.com/embed/{{ $courseContent->yt_vdo_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                </p>
                                            @endif
                                        </td>
                                        <td>{{ $courseContent->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td class="d-flex">
                                           <a href="{{ route('admin.course-contents.edit', $courseContent->id) }}" class="btn btn-sm btn-secondary ms-1"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('admin.course-contents.destroy', $courseContent->id) }}" id="deleteItem" method="post">
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
