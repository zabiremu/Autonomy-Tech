@extends('Frontend.Layouts.app')

@section('title')
    Edit Attributes
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Edit Attributes
                    </div>
                    <div class="card-body">
                        <form action="{{ route('attributes.update',$attributes->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="attributes_name">Attributes Name</label>
                                <input type="text" id="attributes_name" class="form-control @error('attributes_name')  is-invalid
                                    @enderror" name="attributes_name" value="{{$attributes->attributes_name}}">
                                @error('attributes_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="attributes_list">Attributes</label>
                                <input type="text" class="form-control @error('attributes_list')  is-invalid
                                    @enderror" id="attributes" name="attributes_list" value="{{$attributes->attributes}}">
                                @error('attributes_list')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="attribute_status">Is Active</label>
                                <input type="Checkbox" id="attribute_status" name="attributes_status"  value="1" {{$attributes->attributes_status ? 'checked' : ''}}>
                            </div>

                            <button class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
