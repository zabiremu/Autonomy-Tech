@extends('Frontend.Layouts.app')

@section('title')
    Edit SubCategory
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Create Sub Category
                    </div>
                    <div class="card-body">
                        <form action="{{ route('subCategory.store') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="category_name">Select Category</label>
                                <select class="form-control @error('category_id')  is-invalid
                                    @enderror" id="category_name" name="category_id">
                                    <option selected disabled>Select Category</option>
                                    @forelse($category as $cat)
                                        <option value="{{$cat->id}}" {{$cat->id == $subCategory->category_id ? 'selected' : ''}}>{{$cat->category_name}}</option>
                                    @empty
                                        <option>No Category</option>
                                    @endforelse
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="form-group mb-3">
                                <label for="subCategory_name">Sub Category Name</label>
                                <input type="text" class="form-control @error('subCategory_name')  is-invalid
                                    @enderror" id="subCategory_name" name="subCategory_name" value="{{$subCategory->category_name}}">
                                @error('subCategory_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="category_status">Is Active</label>
                                <input type="Checkbox" id="category_status" name="subCategory_status" {{$subCategory->category_status ? 'checked' : ''}} value="1">
                            </div>

                            <button class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
