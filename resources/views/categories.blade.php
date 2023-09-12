@extends('layouts.main')

@section('container')
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-3 mb-4">
                <a href="/products?category={{ $category->slug }}">
                    <div class="card text-bg-dark zoom-effect">
                        <img src="https://source.unsplash.com/random/1080x1080?{{ $category->slug }}" class="card-img" alt="...">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title text-center flex-fill p-3" style="background-color: rgba(0, 0, 0, 0.6)" >{{ $category->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
