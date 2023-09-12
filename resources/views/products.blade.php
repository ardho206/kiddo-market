@extends('layouts.main')


@section('container')

    @php
        $bestSellerProducts = $products->where('best_prod', 1);
        $commonProducts = $products->where('best_prod', 0)
    @endphp

    <div class="row g-2">
        <div class="col-lg-3">
            @include('partials.sidebar')
        </div>
        <div class="col-lg-9">
            <div class="row">
                <div class="col">
                    @if ($bestSellerProducts->count() > 0)
                        <div class="card border-0 pt-3 mb-4 card-container">
                            <div class="d-flex border-bottom mb-4 w-100 ps-2">
                                <h5>Best Seller</h5>
                                <a href="" class="text-decoration-none all ms-auto me-3"><h6>View All <i class="bi bi-arrow-right-circle"></i></h6></a>
                            </div>
                            <div class="container">
                                <div class="row">
                                    @foreach ($bestSellerProducts as $prod)
                                        <div class="col-md-3">
                                            <div class="card card-prod mb-4 shadow">
                                                @php
                                                    $originalPrice = $prod->price;
                                                    $discountPercentage = $prod->discount_percentage; // Persentase diskon (misalnya 30%)
                                                    $discountedPrice = $originalPrice * (1 - $discountPercentage);
                                                @endphp
                                                @auth
                                                    <div class=" btn-like z-3">
                                                        <form class="favorite-form" data-product-id="{{ $prod->id }}" action="{{ route('favorite.add', $prod->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <button class="favorite-button  text-white px-3 py-2 rounded-2 border-0 fs-5" data-product-id="{{ $prod->id }}">
                                                                <i class="bi bi-heart-fill fav"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @else
                                                    <div class=" btn-like z-3">
                                                        <form class="favorite-form" data-product-id="{{ $prod->id }}" action="{{ route('favorite.add', $prod->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <button class="favorite-button  text-white px-3 py-2 rounded-2 border-0 fs-5" data-product-id="{{ $prod->id }}" onclick="alert('kontool')">
                                                                <i class="bi bi-heart-fill fav"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endauth
                                                <span class="badge align-self-center p-1 px-1 position-absolute top-0 start-0 rounded-0" style="font-size: 10px; background-color:#DE0217;">
                                                    {{ round($discountPercentage * 100) }}% OFF
                                                </span>
                                                <a href="products/{{ $prod->slug }}" class="text-decoration-none text-dark">
                                                    <img src="https://source.unsplash.com/random/1080x1080?{{ $prod->category->name }}" height="180" class="card-img-top" alt="{{ $prod->slug }}">
                                                    <div class="card-body p-1">
                                                        <div class="product-rating">
                                                            @if ($prod->ratings->count() > 0)
                                                                @php
                                                                    $averageRating = $prod->ratings->avg('rating');
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
                                                        <h6 style="font-size: 14px; color: #DE0217">Rp{{ number_format($discountedPrice, 2, ',', '.') }}</h6>
                                                        <h5 class="card-title prod-title">{{ Str::limit($prod->title, 20, '...') }}</h5>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col">
                    @if ($commonProducts->count() > 0)
                        <div class="card border-0 pt-3 mb-4">
                            <div class="d-flex border-bottom mb-4 w-100 ps-2">
                                <div class="left d-flex">
                                    <h5>Recomended</h5>
                                    <div class="vr mx-3" style="height: 27px"></div>
                                    <p class="me-4" style="font-size: 14px">Discount {{ round($products->where('best_prod', 0)->first()->discount_percentage * 100) }}%</p>
                                    <p style="font-size: 14px"><i class="bi bi-truck"></i> Quick Delivery</p>
                                </div>
                                <div class="right ms-auto me-3">
                                    <a href="" class="text-decoration-none all"><h6>View All <i class="bi bi-arrow-right-circle"></i></h6></a>
                                </div>
                            </div>
                            <div class="container mx-4">
                                <div class="row">
                                    @foreach ($commonProducts as $prod)
                                        <div class="col-md-3">
                                            <div class="card card-prod mb-4">
                                                @php
                                                    $originalPrice = $prod->price;
                                                    $discountPercentage = $prod->discount_percentage; // Persentase diskon (misalnya 30%)
                                                    $discountedPrice = $originalPrice * (1 - $discountPercentage);
                                                @endphp
                                                @auth
                                                    <div class=" btn-like z-3">
                                                        <form class="favorite-form" data-product-id="{{ $prod->id }}" action="{{ route('favorite.add', $prod->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <button class="favorite-button  text-white px-3 py-2 rounded-2 border-0 fs-5" data-product-id="{{ $prod->id }}">
                                                                <i class="bi bi-heart-fill fav"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @else
                                                    <div class=" btn-like z-3">
                                                        <form class="favorite-form" data-product-id="{{ $prod->id }}" action="{{ route('favorite.add', $prod->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <button class="favorite-button  text-white px-3 py-2 rounded-2 border-0 fs-5" data-product-id="{{ $prod->id }}" onclick="alert('kontool')">
                                                                <i class="bi bi-heart-fill fav"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endauth
                                                <span class="badge align-self-center p-1 px-1 position-absolute top-0 start-0 rounded-0" style="font-size: 10px; background-color:#DE0217;">
                                                    {{ round($discountPercentage * 100) }}% OFF
                                                </span>
                                                <a href="products/{{ $prod->slug }}" class="text-decoration-none text-dark">
                                                    <img src="https://source.unsplash.com/random/1080x1080?{{ $prod->category->name }}" height="180" class="card-img-top" alt="{{ $prod->slug }}">
                                                    <div class="card-body p-1">
                                                        <div class="product-rating">
                                                            @if ($prod->ratings->count() > 0)
                                                                @php
                                                                    $averageRating = $prod->ratings->avg('rating');
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
                                                        <h6 style="font-size: 14px; color: #DE0217;">Rp{{ number_format($discountedPrice, 2, ',', '.') }}</h6>
                                                        <h5 class="card-title prod-title">{{ Str::limit($prod->title, 20, '...') }}</h5>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
