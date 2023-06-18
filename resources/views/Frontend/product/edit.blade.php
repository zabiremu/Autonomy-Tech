@extends('Frontend.Layouts.app')

@section('title')
    Edit Products
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Edit Products
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update',$product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="category_name">Select Category</label>
                                <select class="form-control @error('category_id')  is-invalid
                                    @enderror" id="category_name" name="category_id[]" multiple>
                                    <option disabled>Select Category</option>
                                    @forelse($category as $cat)
                                        <option value="{{$cat->id}}" {{$cat->id == $product->category_id ? 'selected': ''}}>{{$cat->category_name}}</option>
                                    @empty
                                        <option>No Category</option>
                                    @endforelse
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="attributes_id">Select Attributes</label>
                                <select class="form-control @error('attributes_id')  is-invalid
                                    @enderror" id="attributes_id" name="attributes_id">
                                    <option disabled>Select Attributes</option>
                                    @forelse($attributes as $att)
                                        <option value="{{$att->id}}" {{$att->id == $product->attribute_id ? 'selected': ''}}>{{$att->attributes_name}}</option>
                                    @empty
                                        <option>No attributes</option>
                                    @endforelse
                                </select>
                                @error('attributes_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="form-group mb-3">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control @error('product_name')  is-invalid
                                    @enderror" id="product_name" name="product_name" value="{{$product->product_name}}">
                                @error('product_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="form-group mb-3">
                                <label for="product_price">Product Price</label>
                                <input type="text" class="form-control @error('product_price')  is-invalid
                                    @enderror" id="product_price" name="product_price" value="{{$product->price}}">
                                @error('product_price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="product_status">Is Active</label>
                                <input type="Checkbox" id="product_status" name="product_status" {{$product->product_status ? 'checked' : ''}}  value="1">
                            </div>

                            <button class="btn btn-primary">update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
