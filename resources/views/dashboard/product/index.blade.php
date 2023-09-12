@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between mb-2">
        <h2>All Product</h2>
        <a href="/dashboard/products/create" class="btn btn-outline-success pt-2">Add New Product <i class="bi bi-plus-circle"></i></a>
    </div>
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Title</th>
                <th scope="col">Best Product</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $product->title }}</td>
                    <td>
                        @if ($product->best_prod === 1)
                            <i class="bi bi-check-lg fs-5 text-success"></i>
                        @else
                            <i class="bi bi-x-lg fs-5 text-danger"></i>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-outline-primary">Edit</button>
                        <button class="btn btn-outline-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
