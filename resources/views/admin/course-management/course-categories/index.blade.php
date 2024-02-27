@extends('admin.master')

@section('title', 'Manage Course Categories')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="">Manage Course Categories</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Category of </td>
                                <td>Name</td>
                                <td>Image</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courseCategories as $courseCategory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $courseCategory->course_category_id != 0 ? $courseCategory->courseCategory->name : 'Parent' }}</td>
                                    <td><a href="{{ route('admin.course-categories.index', ['category-id' => $courseCategory->id]) }}">{{ $courseCategory->name }}</a></td>
                                    <td><img src="{{ asset($courseCategory->image) }}" alt="" style="height: 60px" /></td>
                                    <td>{{ $courseCategory->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.course-categories.create', [ 'category-id' => $courseCategory->id ]) }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
                                        <a href="{{ route('admin.course-categories.edit', $courseCategory->id) }}" class="btn btn-sm btn-secondary ms-1"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('admin.course-categories.destroy', $courseCategory->id) }}" id="deleteItem" method="post">
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
