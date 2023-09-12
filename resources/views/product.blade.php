@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card p-3 pt-3 rounded-0 border-0 mb-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card rounded-0 border-0">
                                    <img src="{{ $products->image1 }}" class="card-img-top rounded-0 object-fit-cover mb-lg-1" alt="..." height="500" width="500">
                                    <ul class="list-group list-group-flush d-flex flex-row justify-content-evenly mb-5">
                                        <li class="list-group-item border-0 p-0">
                                            <button class="btn p-0">
                                                <img src="{{ $products->image1 }}" alt="" height="80" width="80">
                                            </button>
                                        </li>
                                        <li class="list-group-item border-0 p-0">
                                            <button class="btn p-0">
                                                <img src="{{ $products->image2 }}" alt="" height="80" width="80">
                                            </button>
                                        </li>
                                        <li class="list-group-item border-0 p-0">
                                            <button class="btn p-0">
                                                <img src="{{ $products->image3 }}" alt="" height="80" width="80">
                                            </button>
                                        </li>
                                        <li class="list-group-item border-0 p-0">
                                            <button class="btn p-0">
                                                <img src="{{ $products->image4 }}" alt="" height="80" width="80">
                                            </button>
                                        </li>
                                        <li class="list-group-item border-0 p-0">
                                            <button class="btn p-0">
                                                <img src="{{ $products->image5 }}" alt="" height="80" width="80">
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="d-flex justify-content-around">
                                        <div class="shared d-flex mt-2">
                                            <p class="me-2 mt-1">Share : </p>
                                            <div class="social-media">
                                                <button class="rounded-circle border-0 sosmed"><i class="bi bi-messenger fs-4" style="color: #0384FF"></i></button>
                                                <button class="rounded-circle border-0 sosmed"><i class="bi bi-facebook fs-4" style="color: #3B5999"></i></button>
                                                <button class="rounded-circle border-0 sosmed"><i class="bi bi-pinterest fs-4" style="color: #DE0217"></i></button>
                                                <button class="rounded-circle border-0 sosmed"><i class="bi bi-twitter fs-4" style="color: #10C2FF"></i></button>
                                            </div>
                                        </div>
                                        <div class="vr mx-2"></div>
                                        <button type="button" class="btn favorite d-flex mt-2 p-0 border-0" id="liveToastBtn">
                                            <i class="bi bi-heart fs-5 me-2" style="color: #FF525E"></i>
                                            <p style="margin-top: 2px">Favorite : (3,3RB)</p>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 position-relative pe-1">
                                <div class="prod-head">
                                    <h5 class="text-uppercase d-flex">
                                        @if ($products->best_prod == 1)
                                            <span class="badge bg-info align-self-center me-1 p-1 px-1 position-relative rounded-0" style="font-size: 10px;">
                                                <i class="bi bi-star-fill" style="color: goldenrod; font-size: 11px;"></i>
                                                Best
                                            </span>
                                        @endif
                                        {{ $products->title }}
                                    </h5>
                                    <div class="d-flex align-items-center mb-2" style="height: 30px">
                                        <div class="d-flex" style="font-size: 16px;">
                                            <p class="me-2 text-decoration-underline link-offset-3" style="margin-top: 1px;">{{ $products->rating }}</p>
                                            <div class="product-rating">
                                                <button class="border-0 rounded-0 p-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    @if ($products->ratings->count() > 0)
                                                        @php
                                                            $averageRating = $products->ratings->avg('rating');
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
                                                </button>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Review For This Product</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('rating.submit', $products->id) }}" method="post">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="review" class="form-label">Your Review</label>
                                                                    <textarea class="form-control" name="review" id="review" rows="4"></textarea>
                                                                </div>
                                                                <div class="rating">
                                                                    <input type="radio" name="rating" id="star5" value="5">
                                                                    <label class="bi bi-star" for="star5"></label>
                                                                    <input type="radio" name="rating" id="star4" value="4">
                                                                    <label class="bi bi-star" for="star4"></label>
                                                                    <input type="radio" name="rating" id="star3" value="3">
                                                                    <label class="bi bi-star" for="star3"></label>
                                                                    <input type="radio" name="rating" id="star2" value="2">
                                                                    <label class="bi bi-star" for="star2"></label>
                                                                    <input type="radio" name="rating" id="star1" value="1">
                                                                    <label class="bi bi-star" for="star1"></label>
                                                                    <p class="mt-3 text-secondary me-2">Rating : </p>
                                                                </div>
                                                                <br>
                                                                <div class="button ms-auto">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Send Review</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vr mx-3"></div>
                                        <p class="text-decoration-underline link-offset-3 mt-3 me-1">4,7RB</p>
                                        <small class="text-secondary" style="font-size: 14px;">Rating</small>
                                        <div class="vr mx-3"></div>
                                        <p class="mt-3 me-1">6RB+</p>
                                        <small class="text-secondary" style="font-size: 14px;">
                                            Sold
                                            <i class="bi bi-question-circle" id="tooltip" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="The amount sold is calculated based on completed orders."></i>
                                        </small>
                                        <a href="" class="ms-auto text-decoration-none text-secondary" style="font-size: 12px;">Report</a>
                                    </div>
                                    <div class="card border-0 rounded-0 d-flex mb-2 price-disc">
                                        <div class="card-body d-flex position-relative">
                                            @php
                                                $originalPrice = $products->price;
                                                $discountPercentage = $products->discount_percentage; // Persentase diskon (misalnya 30%)
                                                $discountedPrice = $originalPrice * (1 - $discountPercentage);
                                            @endphp
                                            <h4 class="text-decoration-line-through fw-light mt-1 me-2 price" style="font-size: 20px">Rp{{ number_format($originalPrice, 2, ',', '.') }}</h4>
                                            <h4 class="mt-1 disc" style="font-size: 30px;">Rp{{ number_format($discountedPrice, 2, ',', '.') }}</h4>
                                            <span class="badge align-self-center top-0 end-0 position-absolute rounded-0" style="font-size: 10px; background-color:#DE0217;">
                                                {{ round($discountPercentage * 100) }}% OFF
                                            </span>
                                        </div>
                                    </div>
                                    <div class="prod-body">
                                        <div class="delivery d-flex">
                                            <p class="text-secondary me-5 mt-1 small" style="font-size: 14px">Delivery</p>
                                            <div class="d-flex">
                                                <i class="bi bi-truck me-2 mt-1"></i>
                                                <p class="text-secondary me-5 mt-1" style="font-size: 14px">Delivery To</p>
                                                <div class="dropdown" style="margin-top: 2px">
                                                    <button class="btn dropdown-toggle border-0 rounded-0 p-0 text-uppercase fw-medium" style="font-size: 14px" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        kota jakarta pusat
                                                    </button>
                                                    <ul class="dropdown-menu rounded-0" style="font-size: 14px">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="quantity d-flex">
                                            <label class="text-secondary mt-2 small" for="quantity" style="font-size: 14px; margin-right: 2.5rem">Quantity</label>
                                            <div class="input-group mb-3 w-25">
                                                <button class="btn btn-outline-secondary" type="button" id="decreaseButton">-</button>
                                                <input class="form-control" id="quantity" name="quantity" min="1" value="1">
                                                <button class="btn btn-outline-secondary" type="button" id="increaseButton">+</button>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <p class="text-secondary mt-1 small" style="font-size: 14px">Description </p>
                                            <p>{{ $products->desc }}</p>
                                        </div>
                                        <button class="btn btn-outline-secondary position-absolute w-100 bottom-0 end-0" style="margin-bottom: 3.4rem">Add To Shopping Bag</button>
                                        <button class="btn btn-outline-primary position-absolute w-100 bottom-0 end-0 mb-2">Checkout</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="toast-container position-fixed bottom-0 start-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="../img/k-removebg-preview.png" class="rounded me-2" height="30" width="30" alt="...">
                <strong class="me-auto">KiDDO STORE</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Added to favorites, view now!
            </div>
        </div>
    </div>
@endsection
