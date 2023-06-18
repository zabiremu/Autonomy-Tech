@extends('Frontend.Layouts.app')

@section('title')
    View Category
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        View Category
                    </div>
                    <div class="card-body">

                            <div class="form-group mb-3">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control" id="category_name" name="category_name" value="{{$category->category_name}}">

                            </div>
                            <div class="form-group mb-3">
                                <label for="category_status">Is Active</label>
                                <input type="Checkbox" id="category_status" {{$category->category_status ? 'checked' : ''}}  name="category_status">
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
