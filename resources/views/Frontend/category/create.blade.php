@extends('Frontend.Layouts.app')

@section('title')
    Create Categoires
@endsection

@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            Create Category
                        </div>
                        <div class="card-body">
                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" class="form-control @error('category_name')  is-invalid
                                    @enderror" id="category_name" name="category_name">
                                    @error('category_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="category_status">Is Active</label>
                                    <input type="Checkbox" id="category_status" name="category_status"  value="1">
                                </div>

                                <button class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
