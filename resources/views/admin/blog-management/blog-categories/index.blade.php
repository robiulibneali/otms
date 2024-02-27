@extends('admin.master')

@section('title', 'Manage Blog Categories')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="">Manage Blog Categories</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Image</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogCategories as $blogCategory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $blogCategory->title }}</td>
                                    <td><img src="{{ asset($blogCategory->image) }}" alt="" style="height: 60px" /></td>
                                    <td>{{ $blogCategory->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.blog-categories.edit', $blogCategory->id) }}" class="btn btn-sm btn-secondary ms-1"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('admin.blog-categories.destroy', $blogCategory->id) }}" id="deleteItem" method="post">
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
