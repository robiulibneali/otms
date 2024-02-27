@extends('admin.master')

@section('title', 'Manage Users')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="">Manage Users</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Role</td>
                                <td>Mobile</td>
                                <td>Image</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge badge-success-light">{{ $user->role == 0 ? 'Student' : '' }}</span>
                                        <span class="badge badge-success-light">{{ $user->role == 1 ? 'Trainer' : '' }}</span>
                                        <span class="badge badge-success-light">{{ $user->role == 2 ? 'Stuff' : '' }}</span>
                                        <span class="badge badge-success-light">{{ $user->role == 3 ? 'Admin' : '' }}</span>
                                        <span class="badge badge-success-light">{{ $user->role == 4 ? 'Super Admin' : '' }}</span>
                                    </td>
                                    <td>{{ $user->mobile }}</td>
                                    <td><img src="{{ asset($user->profile_photo_path) }}" alt="" style="height: 60px" /></td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-secondary ms-1"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" id="deleteItem" method="post">
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
