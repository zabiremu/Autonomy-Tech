@extends('Frontend.Layouts.app')

@section('title')
    View SubCategory
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        View Sub Category
                    </div>
                    <div class="card-body">

                            <div class="form-group mb-3">
                                <label for="category_name">Select Category</label>
                                <select class="form-control" id="category_name" name="category_id">
                                    <option selected disabled>Select Category</option>
                                    @forelse($category as $cat)
                                        <option value="{{$cat->id}}" {{$cat->id == $subCategory->category_id ? 'selected' : ''}}>{{$cat->category_name}}</option>
                                    @empty
                                        <option>No Category</option>
                                    @endforelse
                                </select>

                            </div>


                            <div class="form-group mb-3">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control" id="category_name" name="subCategory_name" value="{{$subCategory->category_name}}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="category_status">Is Active</label>
                                <input type="Checkbox" id="category_status" name="subCategory_status" {{$subCategory->category_status ? 'checked' : ''}} value="1">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
