@extends('dashboard.layouts.main')

@section('content')
    <h2>Create New Product</h2>
    <form class="mb-3">
        @csrf
        <div class="row g-2">
            <div class="col-12 mb-3">
                <label for="title" class="form-label">Product Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="col-12 mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug">
            </div>
            <div class="col-12 mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" id="category_id" name="category_id">
                    @foreach ($category as $cate)
                        <option value="1">{{ $cate->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mb-3">
                <label for="discount" class="form-label">Discount</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="discount" name="discount">
                    <span class="input-group-text" id="basic-addon1">%</span>
                </div>
            </div>
            <div class="col-12 mb-3">
                <label for="price" class="form-label">Price</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp</span>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
            </div>
            <div class="col-12 mb-3">
                <label for="desc" class="form-label">Desc</label>
                {{-- @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror --}}
                <input id="desc" type="hidden" name="desc" value="{{ old('body') }}">
                <trix-editor input="desc"></trix-editor>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="best_prod">
                <label class="form-check-label" for="best_prod" name="best_prod">
                    Best Product
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
