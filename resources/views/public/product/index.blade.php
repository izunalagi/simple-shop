@extends('layouts.app')
@section('title', 'Product Index Page')
@section('content')
    <h5 class="fw-bold">Products</h5>
    <div class="row">
        @foreach ($products as $item)
            <div class="col-sm-3 col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $item->photo) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">
                            Stock : {{ $item->stocks . ' ' . $item->fkProductDetail->unit }}
                        </p>
                        <p class="card-text">
                            Price : Rp. {{ number_format($item->price) }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
