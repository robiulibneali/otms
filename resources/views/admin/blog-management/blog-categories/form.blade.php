@extends('admin.master')

@section('title', isset($blogCategory) ? 'Edit' : 'Create'.' Blog Category')

@section('body')
    <div class="row py-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($blogCategory) ? 'Edit' : 'Create' }} Blog Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($blogCategory) ? route('admin.blog-categories.update', $blogCategory->id) : route('admin.blog-categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($blogCategory))
                            @method('put')
                        @endif
                        <div class="row mt-4">
                            <label for="" class="col-md-4">Category Name*</label>
                            <div class="col-md-8">
                                <input type="text" name="title" class="form-control" placeholder="Category Name" value="{{ isset($blogCategory) ? $blogCategory->title : '' }}" />
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="" class="col-md-4">Category Image</label>
                            <div class="col-md-8">
                                <input type="file" name="image" class="form-control" accept="image/*" />
                                @if(isset($blogCategory))
                                    <img src="{{ asset($blogCategory->image) }}" alt="" style="height: 80px" />
                                @endif
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="" class="col-md-4">Category Status</label>
                            <div class="col-md-8">
                                <div class="material-switch">
                                    <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($blogCategory) && $blogCategory->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionLight" class="label-light"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success" value="{{ isset($blogCategory) ? 'Update' : 'Create' }} Blog Category">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
