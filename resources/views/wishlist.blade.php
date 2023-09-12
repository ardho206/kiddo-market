@extends('layouts.main')

@section('container')
    <div class="card p-0">
        <div class="card-title">
            <h2 class="m-3 mb-0">My Favorite</h2>
        </div>
        <div class="card-body">
            @if ($products->count() == 0)
                <h5>Your favorite product is empty, add it now! <a href="/products" class="text-decoration-none">Go to Product</a></h5>
            @else
                <table class="table table-bordered text-center justify-content-center small">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($products as $product)
                            <tr>
                                <th>
                                    <p style="margin-top: 15px">{{ $loop->iteration }}</p>
                                </th>
                                <td>
                                    <div class="title d-flex justify-content-center" style="margin-top: 15px">
                                        <p class="me-1">{{ $product->title }}</p>
                                        @if ($product->best_prod == 1)
                                            <span class="badge rounded-0 px-1 pt-1 align-self-center mb-3" style="font-size: 10px; background-color: goldenrod;">
                                                <i class="bi bi-star-fill"></i>
                                                BEST
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <th>
                                    <div class="price d-flex justify-content-center" style="margin-top: 15px">
                                        <p class="me-1">Rp{{ number_format($product->price * (1 - $product->discount_percentage), 2, ',', '.') }}</p>
                                        <span class="badge rounded-0 px-1 pt-1 align-self-center mb-3" style="font-size: 10px; background-color:#DE0217;">
                                            {{ round($product->discount_percentage * 100) }}% OFF
                                        </span>
                                    </div>
                                </th>
                                <td>
                                    <div class="product-rating" style="margin-top: 13px">
                                        @if ($product->ratings->count() > 0)
                                            @php
                                                $averageRating = $product->ratings->avg('rating');
                                                $wholeStars = floor($averageRating);
                                                $hasHalfStar = ($averageRating - $wholeStars) >= 0.5;
                                            @endphp

                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $wholeStars)
                                                    <i class="bi bi-star-fill filled-star"></i>
                                                @elseif ($hasHalfStar && $i == ($wholeStars + 1))
                                                    <i class="bi bi-star-half filled-star"></i>
                                                @else
                                                    <i class="bi bi-star-fill empty-star"></i>
                                                @endif
                                            @endfor
                                        @else
                                            <i class="bi bi-star-fill empty-star"></i>
                                            <i class="bi bi-star-fill empty-star"></i>
                                            <i class="bi bi-star-fill empty-star"></i>
                                            <i class="bi bi-star-fill empty-star"></i>
                                            <i class="bi bi-star-fill empty-star"></i>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="action-btn" style="margin-top: 9px">
                                        <a href="products/{{ $product->slug }}" class="btn btn-outline-success">View</a>
                                        <a class="btn btn-outline-primary">Checkout</a>
                                        <form action="{{ route('favorite.remove', $product->id) }}" method="POST" id="delete-form" style="display: inline-block;">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-delete">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-outline-primary ms-auto">Checkout All</button>
            @endif
        </div>
    </div>
@endsection
