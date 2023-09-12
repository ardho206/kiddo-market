<div class="flex-shrink-0 p-3 sidebar rounded-3" style="height: auto">
    <ul class="list-unstyled ps-0">
        <li class="mb-1 category">
            <h3 class="d-inline-flex align-items-center" style="font-size: 19px;">
                <i class="bi bi-list-task me-1" style="margin-top: 3px;"></i> Categories
            </h3>
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                @foreach ($categories as $category)
                    <li><a href="/products?category={{ $category->slug }}" class="d-inline-flex text-decoration-none rounded {{ Request::query('category') === $category->slug ? 'active' : '' }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="filter">
            <h3 class="d-inline-flex align-items-center" style="font-size: 19px;">
                <i class="bi bi-funnel me-1" style="margin-top: 3px;"></i> Filter
            </h3>
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li>
                    <div class="rate">
                        <p class="fw-bold ms-2 mb-1">Rating</p>
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input mt-2" type="checkbox" value="" id="star5">
                                    <label class="form-check-label" for="star5">
                                        <div class="star">
                                            <i class="bi bi-star-fill filled-star"></i>
                                            <i class="bi bi-star-fill filled-star"></i>
                                            <i class="bi bi-star-fill filled-star"></i>
                                            <i class="bi bi-star-fill filled-star"></i>
                                            <i class="bi bi-star-fill filled-star"></i>
                                        </div>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input mt-2" type="checkbox" value="" id="star4">
                                    <label class="form-check-label" for="star4">
                                        <div class="star">
                                            <i class="bi bi-star-fill filled-star"></i>
                                            <i class="bi bi-star-fill filled-star"></i>
                                            <i class="bi bi-star-fill filled-star"></i>
                                            <i class="bi bi-star-fill filled-star"></i>
                                            <i class="bi bi-star-fill empty-star"></i>
                                        </div>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input mt-2" type="checkbox" value="" id="star3">
                                    <label class="form-check-label" for="star3">
                                        <div class="star">
                                            <i class="bi bi-star-fill filled-star"></i>
                                            <i class="bi bi-star-fill filled-star"></i>
                                            <i class="bi bi-star-fill filled-star"></i>
                                            <i class="bi bi-star-fill empty-star"></i>
                                            <i class="bi bi-star-fill empty-star"></i>
                                        </div>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input mt-2" type="checkbox" value="" id="star2">
                                    <label class="form-check-label" for="star2">
                                        <div class="star">
                                            <i class="bi bi-star-fill filled-star"></i>
                                            <i class="bi bi-star-fill filled-star"></i>
                                            <i class="bi bi-star-fill empty-star"></i>
                                            <i class="bi bi-star-fill empty-star"></i>
                                            <i class="bi bi-star-fill empty-star"></i>
                                        </div>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li>
                    <div class="locate">
                        <p class="fw-bold ms-2 mb-1">Locate</p>
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="locate1">
                                    <label class="form-check-label" for="locate1">
                                        Jabodetabek
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="locate2">
                                    <label class="form-check-label" for="locate2">
                                        DKI Jakarta
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="locate3">
                                    <label class="form-check-label" for="locate3">
                                        Jawa Barat
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="locate4">
                                    <label class="form-check-label" for="locate4">
                                        Jawa Timur
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="locate5">
                                    <label class="form-check-label" for="locate5">
                                        Jawa Tengah
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="locate6">
                                    <label class="form-check-label" for="locate6">
                                        kepulauan Riau
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="locate7">
                                    <label class="form-check-label" for="locate7">
                                        Banten
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="locate8">
                                    <label class="form-check-label" for="locate8">
                                        Sumatera Utara
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="locate9">
                                    <label class="form-check-label" for="locate9">
                                        DI Yogyakarta
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="locate10">
                                    <label class="form-check-label" for="locate10">
                                        Bali
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="locate11">
                                    <label class="form-check-label" for="locate11">
                                        Lampung
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="locate12">
                                    <label class="form-check-label" for="locate12">
                                        Sumatera Selatan
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="locate13">
                                    <label class="form-check-label" for="locate13">
                                        Sulawesi selatan
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</div>
